<?php
//logout.php
session_start();
session_destroy();

echo "You have been logged out. Click <a href='../login.html'>here</a> to log in.";

?>