<?php

include '../includes/dcon.php';
include '../includes/inc.php';


$comp_id=$_GET['coId'];
$filename = "exportfile.csv";


$sqlexport = "SELECT order.order_id, order.deal_id, order.comp_id, order.vouch_Code, order.dated,client.clientName as Name, order.status, delivery.tracking_id, delivery.date_sent FROM `delivery` JOIN `order` on  order.order_id = delivery.order_id JOIN `client` on order.client_id = client.client_id WHERE order.comp_id ='$comp_id'";



header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);

$flPoint = fopen("php://output","w");

$sqlExpoRes = mysql_query($sqlexport);

$exportKeys = mysql_fetch_assoc($sqlExpoRes);

fputcsv($flPoint, array_keys($exportKeys));


while($exportPrint = mysql_fetch_assoc($sqlExpoRes)){

	 fputcsv($flPoint, $exportPrint);

}



?>