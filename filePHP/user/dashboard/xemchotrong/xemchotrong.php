<?php
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "SELECT * FROM parking ORDER BY Location"); //Giai phong tap cac ban ghi trong Srs

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style type="text/css">
    body {
        background-color: #EEEEEE;
        font-family: "Open Sans";
        font-size: 16px;
        text-align: center;
    }

    .center {
        margin: auto;
        width: 425px;
    }

    .selector {
        font-family: "Open Sans";
        font-size: 18px;
        width: 425px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        text-align: center;
    }

    .heading {
        font-family: "Open Sans";
        font-size: 32px;
        text-align: center;
    }

    a {
        text-decoration: none;
        color: #F00;
    }
    </style>


    <link rel="stylesheet" href="../../../../fileCSS/signupUser.css">
    <link rel="stylesheet" href="../../../../static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    Made a mistake? <a href="#" onclick="location.reload()">Start Again</a>
    </br>
    <p id="sTitle" class="heading">Select a state:</p>
    <div class="center">
        <form action="xulyxemchotrong.php" method="POST">
            <select id="stateSelect" class="selector" name="location">
                <option value="" selected="selected">Select a state</option>
                <?php
                foreach ($rs as $row) {
                    echo '<option value="' . $row["Location"] . '">' . $row["Location"] . '</option>';
                }
                ?>
            </select>
            <input type="submit" id="submit" class="" name="submit">
        </form>
    </div>


    <form class="signup-form" action="" method="post">

        <!-- form header -->
        <div class="form-header">
            <h1>Create Account</h1>
        </div>

        <!-- form body -->
        <div class="form-body">
            <div class="form-group">
                <label for=" location" class="label-title">Địa Điểm</label>
                <input type="text" id="location" class="form-input" required="required" name="" readonly
                    value="<?php echo $Location ?>" placeholder="none">
            </div>
            <div class="form-group">
                <label for="amount" class="label-title">Số Lượng</label>
                <input type="int" id="amount" class="form-input" required="required" name="" readonly
                    value="<?php echo $Amount ?>" placeholder="none">
            </div>
    </form>
</body>

</html>