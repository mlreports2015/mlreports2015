<?php

session_start();

include '../includes/dcon.php';
include '../includes/inc.php';

if($_GET['cdate']==''){

$statement = "SELECT `slot-id` as app_id, FROM_UNIXTIME(`slot-time`) as app_time , `client-name` as client_name, agency_ref, solicitor_ref , clinic_id ,attended_at FROM `case` JOIN clinic_tmslot ON case_id = `case-id` JOIN clinic_date ON diary_id = `clinic-id` WHERE `slot-time` BETWEEN ".(time() - (60*60*24*4))." AND ".(time() + (60*60*24))." ORDER BY `slot-time` ";



}else{

$statement = "SELECT `slot-id` as app_id, FROM_UNIXTIME(`slot-time`) as app_time , `client-name` as client_name, agency_ref, solicitor_ref , clinic_id , attended_at FROM `case` JOIN clinic_tmslot ON case_id = `case-id` JOIN clinic_date ON diary_id = `clinic-id` WHERE `slot-time` BETWEEN ".(strtotime($_GET['cdate'])-(60*60*24*2))." AND ".(strtotime($_GET['cdate'])+(60*60*24))." LIMIT 20";



}

$dbstateres = $db->query($statement);

			
if (PEAR::isError($dbstateres)) {
    			
	die($dbstateres->getMessage());
			
}


$selectdb = array();

while($rows = $dbstateres->fetchRow(DB_FETCHMODE_ASSOC)){
	

		array_push($selectdb, $rows);
	

	
}


echo json_encode($selectdb);




?>

