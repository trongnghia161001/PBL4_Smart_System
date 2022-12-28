<?php
include 'thanhtoanchiphi.php';
$moneyUser = $row1['Money'] - $sum;

mysqli_query($link, "UPDATE customer Set
Money = '$moneyUser'
WHERE ID_Customer = '$idcustomer'");

mysqli_query($link, "UPDATE bill Set
Status = 0
WHERE ID_bill = '$idbill'");

mysqli_query($link, "UPDATE `check` Set Status = 0 WHERE ID_check = '$idcheck'");

mysqli_query($link, "UPDATE bill Set TG_parking = '$tgparking', sum = '$money' WHERE ID_check = '$idcheck'");


header("Location:/PB4/filePHP/Login/userPage.php");
?>

<html>

</html>