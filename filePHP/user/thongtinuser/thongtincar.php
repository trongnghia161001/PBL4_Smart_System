<?php
$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);
session_start();
$username = $_SESSION['user_name'];
$rs1 = mysqli_query($conn, "SELECT * FROM customer WHERE Username = '$username'");
$rs2 = mysqli_query($conn, "SELECT * FROM car WHERE Username = '$username'");

$row1 = mysqli_fetch_array($rs1, MYSQLI_BOTH);
// $row2 = mysqli_fetch_array($rs2, MYSQLI_BOTH);
echo '
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


            <form class="container2">
                <h1>Thông tin về xe</h1>
                <div class="form-group">
                    <label id="name-label" for="name">Hãng Xe</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Hãng Xe" required value="' .  $row2['Company'] . '">
                </div>
                <div class="form-group">
                    <label id="name-label" for="name">Kiểu Xe</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Kiểu Xe" required value="' .  $row2['Car_type'] . '">
                </div>
                <div class="form-group">
                    <label id="name-label" for="name">Màu</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Màu" required value="' .  $row2['Color'] . '">
                </div>
                <div class="form-group">
                    <label id="name-label" for="name">Biển số</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Biển số" required value="' .  $row2['License_plate'] . '">
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
    ';
mysqli_free_result($rs1);
mysqli_free_result($rs2);
mysqli_close($conn);
?>

<html>

</html>