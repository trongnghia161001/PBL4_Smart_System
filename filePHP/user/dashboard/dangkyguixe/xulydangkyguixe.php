<?php
$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);


if (isset($_POST['submit'])) {
    $username = $_REQUEST['Username'];
    $name = $_REQUEST['Name'];
    $sex = $_REQUEST['Sex'];
    $gmail = $_REQUEST['Gmail'];
    $birthday = $_REQUEST['Birthday'];
    $phone = $_REQUEST['Phone'];
    $cmnd = $_REQUEST['CMND'];
    $address = $_REQUEST['Address'];
    $insert = "INSERT INTO customer (Name, Sex, Gmail, Birthday, Phone, CMND, Address, Username, Status)
                        VALUES('$name', '$sex', '$gmail', '$birthday', '$phone','$cmnd', '$address', '$username', 1)";
    mysqli_query($conn, $insert);
    header('location:dangkycar.php');
}
?>
<html>

</html>