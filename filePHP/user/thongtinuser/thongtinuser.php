<?php
$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($conn, "utf8");


session_start();
$username = $_SESSION['user_name'];
$rs1 = mysqli_query($conn, "SELECT * FROM customer WHERE Username = '$username'");

$row1 = mysqli_fetch_array($rs1, MYSQLI_BOTH);
$idcustomer = $row1['ID_Customer'];
// $row2 = mysqli_fetch_array($rs2, MYSQLI_BOTH);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/PBL4/fileCSS/styleFlexBox.css">
    <style>
    :root {
        --color-white: #f3f3f3;
        --color-darkblue: #1b1b32;
        --color-darkblue-alpha: rgba(27, 27, 50, 0.8);
        --color-green: #37af65;
        --color-bluelight: rgb(173, 216, 230);
    }

    /* .container {
            border: 3px solid black;
            width: 100%;
            height: 800px;
        } */

    .container {
        border: 3px solid black;
        width: 100%;
        margin: 3.125rem auto 0 auto;
    }


    .outer-container {
        display: flex;
        flex-direction: row;
    }

    /* .container2 {
            border: 3px solid black;
            width: 100%;
            height: 800px;
        } */
    .container2 {
        border: 3px solid black;
        width: 100%;
        margin: 3.125rem auto 0 auto;
    }

    h1 {
        text-align: center;
    }

    label {
        display: flex;
        align-items: center;
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    .form-control {
        display: block;
        width: 100%;
        height: 2.375rem;
        padding: 0.375rem 0.75rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    form {
        background: var(--color-darkblue-alpha);
        padding: 2.5rem 0.625rem;
        border-radius: 0.25rem;
    }

    label {
        display: flex;
        align-items: center;
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    * {
        box-sizing: border-box;
    }

    user agent stylesheet label {
        cursor: default;
    }

    body {
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.4;
        color: var(--color-white);
        margin: 0;
    }

    input,
    button,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .submit-button {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background: var(--color-green);
        color: inherit;
        border-radius: 2px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <form class="container" action="/PBL4/filePHP/user/xulycapnhatUser.php" method="POST">
        <h1>Thông tin khách hàng</h1>
        <div class="form-group">
            <label id="name-label" for="name">Tên Khách Hàng</label>
            <input type="text" name="txtName" id="name" class="form-control" placeholder="Enter your name" required
                value="<?php echo $row1['Name'] ?>">
        </div>
        <div class="form-group">
            <p>Giới Tính</p>
            <div style="display: flex;">
                <?php if ($row1['Sex'] == 'Nam') { ?>
                <input type="radio" name="txtGioitinh" value="Nam" checked>
                <label for="html" style="margin-left: 7px;">Nam</label><br>
                <input type="radio" name="txtGioitinh" value="Nữ">
                <label for="html" style="margin-left: 7px;">Nữ</label><br>
                <?php } else { ?>
                <input type="radio" name="txtGioitinh" value="Nam">
                <label for="html" style="margin-left: 7px;">Nam</label><br>
                <input type="radio" name="txtGioitinh" value="Nữ" checked>
                <label for="html" style="margin-left: 7px;">Nữ</label><br>
                <?php } ?>
            </div>
            </select>
        </div>
        <div class="form-group">
            <label id="name-label" for="gmail">Email</label>
            <input type="text" name="txtEmail" id="gmail" class="form-control" placeholder="Enter your email" required
                value="<?php echo $row1['Gmail'] ?>">
        </div>
        <div class="form-group">
            <label id="name-label" for="birthday">Birthday</label>
            <input type="date" name="txtBirthday" id="birthday" class="form-control" placeholder="Enter your birthday"
                required value="<?php echo $row1['Birthday'] ?>">
        </div>
        <div class="form-group">
            <label id="name-label" for="phone">Phone</label>
            <input type="text" name="txtPhone" id="phone" class="form-control" placeholder="Enter your phone number"
                required value="<?php echo $row1['Phone'] ?>">
        </div>
        <div class="form-group">
            <label id="name-label" for="cmnd">CMND</label>
            <input type="text" name="txtCMND" id="cmnd" class="form-control" placeholder="Enter your CMND" required
                value="<?php echo $row1['CMND'] ?>">
        </div>
        <div class="form-group">
            <label id="name-label" for="diachi">Địa chỉ</label>
            <input type="text" name="txtDiaChi" id="diachi" class="form-control" placeholder="Enter your address"
                required value="<?php echo $row1['Address'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">Cập nhật</button>
        </div>
        <div class="form-group">
            <button type="reset" id="reset" class="submit-button">Reset</button>
        </div>
    </form>



</body>

</html>