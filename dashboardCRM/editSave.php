<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<?php 

include 'includes/dcon.php';
include 'includes/inc.php';
include 'process/DatabaseClass.php';

$dbQueryNum = new DatabaseClass();
$tbl='order';
if($_GET['ordids']){
   $orderNums = explode(",",$_GET['ordids']);
   $critera =array('order_id'=>$orderNums[0]);

  $statement = $dbQueryNum->selectAll($tbl,$critera);
  //echo $statement;
  $selEditRes=mysql_query($statement);
  $selEditPrint = mysql_fetch_array($selEditRes);

    	
}
	
?>
</head>

<body class="ifrm">
<br/>
<div align="center" style="font-weight:bold; font-size:14px;font-family:Arial, Helvetica, sans-serif;">edit Order</div>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;">
<form action="process/editSaveP.php" method="post" name="ordfrm" id="ordfrm">
<input type="hidden" id="ordnums" name="ordnums" value='<?php echo $_GET['ordids'];?>'/>
<input type="hidden" id="ordId" name="ordId" value="<?php echo $orderNums[0]; ?>" />
<table  align="left">
<TR>
<TD>Deal Name</TD><TD><INPUT type='text' id="dn1" name='dn1' value=''/></TD>
</TR>
<TR>
<TD>Deal ID</TD><TD><INPUT type="text" id="dlID" name="dlID" value="<?php echo $selEditPrint['deal_id']; ?>" /></TD>
</TR>
<tr>
<TD>Voucher</TD><TD><input style="width:90px;" type="text" name="vouchcd" id="vouchcd" value='<?php echo $selEditPrint['vouch_Code']; ?>' /></TD>
</tr>
<tr>
<TD>Product</TD><TD><input type="text" id="prodNme" name="prodNme" value="<?php echo $selEditPrint['prod_name']; ?>" /></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' id="cont" name='cont' value="" /></TD>
</tr>
<tr>
<TD>City</TD><TD><input type="text" id="cty" name="cty" value='' /></td>
</tr>
<tr>
<td>Post Code<td><td><input type="text" id="pcode" name="pcode" value="" /></td>
</tr>
<tr>
<TD>Price/Cost</TD><TD><INPUT type='text' id="prce" name="prce" value="<?php echo $selEditPrint['order_price']; ?>" /></TD>
</tr>
<tr>
<TD>Postage</TD><TD><INPUT type='text' id="pstge" name='pstge' value="<?php echo $selEditPrint['order_post']; ?>" /></TD>
</tr>
<tr>
<td>Courier</td>
<td><select id='cour' name='cour'>
	<option value=''>--select courier--</option>
	<option value='1'>Royal Mail</option>
	<option value='2'>Parcel Force</option>
    <option value='3'>DPD</option>
</select>
</td>
<tr>
<td>tracking no.</td><td><input type='text' id='trackID' name='trackID' /></td>
</tr>
<tr>
<td>Date</td><td> <input type="text" id="ordDt" name="ordDt" /><a href="javascript:NewCal('ordDt','ddmmmyyyy')" ><img src="Images/cal.gif" title="calendar" /></a></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="button" onClick="saver();" value="Update Now" />
</td>
</tr>
</TABLE>
</form>
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

	$dtFormat = /\d{2}-\d{2}-\d{4}/;
	
	if (document.getElementById('dn1').value=='')
	{
		alert('Please Enter A Deal Name');
	}
	else if (document.getElementById('dlID').value=='')
	{
		alert('Please Enter Deal ID');
	}
	else if (document.getElementById('prodNme').value=='')
	{
		alert('Please Enter Product Name');
	}
	else if (document.getElementById('ordDt').value=='')
	{
		alert('Please Enter Order Date');
	
	}
	else if(!$dtFormat.test(document.getElementById('ordDt').value))
	{
	
		alert("Incorrect Date Format, Please enter the date as dd-mm-yyyy");
													
    }
	else
	{
		document.ordfrm.submit();//submitter();
	}
	
}


function submitter()
{	
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		document.ordfrm.submit();
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


</body>
