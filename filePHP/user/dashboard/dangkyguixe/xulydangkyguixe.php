<?php
$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($conn, "utf8");


if (isset($_POST['submit'])) {
    $username = $_REQUEST['Username'];
    $name = $_REQUEST['Name'];
    $sex = $_REQUEST['Sex'];
    $gmail = $_REQUEST['Gmail'];
    $birthday = $_REQUEST['Birthday'];
    $phone = $_REQUEST['Phone'];
    $cmnd = $_REQUEST['CMND'];
    $money = $_REQUEST['Money'];
    $address = $_REQUEST['Address'];
    $insert = "INSERT INTO customer (Name, Sex, Gmail, Birthday, Phone, CMND, Address, Money, Username, Status)
                        VALUES('$name', '$sex', '$gmail', '$birthday', '$phone','$cmnd', '$address', '$money', '$username', 1)";
    mysqli_query($conn, $insert);
    header('location:dangkycar.php');
}
?>
<html>

</html>