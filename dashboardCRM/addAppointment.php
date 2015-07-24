<?php

session_start();


include 'includes/inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointments</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style>


table tr>td{
	
	height:40px;
	
}


@media screen and (min-width: 1024px) and (max-width: 1700px){
	
	
.navbar-nav {

		width:60%;
}
	
	
	.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:18%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}
	
	
	
	
}



@media screen and (min-width: 600px) and (max-width: 1160px){

.navbar-nav {

  width:50%;
  color:#FFF;
  font-size:88%;

}

.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:24%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}

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

<body style="overflow:scrolls;background-image:url(Images/background-texture.jpg);background-size:cover; ">

<?php 

// include "includes/dcon2.php";

		 
		 $exprt =$_GET['exp'];
		 $location = $_GET['loc'];
		 
		 
		 if($_GET['loc']!=""){
			 
			
			//$vconn = "select name, `type`, venue from experlocations where location like '%".$location."%' AND name like '".$exprt."%'";
			
			//echo $vconn;
			
			//$vconnres = $db->query($vconn);
			//$vconnres = mysql_query($vconn);
		
			echo "<div style='width:100%;background-color:rgba(255,255,255,0.8);height:1300px;'>";
		
		 
		 }else{
		 
				  
				echo "<div style='width:100%;background-color:rgba(255,255,255,0.8);height:100%'>";
				
		  }
		


		if(isset($_GET['appointments'])){
			include 'includes/dcon.php';
		
			$setAppointments = array();
			
			$expert_id = $_GET['eid'];
		
			if($_GET['clinic']){
				
			
			  $diaryDt = "SELECT * FROM clinic_date WHERE clinic_id = '".$_GET['clinic']."' AND FROM_UNIXTIME(clinic_date) LIKE  '".date('Y-m-d',substr($_GET['cdate'],0,10))."%' AND expert_id ='".$expert_id."'";
			  
			
			  //echo $diaryDt;
			
			  $stateres = mysql_query($diaryDt);
			 
			 
			 
		     $stateresprnt = mysql_fetch_array($stateres);
			 
			 
			 $slotsperhour = "SELECT exp_AppHours, exp_name FROM expert WHERE exp_id ='".$expert_id."'";
			// echo $slotsperhour;
			 $slotsperhourres = mysql_fetch_array(mysql_query($slotsperhour));
		
			 
			 $diarytmes = "SELECT `clinic-id` , `slot-time`, `client-name` FROM clinic_tmslot WHERE `clinic-id`= '".$stateresprnt['diary_id']."'"; 
			 
			
			 
			 $diarytmres = mysql_query($diarytmes);
			 
			    while($records = mysql_fetch_array($diarytmres)){
				
				
				    array_push($setAppointments, $records['slot-time']);
				 
			    }
			 
				
			}
		
			
			
		}
       



 ?>

<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
<!--<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">-->
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="index2.php" title="MLPortal" style="text-decoration:none;color:#FFF;font-style:italic;font-family:'Times New Roman', Times, serif">ML Appointments</a>
    </div>
    
    <div>
       <ul class="nav navbar-nav" style="width:60%">
        <li><a href="index2.php">HOME</a></li>
       <!-- <li><a href="search2.php" >SEARCH</a></li>-->
        <li><a href="#" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
<div class="breadcrumb" style="text-align:right;font-style:italic;font-family:'Times New Roman', Times, serif;font-size:20px;font-style:normal;background-color:#C2C2;"><a href="companySave.php" style="text-decoration:underline;"><?php if($_SESSION['usr']) echo $_SESSION['usr']; else echo 'no one' ;?></a> currently logged in</div>
<div class="panel panel-default" style="border-radius:0px;margin-top:0px;">
  <div class="panel-heading">
    <h3 class="panel-title" style="color:rgba(218,6,6,0.8);font-weight:bold;padding:0px;margin:0px;" align="center">SEARCH EXPERTS/APPOINTMENTS</h3>
  </div>
  <!--<div class="panel-body" style="background-color:rgba(54,140,204,0.3);color:#386ccc" >-->
   <div class="panel-body" style="background-color:rgba(54,140,204,0.3);color:#386ccc">
  <!-- <div class="panel-body" style="background-color:rgba(8,82,126,0.4);color:#a616c5">-->
    <form id="frmsrch" name="frmsrch" method="get"> 
    <p style="font-size:large;">Postcode Search (Please enter the post code like ( BB1, B1, BB1 4RH )</p>
    &nbsp;<input type="submit" class="btn btn-success" id="srchbut" name="srchbut" value="SEARCH" style="font-weight:bolder" />&nbsp;
    <input type="text" id='pc' name='pc' class="form-control" style="float:left;width:50%" placeholder="<?php if(!empty($_GET['pc'])){ echo $_GET['pc']; }else{ echo "please enter the postcode here i.e WA1 4DH";} ?>"  title="please enter the postcode here i.e WA1 4DH" />
    </form>
  
  </div>
</div>
<div align='center' style="width:100%;">

<?php

$timeinters = (60 * 60);

if($_GET['appointments']){

			$timing = ($stateresprnt['clinic_date']);
			
			//echo $slotsperhourres['exp_AppHours'];
			
			// can not show more than 4 per hour.. but if 6 can force double booking.
			// check if appointment have been doubled up.
			
			switch($slotsperhourres['exp_AppHours']) {
			   case '2':
			     	$timeinters = (60 * 30)	;
			   		break;
			   case '3':
			   		$timeinters = (60*20);
					break;
			   case '4':
			        $timeinters = (60 * 15);
			   		break;
			   case '6':
			   		$timeinters = (60 * 15);
					break;
			}
			echo "<div style='width:70%;'>";
			echo "<h4 style='text-align:right;color:rgba(218,6,6,0.8);'>".$slotsperhourres['exp_name']."<br/>".$stateresprnt['clinic_id']." On  ".date('d-m-Y',$stateresprnt['clinic_date'])."</h4>";
			echo "</div>";

		echo '<div style="border-radius:6px;width:70%;padding:4px;box-shadow:2px 5px 8px #CCC;">';
					//echo '<div style="width:80%;">';
            
			
			// group array counting
			
			$appvalue = array_count_values($setAppointments);
			
			
			echo "<table rules='all' width='100%' class='table-hover table-striped' style='color:#386ccc;padding:0px;'>";
			echo "<tr><th colspan = '2' style='padding:5px;text-align:center;' > Available Time Slots </th></tr>";
				
				
			$full = false;	
			$slots = 1;
				
            while($timing <= $stateresprnt['clinic_date2'])
			{
				
				
				 	
			  
				//check array key for no duplicated items
				
			//	if(!in_array($timing,$setAppointments)){	
			
				if($appvalue[$timing] < 1){
				
		  		echo "<tr onclick=\"addClientApp('".$stateresprnt['clinic_id']."','".$stateresprnt['clinic_date']."','".$expert_id."' ,'".$timing."');\" style='cursor:pointer;' ><td style='width:20%;text-align:center;font-size:medium;font-weight:bold;'>".date('g:i A',$timing)."</td><td onClick=\"addClientApp('".$stateresprnt['clinic_id']."','".$stateresprnt['clinic_date']."','".$expert_id."' ,'".$timing."');\" style='text-align:center;cursor:pointer;'>This slot is available click here</td></tr>";
				$slots = $slots + 1;
				
		
				}
				
				$timing = ($timing + $timeinters);
				
			   if($slots > 9 )
			       break;
			   
		   
		
		   
		   }
		   
		      if($slot==1){
				  
				  $diaryDt = "SELECT * FROM clinic_date WHERE clinic_id = '".$_GET['clinic']."' AND clinic_date > ".($_GET['cdate']/1000)." AND expert_id ='".$expert_id."'";
			  	  
				  $diaryRes = mysql_query($diaryDt);
				  
				  
				  echo "<tr><td> Sorry, This Clinic Is Full <td></tr>";
				   while($othDiary = mysql_fetch_array($diaryRes))
				   {
					  
					
					echo "<tr><td style='text-align:center;'> The Next Clinic Date for ".$_GET['clinic']." will be on the : <a href='#' title='date' onclick=\"getAppointment('".$othDiaryDts['clinic_date']."')\" >".date('d-m-Y',$othDiaryDts['clinic_date'])."</a></td></tr>";
					
					  
				   }
				    
				  
				  
				  $full = true;
				  
				  
				  
				  
			  }
		
			 echo "<tr><td style='text-align:center;' colspan='2'>No Appointments found please add your <a href='#' onClick=\"adhocClientApp('".$stateresprnt['clinic_id']."','".$_GET['eid']."')\">instruction here</a> </td></tr>";
		
			echo "</table>";
	
}else{

				echo "<h4 style='text-align:center;color:rgba(218,6,6,0.8);'> Please choose the appointment venue </h4>";

		if($vconnres!=''){
			
 					echo '<div class="alert-info" style="border-radius:6px;width:70%;padding:8px;box-shadow:2px 5px 8px #CCC;">';
					//echo '<div style="width:80%;">';
                   ;
					echo '<table width="90%" class="table-hover" align="center">';
					echo '<tr><th colspan="2"> Location : '.$location.'<br/><br/></th></tr>';	
					echo '<tr>';
                    
					echo '<th align="left" style="width:25%" >Expert</th>';
					echo  '<th align="left" style="width:25%" >Speciality</th>';
					echo '<th align="left" style="width:33%">Venue</th>';
					
                    echo '</tr>';
					
				//while($recs = $vconnres->fetchRow(DB_FETCHMODE_ASSOC))
                while($recs = mysql_fetch_array($vconnres))
                {

					  echo '<tr>';
                      echo '<td align="left">'.$recs['name'].'</td>';
					  echo '<td align="left">'.$recs['type'].'</td>';
					  echo '<td align="left">'.str_replace(',','<br/>',$recs['venue']).'</td>';
					  echo '<td><a href="https://www.google.co.uk/maps/place/'.substr($recs['venue'],(strrpos($recs['venue'],',')+1),strlen($recs['venue'])).'" target="blank" class="btn btn-info" style="padding:0px;padding-left:5px;padding-right:5px;height:28px;" title="map venue">Map</a>&nbsp;&nbsp;';
					  echo '<a href="instructionAdd.php?explocid='.$recs['loc_id'].'" class="btn btn-info" style="padding:0px;padding-left:5px;padding-right:5px;height:28px;" title="request Clinic">Add</a></td>';
					  echo '</tr>';
					
				 }
					
					
				 
				 echo "</table>";
				
			
				 
		}
		
     }
	 
	 
	?>

<script language="javascript">

 function addClientApp(clinic,cdt, eid, ctm){
	 
	var dt = new Date(ctm*1000);
	
	
	if(confirm('do you wish to add a client at '+dt.toTimeString())){
	  document.location="./instructionAdd.php?clinic="+clinic+"&cldt="+cdt+"&cltm="+ctm+"&eid="+eid;
	}
	
 }
 
 function adhocClientApp(clinic, eid){
	 
	document.location="./instructionAdd.php?clinic="+clinic+"&eid="+eid;
	 
 }
 
 
 function getAppointment(cdate){
	
		//get an appointment from the date given		
		document.location="./addAppointment.php?appointments=1&clinic=<?php echo $_GET['clinic']; ?>&cdate="+cdate+"&eid=<?php echo $_GET['eid']; ?>";
	 
 }

</script>
</div>
</body>
</html>