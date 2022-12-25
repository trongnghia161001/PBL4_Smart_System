<?php


@include 'config.php';

session_start();
$myusername = $_SESSION['user_name'];


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
    <div class="navbar">
        <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
    </div>
    <form class="signup-form" action="xulydangkyguixe.php" method="post">
        <div class="form-header">
            <h1>Create Account</h1>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label for="fullname" class="label-title">Fullname*</label>
                <input type="text" id="fullname" class="form-input" placeholder="enter your fullname"
                    required="required" name="Name">
            </div>
            <div class="form-group">
                <label for="email" class="label-title">Email*</label>
                <input type="email" id="email" class="form-input" placeholder="enter your email" required="required"
                    name="Gmail">
            </div>
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="birthday" class="label-title">Birthday *</label>
                    <input type="date" id="birthday" class="form-input" placeholder="enter your birthday"
                        required="required" name="Birthday">
                </div>
                <div class="form-group right">
                    <label for="phone" class="label-title">Phone *</label>
                    <input type="text" class="form-input" id="phone" placeholder="enter your phone" required="required"
                        name="Phone">
                </div>
            </div>
            <div class="horizontal-group">
                <div class="form-group left">
                    <label class="label-title">Gender:</label>
                    <div class="input-group">
                        <label for="male"><input type="radio" id="male" name="Sex" value="Nam" checked>
                            Male</label>
                        <label for="female"><input type="radio" id="female" name="Sex" value="Nu">
                            Female</label>
                    </div>
                </div>
                <div class="form-group right">
                    <label for="cmnd" class="label-title">CMND *</label>
                    <input type="text" class="form-input" id="cmnd" placeholder="enter your cmnd" required="required"
                        name="CMND">
                </div>
            </div>
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="address" class="label-title">Address *</label>
                    <input type="text" class="form-input" id="address" placeholder="enter your address"
                        required="required" name="Address">
                </div>
                <div class="form-group right">
                    <label for="username" class="label-title">Username *</label>
                    <input type="text" class="form-input" id="username" placeholder="enter your username"
                        required="required" name="Username" value="<?php echo $myusername ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="choose-file" class="label-title">Bio</label>
                <textarea class="form-input" rows="4" cols="50" style="height:auto"></textarea>
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