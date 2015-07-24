<?php 
session_start();


if($_SESSION['usr']==''){
																	  
  header('Location: index.php');																	  

}


include 'includes/dcon.php';
include 'includes/inc.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML PORTAL</title>
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


$(document).ready(function(){
						   
			
			
			apiaddress = 'http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php';

		    $query = '<?php echo "request=case&cid=".$_GET['cid']; ?>'
						
			$.get(apiaddress+'?'+$query+'&akey=14414',function(data){
									
									
									
									var objson = JSON.parse(data);
									
									
									
									
									userdets = "<tr style='height:35px;font-weight:bold;'><td colspan='2'>Claimant Name</td><td>Accident Date</td></tr>";
                                    userdets = userdets + "<tr style='height:35px'><td colspan='2'>"+objson.users[0].cname+"</td><td>"+objson.users[0].doa+"</td></tr>";
                                    userdets = userdets + "<tr style='height:35px;font-weight:bold;'><td>Agency Ref:</td><td>&nbsp;</td><td>Date Instructed</td></tr>";
                                    userdets = userdets + "<tr style='height:35px'><td>"+objson.users[0].cRef+"</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
                                    userdets = userdets + "<tr style='height:35px;font-weight:bold;'><td>Solicitor Ref:</td><td>&nbsp</td></tr>";
                                    userdets = userdets + "<tr style='height:35px'><td>"+objson.users[0].sRef+"</td><td>&nbsp;</td></tr>";

                                    notes = '';
									
									
									
									$('#claimdet').html("<table width='80%' >"+userdets+"</table>");
									
									for(i =0; i< objson.users[0].notes.length-1;i++){
									
										notes = notes + objson.users[0].notes[i] + "</br>";
									
									}
									
									$('#claimnote').html(notes);
									
									//$('#srchres').html('<table width="80%"><td>'+objson.users[0].cRef+'</td><td>'+objson.users[0].sRef+'</td>');
																										
																								})
		
				
		
						   });
	
			
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

.navbar-nav li {
	
	width:20%;
	text-align:center;

}

.navbar-nav li:hover {

 background-color:#FFF;
 font-weight:bold;
	
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
<body style="overflow:hidden">
<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Portal Dash</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH CASE</a></li>
        <li><a href="#" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >ADD INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:300px;">
        <li style="width:48%"><a href="companySave.php">My Account</a></li>
        <li style="width:40%"><a href="companySave.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
<div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php if($_SESSION['usr']) echo $_SESSION['usr']; else echo 'no one' ;?></a> currently logged in</div>
<div align="center" >
<h3 style="color:rgba(218,6,6,0.8);font-weight:bold;padding:5px;margin:0px;"> CASE NO <span id="cno"><?php echo $_GET['cid']; ?></span></h3>
<div class="alert alert-info" id="srchres" name="srchres" style="width:80%;box-shadow:5px 5px 8px #CCC;" >
  <h3>CLAIMANT DETAILS</h3>
  <div style="width:100%" id="claimdet" name="claimdet">
  
  
  
  
  </div>
  <br/>
  <p><b>CLAIMANT NOTES</b></p>
  <div style="width:88%;border:1px solid #CCC;background-color:#FFF;padding:10px;padding-bottom:30px;border-radius:8px;box-shadow:5px 5px 5px #CCC;" id="claimnote" name="claimnote">
  
  
  </div>
</div>		

</div>
</div>


</body>
</html>

