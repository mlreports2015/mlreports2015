<?php 
session_start();


if($_SESSION['usr']==''){
																	  
  header('Location: index.php');																	  

}


include 'includes/dcon.php';
include 'includes/inc.php';

//$_SESSION['id'];



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
						   
	
			
	$("#srchbut").click(function(){
								 
		    var query = $('#squery').val();

								 
			$.get('http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=find&q='+query+'&akey=14414',function(data){
									
									var objson = JSON.parse(data);
									
									if(objson.success==1){
									   
									objcount = objson.users.length;
							
									var users = ''
									
									for(i = 0 ;i < objcount ; i ++){
										
									  users=users + '<tr><td><a href="indexedcase.php?cid='+objson.users[i].caseID+'">'+objson.users[i].name+'</td><td>'+objson.users[i].cRef+'</td><td>'+objson.users[i].sRef+'</td></tr>';
										
										
									}
							
									$('#srchres').html('<table width="80%"><tr><th>Names</th><th>MOR Reference</th><th>Solicitor Reference</th></tr>'+users);
									//$('#srchres').html('<table width="80%"><td>'+objson.users[0].cRef+'</td><td>'+objson.users[0].sRef+'</td>');
									}else{
									
									$('#srchres').html('<p>no results</p>');
										
									}
										
										
										
																								})
		});
				
		
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
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg); background-size:cover;">
<div style="background-color:rgba(255,255,255,0.7);width:100%;height:1200px;">
<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
     <a class="navbar-brand" href="index2.php" title="MLPortal" style="text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif">ML PORTAL</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH</a></li>
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
          <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php if($_SESSION['usr']) echo $_SESSION['usr']; else echo 'no one' ;?></a> currently logged in</div>
<div class="panel panel-default" style="border-radius:0px;margin-top:0px;">
  <div class="panel-heading">
    <h3 style="color:rgba(218,6,6,0.8);font-weight:bold;padding:0px;margin:0px;" align="center">SEARCH CASE</h3>
  </div>
  <div class="panel-body" style="background-color:rgba(54,140,204,0.3);color:#386ccc">
    
    <p>Quick Search</p>
    &nbsp;<input type="button" class="btn btn-default" id="srchbut" name="srchbut" value="SEARCH" />&nbsp;
    <input type="text" id='squery' name='squery' class="form-control" style="float:left;width:50%"  />
    
     <a data-toggle="collapse" data-target="#collapseA" class="collapsed" style="cursor:pointer;">
          Advanced
      </a>
  </div>
  <div id="collapseA" class="panel-collapse collapse">
  <div class="panel-body" >
    
    <div style="float:left;width:48%">&nbsp;&nbsp;Client First Name<input type="text" id="name1" name="name1" class="form-control"  /></div>
    <div style="float:left;width:42%">&nbsp;&nbsp;Client Surname<input type="text" id="surname" name="surname" class="form-control" /> </div>
  
    <div style="float:left;width:25%;"> Client DOA <input type="text" id="doa" name="doa" class="form-control"  /></div>
    <div style="float:left;width:25%;"> Client DOB <input type="text" id="dob" name="dob" class="form-control"  /></div>
    
    
  </div>
  </div>


</div>

<div align="center" >
<h3 style="color:#386ccc;font-weight:bold;">SEARCH RESULTS</h3>
<div class="alert alert-info" id="srchres" name="srchres" style="width:80%;box-shadow:5px 5px 8px #CCC;" >

		<p> No Results </p>

</div>
</div>



</div>
</body>
</html>

