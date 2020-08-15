<?php
$submitted = !empty($_POST);
if ($submitted == 1) {

$username = $_POST['username'];
$password = $_POST['password'];
setcookie('username', $username);
setcookie('password', $password);
}   else {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
}

echo "<p>Username and PW:$username $password";
?>
<!DOCTYPE html>
<html>
    <head><title>Form Handler Page</title></head>
    <body>
        <p>Form submitted? <?php echo (int) $submitted; ?> </p>
        <ul>
            <li><b>username</b>: <?php echo $_POST['username']; ?></li>
            <li><b>password</b>: <?php echo $_POST['password']; ?></li>
        </ul>
    </body>
</html>
