<?php
$submitted = !empty($_POST);
?>
<!DOCTYPE html>
<html>
    <head><title>Form Handler Page</title></head>
    <body>
        <p>Form submitted? <?php echo (int) $submitted; ?> </p>
        <ul>
            <li><b>firstname</b>: <?php echo $_POST['firstname']; ?></li>
            <li><b>lastname</b>: <?php echo $_POST['lastname']; ?></li>
            <li><b>e-mail</b>: <?php echo $_POST['email']; ?></li>
            <li><b>Faculty or Student</b>: <?php echo $_POST['fac_or_student']; ?></li>
            <li><b>Birthday</b>: <?php echo $_POST['birthday']; ?></li>
            <li><b>Drives?</b>: <?php echo $_POST['drives_car']; ?></li>
            <li><b>About</b>: <?php echo $_POST['txtarea']; ?></li>
        </ul>
    </body>
</html>
