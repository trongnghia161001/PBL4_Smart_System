<?php

$myID = $_REQUEST['txtIDTicket'];
$time = $_REQUEST['txtTime'];
$tgbd = $_REQUEST['txtTGBD'];
$tgkt = $_REQUEST['txtTGKT'];
$typeticket = $_REQUEST['txtTypeTicket'];
$priceticket = $_REQUEST['txtPriceTicket'];
// $link = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($link));
// $db_selected = mysqli_select_db($link, 'DULIEU');
$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6584911', 'zdvfEsH37e', 'sql6584911', 3306) or die('Could not connect: ' . $conn->connect_error);
$rs = mysqli_query($link, "UPDATE ticketsprice Set
Time = '$time',
TG_BD = '$tgbd',
TG_KT = '$tgkt',
Ticket_type = '$typeticket',
Tickets_price = '$priceticket'
WHERE ID_tickets_price = '$myID'");

header("Location:capnhatgiaxe.php");



?>

<html>

</html>