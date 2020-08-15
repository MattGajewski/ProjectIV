<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
{
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',
    'root',
    ''
);


$authenticated = FALSE;
$rows = $db->query('SELECT * FROM authorizedUsers ORDER BY id');
foreach ($rows as $row){
    if ($username == $row[1] && $password == $row[2]){
        $authenticated = TRUE;
    }
}
}


if($authenticated == TRUE){
    $_SESSION['username']=$username;
    echo "<p>Woo, you logged in!</p>";
    echo "<p>Click <a href=\"member.php\">here</a> to be taken a members page!</p>";
}  else {
    echo "<p>Please enter a username and password</p>";
}

echo "<p>Username and PW:$username $password";
?>