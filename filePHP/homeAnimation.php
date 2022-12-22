<?php


@include 'config.php';

session_start();
$myusername = $_SESSION['user_name'];
// $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);

// $db_selected = mysqli_select_db($link, 'smartparkingcar');
$rs = mysqli_query($link, "SELECT * FROM customer WHERE Username = '$myusername'");
$row = mysqli_fetch_array($rs, MYSQLI_BOTH);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/PBL4/static/assets/css/homeAnimation.css">
</head>

<body>
    <div class="night" style="margin-left: 20px;">
        <div class="surface">
        </div>
        <div class="car">
            <img src="/PBL4/static/images/resources/Img_06.png" alt="">
        </div>
    </div>
    <div class="right_side">
        <?php if (isset($_SESSION['admin_name'])) {
            echo '<div class="textAlign">
                    <a href="/PBL4/filePHP/user/capnhat_xoaUser.php">Quản lý tài khoản / khách hàng</a>
                </div>
                <div class="textAlign">
                    <a href="/PBL4/filePHP/admin/nhandien/nhandienbienso.php">Nhận diện biển số</a>
                </div>
                <div class="textAlign">
                    <a href="/PBL4/filePHP/admin/giaxe/capnhatgiaxe.php">Quản lý giá xe</a>
                </div>
                <div class="textAlign">
                    <a href="">Báo cáo thống kê</a>
                </div>';
        } else {
            if (!isset($row['ID_Customer'])) {
                echo '
                <div class="textAlign">
                    <a href="/PBL4/filePHP/user/dashboard/dangkyguixe/dangkyguixe.php">Đăng ký gửi xe</a>
                </div>';
            }

            echo '
                <div class="textAlign">
                    <a href="/PBL4/filePHP/user/dashboard/xemchotrong/xemchotrong.php">Xem Chỗ Trống</a>
                </div>';
        } ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/PBL4/static/assets/js/Magic.js"></script>
</body>

</html>