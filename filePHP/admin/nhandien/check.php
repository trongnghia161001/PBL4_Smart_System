<?php
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

$rs = mysqli_query($link, "SELECT c.License_plate, c.TimeIn, c.TimeOut, cus.Name 
From `check` AS c JOIN car ON c.ID_car=car.ID_car JOIN customer AS cus ON car.ID_customer=cus.ID_customer WHERE c.Status=1;");

echo '<title>Danh sách user</title>';
echo '
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/PBL4/static/assets/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<div class="navbar">
        <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
        <h2 style="margin: auto;">Kiểm tra biển số xe</h2>
    </div>';
echo '<Form action="">';
echo '<table border="1" width="100%" class="table table-striped">';

echo    '<TR>
            <TH>BIỂN SỐ VÀO</TH>
            <TH>THỜI GIAN VÀO</TH>
            <TH>THỜI GIAN RA</TH>
            <TH>TÊN KHÁCH HÀNG</TH>
        </TR>';
while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
    echo
    '<TR>
    <TD>' . $row['License_plate'] . '</TD>
    <TD>' . $row['TimeIn'] . '</TD>
    <TD>' . $row['TimeOut'] . '</TD>
    <TD>' . $row['Name'] . '</TD>
    </TR>';
}


session_start();


$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");

//get info
$rss = mysqli_query($link, "SELECT c.ID_check, c.ID_car, ca.ID_customer, c.License_plate, c.TimeIn, c.TimeOut, cus.Name
FROM `check` as c 
INNER JOIN car as ca
on ca.ID_car = c.ID_car
JOIN customer AS cus ON ca.ID_customer=cus.ID_customer
where c.Status = '0' and c.Status_bill = '0'");

while ($info = mysqli_fetch_array($rss, MYSQLI_BOTH)) {

    if ($info['TimeOut'] != Null) {
        $idcheck = $info['ID_check'];
        $rs4 = mysqli_query($link, "SELECT CONCAT(
                                        FLOOR(HOUR(TIMEDIFF(TimeIn, TimeOut)) / 24), ' DAYS ',
                                            MOD(HOUR(TIMEDIFF(TimeIn, TimeOut)), 24), ' HOURS ',
                                            MINUTE(TIMEDIFF(TimeIn, TimeOut)), ' MINUTES ')
                                        AS TG_parking
                                        FROM `check`
                                        WHERE ID_check = '$idcheck' AND Status = 0
                                        ORDER BY TimeOut DESC"); //Giai phong tap cac ban ghi trong Srs
        $row4 = mysqli_fetch_array($rs4);
        $tgpacking = $row4['TG_parking'];




        $days = mysqli_query($link, "SELECT FLOOR(HOUR(TIMEDIFF(TimeIn, TimeOut)) / 24) FROM `check` WHERE ID_check = '$idcheck' AND STATUS = 0 ORDER BY TimeOut DESC");
        $rowDays = mysqli_fetch_array($days);
        $DAYS = $rowDays['0'];


        $hours = mysqli_query($link, "SELECT MOD(HOUR(TIMEDIFF(TimeIn, TimeOut)), 24) FROM `check` WHERE ID_check = '$idcheck' AND STATUS = 0 ORDER BY TimeOut DESC");
        $rowHours = mysqli_fetch_array($hours);

        $hoursEnd = mysqli_query($link, "SELECT HOUR(TimeOut) FROM `check` WHERE ID_check = '$idcheck' AND Status = 0");
        $rowhoursEnd = mysqli_fetch_array($hoursEnd);

        $dayIn = mysqli_query($link, "SELECT DAY(TimeIn) FROM `check` WHERE ID_check = '$idcheck' AND Status = 0");
        $rowDayIn = mysqli_fetch_array($dayIn);

        $dayOut = mysqli_query($link, "SELECT DAY(TimeOut) FROM `check` WHERE ID_check = '$idcheck' AND Status = 0");
        $rowDayOut = mysqli_fetch_array($dayOut);

        if ($DAYS == 0) {
            $amount = 1;
            // mysqli_query($link, "UPDATE bill Set amount = 1 WHERE ID_bill = '$idbill'");
            if (6 < $rowhoursEnd['0'] && $rowhoursEnd['0'] < 17) {
                if ($rowDayIn['0'] == $rowDayOut['0']) {
                    if ($rowHours['0'] < 11) {
                        $idticketprice = 1;
                        // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 1 WHERE ID_bill = '$idbill'");
                    } else {
                        $idticketprice = 3;
                        // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 3 WHERE ID_bill = '$idbill'");
                    }
                } else {
                    $idticketprice = 4;
                    // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
                }
            } else if (17 < $rowhoursEnd['0'] && $rowhoursEnd['0'] < 23) {
                if ($rowDayIn['0'] == $rowDayOut['0']) {
                    $idticketprice = 2;
                    // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 2 WHERE ID_bill = '$idbill'");
                } else {
                    $idticketprice = 4;
                    // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
                }
            } else {
                $idticketprice = 3;
                // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 3 WHERE ID_bill = '$idbill'");
            }
        } else {
            $amount = $DAYS + 1;
            // $DAYS++;
            // mysqli_query($link, "UPDATE bill Set amount = '$DAYS' WHERE ID_bill = '$idbill'");

            $idticketprice = 4;
            // mysqli_query($link, "UPDATE bill Set ID_ticket_price = 4 WHERE ID_bill = '$idbill'");
        }


        $rs7 = mysqli_query($link, "SELECT * FROM ticketsprice WHERE ID_tickets_price = '$idticketprice'"); //Giai phong tap cac ban ghi trong Srs
        $row7 = mysqli_fetch_array($rs7);
        $money = $row7['Tickets_price'];
        $sum = $amount * $money;


        $idcar = $info['ID_car'];
        $idcustomer = $info['ID_customer'];
        $message = "INSERT INTO bill (ID_Check, TG_parking, ID_car, ID_customer, ID_ticket_price, ID_parking, amount, sum, `Status`)
    VALUES ('$idcheck', '$tgpacking', '$idcar', ' $idcustomer', '$idticketprice', '1', '$amount', '$sum', '0')";

        $rss2 = mysqli_query($link, $message);
        $row9 = mysqli_query($link, "UPDATE `check` Set Status_bill = '1' WHERE ID_check = '$idcheck'");
    }
}
// }
echo '</TABLE>';
echo '</form>';
mysqli_free_result($rs);
mysqli_close($link);
?>

<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">




</html>