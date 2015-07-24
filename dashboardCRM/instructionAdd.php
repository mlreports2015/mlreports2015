<?php

session_start();

if(!session_id()){

  exit();

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Britannia Medicare Instruction</title><head>

<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<?php 

//include 'includes/dcon2.php';
include 'includes/inc.php';
/*
if($_GET['explocid']){
  
 // $location = $_GET['loc'];
 // $expert = $_GET['exp'];

    $id = $_GET['explocid'];

  $venue = "select loc_id, name, `type`, venue from experlocations where loc_id='$id'";
  
  $venueRes = $db->query($venue);
  
  $venueVerify = $venueRes->fetchRow(DB_FETCHMODE_ASSOC);
	
}
*/





if(isset($_GET['clinic'])){
 
 	include 'includes/dcon.php';
	//$clinicste="SELECT clinic_name, clinic_id , exp_id FROM clinic WHERE clinic_name LIKE '%".$_GET['clinic']."%' AND exp_id = 7";
	
	$organisation = "SELECT org_name , org_address1 , org_address2 FROM organisation WHERE org_id = '".$_SESSION['org']."'";

	$organisationres = mysql_fetch_array(mysql_query($organisation));
	
	
	$clinicste = "SELECT diary_id, clinic_id, expert_id, clinic_date FROM clinic_date WHERE clinic_id LIKE '%".$_GET['clinic']."' AND clinic_date = '".$_GET['cldt']."'"; 
	

	
	$clinics = mysql_fetch_array(mysql_query($clinicste));
	

	
	$expert = "SELECT exp_id, exp_name FROM expert where exp_id ='".$_GET['eid']."'";

	$expertres = mysql_fetch_array(mysql_query($expert));
	
	

	
}


?>
</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg); background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;">
<style>

table tr>td {

    height: 40px;

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

<script language="javascript">

$(document).ready(function()
{
	
	
$("#instrctBut").click(function()
  {
    var isFormValid=true;


    $(".required").each(function(){
        if ($.trim($(this).val()).length == 0)
        {
            //$(this).addClass("highlight");
            isFormValid = false;
            $(this)[0].setAttribute('placeholder', 'required');


        }
        else
        {
            ///$(this).removeClass("highlight");
        }
    });


    var dtPattern =new RegExp(/\d{2}.\d{2}.\d{4}/);


    if(dtPattern.test($('#cdob').val())==false){

        isFormValid = false;

    }

    if(dtPattern.test($('#cdoa').val())==false){

        isFormValid = false;

    }




	if(isFormValid==false)
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


 <div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;"> 
<!-- <div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">-->
  <div class="container-fluid">
  
    <div class="navbar-header">
     
      <a class="navbar-brand" href="index2.php" title="Britannia" style="margin-top:-10px;text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif"><img src="Images/britanniamedico.png" /></a>
    </div>
    
    <div>
      <div style="float:left;color:#FFF;font-family:Verdana, Geneva, sans-serif;font-style:italic;"><br/>Britannia Medicare</div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="index2.php">HOME</a></li>
       <!-- <li><a href="search2.php" >SEARCH</a></li>-->
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="#" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
         <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#c2c2;"><a href="companySave.php" style="text-decoration:underline;"><?php echo $_SESSION['usr'] ;?></a> currently logged in</div>

<div id="maincont" name="maincont" style="width:100%;height:580px;overflow:scroll;color:#a616c5" align="center">

<div style="width:80%;color;color:#368ccc; align="center">

<div style="float:left;width:30%">
<h3> INSTRUCTION  </h3>

<p style='text-align:left;font-weight:bold'>
Thank you for instructing our selves at ML Appointments.  Please
fill in the required fields on the right.  
<br><br>Once completed you will receive a message confirming 
your booking and your booking will appear on your homepage.
<br>
<br>
If you have any problems or queries on your appointments or
have any problems using our booking system. <br> please contact us on <a href='mailto:info@mldoctors.com'>info@mldoctors.com</a>
</p>

</div>

<div style="float:left;width:60%">

<h3>INSTRUCTION DETAILS</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;">
<span id='message' style="color:#F00;"></span>
<!--<form action="process/companySaveP.php" method="post" name="frm" id="frm">-->
<!--<form action="process/importP.php" method="POST" enctype="multipart/form-data" name='frmInst' id='frmInst'>-->
<form action="process/instructionAddP.php" method="POST" enctype="multipart/form-data" name='frmInst' id='frmInst'>
<input type="hidden" id="cid" name="cid" value="" />

<table  align="left" width='89%' style="color:#3648cc;">

<!--<table align="left" width='89%' style="color:#a616c5" >-->
<TR>
<TD>Claimant Title</TD><TD style="padding:5px;"><SELECT id="ttl" name="ttl" class="form-control"><OPTION value="">..SELECT..</OPTION><OPTION value="Mr">Mr</OPTION><OPTION value="Mrs">Mrs</OPTION><OPTION value="Miss" >Miss</OPTION><OPTION value="Master">Master</OPTION></SELECT></TD>
</TR>
<TR>
<TD>Claimant Forename</TD><TD style="padding:5px;"><INPUT type='text' id="fName" name='fName' value='' class="required form-control"></TD>
</TR>
<TR>
<TD>Claimant Surname</TD><TD style="padding:5px;"><INPUT type='text' id="lName" name='lName' value='' class="required form-control"></TD>
</TR>
<tr>
<TD>Postcode</TD><TD style="padding:5px;"><input style="width:55%;" type="text" name="cpc" id="cpc" class="required form-control" placeholder='postcode with spaces like HU1 3DF'/></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD style="padding:5px;"><INPUT type='text' id="ca1" name='ca1' value="" class="form-control"></TD>
</tr>
<TR>
<TD>Address Line 2</TD><TD style="padding:5px;"><input type="text" id="cty" name="cty" value='' class="form-control" /></td>
</TR>
<TR>
<TD>Claimant DOB (dd-mm-yyyy)</TD><TD style="padding:5px;"><INPUT type='text' id="cdob" name='cdob' value='' class="required form-control" placeholder="format in dd-mm-yyyy" /></TD>
</TR> 
<TR>
<TD>Claimant DOA (dd-mm-yyyy)</TD><TD style="padding:5px;"><input type="text" id="cdoa" name="cdoa" class="required form-control" placeholder="format in dd-mm-yyyy" /></TD>
</TR>
<TR>
<TD>Contact No.</TD><TD style="padding:5px;"><input type="text" id="cTel" name="cTel" class="form-control" /></TD>
</TR>
 <TR>
  <TD>Medco Reference</TD><TD style="padding:5px;"><INPUT type='text' id="medcoRef" name='medcoRef' value='' class="form-control"></TD>
</TR>
<TR>
 <TD>Your Name </TD><TD>Your Reference</TD>
</TR>
<TR>
<TD style="padding:5px;"><INPUT type='text' id="orgNme" name='orgNme' value='<?php echo $organisationres['org_name']; ?>' class="required form-control" readonly='readonly'></TD><TD style="padding:5px;"><INPUT type='text' id="orgRef" name='orgRef' value='' class="required form-control"></TD>
</TR>
<TR>
 <TD>Solicitor Name </TD><TD>Solicictor Reference</TD>
</TR>
<TR>
<TD><INPUT type='text' id="sNme" name='sNme' value='' class="required form-control"></TD><TD style="padding:5px;" ><INPUT type='text' id="sRef" name='sRef' value='' class="required form-control"></TD>
</TR>

<?php if($venueVerify['name']!=''){ ?>
<tr>
<input type="hidden" id="locid" name="locid" value="<?php echo $venueVerify['loc_id']; ?>" />
<td>Expert</td><td style="padding:5px;" ><input type="text" id="xprt" name="xprt" value="<?php echo $venueVerify['name']; ?>" class="form-control" /></td>
</tr>
<tr>
<td>Expert Venue:</td><td style="padding:5px;" ><input type="text" id="venue" name="venue" value="<?php echo $venueVerify['venue']; ?>" class="form-control" /></td>
</tr>
<tr>
<td>Date/Time </td><td> <input type="text" id="vendte" name="vendte" /> / <input type="text" id="ventm" name="ventm" />
</tr>

<?php }

if($clinics['clinic_id']!=''){ ?>
<tr>
<input type="hidden" id="locid" name="locid" value="<?php echo $clinics['diary_id']; ?>" />
<td>Expert</td><td style="padding:5px;" ><input type="text" id="xprt" name="xprt" value="<?php echo $expertres['exp_name']; ?>" class="form-control" />
<input type="hidden" id="eid" name="eid" value="<?php echo $_GET['eid'] ?>" />
</td>
</tr>
<tr>
<td>Expert Venue:</td><td style="padding:5px;" ><input type="text" id="venue" name="venue" value="<?php echo $clinics['clinic_id']; ?>" class="form-control" /></td>
</tr>
<tr>
<td>Date/Time </td><td> <input type="text" id="vendte" name="vendte" size="10" value="<?php echo date('d-m-Y',$_GET['cldt']); ?>"  /> / <input type="text" id="ventm" name="ventm" size="10" value="<?php echo date('H:i:s',$_GET['cltm']); ?>" />
</tr>

<?php } 

if($clinics==''){ ?>
<tr>
<!--<input type="hidden" id="locid" name="locid" value="<?php echo $clinics['diary_id']; ?>" />-->
<td>Expert</td><td style="padding:5px;" ><input type="text" id="xprt" name="xprt" value="<?php echo $expertres['exp_name']; ?>" class="form-control" />
<input type="hidden" id="eid" name="eid" value="<?php echo $_GET['eid'] ?>" />
</td>
</tr>
<tr>
<td>Expert Venue:</td><td style="padding:5px;" ><input type="text" id="venue" name="venue" value="<?php echo $_GET['clinic']; ?>" class="form-control" /></td>
</tr>
<tr>
</tr>

<?php } ?>



<tr>



<TD>Instruction</TD><TD><input type="file" id="file" name="file" accept="application/msword,application/pdf"/>
</tr>
<tr>
<tr>
<td>Other Documentation</td><td><input type="file" id="secfiles[]" name="secfiles[]" accept="application/msword,application/pdf" multiple />
</tr>
<td colspan="2" align="center">
<input type="button" id="instrctBut" name="instrctBut" value="Instruct Now" class="btn btn-info" />
</td>
</tr>
</TABLE>
</form>
</div>

</div>

</div>

</div>



<!--<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>-->
<script language="javascript" src="scripts/datetimepicker.js" type="text/javascript" ></script>
<script type="text/javascript" language="javascript">

</script>

</form>

</div>

</body>
