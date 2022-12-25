<?php
if (session_id() == '') session_start();

if (isset($_SESSION['user_name']) == false) {
    header("location:/PBL4/filePHP/Login/loginForm.php");
    exit();
}
$User = $_SESSION['user_name'];
$loi1 = "";
if (isset($_POST['doimatkhau1']) == true) {
    $op1 = ($_POST['op1']);
    $np1 = ($_POST['np1']);
    $cnp1 = ($_POST['cnp1']);
    $conn1 = new PDO("mysql:host=sql6.freesqldatabase.com;dbname=sql6586096;charset=utf8", "sql6586096", "KuFkaR6aj9");
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM account WHERE Username = ? AND Password = ?";
    $stmt1 = $conn1->prepare($sql);
    $stmt1->execute([$User, $op1]);
    if ($stmt1->rowCount() == 0) {
        $loi1 .= "Mật khẩu cũ sai rồi<br>";
    }
    if ($np1 != $cnp1) {
        $loi1 .= "Mật khẩu nhập lại sai<br>";
    }
    if ($loi1 == "") {
        $sql = "UPDATE account SET Password = ? WHERE Username = ?";
        $stmt1 = $conn1->prepare($sql);
        $stmt1->execute([$np1, $User]);
        header('location:/PBL4/filePHP/homeAnimation.php');
    }
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
                <h1 class="lg:text-3xl text-xl font-semibold mb-6" style="text-align:center;"> Đổi mật khẩu</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                </div>
                <form method="POST">

                    <!-- <?php echo $_SESSION['user_name']; ?>
                    // <?php if (isset($_GET['error'])) { ?>
                    // <p> <?php echo $_GET['error']; ?></p>
                    // <?php } ?>

                    // <?php if (isset($_GET['success'])) { ?>
                    // <p> <?php echo $_GET['success']; ?></p>
                    // <?php } ?> -->

                    <input type="password" name="op1" placeholder="old password"
                        value="<?php if (isset($op1) == true) echo $op; ?>"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="np1" placeholder="new password"
                        value="<?php if (isset($np1) == true) echo $np; ?>"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <input type="password" name="cnp1" placeholder="confirm new password"
                        value="<?php if (isset($cnp1) == true) echo $cnp; ?>"
                        class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    <?php if ($loi1 != "") { ?>
                    <div class="alert-secondary"><?php echo $loi1 ?></div>

                    <?php } ?>
                    <button type="submit" name="doimatkhau1" value=""
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

    <!-- Scripts
================================================== -->
    <script src="/PBL4/static/assets/js/tippy.all.min.js"></script>
    <script src="/PBL4/static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/PBL4/static/assets/js/uikit.js"></script>
    <script src="/PBL4/static/assets/js/simplebar.js"></script>
    <script src="/PBL4/static/assets/js/custom.js"></script>


</body>

</html>