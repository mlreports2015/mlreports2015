<?php


include '../includes/dcon.php';
//include 'includes/inc.php';
include 'databaseClass.php';

$dbquery = new DatabaseClass();

if($_GET['cid']) {

    $criteria = array("clinic_id" => $_GET['cid']);
    $tble = "clinic";

    $rmveResult = $dbquery->deleteQuery($criteria, $tble);

    if($db->query($rmveResult)){
		
		echo "clinic deleted";
	
	}

}



?>
