<?php

if (isset($_POST['doimatkhau'])) {
    $username = $_POST['admin_name'];
    $op = md5($_POST['op']);
    $np = md5($_POST['np']);
    $cnp = md5($_POST['cnp']);
    // $sql = "SELECT * FROM tb1 admin WHERE username='"  "' AND password=" $matkhau cu. "' LIMIT 1";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PBL4/static/assets/images/favicon.png" rel="icon" type="image/png">
    <title>Sign Up - SmartParkingLot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/PBL4/static/assets/css/icons.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/uikit.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/style.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/tailwind.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-gray-100" style="background-color:#f2f2f2!important;">
    <div id="wrapper" class="flex flex-col justify-between h-screen">
        <!-- header-->
        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold mb-6"> Đổi mật khẩu</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                </div>
                <form action="xulydoimatkhau.php" method="POST">
                    <?php echo $_SESSION['admin_name']; ?>
                    <?php if (isset($_GET['error'])) { ?>
                    <p> <?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                    <p> <?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <input type="password" name="op" placeholder="old password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="np" placeholder="new password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="cnp" placeholder="confirm new password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <button type="submit" name="doimatkhau" value=""
                        class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full"
                        style="margin:0px">
                        Update Password
                    </button>
                    <div class="text-center mt-5 space-x-2">
                        <a href="#" class="text-base" target="target_form"> Bạn quên mật khẩu rồi? </a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Footer -->

        <div class="lg:mb-5 py-3 uk-link-reset">
            <div
                class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                <div class="flex space-x-2 text-gray-700 uppercase">
                    <a href="#"> About</a>
                    <a href="#"> Help</a>
                    <a href="#"> Terms</a>
                    <a href="#"> Privacy</a>
                </div>
                <p class="capitalize"> © copyright 2020 by taed13_</p>
            </div>
        </div>

    </div>

    <!--<script>

    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' dark';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>-->

    <!-- Scripts
================================================== -->
    <script src="/PBL4/static/assets/js/tippy.all.min.js"></script>
    <script src="/PBL4/static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/PBL4/static/assets/js/uikit.js"></script>
    <script src="/PBL4/static/assets/js/simplebar.js"></script>
    <script src="/PBL4/static/assets/js/custom.js"></script>


</body>

</html>