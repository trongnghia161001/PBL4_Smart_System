<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    $select = " SELECT * FROM account WHERE Username = '$username' && Password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['Office'] == '1') {

            $_SESSION['admin_name'] = $row['Username'];
            header('location:adminPage.php');
        } elseif ($row['Office'] == '0') {

            $_SESSION['user_name'] = $row['Username'];
            header('location:userPage.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
        header('location:loginForm.php');
    }
};
?>

<html>

</html>