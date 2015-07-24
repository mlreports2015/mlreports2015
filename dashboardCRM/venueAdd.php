<?php

session_start();

include 'includes/dcon.php';
//include 'includes/inc.php';
include 'process/databaseClass.php';

$dbquery = new DatabaseClass();

if($_POST['venName']!=""){

    $dbfields = array("clinic_name","clinic_address1", "clinic_address2", "clinic_city","clinic_pcode","exp_id", "created_on");
    $dbvalues = array($_POST['venName'],$_POST['venAddy'],$_POST['venAddy2'],$_POST['venAddCty'],$_POST['venAddpcde'],$_POST['exp_id'],time());
    $dbtable = "clinic";
    $statement = $dbquery->insertquery($dbfields,$dbvalues,$dbtable);

    $dbresult = $db->query($statement) or die($db->errorno());


}

  $dbtable = "clinic";
  $dbselect = $dbquery->selectALL($dbtable,array("exp_id"=>$_SESSION['org']));
  $dbresults = $db->query($dbselect);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Britannia Medicare Venues</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


</head>
<body style="overflow:hidden;background-image:url(Images/background-test1b.png); background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;">
<style>

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

<script language="javascript">

$(document).ready(function()
{
	
	
$("#venueBut").click(function()
{

    var isFormValid=true;


    $(".required").each(function(){
        if ($.trim($(this).val()).length == 0) {
            //$(this).addClass("highlight");
            isFormValid = false;
            $(this)[0].setAttribute('placeholder', 'required');


        }
        else
        {
            ///$(this).removeClass("highlight");
        }
    });

	if(!isFormValid)
	{
	
		$("#message").html('Errors found in form');
		
	}
	else
	{
		
		$("#frmVenAdd").submit();
	
	}
	
	
});



});

// remove clinic by clinic id
function removecid(cid){


    $.get("http://localhost/dashboardCRM/process/venueRemove.php?cid="+cid , function(data, status){
        alert("Date: "+ data+"\nStatus: " + status);
    });

}


</script>


<!--<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">-->
<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
     <a class="navbar-brand" href="exprtIndex.php" title="MLPortal" style="text-decoration:none;color:#FFF;font-style:italic;font-family:'Times New Roman', Times, serif">Britannia Medicare</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="exprtIndex.php">HOME</a></li>
        <li><a href="process/listGens.php" target="_blank">GEN LISTS</a></li>
        <li><a href="diary.php" >DIARIES</a></li>
        <li><a href="venueAdd.php" >VENUES</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
         <li style="width:48%"><a href="expertSave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#a616c5;"><a href="expertSave.php" ><?php echo $_SESSION['usr'] ;?></a> currently logged in</div>

<div style="width:100%;" align="center">

<div style="width:95%;color;color:#368ccc;" align="center">

<div style="float:left;width:50%">
<h3 style="color:rgba(218,6,6,0.8);"> VENUE LIST  </h3>

 <table width="100%" class="table table-striped" cellpadding="10px" cellspacin="10px" style="color:#a616c5;">
    <tr style="height:30px;">

        <th>NAME</th><th>ADDRESS</th><th>ADDRESS</th><th>POSTCODE</th><th>&nbsp;</th>

    </tr>
    <tbody>
<?php



while($record = $dbresults->fetchRow(DB_FETCHMODE_ASSOC)){

    echo "<tr style='height:30px;'>";
    echo "<td>".$record['clinic_name']."</td><td>".$record['clinic_address1']."</td><td>".$record['clinic_address2']." ".$record['clinic_city']."</td><td>".$record['clinic_pcode']."</td><td><button id='btnremove' name='btnremove' class='btn btn-info' title='remove' onClick=\"removecid('".$record['clinic_id']."');\" ><span class='glyphicon glyphicon-remove-sign'></span></button></a></td>";
    echo "</tr>";


}

?>
</tbody>
</table>




</div>

<div style="float:left;width:45%;margin-left:10px;">

<h3 style="color:rgba(218,6,6,0.8);">VENUE DETAILS</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;">
<span id='message' style="color:#F00;"></span>
<!--<form action="process/companySaveP.php" method="post" name="frm" id="frm">-->
<form action="venueAdd.php" method="POST"  name="frmVenAdd" id="frmVenAdd" style="color:#a616c5;">
<input type="hidden" id="vid" name="vid" value="" />
<input type="hidden" id="exp_id" name="exp_id" value="<?php echo $_SESSION['org']; ?>" />
<table  align="left" width='89%' style="color:#368ccc;">
<TR>
<TD>Venue Name :</TD><TD><INPUT type='text' id="venName" name='venName' value='' class="required form-control" placeholder="clinic name"/></TD>
</TR>

<TR>
<TD>Venue Address 1 :</TD><TD style="padding:5px;"><INPUT type="text" id="venAddy" name="venAddy" class="required form-control" placeholder = "clinic address" ></TD>
</TR>
<TR>
<TD>Venue Address 2 :</TD><TD style="padding:5px;"><INPUT type='text' id="venAddy2" name="venAddy2" value='' class="form-control" /></TD>
</TR>
<TR>
<TD>Venue City :</TD><TD style="padding:5px;"><INPUT type='text' id="venAddCty" name="venAddCty" value'' class="form-control" /></TD>
</TR>
<TR>
<TD>Venue Post Code :</TD><TD style="padding:5px;"><INPUT type='text' id="venAddpcde" name='venAddpcde' value='' class="required form-control"></TD>
</TR>
<TR>
<TD>Venue Tel :</TD><TD style="padding:5px;"><INPUT type='text' id="venTel" name='venTel' value='' class="form-control"></TD>
</TR>
<TD>venue Color:</TD><TD style="padding:5px;"><SELECT id='vencolor' name='vencolor' onChange='updateColor(this.value);'>

												<OPTION value='orange' style='color:orange'>ORANGE</OPTION>
												<OPTION value='yellow' style='color:yellow'>YELLOW</OPTION>
                                                <OPTION value='red' style='color:red'>RED</OPTION>
                                                <OPTION value='purple' style='color:purple'>PURPLE</OPTION>
                                                <OPTION value='green' style='color:green'>GREEN</OPTION>
                                                <OPTION value='lime' style='color:lime'>LIME</OPTION>
                                                <OPTION value='gray' style='color:gray'>GRAY</OPTION>			
                                            
                                            	</SELECT>
</TD>
</TR>
<tr>
<td>&nbsp;</td>
</tr>
<td colspan="2" align="center">
<input type="button" id="venueBut" name="venueBut" value="Add Venue" class="btn btn-info" />
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
<script language="javascript" >

function updateColor(colours){

   $('#vencolor').css('color',colours);
	
}

</script>


</div>

</body>
