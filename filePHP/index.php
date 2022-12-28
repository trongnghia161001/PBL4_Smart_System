<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking Lot</title>
    <link rel="stylesheet" href="../fileCSS/index.css">
    <link rel="icon" href="../image/home.png">

</head>

<body>
    <?php if (isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) : ?>
    <?php else : ?>
    <?php header('Location:Login/loginForm.php'); ?>
    <?php endif; ?>
</body>

</html>