<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal Instruction</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<?php 

include 'includes/dcon.php';
include 'includes/inc.php';
	
	
?>
</head>

<body class="ifrm">
<style>
.navbar-nav li {
	
	width:20%;
	text-align:center;

}

.navbar-nav li:hover {

 background-color:#FFF;
 font-weight:bold;
	
}

</style>

<script language="javascript">

$(document).ready(function()
{
	
	
$("#instrctBut").click(function()
{
	if($("#cdob").val()=='' && $("#cdoa").val()=='')
	{
	
		$("#message").html('Errors found in form');
		
	}
	else
	{
		
		$("#frmInst").submit();
	
	}
	
	
});
	
	
	

});


</script>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg); background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;">


<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,255,255,0.5);">
  <div class="container-fluid">
  
    <div class="navbar-header">
     <a class="navbar-brand" href="index2.php" title="MLPortal" style="text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif">ML PORTAL</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH</a></li>
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="#" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:300px;">
         <li style="width:48%"><a href="companySave.php">Account</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>

<div style="width:100%;" align="center">

<div style="width:80%" align="center">

<div style="float:left;width:45%">
<h3> INSTRUCTION  </h3>


</div>

<div style="float:left;width:45%">

<h3>INSTRUCTION DETAILS</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;">
<span id='message' style="color:#F00;"></span>
<form action="process/importP.php"  method="POST" enctype="multipart/form-data" name="frmInst" id="frmInst">
<input type="hidden" id="cid" name="cid" value="" />
<table  align="left" width='89%'>
<TR>
<TD>Claimant Title:</TD><TD style="padding:5px;"><SELECT id="ttl" name="ttl"><OPTION value="">..SELECT..</OPTION><OPTION value="Mr">Mr</OPTION><OPTION value="Mrs">Mrs</OPTION><OPTION value="Miss" >Miss</OPTION><OPTION value="Master">Master</OPTION></SELECT></TD>
</TR>
<TR>
<TD>Claimant Full Name:</TD><TD style="padding:5px;"><INPUT type='text' id="fullName" name='fullName' value='' class="form-control"></TD>
</TR>
<TR>
<TD>Claimant DOB:</TD><TD style="padding:5px;"><INPUT type='text' id="cdob" name='cdob' value='' class="form-control"></TD>
</TR> 
<tr>
<td>Claimant DOA:</td><td style="padding:5px;"><input type="text" id="cdoa" name="cdoa" class="form-control" /></td>
</tr>
<tr>
<TD>Solicitor Ref:</TD><TD style="padding:5px;"><input type="text" name="solref" id="solref" class="form-control" /></TD>
</tr>
<tr>
<TD>Postcode:</TD><TD style="padding:5px;"><input style="width:50%;" type="text" name="cpc" id="cpc" value=''  class="form-control"/></TD>
</tr>
<tr>
<TD>Address Line 1:</TD><TD style="padding:5px;"><INPUT type='text' id="ca1" name='ca1' value="" class="form-control"></TD>
</tr>
<tr>
<TD>Address Line 2:</TD><TD style="padding:5px;"><input type="text" id="cty" name="cty" value="" class="form-control" /></td>
</tr>
<tr>
<TD>Instruction Document:</TD><TD><input type="file" id="file" name="file" />
</tr>
<tr>
<tr>
<td>&nbsp;</td>
</tr>
<td colspan="2" align="center">
<input type="button" id="instrctBut" name="instrctBut" value="Instruct Now" class="btn btn-success" />
</td>
</tr>
</TABLE>
</form>
</div>

</div>

</div>

</div>

<div id="livesearch2" style="float:left; position:absolute; left:300px; top:50px; height:150px; width:100px; background-color:#FFF; visibility:hidden;">
<div id="ls2I" style="overflow:auto; height:110px;"></div>
<div id="ls2B" style="height:40px; padding-top:10px;" align="center"></div>
</div>
<div id="lsclose">
</div>

<!--<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>-->
<script language="javascript" src="scripts/datetimepicker.js" type="text/javascript" ></script>

</form>


</div>
</body>
