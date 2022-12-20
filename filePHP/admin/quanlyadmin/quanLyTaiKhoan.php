<?php


$myID = $_REQUEST['ID_admin'];
// $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);

// $db_selected = mysqli_select_db($link, 'smartparkingcar');
$rs = mysqli_query($link, "SELECT * FROM admin WHERE ID_admin = '$myID'");
$row = mysqli_fetch_array($rs, MYSQLI_BOTH);
@include 'config.php';

session_start();

// if (!isset($_SESSION['user_name'])) {
//     header('location:loginForm.php');
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PBL4/static/assets/images/favicon.png" rel="icon" type="image/png">
    <title><?php echo $_SESSION['admin_name'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/PBL4/static/assets/css/icons.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/uikit.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/style.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/tailwind.css">
    <link href='https://css.gg/log-in.css' rel='stylesheet'>
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $("#includedContent").load("/PBL4/filePHP/userPage.php");
    });
    </script>
</head>

<div class="navbar">
    <i class="fa-solid fa-arrow-left" onclick="history.back()" style="color: #be185d"></i>
</div>

<body class="bg-gray-100" style="background-color:#f2f2f2!important;">

    <div id="wrapper" class="flex flex-col justify-between h-screen">
        <!-- header-->
        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-6">Cập nhật Admin</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                    <script>
                    </script>
                </div>
                <form action="xulycapnhatAdmin.php?ID_admin=<?php echo $row['ID_admin']; ?>" method="POST">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        };
                    };
                    ?>
                    <table width='100%' boder="0">
                        <tr>
                            <td>Mã Admin</td>
                            <td><input type="text" name="txtIDAdmin" placeholder="Username"
                                    style="border: 1px solid #d3d5d8 !important; " required readonly
                                    value="<?php echo $row['ID_admin']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tên Admin</td>
                            <td><input type="text" name="txtName" placeholder="Password" class=""
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" size="20" name="txtEmail"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày Sinh</td>
                            <td><input type="date" size="20" name="txtBirthday"
                                    style="border: 1px solid #d3d5d8 !important;text-align: 20px;" required
                                    value="<?php echo $row['Birthday']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Giới Tính</td>
                            <td>
                                <select name="txtGioitinh" style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Sex']; ?>">

                                    <option value="Nu" style="text-align: 20px;">Nu</option>
                                    <option value="Nam" style="text-align: 20px;">Nam</option>
                                    <option value="Khac" style="text-align: 20px;">Khac</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" size="20" name="txtPhone"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Phone']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>CMND</td>
                            <td><input type="text" size="20" name="txtCMND"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['CMND']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" size="20" name="txtDiaChi"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Address']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" size="20" name="txtUse" style="border: 1px solid #d3d5d8 !important;"
                                    required value="<?php echo $row['Username']; ?>">
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <input type="submit" value="OK" class="form-btn">
                                <br><br>
                                <input type="Reset" value="Reset" class="form-btn">
                            </td>
                        </tr>
                    </table>
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