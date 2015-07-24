<?php 
include 'process/appointment_class.php';

$appdate = $_GET['d']."/".$_GET['m']."/".$_GET['y'];
$tming = explode(':',$_GET['tme']);

$appointmentx = new appointment();
//print_r($appointmentx);
	
$SQLArray['app_dt'] = strtotime($appdate);
$SQLArray['app_tme']=$tming[0].":".$tming[1];


$appsql = $appointmentx->view_record('appointment', $SQLArray);


$appsql->fetchInto($row, DB_FETCHMODE_ASSOC) ;
   
if($appsql->numRows()<=0 && $_POST['svebut'])
{


if($_POST['svebut']){
	
	
	
	//$appointmentx = new appointment();
	
	//print_r($appointmentx);
	if(intval($_POST['tmemin'])<10){
		$clno=$_POST['tmehr'].":0".$_POST['tmemin'];
		
	}else{
		$clno=$_POST['tmehr'].":".$_POST['tmemin'];
	}
	

	
	
	
	$SQLarray['app_dt'] = strtotime($_POST['datepicker']);
	$SQLarray['app_tme'] = $clno;
	$SQLarray['cont_name'] = $_POST['app_client'];
	$SQLarray['cont_cont'] = $_POST['app_client_cont'];
	$SQLarray['comp_id']=$_POST['varid'];
	
	print_r($appointmentx->add_record('appointment', $SQLarray));
	
	// 
	
	// echo "insert into appointment set app_dte =".strtotime($_POST['datepicker']).", app_tme = $clno  , app_client=".$_POST['app_client'].", app_client_contact=".$_POST['app_client_cont'].", comp_ip =". $_POST['contxt'];
	 
	 
	
}


}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointment Document</title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script>
$(function() {
$( "#datepicker" ).datepicker();

$("#tmehr").spinner({
	min:00,	
	max:23
});

$("#tmemin").spinner({
	min:00,	
	max:59
});

 $( "#contxt" ).autocomplete({
source: "process/qSearch.php?typ="+document.getElementById('optstyp').value,
minLength: 2,
 select: function( event, ui ) {
 
   $("#varid").val(ui.item.id);

}
});


});

<?php 

if($_POST['svebut']){

$tmer = explode('/',$_POST['datepicker']);

//reloads the href location 

echo "parent.location.assign('appointments.php?viewday=1&d=".$tmer[0]."&m=".$tmer[1]."&y=".$tmer[2]."')";

	
}

?>


</script>

</head>
<body>
<form action='<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>' method='POST'>

<table>
<tr>
<td style="text-align:right">Date:</td><td><input type='text' id='datepicker' name='datepicker' value="<?php echo $appdate; ?>" /></td>
</tr>
<tr><td style="text-align:right" colspan='1'>Time:(hh:mm)</td><td colspan='2'><input type='text' id='tmehr' name='tmehr'size='5' value='<?php echo $tming[0]; ?>'/>:<input type='text' id='tmemin' name='tmemin'size='5' value='<?php echo $tming[1]; ?>'/></td>
</td>
</tr>
<tr>
<td colspan='2'>Type:<select id="optstyp" name="optstyp" ><option value="">..select type..</option><option value="comp">Company</option><option value="cont">Contact</option></select><input type="text" id="contxt" name="contxt" /><input type="hidden" id="varid" name="varid" value="<?php echo $row['comp_id']; ?>"/></td>
</tr>
<tr>
<td style="text-align:right">Client Name:</td><td><input type="text" id="app_client" name="app_client" value="<?php echo $row['cont_name']; ?>"/></td></tr>
<td style="text-align:right">Contact No:</td><td><input type="text" id="app_client_cont" name="app_client_cont" value="<?php echo $row['cont_cont']; ?> "/></td>
</tr>
<tr>

<?php if(empty($row)){

echo "<td colspan='2'><input type=\"submit\" value=\"Add Appointment\" id=\"svebut\" name=\"svebut\" /></td><td><input type=\"reset\" value=\"Reset\" id=\"reset\" name=\"reset\" /></td>";

}

?>
</tr>

</table>

</form>
<div style="position:absolute">


</div>

</body>
</html>
