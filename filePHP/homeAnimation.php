<?php

session_start();
$myusername = $_SESSION['user_name'];

include '/user/dashboard/thanhtoanchiphi/thanhtoanchiphi.php';
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

// $rs1 = mysqli_query($link, "SELECT * FROM customer where Username = '$username'"); //Giai phong tap cac ban ghi trong Srs
// $row1 = mysqli_fetch_array($rs1);
// $idcustomer = $row1['ID_Customer'];

// $rs2 = mysqli_query($link, "SELECT ID_car FROM car where ID_customer = '$idcustomer'"); //Giai phong tap cac ban ghi trong Srs
// $row2 = mysqli_fetch_array($rs2);
// $idcar = $row2['ID_car'];

// $rs3 = mysqli_query($link, "SELECT * FROM `check` WHERE ID_car = '$idcar'"); //Giai phong tap cac ban ghi trong Srs
// $row3 = mysqli_fetch_array($rs3);

$rs = mysqli_query($link, "SELECT * FROM customer WHERE Username = '$myusername'");
$row = mysqli_fetch_array($rs, MYSQLI_BOTH);

// $resultCheck = mysqli_query($link, "SELECT * FROM `check` WHERE ID_car = '$idcar'"); //Giai phong tap cac ban ghi trong Srs
// $rowCheckStatus = mysqli_fetch_array($resultCheck, MYSQLI_BOTH);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../image/icons8-sign-up-30.png" rel="icon" type="image/png">
    <title>Document</title>
    <link rel="stylesheet" href="../static/assets/css/homeAnimation.css">
</head>

<body>
    <div class="night" style="margin-left: 20px;">
        <div class="surface">
        </div>
        <div class="car">
            <img src="../static/images/resources/Img_06.png" alt="">
        </div>
    </div>
    <div class="right_side">
        <?php if (isset($_SESSION['admin_name'])) {
            echo '<div class="textAlign">
                    <a href="admin/quanlykhachhang/capnhat_xoaUser.php">Quản lý tài khoản / khách hàng</a>
                </div>
                <div class="textAlign">
                    <a href="admin/nhandien/nhandienbienso.php">Nhận diện biển số</a>
                </div>
                <div class="textAlign">
                    <a href="admin/giaxe/capnhatgiaxe.php">Quản lý giá xe</a>
                </div>
                <div class="textAlign">
                    <a href="admin/thongke/statistics.php">Báo cáo thống kê</a>
                </div>';
        } else {
            if (!isset($row['ID_Customer'])) {
                echo '
                <div class="textAlign">
                    <a href="user/dashboard/dangkyguixe/dangkyguixe.php">Đăng ký gửi xe</a>
                </div>';
            }
            // if ($rowCheckStatus['Status'] == 1) {
            echo '
                <div class="textAlign">
                    <a href="user/dashboard/thanhtoanchiphi/thanhtoanchiphi.php">Thanh Toán Chi Phí</a>
                </div>';
            echo '
                <div class="textAlign">
                    <a href="user/dashboard/xemthongtingiave/giave.php">Xem Giá Vé</a>
                </div>';
            // }
            echo '
                <div class="textAlign">
                    <a href="user/dashboard/xemchotrong/xemchotrong.php">Xem Chỗ Trống</a>
                </div>';
            echo '
                <div class="textAlign">
                    <a href="user/dashboard/lichsudoxe/lichsudoxe.php">Lịch sử đỗ</a>
                </div>';
        } ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../static/assets/js/Magic.js"></script>
</body>

</html>