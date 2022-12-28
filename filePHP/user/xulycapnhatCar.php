<?php

$company = $_REQUEST['txtCompany'];
$cartype = $_REQUEST['txtCarType'];
$color = $_REQUEST['txtColor'];
$licenseplate = $_REQUEST['txtLicensePlate'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

session_start();
$username = $_SESSION['user_name'];
$rs1 = mysqli_query($link, "SELECT * FROM customer WHERE Username = '$username'");

$row1 = mysqli_fetch_array($rs1, MYSQLI_BOTH);
$idcustomer = $row1['ID_Customer'];

$rs = mysqli_query($link, "UPDATE car Set 
Company = '$company',
Car_type = '$cartype',
Color = '$color',
License_plate = '$licenseplate'
WHERE ID_Customer = '$idcustomer'");

header("Location:../../filePHP/user/thongtinuser/thongtincar.php");

?>

<html>

</html>