<?php
include 'thanhtoanchiphi.php';
$moneyUser = $row1['Money'] - $sum;

mysqli_query($link, "UPDATE customer Set
Money = '$moneyUser'
WHERE ID_Customer = '$idcustomer'");

mysqli_query($link, "UPDATE bill Set
Status = 0
WHERE ID_bill = '$idbill'");



header("Location:/PB4/filePHP/Login/userPage.php");
?>

<html>

</html>