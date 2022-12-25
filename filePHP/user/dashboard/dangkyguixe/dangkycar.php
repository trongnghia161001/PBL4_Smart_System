<?php
session_start();
$myusername = $_SESSION['user_name'];

$conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);

$select = "SELECT * FROM customer WHERE Username = '$myusername'";

$result = mysqli_query($conn, $select);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HTML CSS Register Form</title>
    <link rel="stylesheet" href="/PBL4/fileCSS/signupUser.css">
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <form class="signup-form" action="xulydangkycar.php" method="post">
        <div class="form-header">
            <h1>Car Registration</h1>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label for="Company" class="label-title">Company *</label>
                <input type="text" id="Company" class="form-input" placeholder="enter your company" required="required"
                    name="Company">
            </div>
            <div class="form-group">
                <label for="cartype" class="label-title">Car Type *</label>
                <input type="text" id="cartype" class="form-input" placeholder="enter your car type" required="required"
                    name="Car_type">
            </div>
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="color" class="label-title">Color *</label>
                    <input type="text" class="form-input" id="color" placeholder="enter color" required="required"
                        name="Color">
                </div>
                <div class="form-group right">
                    <label for="licenseplate" class="label-title">License Plate *</label>
                    <input type="text" class="form-input" id="licenseplate" placeholder="enter your license plate"
                        required="required" name="License_plate">
                </div>
            </div>
            <div class="form-group">
                <label for="id" class="label-title">ID <?php echo $myusername ?> *</label>
                <input type="int" class="form-input" id="id" placeholder="enter your id" required="required"
                    name="ID_Customer" value="<?php echo $row['ID_Customer'] ?>" readonly>
            </div>
        </div>
        <div class="form-footer">
            <span>* required</span>
            <button type="submit" name="submit" class="btn">Create</button>
        </div>

    </form>
    <script>
    var rangeLabel = document.getElementById("range-label");
    var experience = document.getElementById("experience");

    function change() {
        rangeLabel.innerText = experience.value + "K";
    }
    </script>


</body>

</html>