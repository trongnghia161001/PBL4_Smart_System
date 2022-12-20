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
        <div class="bg-white py-4 shadow dark:bg-gray-800">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center lg:justify-between justify-around">
                    <a href="registerForm.php">
                        <b>
                            <h1 style="font-size: 1.5rem;">Smart Parking Lot</h1>
                        </b>
                    </a>
                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                        <a href="loginForm.php" class="bg-pink-500 pink-500 px-6 py-3 rounded-md shadow text-white">Đăng
                            nhập</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold mb-6"> Đăng ký</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                </div>
                <form action="xulyRegister.php" method="POST">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        };
                    };
                    ?>
                    <input type="text" name="Username" required placeholder="enter your username"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="Password" required placeholder="enter your password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="cpassword" required placeholder="confirm your password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <!-- <select name="Office" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important; padding: 0 20px;">
                        <option value="1" name="Office">user</option>
                        <option value="0" name="Office">admin</option>
                    </select> -->
                    <button type=" submit" name="submit" value="register now"
                        class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full"
                        style="margin:0px">
                        Đăng ký
                    </button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Bạn đã có tài khoản rồi? <a href="loginForm.php"> Đăng nhập </a>
                        </p>
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