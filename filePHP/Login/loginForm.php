<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../image/icons8-login-rounded-30.png" rel="icon" type="image/png">
    <link rel="icon" type="image/x-icon" href="">
    <title>Sign In - SmartParkingLot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../static/assets/css/icons.css">
    <link rel="stylesheet" href="../../static/assets/css/uikit.css">
    <link rel="stylesheet" href="../../static/assets/css/style.css">
    <link rel="stylesheet" href="../../static/assets/css/tailwind.css">
    <link href='https://css.gg/log-in.css' rel='stylesheet'>
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    </script>
    <script>
    $(function() {
        $("#includedContent").load("../index.php");
    });
    </script>
</head>

<body class="bg-gray-100" style="background-color:#f2f2f2!important;">
    <div id="wrapper" class="flex flex-col justify-between h-screen">
        <!-- header-->
        <div class="bg-white py-4 shadow dark:bg-gray-800">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center lg:justify-between justify-around">
                    <a href="loginForm.php">
                        <b>
                            <h1 style="font-size: 1.5rem;">Smart Parking Lot</h1>
                        </b>
                    </a>
                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                        <a href="registerForm.php"
                            class="bg-pink-500 pink-500 px-6 py-3 rounded-md shadow text-white">Đăng
                            ký</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-6">Đăng nhập</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                    <script>
                    </script>
                </div>
                <form action="xulyLogin.php" method="POST">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        };
                    };
                    ?>
                    <input type="text" name="Username" placeholder="Username"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important; " required>
                    <input type="password" name="Password" placeholder="Password"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;" required>
                    <button type="submit"
                        class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full"
                        name="submit" value="login now">
                        Đăng nhập
                    </button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Bạn chưa đăng ký? <a href="registerForm.php" class=""> Tạo tài khoản mới
                            </a></p>
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
    <!-- Scripts
================================================== -->
    <script src="../../static/assets/js/tippy.all.min.js"></script>
    <script src="../../static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../static/assets/js/uikit.js"></script>
    <script src="../../static/assets/js/simplebar.js"></script>
    <script src="../../static/assets/js/custom.js"></script>
</body>

</html>