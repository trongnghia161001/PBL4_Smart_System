<?php
$id = $_REQUEST['ID_Customer'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$sql = "UPDATE customer SET Status=0 WHERE ID_Customer = '$id'";
$rs = mysqli_query($link, $sql);
mysqli_free_result($rs);
mysqli_close($link);
header("Location:capnhat_xoaUser.php");
?>

<html>

</html>