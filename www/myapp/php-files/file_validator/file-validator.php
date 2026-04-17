<?php
// 1. MUST start the session to use $_SESSION
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0) {
    $_SESSION['errors'][] = "Server Error: The uploaded file is too large. Please upload a smaller file.";
    header('Location: files.php');
    exit();
}
class fileOpenException extends Exception
{
    public $ErrorFile;
    public function __construct($fileName)
    {
        $this->ErrorFile = $fileName;
        parent::__construct("File Opening Error");
    }
    public function getCustomMessage()
    {
        return "File :" . $this->getFile() . "<br> Line Number :" . $this->getLine() . " <br> Error Opening :-" . $this->ErrorFile . "<br>Sorry!";
    }
}

class FileExtensionError extends Exception
{
    public function getCustomMessage()
    {
        return "<br> Sorry! You have uploaded the wrong file type.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Safely grab file info (if no file was uploaded, this prevents a crash)
    $file_name = $_FILES['csv']['name'] ?? '';
    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $tmp_file = $_FILES['csv']['tmp_name'] ?? '';
    $target = "upload/" . $file_name;

    // Initialize variables as false
    $sourcefile = false;
    $validfile = false;
    $errorlog = false;

    // Reset session flags for a fresh start
    $_SESSION['errors'] = [];
    $_SESSION["showContent"] = false;

    try {
        // Check for built-in PHP upload errors (like exceeding the 2MB size limit)
        if (isset($_FILES['csv']['error']) && $_FILES['csv']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("PHP Upload Error Code: " . $_FILES['csv']['error'] . " (Check file size limits or if a file was actually selected).");
        }

        if ($extension == "csv") {
            // Attempt to move the file
            if (move_uploaded_file($tmp_file, $target)) {
                $sourcefile = @fopen($target, "r");

                if ($sourcefile != false) {
                    // Try to open the output files
                    $validfile = @fopen("upload/validData.txt", "w");
                    $errorlog = @fopen("upload/errorLog.txt", "w");
                    // 2. Add a strict check to immediately catch permission issues
                    if (!$validfile || !$errorlog) {
                        throw new Exception("Server Permission Error: Could not create output text files in the upload/ directory.");
                    }
                    $header = fgetcsv($sourcefile);
                    if ($header && $validfile) {
                        fputcsv($validfile, $header);
                    }

                    $row_num = 2;

                    while (($line = fgetcsv($sourcefile)) != false) {
                        $name = $line[0];
                        $email = $line[1];
                        $age = $line[2];
                        $data = [];
                        $e_msg = [];
                        $isError = false;

                        if (!empty($name)) {
                            $data[] = $name;
                        } else {
                            $isError = true;
                            $data[] = "undefined";
                            $e_msg[] = "Name is empty";
                        }

                        if (!empty($email)) {
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $isError = true;
                                $e_msg[] = "Email is not-valid";
                            }
                            $data[] = $email;
                        } else {
                            $isError = true;
                            $data[] = "undefined";
                            $e_msg[] = "Email is empty";
                        }

                        if (!empty($age)) {
                            if ($age < 18) {
                                $isError = true;
                                $e_msg[] = "Under age";
                            }
                            $data[] = $age;
                        } else {
                            $isError = true;
                            $data[] = "undefined";
                            $e_msg[] = "age is empty";
                        }

                        // Write to the correct file
                        if ($isError) {
                            $content = "\n" . implode(",", $data) . " --Errors-- " . implode("|", $e_msg);
                            if ($errorlog) fwrite($errorlog, $content);
                        } else {
                            $content = "\n" . implode(",", $data);
                            if ($validfile) fwrite($validfile, $content);
                        }
                        $row_num += 1;
                    }

                    // If we get here, the whole loop succeeded!
                    $_SESSION["showContent"] = true;
                } else {
                    throw new fileOpenException($file_name);
                }
            } else {
                throw new Exception("Server Permission Error: Could not save the uploaded file to the 'upload/' directory.");
            }
        } else {
            throw new FileExtensionError();
        }
    } catch (FileExtensionError $f) {
        $_SESSION['errors'][] = $f->getCustomMessage();
    } catch (fileOpenException $e) {
        $_SESSION['errors'][] = $e->getCustomMessage();
    } catch (Exception $e) {
        // Catches the permission errors and PHP upload errors
        $_SESSION['errors'][] = $e->getMessage();
    } finally {
        // ALWAYS close resources safely
        if ($sourcefile) fclose($sourcefile);
        if ($validfile) fclose($validfile);
        if ($errorlog) fclose($errorlog);
    }

    // --- THE FIX ---
    // 1. Force PHP to lock in the Session Data right now
    session_write_close();
    // 2. Perform the ONE redirect
    header('Location: files.php');
    exit();
}
