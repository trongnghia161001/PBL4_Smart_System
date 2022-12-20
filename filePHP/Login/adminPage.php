<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:loginForm.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="IE=edge">
    <link href="/PBL4/static/images/fav.png" rel="icon" type="image/png">
    <title>Smart Parking Lot</title>
    <link rel="icon" href="/PBL4/static/images/resources/home.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/PBL4/static/assets/css/icons.css">
    <link rel="stylesheet" href="/PBL4//static/assets/css/uikit.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/style.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/tailwind.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<!-- <body>
    <div class="container">
        <img src="/PBL4/image/Optimized-header_1 (1).png" alt="Paris" class="header">
        <iframe src="/PBL4/filePHP/animation.php" name="target_form" style="border:0;"></iframe>
        <aside class="left-sidebar">
            <p style="color:#CCF381;" onclick="myFunction()" id="nameadmin">ADMIN: <?php echo $_SESSION['admin_name'] ?>
            </p>
            <a href="/PBL4/filePHP/fileLeftSideBarGeneral/mainForm.php" target="target_form">Trang chủ</a>
            <a href="/PBL4/filePHP/fileLeftSideBarGeneral/thongTinNhanVien.php" target="target_form">Thông Tin
                Nhân Viên<nav></nav></a>
            <a href="/PBL4/filePHP/fileLeftSideBarGeneral/thongTinPhongBan.php" target="target_form">Thông Tin
                Phòng Ban</a>
            <a href="/PBL4/filePHP/Read/timkiemNhanVien.php" target="target_form">Tìm Kiếm Nhân Viên</a>
            <a href="/PBL4/filePHP/Read/timkiemPhongBan.php" target="target_form">Tìm Kiếm Phòng Ban</a>
            <a href="/PBL4/filePHP/Create/themNhanVien.php" target="target_form">Thêm Nhân Viên</a>
            <a href="/PBL4/filePHP/Create/themPhongBan.php" target="target_form">Thêm Phòng Ban</a>
            <a href="/PBL4/filePHP/Update/capnhatNhanVien.php" target="target_form">Cập Nhật Thông Tin Nhân
                Viên</a>
            <a href="/PBL4/filePHP/Update/capnhatPhongBan.php" target="target_form">Cập Nhật Thông Tin Phòng
                Ban</a>
            <a href="/PBL4/filePHP/Delete/xoaNhanVien.php" target="target_form">Xoá Thông Tin</a>
            <a href="/PBL4/filePHP/Delete/xoatatcaNhanVien.php" target="target_form">Xoá Tất Cả</a>
            <a href="/PBL4/filePHP/index.php" target="_top">Đăng Xuất</a>
        </aside>
        <img src="/PBL4/image/footer.png" alt="Paris" class="footer">
    </div>


</body>
 -->

<body style="background-color: #f2f2f2!important;">

    <header>
        <div class="header_inner">
            <div class="left-side">
                <!-- Logo -->

                <!-- <div class="header_search"> -->
                <a href="/PBL4/filePHP/Login/adminPage.php" style="display:flex;">
                    <i class='fas fa-parking' style='font-size:70px; color: #ff8177;'></i>
                    <p style="line-height:70px; white-space: nowrap; width: 300px">𝓢𝓶𝓪𝓻𝓽 𝓟𝓪𝓻𝓴𝓲𝓷𝓰
                        𝓛𝓸𝓽</p>
                </a>
                <!-- </div> -->
            </div>
            <div class="right-side lg:pr-4">
                <!-- upload -->
                <!-- upload dropdown box -->

                <i style='font-size:40px; cursor:pointer;' class='fas'>&#xf505;</i>
                <div uk-drop="mode: click;offset:9" class="header_dropdown profile_dropdown border-t">
                    <ul>
                        <p style="color:black; font-size:15px; padding-bottom: 20px; " onclick="myFunction()"
                            id="nameadmin">
                            ADMIN:
                            <?php echo $_SESSION['admin_name'] ?>
                            <li><a href="/PBL4/filePHP/admin/quanlyadmin/capnhatAdmin.php" target="target_form">
                                    Quản Lý Tài Khoản Admin </a> </li>
                            <li><a href="/PBL4/filePHP/admin/quanlyadmin/changePassForm.php" target="target_form">
                                    Đổi Mật Khẩu</a> </li>
                            <li><a href="loginForm.php"> Log Out</a></li>
                    </ul>
                </div>
                </ div>
            </div>
    </header>
    <div>
        <iframe style="width: 100%; height:100%" src="../homeAnimation.php" name="target_form"
            style="border:0;"></iframe>
        <!-- <aside>
            <a style="width: 100%; height:100%" href="./quanlygiaxe.html" target="target_form"></a>
            <a style="width: 100%; height:100%" href="./dangkyguixe.html" target="target_form"></a>
        </aside> -->
    </div>
    </script>
    <script src="/PBL4/static/assets/js/tippy.all.min.js"></script>
    <script src="/PBL4/static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/PBL4/static/assets/js/uikit.js"></script>
    <script src="/PBL4/static/assets/js/simplebar.js"></script>
    <script src="/PBL4/static/assets/js/custom.js"></script>
    <script src="/../../unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>
</body>

</html>