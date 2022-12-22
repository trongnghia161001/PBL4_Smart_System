<?php

$location = $_POST['location'];

// $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
// $db_selected = mysqli_select_db($link, 'DULIEU');
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);
$rs2 = mysqli_query($link, "SELECT * FROM parking WHERE Location = '$location'"); //Giai phong tap cac ban ghi trong Srs



?>

<html>
<form class="signup-form" action="" method="post">

    <!-- form header -->
    <div class="form-header">
        <h1>Create Account</h1>
    </div>

    <!-- form body -->
    <div class="form-body">

        <!-- Firstname and Lastname -->
        <div class="form-group">
            <label for=" fullname" class="label-title">Địa Điểm</label>
            <input type="text" id="location" class="form-input" required="required" name="Name" readonly value=""
                placeholder="none">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="label-title">Số Lượng</label>
            <input type="email" id="email" class="form-input" required="required" name="Gmail" readonly value=""
                placeholder="none">
        </div>
</form>

</html>