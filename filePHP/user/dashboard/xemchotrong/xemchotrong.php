<?php
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);
$location = mysqli_real_escape_string($link, $_REQUEST['Location']);

$rs = mysqli_query($link, "SELECT * FROM parking ORDER BY Location"); //Giai phong tap cac ban ghi trong Srs

?>



<!DOCTYPE html>
<html>

<head>
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


    <link rel="stylesheet" href="/PBL4/fileCSS/signupUser.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    Made a mistake? <a href="#" onclick="location.reload()">Start Again</a>
    </br>
    <p id="sTitle" class="heading">Select a state:</p>
    <div class="center">
        <select id="stateSelect" onchange="stateSelected();" class="selector">
            <option value="" selected="selected">Select a state</option>
            <?php
            foreach ($rs as $row) {
                echo '<option value="' . $row["Location"] . '" name="location">' . $row["Location"] . '</option>';
            }
            ?>
        </select>
    </div>
    <input type="submit" id="submit" class="">

</body>

</html>