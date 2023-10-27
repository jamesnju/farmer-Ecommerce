<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('loggedout successfully')</script>";
    echo '<script>window.open("../home.php","_self")</script>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    
</body>
</html>