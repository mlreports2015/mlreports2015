<?php 
session_start();


if($_SESSION['usr']==''){
																	  
  header('Location: index.php');																	  

}

include 'includes/dcon.php';
include 'includes/inc.php';

include '/process/databaseClass.php';

//$_SESSION['id'];


$dbclinicSelect = "SELECT clinic_id, diary_id FROM clinic_date WHERE clinic_date BETWEEN ".(time()-(60*60*24*10))." AND ".(time()+(60*60*24*12));

$dbselectres = $db->query($dbclinicSelect);


if($_GET['clinic']!=''){
	
$dbview = "SELECT `slot-id`, `slot-time` as app_date , `case-id`, `client_name` , `client_number`, agency_name, agency_ref, solicitor_ref , case_dob , case_doa, attended_at FROM clinic_tmslot JOIN `case` ON `case-id` = case_id WHERE `clinic-id` ='".$_GET['clinic']."' AND `slot-time` between ".(time()-(60*60*24*8))." and ".(time()+(60*60*24*8));

}else{

	
$dbview = "SELECT `slot-id`, `slot-time` as app_date , `case-id`, `client_name` , `client_number`, agency_name, agency_ref, solicitor_ref , case_dob , case_doa, attended_at FROM clinic_tmslot JOIN `case` ON `case-id` = case_id WHERE `slot-time` between ".(time()-(60*60*24*8))." and ".(time()+(60*60*24*8));

}


$dbvieweres = $db->query($dbview);



$dbcountapps = "SELECT count(*) as counter FROM clinic_tmslot WHERE `slot-time` between ".(time()-(60*60*24*36))." and ".time();

$dbcountappsres = $db->query($dbcountapps);

$dbcountprint = $dbcountappsres->fetchRow(DB_FETCHMODE_ASSOC);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Britannia Medicare</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

//$("#stdte").datepicker({dateFormat: "dd-mm-yy"});			
//$( "#stdte" ).datepicker();

//$("#endte").datepicker();
//$("#endte").datepicker( "option", "dateFormat", "dd-mm-yy" );

$(document).ready(function() {


    $("#moreapps").click(function() {
        $("#latest").toggle();
        $("#recentcse").toggle();

    });


});

function sendsms(id,phonez){

	alert(id + " " + phonez);
	
     //$.get("http://britanniamedicare/booker/SMS.php?appid="+id+"&pno="+phonez , function(data, status){
    $.get("./SMS.php?appid="+id+"&pno="+phonez , function(data, status){
        alert("data:" + data + "Status: " + status);
    
      });

	
}

function clinicChange(clinic){
	
	
   document.location ="exprtIndex.php?clinic="+clinic;
	
}

function genlistChange(){

	value = prompt('Enter the Clinic Date: ','dd-mm-yyyy')

	if((value=="dd-mm-yyyy") || (value=="") || (value==null)){
	window.open('./process/listGens.php');
	}else{
	window.open('./process/listGens.php?dt='+value);	
	}

	
}
	
			
</script>

<style>

.tab :hover {
margin-top:0px;
height:60px;
background-color:#CCC;
cursor:pointer;

	
}

.tab {

float:left;
height:60px;
width:140px;
background-color:#FFF;
margin-left:10px;
text-align:center;
	
}

#recentcse{
	
	float:left;
	width:44%;
	padding-right:3px;
	
}

#recentapps{
	
	float:left;
	width:90%;
	margin-left:5px;
	
}


@media screen and ( max-width:1100px ){
	
	#recentcse{
	
		width:90%;
		float:left;
	
	}
	
	#recentapps{
	
		width:90%;
		float:left;
	
	}

	

}

.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {
	
	width:18%;
	text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

 //background-color:rgba(218,6,6,0.5);
 background-color:rgba(40,150,215,0.5);
 font-weight:bold;
    color:#FFF;
	
}

.breadcrumb {

    padding:6px;
    margin:0px;
    margin-top:0px;
    border-radius:none;
    background-color:#368ccc;
    color:#ffffff;
}

.breadcrumb a{

    color:#ffffff;
}

</style>

</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg);background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;color:#368ccc;">

<!-- <div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">-->
<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header" >
    <a class="navbar-brand" href="exprtIndex.php" title="Britannia Medicare" style="text-decoration:none;color:#FFF;font-style:italic;font-family:'Times New Roman', Times, serif">Britannia Medicare</a>
    </div>
 
    <div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="exprtIndex.php">HOME</a></li>
        <li><a onclick='genlistChange()' >LIST GEN</a></li>
        <li><a href="diary.php" >DIARY</a></li>
        <li><a href="venueAdd.php" >VENUES</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:44%"><a href="expertSave.php" title="<?php echo $_SESSION['usr']; ?> ">Accounts</a></li>
        <li style="width:40%"><a href="logout.php" title="<?php echo $_SESSION['usr']." log out"; ?>">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#a616c5;"><a href="expertSave.php" ><?php echo $_SESSION['usr'] ;?></a> currently logged in</div>

    <div style="width:90%;padding:18px;padding-top:0px;padding-bottom:0px;" align="center">
   <h3 align="left">MONTHLY STATS</h3>
    <div style="width:100%;height:110px;">

        <div style="float:left;width:80%;color:#a616c5;" align='center'>

        <h2>Appointments: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;background-color:rgba(166,22,200,0.5);" ><?php echo $dbcountprint['counter']; ?></span></h2>
   
   		 </div>
    


    </div>



</div>
<div style="width:100%;padding:18px;padding-top:0px;padding-bottom:0px;" align="left">

<form action="./process/apptAttend.php" method="post" >

<div align='center' style="width:100%">


  <div style="float:left;width:100%" align="center">
    
    <div style="width:99%;">
      <h3 style="float:left;width:100%;text-align:left;"> APPOINTMENTS </h3>
    </div>
  
  <div class="alert alert-info" id="recentapps" name="recentapps" style="color:#368ccc;padding:0px;margin:0px;border:none;padding-bottom:14px;" >
    <div style="background-color:rgba(166,22,200,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px"><b>TODAYS APPOINTMENTS</b>
    
    <?php 
	
		echo "<select style='color:#000;width:40%;border-radius:6px;' onChange='clinicChange(this.value)'>";
		echo "<option>....select clinic....</option>";
	 while($dbrecs = $dbselectres->fetchRow(DB_FETCHMODE_ASSOC)){
		 
		echo "<option value='".$dbrecs['diary_id']."'>".$dbrecs['clinic_id']."</option>";
	
	 }
	   echo "</select>";
	?>
    
    </div>
<table width="95%" cellspacing='5px' rules="rows" cellpadding='5px'>
<tr style="color:#a616c5;"><th>S/N</th><th>Agency</th><th>Solicitor Ref.</th><th>Client Name</th><th>Accid. Date</th><th>Appointment Date</th><th>Attendance</th></tr>
<?php

   $i=0;
   
   while($dbrecords = $dbvieweres->fetchRow(DB_FETCHMODE_ASSOC)){
	   
	   
	  $i++;
	
	if(($dbrecords['client_number']!='')&&(strlen($dbrecords['client_number']) >6))
	{
	   $cnumber = $dbrecords['client_number'];
	}else{
		$cnumber='07989359816';	 
	}
	echo "<tr style='font-size:11px;'><td>".$i."</td>";
	echo "<td>".$dbrecords['agency_name']."<br/>".$dbrecords['agency_ref']."</td>";
	echo "<td>".$dbrecords['solicitor_ref']."</td>";
	echo "<td>".$dbrecords['client_name']."</td>";
	echo "<td>".$dbrecords['case_doa']."</td>";
	echo "<td>".date('d-m-Y H:i', $dbrecords['app_date'])."</td>";
	if(isset($dbrecords['attended_at'])){
	echo "<td><input type='checkbox' value='1' id='apptchck[]' name='apptchck[]' checked />";	
	}else{
	echo "<td><input type='button' id='smsbutt' name='smsbutt' value='SMS' onclick=\"sendsms('".$dbrecords['slot-id']."','".$cnumber."')\"/>&nbsp;&nbsp;<input type='checkbox' value='1' id='apptchck[]' name='apptchck[]' />";
	}
	echo "<input type='hidden' id='apptid[]' name='apptid[]' value='".$dbrecords['slot-id']."' size='2' /></td>";
	echo "</tr>";
	
	   
   }
   
   /*
   $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestapps&akey=14414&solic=".$_SESSION['solic']);
   $jsndecde2=json_decode($file);
   			
		
       
	//var_dump($jsndecde2);
	  
     if($jsndecde2->success){
	   
	  // var_dump($jsndecde2->appointment[0]);
	   
	   foreach($jsndecde2->appointment as $value){
			
			echo "<tr>";
			echo "<td><a href='indexedcase.php?cid=".$value->caseid."'>".$value->cRef."</td>";
			echo "<td>".$value->sRef."</td>";
			echo "<td>".date('d-m-Y',$value->app_date)."</td>";
			echo "<td>".$value->app_venue."</td>";
			echo "</tr>";
			
	   }
	   
   }else{
	
	
	echo "nothing found";
	
	
	   
   }
   
   */
   
   
?>

</table>

</div>

</div>
<input type="submit" id="lstsub" name="lstsub" value="SUBMIT" class="btn btn-success" style="float:left;"/>
</div>


</div>
</form>

</div>

</body>
</html>

