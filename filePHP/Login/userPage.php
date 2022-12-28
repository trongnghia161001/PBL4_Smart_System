<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:loginForm.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="IE=edge">
    <link href="../../image/icons8-sign-up-30.png" rel="icon" type="image/png">
    <title>Smart Parking Lot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../static/assets/css/icons.css">
    <link rel="stylesheet" href="../../static/assets/css/uikit.css">
    <link rel="stylesheet" href="../../static/assets/css/style.css">
    <link rel="stylesheet" href="../../static/assets/css/tailwind.css">
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body style="background-color: #f2f2f2!important;">

    <header>
        <div class="header_inner">
            <div class="left-side">
                <a href="userPage.php" style="display:flex;">
                    <i class='fas fa-parking' style='font-size:70px; color: #ff8177;'></i>
                    <p style="line-height:70px; white-space: nowrap; width: 300px; margin-left: 10px">𝓢𝓶𝓪𝓻𝓽
                        𝓟𝓪𝓻𝓴𝓲𝓷𝓰
                        𝓛𝓸𝓽</p>
                </a>

            </div>
            <div class="right-side lg:pr-4">
                <i style="font-size:40px; cursor:pointer;" class="fa">&#xf007;</i>
                <div uk-drop="mode: click;offset:9" class="header_dropdown profile_dropdown border-t">
                    <ul>
                        <p style="color:black; font-size:15px; padding-bottom: 20px; " onclick="myFunction()"
                            id="nameadmin">
                            USER:
                            <?php echo $_SESSION['user_name'] ?>
                            <li><a href="../user/thongtinuser/formthongtinuser.php" target="target_form">Thông tin khách
                                    hàng</a>
                            </li>
                            <li><a href="../user/quanlyuser/changePassForm.php" target="target_form">Đổi Mật
                                    Khẩu</a></li>
                            <li><a href="xulyLogout.php"> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div>
        <iframe style="width: 100%; height:100%" src="../homeAnimation.php" name="target_form" name="target_form"
            style="border:0;"></iframe>
    </div>
    </script>
    <script src="../../static/assets/js/tippy.all.min.js"></script>
    <script src="../../static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../static/assets/js/uikit.js"></script>
    <script src="../../static/assets/js/simplebar.js"></script>
    <script src="../../static/assets/js/custom.js"></script>
    <script src="../../unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>
</body>

</html>