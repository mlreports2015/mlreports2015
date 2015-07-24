<?php 
include 'appointment_class.php';

$appdate = $_GET['d']."/".$_GET['m']."/".$_GET['y'];
$tming = explode(':',$_GET['tme']);

$appointmentx = new appointment();

$SQLArray['app_dt'] = strtotime($appdate);
$SQLArray['app_tme']=$tming[0].":".$tming[1];
//print_r($appointmentx);

//$appsql = $appointmentx->view_record('appointment', $SQLArray);


//$appsql->fetchInto($row, DB_FETCHMODE_ASSOC) ;
    


if($_POST['svebut']){
	
	
	
	$appointmentx = new appointment();
	
	//print_r($appointmentx);
	$clno=$_POST['tmehr'].":".$_POST['tmemin'];
	
	$SQLarray['app_dt'] = strtotime($_POST['datepicker']);
	$SQLarray['app_tme'] = $clno;
	$SQLarray['cont_name'] = $_POST['app_client'];
	$SQLarray['cont_cont'] = $_POST['app_client_cont'];
	$SQLarray['comp_id']=$_POST['varid'];
	
	print_r($appointmentx->add_record('appointment', $SQLarray));
	
	// 
	
	// echo "insert into appointment set app_dte =".strtotime($_POST['datepicker']).", app_tme = $clno  , app_client=".$_POST['app_client'].", app_client_contact=".$_POST['app_client_cont'].", comp_ip =". $_POST['contxt'];
	 
	 
	
}else if($_GET['remove']){
	
     print_r($appointmentx->del_record('appointment',$_POST['app_id']));
	 
	 //echo $_POST['app_id'];
	 
	 //print_r($appointmentsx->del_record('appointment',$_POST['app_id']));
     
	
}






?>
