<?php
$ID_Bill = $_REQUEST['ID_Bill'];


$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "Update bill set Status=1 where ID_bill='$ID_Bill'");

header("Location:../../admin/nhandien/bill.php");
?>

<html>

</html>