<?php
session_start();
$username = $_SESSION['user_name'];

$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


$rs1 = mysqli_query($link, "SELECT MAX(bi.ID_bill) as ID_bill ,bi.TG_parking,bi.sum,bi.amount,c.TimeIn,c.TimeOut,cus.Username,cus.Name, cus.Address, cus.Gmail,cus.Money,t.Tickets_price 
From bill AS bi JOIN `check` AS c ON bi.ID_check=c.ID_check 
JOIN customer AS cus ON bi.ID_customer=cus.ID_customer 
JOIN ticketsprice AS t ON bi.ID_ticket_price=t.ID_tickets_price 
where cus.Username = '$username'"); //Giai phong tap cac ban ghi trong Srs
$row1 = mysqli_fetch_array($rs1, MYSQLI_BOTH);

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

    <link rel="stylesheet" href="../../../../fileCSS/styleBill.css">


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
                                        <h3>Time In: <?php echo $row1['TimeIn'] ?></h3>
                                        <h3>Time Out: <?php echo $row1['TimeOut'] ?></h3>
                                        <h3>Time Parking: <?php echo $row1['TG_parking'] ?></h3>
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
                                    <h3 class="sub-total-price"><?php echo $row1['amount']; ?></h3>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-10 col-xs-8">
                                    <h4 class="discount">Cost</h4>
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <h3 class="discount-price"><?php echo  currency_format($row1['Tickets_price']); ?>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="service-title">Total pay</h2>
                                    </div>
                                    <div class="col-sm-4">
                                        <h3 class="service-price">-<?php echo currency_format($row1['sum']); ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="clearfix"></div>
                                <div class="col-sm-9 col-xs-8">
                                    <h3 class="total-due">REMAINING AMOUNT</h3>
                                </div>
                                <div class="col-sm-3 col-xs-4">
                                    <h3 class="total-due-price">
                                        <?php echo currency_format($row1['Money'] - $row1['sum']) ?>
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
                                        <P>PAID</P>
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