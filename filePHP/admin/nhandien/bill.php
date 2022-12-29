<?php
$link = mysqli_connect('localhost', 'id20046835_sql6586096', 'iqg}](Tb\S8K|f^)', 'id20046835_smartparkinglot', 3306) or die('Could not connect: ' . $conn->connect_error);
mysqli_set_charset($link, "utf8");


$rs = mysqli_query($link, "SELECT bi.ID_Bill,cus.Name, c.License_plate, bi.TG_parking, p.Location, t.Time, t.Tickets_price, bi.amount, bi.sum
From bill AS bi JOIN car AS c ON bi.ID_car=c.ID_car
JOIN customer AS cus ON bi.ID_customer=cus.ID_customer
JOIN ticketsprice AS t ON bi.ID_ticket_price=t.ID_tickets_price 
JOIN parking AS p ON bi.ID_parking=p.ID_parking 
Where bi.status=0;");


?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">


<title>Danh sách user</title>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/bbe5565ba3.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../../static/assets/css/detail.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="navbar">
    <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
    <h2 style="margin: auto;">Hiển thị danh sách thanh toán</h2>
</div>
<Form action="" method="POST">
    <table border="1" width="100%" class="table table-striped">

        <TR>
            <TH>TÊN KHÁCH HÀNG</TH>
            <TH>BIỂN SỐ XE</TH>
            <TH>THỜI GIAN ĐỖ</TH>
            <TH>ĐỊA ĐIỂM</TH>
            <TH>LOẠI VÉ</TH>
            <TH>GIÁ TIỀN</TH>
            <TH>SỐ LƯỢNG</TH>
            <TH>TỔNG</TH>
            <TH>TRẠNG THÁI</TH>
        </TR>
        <?php while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) { ?>
        <TR>
            <TD><?php echo $row['Name']; ?></TD>
            <TD><?php echo $row['License_plate']; ?></TD>
            <TD><?php echo $row['TG_parking']; ?></TD>
            <TD><?php echo $row['Location']; ?></TD>
            <TD><?php echo $row['Time']; ?></TD>
            <TD><?php echo $row['Tickets_price']; ?></TD>
            <TD><?php echo $row['amount']; ?></TD>
            <TD><?php echo $row['sum']; ?></TD>
            <TD>
                <a href="xulybill.php?ID_Bill=<?php echo $row['ID_Bill']; ?>" style="    background-color: #04AA6D;
                    border-radius: 5px;
                    color: white;
                    border: 0;
                    text-decoration: none;">
                    Chưa thanh toán
                </a>
            </TD>
        </TR>
        <?php } ?>
    </TABLE>
</form>


</html>