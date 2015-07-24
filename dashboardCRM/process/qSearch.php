<?php
include '../includes/dcon.php';
include '../includes/inc.php';
$results = array();
//print_r($arrayname);
//if($_GET['typ']=='comp'){
	
	$res = $db->query("SELECT comp_name , comp_Id FROM company WHERE comp_name LIKE '%".$_GET['term']."%'");
	  while($row = $res->fetchRow(DB_FETCHMODE_ASSOC))
	{
		
		$n = $n + 1;
         
		$arrayobj = array("id"=>$row['comp_Id'], "value"=> $row['comp_name'], "label" => $row['comp_name']);
		
		
	    $results[] = $arrayobj;
	
	
	}
	//}else{

//}

 print json_encode($results);
?>
