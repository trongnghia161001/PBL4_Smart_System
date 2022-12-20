<?php

$myID = $_REQUEST['txtIDCustomer'];
$tennv = $_REQUEST['txtName'];
$gioitinh = $_REQUEST['txtGioitinh'];
$email = $_REQUEST['txtEmail'];
$birthday = $_REQUEST['txtBirthday'];
$phone = $_REQUEST['txtPhone'];
$cmnd = $_REQUEST['txtCMND'];
$diachi = $_REQUEST['txtDiaChi'];
// $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);
// $db_selected = mysqli_select_db($link, 'smartparkingcar');
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