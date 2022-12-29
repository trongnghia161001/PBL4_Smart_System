<?php
$ID_Bill = $_REQUEST['ID_Bill'];


$link = mysqli_connect('sql6.freesqldatabase.com', 'sql6586096', 'KuFkaR6aj9', 'sql6586096', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


$rs = mysqli_query($link, "Update bill set Status=1 where ID_bill='$ID_Bill'");
$rs1 =mysqli_query($link, "SELECT bi.sum, cus.Money,cus.ID_customer
From bill AS bi JOIN customer AS cus ON bi.ID_customer=cus.ID_customer 
where ID_bill='$ID_Bill';");
$row = mysqli_fetch_array($rs1,MYSQLI_BOTH);
$money =$row['Money']-$row['sum'];
$r=$row['ID_customer'];
mysqli_query($link, "UPDATE customer Set
Money = '$money'
WHERE ID_Customer = '$r';");
header("Location:/PBL4/filePHP/admin/nhandien/bill.php");


