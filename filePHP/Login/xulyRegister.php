<?php
@include 'config.php';
if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $Office = mysqli_real_escape_string($conn, $_POST['Office']);

    $select = " SELECT * FROM account WHERE Username = '$username' && Password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {

        if ($password != $cpassword) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO account (Username, Password, Office)
                        VALUES('$username', '$password', '$Office')";
            mysqli_query($conn, $insert);
            header('location:loginForm.php');
        }
    }
};
?>
<html>

</html>