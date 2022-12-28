<?php
$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($conn, "utf8");


if (isset($_POST['submit'])) {
    $id = $_REQUEST['ID_Customer'];
    $company = $_REQUEST['Company'];
    $cartype = $_REQUEST['Car_type'];
    $color = $_REQUEST['Color'];
    $licenseplate = $_REQUEST['License_plate'];
    $insert = "INSERT INTO car (ID_customer, Company, Car_type, Color, License_plate)
                        VALUES($id, '$company', '$cartype', '$color', '$licenseplate')";

    mysqli_query($conn, $insert);

    header('location:../../../homeAnimation.php');
}
?>
<html>

</html>