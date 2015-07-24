<?php 
session_start();


if($_SESSION['usr']==''){
																	  
  header('Location: index.php');																	  

}


include 'includes/dcon.php';
include 'includes/inc.php';

//$_SESSION['id'];

$apptsStatement = "SELECT case_id, client_name, solicitor_ref, agency_ref, `slot-id` as app_id, `slot-time` as app_date, `clinic-id`, clinic_id FROM `case` JOIN `clinic_tmslot` ON `case-id` = case_id JOIN `clinic_date` ON `clinic-id` = diary_id WHERE usr_id ='".$_SESSION['usr_id']."' AND UNIX_TIMESTAMP(created_at) BETWEEN ".(time() - (60*60*24*100))." AND ".(time() + (60*60*24*20))." AND deleted_at = 0 LIMIT 0, 12";

$apptsStatementRes = mysql_query($apptsStatement);


$apptsCancellation = "SELECT count(*) as canceledItems FROM `clinic_tmslot` WHERE deleted_at != 0";
$apptsCancellationRes = mysql_fetch_array(mysql_query($apptsCancellation));




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML Appointments Dash </title>
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

    var more = 0;

    $("#moreapps").click(function() {
        $("#latest").toggle();
        $("#recentcse").toggle();
        var textbdy = "";

        if($("#latest").is(":hidden")) {

            more = 1;
            textbdy = " <div style='background-color:rgba(255,0,0,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px'><b>TOP 20 APPOINTMENTS</b></div>";

        }else{

             more = 0;
             textbdy = " <div style='background-color:rgba(255,0,0,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px'><b>TOP 10 APPOINTMENTS</b></div>";
        }

            $.get("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestapps&akey=14414&solic=1&more="+more, function(data, status) {

        var json = jQuery.parseJSON(data);

            textbdy = textbdy + "<table width='95%' cellspacing='5px' cellpadding='5px'>";
            textbdy = textbdy + "<tr><th>Agency Ref</th><th>Solicitor Ref</th><th>Date</th></tr>";

            $.each(json.appointment,function(key, value){

                var appdate = new Date(value.app_date * 1000);

                textbdy = textbdy + "<tr><td>"+value.cRef+"</td><td>"+value.sRef+"</td><td>"+appdate.toDateString()+"</td><td>"+value.app_venue+"</td></tr>";

            });

            textbdy = textbdy + "</table>";

            $("#recentapps").html(textbdy);


        });
			
			
		

    });

	
	$('#dt1').keyup(function(event) {

		if(event.which=='13'){
			
			alert('enter pressed - extra appointment data will follow');
		
		}

	});
	
	$('#srchbutt').click(function(){
	
		$("#apptble").html("");
		getAppointments($("#dt1").val());
								  
	});



	function getAppointments(dtes){
		
		$.get( "./process/appointments.php?cdate="+dtes, function( data ) {
				//alert(data);
				json = jQuery.parseJSON(data);
				$("#apptble").parent().height("100%");
				//alert($("#apptble").parent().height());
				
					$("#apptble").append("<tr style='color:#a616c5;height:40px;text-align:center;'><th>Client Name</th><th>Agency Ref.<th>Solicitor Ref.</th><th>Appointment Date</th><th>Venue</th><th>Status</th><th>Remove</th></tr>");
				
				for(var i = 0 ; i < json.length; i++){
				
					
					if(json[i].attended_at!=null){
					   
						    $("#apptble").append("<tr style='height:40px'><td>"+json[i].client_name+"</td><td>"+json[i].agency_ref+"</td><td>"+json[i].solicitor_ref+"</td><td>"+json[i].app_time+"</td><td>"+json[i].clinic_id+"</td><td>attended</td></tr>");
					
					}else{
						
							$("#apptble").append("<tr style='height:40px'><td>"+json[i].client_name+"</td><td>"+json[i].agency_ref+"</td><td>"+json[i].solicitor_ref+"</td><td>"+json[i].app_time+"</td><td>"+json[i].clinic_id+"</td><td>&nbsp;</td><td style='text-align:center;'><button class='btn btn-warning' onclick='removeAppt("+json[i].app_id+")' title='Remove Now' ><span class='glyphicon glyphicon-remove-sign'></span></button></td>");
					
						
					}
						
						
					
					
					
				}

			});

		}
		
		
		getAppointments('');

});

function removeAppt(appid){
// check if delete is what is request than delete slot.

   if(confirm("Do you wish to cancel/remove this appointment")){
	
     $.get("./process/apptRemove.php?appt_id="+appid , function(data, status){
      $//.get("http://mlhelpline.com/process/apptRemove.php?appt_id="+appid , function(data, status){
        alert("data:" + data + "Status: " + status);
        location.reload();
      });
	
  }

}


function showclinic(event, clinicid){

	offset2 = event.target.offsetParent.offsetTop;
	 
	offset1 = $('#recentapps').offset().top;
	 
	$('#divclinic').css('top',(offset2+offset1));
	$('#divclinic').css('left','500px');
	
	$('#divclinic').show();
	
	document.getElementById('clinicsrc').src="clinicName.php?clinicid="+clinicid
	
	
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
	
	width:98%;
	margin-left:5px;
	
}


@media screen and ( max-width:1100px ){
	
	#recentcse{
	
		width:90%;
		float:left;
	
	}
	
	#recentapps{
	
		width:100%;
		float:left;
	
	}

	

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
<body style="overflow:scrolls;background-image:url(Images/background-texture.jpg);background-size:cover;height:1500px;">

<div style="background-color:rgba(255,255,255,0.8);height:1500px;color:#368ccc;">

<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
<!-- <div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">-->
  <div class="container-fluid">
  
    <div class="navbar-header" >
   
     <a class="navbar-brand" href="index2.php" title="Britannia" style="margin-top:-10px;text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif"><!--<img src="Images/britanniamedico.png" />--></a>
 
    </div>
    <div>
      <div style="float:left;color:#FFF;font-family:Verdana, Geneva, sans-serif;font-style:italic;"><br/>ML Appointments</div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="index2.php">HOME</a></li>
        <!--<li><a href="search2.php" >SEARCH</a></li>-->
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="appointments.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%">
        <li style="width:44%"><a href="companySave.php" title="<?php echo $_SESSION['usr']; ?> ">Accounts</a></li>
        <li style="width:40%"><a href="logout.php" title="<?php echo $_SESSION['usr']." log out"; ?>">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:20px;font-style:italic;background-color:#C2C2;"><a href="companySave.php" style="text-decoration:underline;font-weight:bold;font-style:normal;"><?php echo $_SESSION['usr'] ;?></a> currently logged in</div>

    <div style="width:100%;padding:18px;padding-top:0px;padding-bottom:0px;" align="center">
  
  
  <div style="width:100%;padding:8px;margin-top:3%;">
   
    <div style="width:100%;height:110px;">

        <?php //$file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=stats&akey=14414&solic=".$_SESSION['solic']);


        //$jsndecde=json_decode($file);



        ?>
		<!-- appointments / case stats information -->

  
     <div class="label label-info" style="float:left;background-color:rgba(54,140,204,0.7);width:30%;color:#FFF;border-radius:7px;margin-left:6px;">
        <h2>Cancellation: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;background-color:rgba(166,22,200,0.5);" ><?php echo $apptsCancellationRes['canceledItems']; ?></span></h2>
    </div>
    <div class="label label-info" style="float:left;background-color:rgba(54,140,204,0.7);width:30%;color:#FFF;border-radius:7px;margin-left:6px;">
        <h2>Appointments: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;background-color:rgba(166,22,200,0.5);" ><?php echo mysql_num_rows($apptsStatementRes); ?></span></h2>
    </div>
    <div class="label label-info" style="float:left;background-color:rgba(54,140,204,0.7);width:35%;color:#FFF;border-radius:7px;margin-left:6px;">
            <h2>Attended: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;background-color:rgba(166,22,200,0.5);">0</span></h2>
    </div>


    </div>

     
	</div>


</div>



<!--<div style="background-color:rgba(255,255,255,0.8);height:100%;color:#368ccc">-->
<div style="width:100%;padding:20px;" align="left">


	


    <div style="width:100%;height:100%;background-color:#FFF;border:inset 1px #CCC;padding:0px;border-radius:7px;" align="center">
   


    
     <div style="width:100%;text-align:center;font-size:24px;padding-top:10px;">10 LATEST APPOINTMENTS <span id="moreapps" name="moreapps" title="more" style="cursor: pointer">+</span></div>
	
<div class="alert alert-info" id="recentapps" name="recentapps" style="padding:0px;margin:0px;border:none;" >
   <!-- <div style="background-color:rgba(166,22,200,0.5);;color:#FFF;width:100%;border:1px solid #CCCCCC;height:45px;padding-top:2px;font-size:large;"><b>TOP 20 LATEST APPOINTMENTS</b></div> -->
<table width="110%" class='table table-striped' >
<tr style="color:#a616c5;"><th>Client Name</th><th>Agency Ref.<th>Solicitor Ref.</th><th>Appointment Date</th><th>Venue</th><th>Remove</th></tr>
<?php // $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestapps&akey=14414&solic=".$_SESSION['solic']);
  // $jsndecde2=json_decode($file);
   			
		
       
	//var_dump($jsndecde2);
	  
    // if($jsndecde2->success){
	   
	  // var_dump($jsndecde2->appointment[0]);
	   
	   while($apptrecs = mysql_fetch_array($apptsStatementRes)){
	   //foreach($jsndecde2->appointment as $value){
			
			echo "<tr style='height:30px;font-family:serif;color:#000;'>";
			echo "<td>".$apptrecs['client_name']."</td>";
			echo "<td>".$apptrecs['agency_ref']."</td>";
			echo "<td>".$apptrecs['solicitor_ref']."</td>";
			echo "<td>".date('d-m-Y @ H:i',$apptrecs['app_date'])."</td>";
			echo "<td><a href='#' onclick=\"showclinic(event, '".$apptrecs['clinic_id']."')\" >".$apptrecs['clinic_id']."</a></td>";
			echo "<td><a href='#' title='remove now' onclick='removeAppt(".$apptrecs['app_id'].")' ><button class='btn btn-warning' ><span class='glyphicon glyphicon-remove-sign'></span></button></td>";
			echo "</tr>";
			
	   }
	   
   //}else{
	
	//echo "nothing found";
	
    //}
   
   
   
?>
</table>
</div>

</div>

<div style="float:left;margin-top:5%;width:100%;height:100%;padding:5px;padding-bottom:10px;" align="center">
    


<div style="width:100%;text-align:center;font-size:26px;padding-top:10px;">TODAYS APPOINTMENTS <!-- <span style="float:right;width:280px;">Dated &nbsp;<input type="button" id="srchbutt" name="srchbutt" value="GO" style="float:right;height:28px;font-weight:bold" class="btn btn-info" title="GO" /><input type="text" id="dt1" name="dt1" style="width:180px;height:28px;font-size:small;border-radius:6px;float:right;" class="form-control" placeholder='dd-mm-yyyy' /></span> --> </div>

  <div class="alert alert-info" id="recentapps" name="recentapps" style="padding:0px;margin:0px;border:none;height:100%;padding-bottom:14px;;border-radius:8px" >
    <div style="background-color:rgba(54,140,204,0.7);color:#FFF;width:100%;border:1px solid #CCCCCC;height:40px;padding-top:5px;border-radius:8px 8px 0px 0px; "><b></b><span class='input-group' style="width:30%;float:right;"><input type="text" id="dt1" name="dt1" class="form-control" placeholder='dd-mm-yyyy' /> <span class="input-group-btn"><button id="srchbutt" name="srchbutt" class="btn btn-success" >SEARCH </button></span></span></div>
		<table id="apptble" name="apptble" width="100%" cellspacing='5px' cellpadding='5px' class='table table-striped'>
		

		</table>
  </div>


</div>





</div>


</div>
<div name="divclinic" id="divclinic" style="position:absolute;top:5px;background-color:#FFF;border:solid 1px #999;border-radius:6px;height:280px;width:360px;display:none;">
<iframe id="clinicsrc" name="clinicsrc" style="width:96%;height:98%" src="clinicName.php"  frameborder='0'/>

</div>


</body>
</html>

