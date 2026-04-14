<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>csv_handler</title>

 <style>
    .container
    {
        width:30%;
        height:50%;
        background-color: black;
        color: whitesmoke;
        border: 1px solid grey;
        position: relative;
        padding: 20px;
        margin-top: 10%;
        justify-self: center;
    }
    form{
        padding:20px;
        font-size: larger;
    }
    form > input
    {
        margin: 10px;
        padding: 10px;
        font-size: large;
    }
    
    /* --- NEW CSS FOR FILE PREVIEWS --- */
    .preview-wrapper {
        display: flex;
        justify-content: space-evenly;
        margin-top: 40px;
        padding: 0 20px;
    }
    .file-box {
        width: 45%;
        background-color: #1a1a1a;
        border: 1px solid grey;
        padding: 15px;
        border-radius: 5px;
    }
    .file-box h3 {
        color: whitesmoke;
        text-align: center;
        margin-top: 0;
        border-bottom: 1px solid grey;
        padding-bottom: 10px;
    }
    .content-area {
        width: 100%;
        height: 300px;
        background-color: black;
        color: #4CAF50; /* Green text for valid data */
        border: none;
        resize: none;
        padding: 10px;
        box-sizing: border-box;
        font-family: monospace;
    }
    .error-text {
        color: #ff5555; /* Red text for errors */
    }
 </style>   
</head>
<body>
    <div class="container">

    <form action="file-validator.php" method="post" enctype="multipart/form-data">
        Upload:
        <input type="file" name="csv" id="csv"><br>
        <input type="submit" value="submit">
    </form>
</div>

<?php 
// Use !empty() instead of isset()
if(!empty($_SESSION['errors']))
{
    foreach($_SESSION['errors'] as $error)
    {
        echo "<h3> $error </h3>";
    }
    unset($_SESSION['errors']);
    // REMOVED: session_abort(); 
}
// else for showing valid file data and error log 
else
{
    if(isset($_SESSION["showContent"]) && $_SESSION["showContent"] == true)
    {
        ?>
        <div class="preview-wrapper">
            
            <div class="file-box">
                <h3>Valid Data (validData.txt)</h3>
                <textarea class="content-area" readonly><?php 
                    if(file_exists('upload/validData.txt')) {
                        echo htmlspecialchars(file_get_contents('upload/validData.txt'));
                    } else {
                        echo "No valid data found or file missing.";
                    }
                ?></textarea>
            </div>

            <div class="file-box">
                <h3>Error Log (errorLog.txt)</h3>
                <textarea class="content-area error-text" readonly><?php 
                    if(file_exists('upload/errorLog.txt')) {
                        echo htmlspecialchars(file_get_contents('upload/errorLog.txt'));
                    } else {
                        echo "No errors logged!";
                    }
                ?></textarea>
            </div>

        </div>
        <?php
        unset($_SESSION["showContent"]);
        // REMOVED: session_abort();
    }
}
?>
</body>
</html>



