<?php

session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<?php 

include 'includes/dcon.php';
include 'includes/inc.php';


include 'process/databaseClass.php';	
	
    $dbQueryNum = new DatabaseClass();
    $criteria = array('org_id'=>$_SESSION['org']);
    $tbl = 'organisation'; 
  
  $statement = $dbQueryNum->selectAll($tbl,$criteria);
 // echo $statement;
  
  $selEditRes=mysql_query($statement);
  $selEditPrint = mysql_fetch_array($selEditRes);
  
  //print_r($selEditPrint);

	
?>
</head>

<body style="overflow:hidden;background-image:url(Images/background-texture.jpg); background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;">

<style>
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
    <script language="javascript">

        $(document).ready(function() {


            $("#frmorg").submit(function () {

                var isFormValid=true;

                $(".required").each(function () {
                    if ($.trim($(this).val()).length == 0) {
                        //$(this).addClass("highlight");
                        isFormValid = false;
                        $(this)[0].setAttribute('placeholder', 'required');


                    }
                    else {
                        ///$(this).removeClass("highlight");
                    }
                });

                return isFormValid;

            });

        });


    </script>


<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif">ML Portal</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH</a></li>
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:300px;">
        <li style="width:48%"><a href="companySave.php">My Account</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>


<div style="width:100%" align="center">

<div style="width:90%">

<div style="float:left;width:45%;color:#386ccc;">
<h3> ACCOUNT DETAILS </h3>


</div>

<div style="float:left;width:45%;color:#386ccc;">

<h3>ORGANISATION INFORMATION</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;">
<form action="process/companySaveP.php" method="post" name="frm" id="frm">
<input type="hidden" id="oid" name="oid" value="<?php echo $selEditPrint['org_id']; ?>" />
<table  align="left" width='89%'>
<TR>
<TD style="padding:5px;"><INPUT type='hidden' id="org1" name='orgn1' value='' class="form-control" style="width:100%" ></TD>
</TR>
<TR>
<TD>Organisation Name</TD><TD style="padding:5px;"><INPUT type='text' id="org1" name='orgn1' value='<?php echo $selEditPrint['org_name']; ?>' class="form-control"></TD>
</TR>
<TR>
<TD>Organisation Contact</TD><TD style="padding:5px;"><INPUT type='text' id="cn1" name='cn1' value='<?php echo $selEditPrint['org_contact']; ?>' class="form-control"></TD>
</TR>
<tr>
<TD>Postcode</TD><TD style="padding:5px;"><input style="width:50%;" type="text" name="cpc" id="cpc" value='<?php echo $selEditPrint['org_pcode']; ?>'  class="form-control"/></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD style="padding:5px;"><INPUT type='text' id="ca1" name='ca1' value="<?php echo $selEditPrint['org_address1']; ?>" class="form-control"></TD>
</tr>
<tr>
<TD>Address Line 2</TD><TD style="padding:5px;"><input type="text" id="ca2" name="ca2" value='<?php echo $selEditPrint['org_address2']; ?>' class="form-control" /></td>
</tr>
<tr>
<td>City</td><td style="padding:5px;" ><input type="text" id="cty" name="cty" class="form-control"/></td>
</tr>
<tr>
<td>Email</td><td style="padding:5px;" ><input type="text" id="eml" name="eml" value='<?php echo $selEditPrint['org_email']; ?>' class="form-control" /></td>
</tr>
<tr>
<td>Contact No.</td><td style="padding:5px;" ><input type="text" id="orgtel" name="orgtel" class="form-control" value='<?php echo $selEditPrint['org_telephone']; ?>' /></td>
</tr>
<tr>
<tr>
<td>&nbsp;</td>
</tr>
<td colspan="2" align="center">
<input type="button" onClick="saver();" value="Update" class="btn btn-success" />
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
<script src="gmap2.js" type="text/javascript"></script>
<script src="cas.js" type="text/javascript" language="javascript"></script>
<script src="cas2.js" type="text/javascript" language="javascript"></script>
<script src="casAddress.js" type="text/javascript" language="javascript"></script>
<script language="javascript" src="scripts/datetimepicker.js" type="text/javascript" ></script>
<script type="text/javascript" language="javascript">

function saver()
{
	if (document.getElementById('cpc').value=='')
	{
		alert('Please Enter Post Code');
	}
	else if (document.getElementById('cn1').value=='')
	{
		alert('Please Enter Company Name');
	}
	else if (document.getElementById('cty').value=='')
	{
		alert('Please Enter Company City');
	}
	else
	{
		document.frm.submit();//submitter();
	}
}


function submitter()
{	
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		document.frm.submit();
	}
	else
	{
		setTimeout('submitter()', 750);
	}
}


function addressFind()
{
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		showResult4(document.getElementById('lat').value+','+document.getElementById('long').value);
	}
	else
	{
		setTimeout('addressFind()', 500);
	}
}


function clearest()
{
	document.getElementById('lat').value='';
	document.getElementById('long').value='';
	
	document.getElementById('ca1').value='';
	document.getElementById('cty').value='';
}

</script>

</form>

</div>

</body>
