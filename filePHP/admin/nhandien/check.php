<?php
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "SELECT DISTINCT License_plate.ch, TimeIn.ch, TimeOut.ch, Name.cus
FROM `check` AS ch, car AS c, customer AS cus 
WHERE (ch.ID_car=c.ID_car) AND (c.ID_Customer=cus.ID_Customer);");

echo '<title>Danh sách user</title>';
echo '
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<div class="navbar">
        <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
        <h2 style="margin: auto;">Check biển số xe</h2>
    </div>';
echo '<Form action="">';
echo '<table border="1" width="100%" class="table table-striped">';

echo    '<TR>
            <TH>BIỂN SỐ VÀO</TH>
            <TH>THỜI GIAN VÀO</TH>
            <TH>THỜI GIAN RA</TH>
            <TH>TÊN KHÁCH HÀNG</TH>
        </TR>';
while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
    echo
    '<TR>
    <TD>' . $row['License_plate.ch'] . '</TD>
    <TD>' . $row['TimeIn.ch'] . '</TD>
    <TD>' . $row['TimeOut.ch'] . '</TD>
    <TD>' . $row['Name.ch'] . '</TD>
     </TR>';
}
echo '</TABLE>';
echo '</form>';
mysqli_free_result($rs);
mysqli_close($link);
?>

<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</html>