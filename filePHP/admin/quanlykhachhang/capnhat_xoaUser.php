<?php
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "SELECT * FROM customer WHERE Status = 1");
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
        <h2 style="margin: auto;">Quản Lý Tài Khoản Khách Hàng</h2>
    </div>';
echo '<Form action="">';
echo '<table border="1" width="100%" class="table table-striped">';

echo    '<TR>
            <TH>HỌ TÊN</TH>
            <TH>GIỚI TÍNH</TH>
            <TH>EMAIL</TH>
            <TH>NGÀY SINH</TH>
            <TH>PHONE</TH>
            <TH>CMND</TH>
            <TH>ĐỊA CHỈ</TH>
            <TH>THÔNG TIN XE</TH>
            <TH>XOÁ</TH>
        </TR>';
while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
    echo
    '<TR>
    <TD>' . $row['Name'] . '</TD>
    <TD>' . $row['Sex'] . '</TD>
    <TD>' . $row['Gmail'] . '</TD>
    <TD>' . $row['Birthday'] . '</TD>
    <TD>' . $row['Phone'] . '</TD>
    <TD>' . $row['CMND'] . '</TD>
    <TD>' . $row['Address'] . '</TD>
    <TD><a HREF="/PBL4/filePHP/admin/quanlykhachhang/lienketcar.php?ID_Customer=' . $row['ID_Customer'] . '" target="target_form"><i style="font-size:24px; color: black;" class="fa">&#xf044;</i></a></TD>
    <TD><a HREF="/PBL4/filePHP/admin/quanlykhachhang/xulyxoaUser.php?ID_Customer=' . $row['ID_Customer'] . '"><i class="material-icons" style="font-size:24px; color: black;">&#xe872;</i></a></TD>
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