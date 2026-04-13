<?php
session_start();

$errors = [];
$warrning;
$banned=['fuck','nigga','shit'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $bio = trim($_POST['bio'] ?? '');


    if (empty($username)) {
        $errors[] = "Username Required";
    } elseif (strlen($username) > 20) {
        $errors[] = "Username max 20 characters allowed";
    }

    if (empty($password)) {
        $errors[] = "Password Required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }

    if (strlen($bio) > 200) {
        $errors[] = "Bio must be under 200 characters";
    }
    else{
        foreach($banned as $word)
        {
        if(stripos($bio,$word)!==false)
        {
            $bio=str_ireplace($word,'***',$bio);
            $warrning="your bio have some abusive words which are banned!";
        }
    }

    }
   
    if (empty($errors)) {
        $_SESSION['success'] = "Validation done";
        $_SESSION['bio']=$bio;
        $_SESSION['warrning']=$warrning;
    } else {
        $_SESSION['errors'] = $errors;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Validation</title>
</head>

<body>

<?php

if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>{$_SESSION['success']}</p>";
    echo"<p style='color:black'>{$_SESSION['warrning']}</p>";
    echo"<script>alert('{$_SESSION['bio']}');</script>";
    unset($_SESSION['success']);
    unset($_SESSION['warrning']);
    unset($_SESSION['bio']);

}


if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<p style='color:red'>$error</p>";
    }
    unset($_SESSION['errors']);
}
?>

<h2>Register User</h2>

<form method="post">

<label>Username</label>
<input type="text" name="username">

<br><br>

<label>Password</label>
<input type="password" name="password">

<br><br>

<label>Bio</label>
<textarea name="bio"></textarea>

<br><br>

<input type="submit" value="Submit">

</form>

</body>
</html>