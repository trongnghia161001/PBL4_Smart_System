<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_REQUEST['Username'];
    $name = $_REQUEST['Name'];
    $sex = $_REQUEST['Sex'];
    $gmail = $_REQUEST['Gmail'];
    $birthday = $_REQUEST['Birthday'];
    $phone = $_REQUEST['Phone'];
    $cmnd = $_REQUEST['CMND'];
    $address = $_REQUEST['Address'];
    // $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
    // $db_selected = mysqli_select_db($link, 'DULIEU');
    $insert = "INSERT INTO customer (Name, Sex, Gmail, Birthday, Phone, CMND, Address, Username, Status)
                        VALUES('$name', '$sex', '$gmail', '$birthday', '$phone','$cmnd', '$address', '$username', 1)";
    mysqli_query($conn, $insert);
    header('location:dangkycar.php');
}
?>
<html>

</html>