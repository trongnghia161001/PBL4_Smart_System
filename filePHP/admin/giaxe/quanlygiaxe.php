<?php
$myID = $_REQUEST['ID_tickets_price'];
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "SELECT * FROM ticketsprice WHERE ID_tickets_price = '$myID'");
$row = mysqli_fetch_array($rs, MYSQLI_BOTH);
@include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../static/assets/images/favicon.png" rel="icon" type="image/png">
    <title><?php echo $_SESSION['admin_name'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../static/assets/css/icons.css">
    <link rel="stylesheet" href="../../../static/assets/css/uikit.css">
    <link rel="stylesheet" href="../../../static/assets/css/style.css">
    <link rel="stylesheet" href="../../../static/assets/css/tailwind.css">
    <link href='https://css.gg/log-in.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../static/assets/css/detail.css">
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $("#includedContent").load("../../filePHP/userPage.php");
    });
    </script>
</head>

<div class="navbar">
    <i class="fa-solid fa-arrow-left" onclick="history.back()" style="color: #be185d"></i>
</div>

<body class="bg-gray-100" style="background-color:#f2f2f2!important;">
    <div id="wrapper" class="flex flex-col justify-between h-screen">
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-6">Cập nhật Giá xe</h1>
                <div>
                    <style>
                    h5 {
                        color: red;
                    }
                    </style>
                    <script>
                    </script>
                </div>
                <form action="xulyCapNhatGiaXe.php?ID_tickets_price=<?php echo $row['ID_tickets_price']; ?>"
                    method="POST">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        };
                    };
                    ?>
                    <table width='100%' boder="0">
                        <tr>
                            <td>Mã Vé</td>
                            <td><input type="text" name="txtIDTicket" placeholder="ID Ticket"
                                    style="border: 1px solid #d3d5d8 !important; " required readonly
                                    value="<?php echo $row['ID_tickets_price']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Thời Gian Cho Phép Đỗ</td>
                            <td><input type="text" name="txtTime" placeholder="Time Allow Parking" class=""
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Time']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Thời Gian Bắt Đầu</td>
                            <td><input type="text" size="20" name="txtTGBD" placeholder="Time Start"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['TG_BD']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Thời Gian Kết Thúc</td>
                            <td><input type="text" size="20" name="txtTGKT"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['TG_KT']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Kiểu Vé</td>
                            <td><input type="text" size="20" name="txtTypeTicket"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Ticket_type']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Giá Vé</td>
                            <td><input type="text" size="20" name="txtPriceTicket"
                                    style="border: 1px solid #d3d5d8 !important;" required
                                    value="<?php echo $row['Tickets_price']; ?>">
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <input type="submit" value="OK" name="submit" class="form-btn">
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
    <script src="../../../static/assets/js/tippy.all.min.js"></script>
    <script src="../../../static/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../../static/assets/js/uikit.js"></script>
    <script src="../../../static/assets/js/simplebar.js"></script>
    <script src="../../../static/assets/js/custom.js"></script>
</body>


</html>