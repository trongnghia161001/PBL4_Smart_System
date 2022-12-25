<?php


$location = $_REQUEST['location'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


if (isset($_REQUEST['submit'])) {
    $insert = "SELECT * FROM parking WHERE Location = '$location'";

    $rs = mysqli_query($link, $insert);
    $row = mysqli_fetch_array($rs);
    $Location = $row['Location'];
    $Amount = $row['Amount'];
    include_once 'xemchotrong.php';
}
?>

<html>


</html>