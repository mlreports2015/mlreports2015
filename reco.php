<?php

session_start();

include "inc.php";

?>

<script type="text/javascript" language="javascript">

</script>



<script type="text/javascript" language="javascript">

function typeF()
{
	var tp=document.getElementById('type').value;
	
	if (tp=='Radiology Review')
	{
		document.getElementById('radi').style.visibility='visible';
		document.getElementById('recs').style.visibility='hidden';
	}
	else if (tp=='')
	{
		document.getElementById('radi').style.visibility='hidden';
		document.getElementById('recs').style.visibility='hidden';
	}
	else
	{
		document.getElementById('recs').style.visibility='visible';
		document.getElementById('radi').style.visibility='hidden';
	}
}


function addR()
{
	document.getElementById('typeH').value=document.getElementById('type').value;
	document.getElementById('type').setAttribute('disabled', true);
	
	var ni = document.getElementById('recsX');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 'R'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('rows',1);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	
	newt.innerHTML = document.getElementById('dt').value+' : '+document.getElementById('ta').value;

	var newbr = document.createElement('br');
	
	ni.appendChild(newt);
	ni.appendChild(newbr);
	
	document.getElementById('dt').value='';
	document.getElementById('ta').value='';
	
	document.getElementById('dt').focus();

}



function addI()
{
	var ni = document.getElementById('recsX');
	var numi = document.getElementById('theValue2');
	var num = (document.getElementById('theValue2').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 'I'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('rows',1);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	
	newt.innerHTML = document.getElementById('ta2').value;

	var newbr = document.createElement('br');
	
	ni.appendChild(newt);
	ni.appendChild(newbr);
	
	document.getElementById('ta2').value='';
	
	document.getElementById('ta2').focus();

}

</script>

<body bgcolor="#ffffff">

<form action="Process/reco.php" method="post">

<?php

if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include 'dcon.php';
	$id=$_GET['cid'];
?>

<input type="hidden" value="<?php echo $id;?>" name="id" />
<table align="center" style="color:#000;">

<tr>
<th colspan="2">Notes Review</th>
</tr>

<tr><td height="25"></td></tr>

<tr>
<td>Type</td>
<td>
<input type="hidden" name="type" id="typeH" />
	<select id="type" onChange="typeF();">
    	<option value="">...</option>
		<option value="GP Records">GP Records</option>
        <option value="Hospital Records">Hospital Records</option>
        <option value="Radiology Review">Radiology Review</option>
    </select>
</td>
</tr>

</table>


<div id="recs" style="visibility:hidden;">
<table align="center" style="color:#000;">

<tr>
<td>Available From : </td>
<td><input type="text" name="afr" id="afr" /></td>
</tr>

<tr>
<td>Available Till : </td>
<td><input type="text" name="ati" id="ati" /></td>
</tr>

<tr>
<td>Notes Related to Index Accident</td>
<td>
	<select name="rel" id="rel">
    	<option value="Notes were related to index accident.">Notes related to Index Accident</option>
        <option value="Other related entries.">Other related entries</option>
                <option value="Notes were not related to index accident">Notes not related to Index Accident</option>
    </select>
</td>
</tr>

<tr>
<td align="center" colspan="2">Findings</td>
</tr>

<input type="hidden" name="theValue" value="0" id="theValue" />

<tr>
<td align="center">Date</td>
<td align="center">Finding</td>
</tr>


<tr>
<td><input type="text" id="dt" /></td>
<td><textarea id="ta" name="ta" rows="3" cols="22"></textarea></td>
</tr>


<tr>
<td colspan="2" align="center"><input type="button" value="Add" onClick="addR();" /></td>
</tr>

</table>

</div>


<div id="radi" style="visibility:hidden; position:relative; top:-220px;">
<table align="center" style="color:#000;">

<tr>
<td>Examined On : </td>
<td><input type="text" name="eon" id="eon" /></td>
</tr>

<tr>
<td>Type of Scan</td>
<td>
	<select name='stype' id="stype">
    	<option value="X-Ray">X-Ray</option>
        <option value="MRI Scan">MRI Scan</option>
        <option value="CT Scan">CT Scan</option>
    </select>
</td>
</tr>


<tr>
<td>Part : </td>
<td>
	<select name="part">
    	<option value="C/Spine">C/Spine</option>
        <option value="T/Spine">T/Spine</option>
        <option value="L/Spine">L/Spine</option>
        <option value="Other">Other</option>
    </select>
</td>
</tr>
<input type='hidden' id="theValue2" name="theValue2" value="0" />
<tr>
<td>Finding</td>
<td><textarea name="ta2" id="ta2" rows="3" cols="22"></textarea></td>
</tr>

<tr>
<td align="center" colspan="2"><input type="button" value="Add" onClick="addI();" /></td>
</tr>

</table>

</div>


<div id="recsX" align="center" style="width:100%;">

</div>


<div style="">

<table align="center">

<tr>
<td align="right"><input type='submit' value="Submit" /></td>
<td align="left"><input type="button" value="Cancel" onClick="javascript: location.reload(); javascript:parent.document.getElementById('reco').style.visibility='hidden';" /></td>
</tr>

</table>
</div>

<?php

}

?>
</form>
</body>