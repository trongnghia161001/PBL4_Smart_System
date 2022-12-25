<?php

$myID = $_REQUEST['txtIDCustomer'];
$tennv = $_REQUEST['txtName'];
$gioitinh = $_REQUEST['txtGioitinh'];
$email = $_REQUEST['txtEmail'];
$birthday = $_REQUEST['txtBirthday'];
$phone = $_REQUEST['txtPhone'];
$cmnd = $_REQUEST['txtCMND'];
$diachi = $_REQUEST['txtDiaChi'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "UPDATE customer Set 
Name = '$tennv',
Sex = '$gioitinh',
Gmail = '$email',
Birthday = '$birthday',
Phone = '$phone',
CMND = '$cmnd',
Address = '$diachi'
WHERE ID_Customer = '$myID'");

header("Location:capnhat_xoaUser.php");

?>

<html>

</html>