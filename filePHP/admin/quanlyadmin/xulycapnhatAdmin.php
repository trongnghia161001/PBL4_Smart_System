<?php

$myID = $_REQUEST['txtIDAdmin'];
$tennv = $_REQUEST['txtName'];
$email = $_REQUEST['txtEmail'];
$birthday = $_REQUEST['txtBirthday'];
$gioitinh = $_REQUEST['txtGioitinh'];
$phone = $_REQUEST['txtPhone'];
$cmnd = $_REQUEST['txtCMND'];
$diachi = $_REQUEST['txtDiaChi'];
$use = $_REQUEST['txtUse'];

$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "UPDATE admin Set
Name = '$tennv',
Email = '$email',
Birthday = '$birthday',     
Sex = '$gioitinh',
Phone = '$phone',
CMND = '$cmnd',
Address = '$diachi',
Username = '$use'
WHERE ID_admin = '$myID'");

header("Location:capnhatAdmin.php");

?>

<html>

</html>