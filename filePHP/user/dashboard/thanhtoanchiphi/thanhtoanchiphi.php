<?php
session_start();
$username = $_SESSION['user_name'];

$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


$rs1 = mysqli_query($link, "SELECT * FROM customer where Username = '$username'"); //Giai phong tap cac ban ghi trong Srs
$row1 = mysqli_fetch_array($rs1);
$idcustomer = $row1['ID_Customer'];

$rs2 = mysqli_query($link, "SELECT ID_car FROM car where ID_customer = '$idcustomer'"); //Giai phong tap cac ban ghi trong Srs
$row2 = mysqli_fetch_array($rs2);
$idcar = $row2['ID_car'];


$rs3 = mysqli_query($link, "SELECT * FROM `check` WHERE ID_car = '$idcar'"); //Giai phong tap cac ban ghi trong Srs
$row3 = mysqli_fetch_array($rs3);
$idcheck = $row3['ID_check'];

$rs5 = mysqli_query($link, "SELECT * FROM bill WHERE ID_car = '$idcar'"); //Giai phong tap cac ban ghi trong Srs
$row5 = mysqli_fetch_array($rs5);
$idbill = $row5['ID_bill'];

$rs6 = mysqli_query($link, "SELECT * FROM bill WHERE ID_bill = '$idbill'"); //Giai phong tap cac ban ghi trong Srs
$row6 = mysqli_fetch_array($rs6);
$idticketprice = $row6['ID_ticket_price'];
$amount = $row6['amount'];


$rs7 = mysqli_query($link, "SELECT * FROM ticketsprice WHERE ID_tickets_price = '$idticketprice'"); //Giai phong tap cac ban ghi trong Srs
$row7 = mysqli_fetch_array($rs7);
$money = $row7['Tickets_price'];

$rs4 = mysqli_query($link, "SELECT CONCAT(
                                        FLOOR(HOUR(TIMEDIFF(TimeIn, TimeOut)) / 24), ' DAYS ',
                                            MOD(HOUR(TIMEDIFF(TimeIn, TimeOut)), 24), ' HOURS ',
                                            MINUTE(TIMEDIFF(TimeIn, TimeOut)), ' MINUTES ')
                                        AS TG_parking
                                        FROM `check`
                                        WHERE ID_check = '$idcheck' AND Status = 1
                                        ORDER BY TimeOut DESC"); //Giai phong tap cac ban ghi trong Srs
$row4 = mysqli_fetch_array($rs4);
$tgparking = $row4['TG_parking'];

$sum = $row6['amount'] * $money;

$days = mysqli_query($link, "SELECT FLOOR(HOUR(TIMEDIFF(TimeIn, TimeOut)) / 24) FROM `check` WHERE ID_check = '$idcheck' AND STATUS = 1 ORDER BY TimeOut DESC");
$rowDays = mysqli_fetch_array($days);
$DAYS = $rowDays['0'];

$hours = mysqli_query($link, "SELECT MOD(HOUR(TIMEDIFF(TimeIn, TimeOut)), 24) FROM `check` WHERE ID_check = '$idcheck' AND STATUS = 1 ORDER BY TimeOut DESC");
$rowHours = mysqli_fetch_array($hours);

$hoursEnd = mysqli_query($link, "SELECT HOUR(TimeOut) FROM `check` WHERE ID_check = '$idcheck' AND Status = 1");
$rowhoursEnd = mysqli_fetch_array($hoursEnd);

$dayIn = mysqli_query($link, "SELECT DAY(TimeIn) FROM `check` WHERE ID_check = '$idcheck' AND Status = 1");
$rowDayIn = mysqli_fetch_array($dayIn);

$dayOut = mysqli_query($link, "SELECT DAY(TimeOut) FROM `check` WHERE ID_check = '$idcheck' AND Status = 1");
$rowDayOut = mysqli_fetch_array($dayOut);

if ($DAYS == 0) {
    mysqli_query($link, "UPDATE bill Set amount = 1 WHERE ID_bill = '$idbill'");
    if (6 < $hoursEnd && $hoursEnd < 17) {
        if ($dayIn == $dayOut) {
            if ($hours < 11) {
                // $idticketprice = 1;
                mysqli_query($link, "UPDATE bill Set ID_ticket_price = 1 WHERE ID_bill = '$idbill'");
            } else {
                // $idticketprice = 3;
                mysqli_query($link, "UPDATE bill Set ID_ticket_price = 3 WHERE ID_bill = '$idbill'");
            }
        } else {
            // $idticketprice = 4;
            mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
        }
    } else if (17 < $hoursEnd && $hoursEnd < 23) {
        if ($dayIn == $dayOut) {
            // $idticketprice = 2;
            mysqli_query($link, "UPDATE bill Set ID_ticket_price = 2 WHERE ID_bill = '$idbill'");
        } else {
            // $idticketprice = 4;
            mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
        }
    } else {
        // $idticketprice = 3;
        mysqli_query($link, "UPDATE bill Set ID_ticket_price = 3 WHERE ID_bill = '$idbill'");
    }
} else {
    // $amount = $days++;   
    $DAYS++;
    mysqli_query($link, "UPDATE bill Set amount = '$DAYS' WHERE ID_bill = '$idbill'");

    // $idticketprice = 4;
    mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
}


if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="/PBL4/fileCSS/styleBill.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section class="invoice">
        <div class="bg-color"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-wrapper">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-top-left">
                                        <h1>Smart Parking Lot Sys</h1>
                                        <h5>Web design for 四人</h5>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-top-right">
                                        <h4>INVOICE</h4>
                                        <h6>user><?php echo $_SESSION['user_name'] ?></h6>
                                        <h3>Time In: <?php echo $row3['TimeIn'] ?></h3>
                                        <h3>Time Out: <?php echo $row3['TimeOut'] ?></h3>
                                        <h3>Time Parking: <?php echo $row4['TG_parking'] ?></h3>
                                        <h2 class="amount">
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="service-title">Amount available now</h2>
                                </div>
                                <div class="col-sm-4">
                                    <h3 class="service-price"><?php echo currency_format($row1['Money']); ?></h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-10 col-xs-8">
                                    <h4 class="sub-total">Amount Should Be Pay</h4>
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <h3 class="sub-total-price"><?php echo $amount; ?></h3>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-10 col-xs-8">
                                    <h4 class="discount">Cost</h4>
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <h3 class="discount-price"><?php echo $money; ?></h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="service-title">Total pay</h2>
                                    </div>
                                    <div class="col-sm-4">
                                        <h3 class="service-price">-<?php echo currency_format($sum); ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="clearfix"></div>
                                <div class="col-sm-9 col-xs-8">
                                    <h3 class="total-due">REMAINING AMOUNT</h3>
                                </div>
                                <div class="col-sm-3 col-xs-4">
                                    <h3 class="total-due-price"><?php echo currency_format($row1['Money'] - $sum) ?>
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="footer">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="client-address">
                                        <h6>TO</h6>
                                        <h2><?php echo $row1['Name'] ?></h2>
                                        <h4>
                                            <?php echo $row1['Address'] ?> <br>
                                            Việt Nam <br>
                                            c<?php echo $row1['Gmail'] ?>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="our-address">
                                        <h6>FROM</h6>
                                        <h2>Smart Parking Lot Sys</h2>
                                        <h4>
                                            54 Nguyễn Lương Bằng <br>
                                            Hoà Khánh Bắc, Liên Chiểu <br>
                                            Đà Nẵng <br>
                                            p.daotao.dky@dut.udn.vn
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-offset-1 col-md-5">
                                    <div class="note">
                                        <h6>NOTE</h6>
                                        <p>Please pay on time.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="text-center">
                                        <a href="xulythanhtoanchiphi.php">PAY
                                            NOW</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jquery slim version 3.2.1 minified -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</body>

</html>