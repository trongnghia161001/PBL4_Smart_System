<?php
ob_start();
@include 'config.php';

session_start();

$_SESSION = array();
header('location:loginForm.php');
?>

<html>

</html>