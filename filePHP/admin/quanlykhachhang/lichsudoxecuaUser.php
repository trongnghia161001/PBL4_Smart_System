<?php

session_start();
$username = $_SESSION['user_name'];

$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


$rs1 = mysqli_query($link, "SELECT ID_Customer FROM customer where Username = '$username'"); //Giai phong tap cac ban ghi trong Srs



echo '
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<div class="navbar">
        <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
        <h2 style="margin: auto;">Lịch sử đỗ</h2>
    </div>';
echo '<Form action="">';
echo '<table border="1" width="100%" class="table table-striped">';

echo    '<TR>
            <TH>Biển số</TH>
            <TH>Thời gian vào</TH>
            <TH>Thời gian ra</TH>
            <TH>Trạng thái</TH>
        </TR>';
while ($row3 = mysqli_fetch_array($rs3, MYSQLI_BOTH)) {
    echo
    '<TR>
    <TD>' . $row3['License_plate'] . '</TD>
    <TD>' . $row3['TimeIn'] . '</TD>
    <TD>' . $row3['TimeOut'] . '</TD>
    <TD>' . $row3['Status'] . '</TD>
    </TR>';
}
echo '</TABLE>';
echo '</form>';
mysqli_free_result($rs3);
mysqli_close($link);
?>

<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</html>