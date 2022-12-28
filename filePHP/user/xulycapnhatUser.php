<?php

$tennv = $_REQUEST['txtName'];
$gioitinh = $_REQUEST['txtGioitinh'];
$email = $_REQUEST['txtEmail'];
$birthday = $_REQUEST['txtBirthday'];
$phone = $_REQUEST['txtPhone'];
$cmnd = $_REQUEST['txtCMND'];
$money = $_REQUEST['txtMoney'];
$diachi = $_REQUEST['txtDiaChi'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

session_start();
$username = $_SESSION['user_name'];
$rs1 = mysqli_query($link, "SELECT * FROM customer WHERE Username = '$username'");

$row1 = mysqli_fetch_array($rs1, MYSQLI_BOTH);
$idcustomer = $row1['ID_Customer'];

$rs = mysqli_query($link, "UPDATE customer Set 
Name = '$tennv',
Sex = '$gioitinh',
Gmail = '$email',
Birthday = '$birthday',
Phone = '$phone',
CMND = '$cmnd',
Money = '$money',
Address = '$diachi'
WHERE ID_Customer = '$idcustomer'");

header("Location:../../filePHP/user/thongtinuser/thongtinuser.php");

?>

<html>

</html>