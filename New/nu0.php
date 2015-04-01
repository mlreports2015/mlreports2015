<div>
<head>
<title>ML Reports</title>

<script type="text/javascript" language="JavaScript">
function myfunction(o, n)
{
	document.getElementById("onm").style.visibility='hidden';

	document.getElementById("o").innerHTML="<option value='"+o+"' selected='selected'>"+o+"</option>";
	document.getElementById("o").readonly='true';

	document.getElementById("n").value=n;
	document.getElementById("n").readOnly='true';
}
</script>

<script type="text/javascript" language="JavaScript">
function chkr()
{
	var chk=0;

	if (document.getElementById('f').value.length==0)
	{
		document.getElementById('f').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('l').value.length==0)
	{
		document.getElementById('l').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('n').value.length==0)
	{
		document.getElementById('n').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('e').value.length==0)
	{
		document.getElementById('e').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('p').value.length==0)
	{
		document.getElementById('p').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('p1').value.length==0)
	{
		document.getElementById('p1').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('o').value.length==0)
	{
		document.getElementById('o').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('a').value.length==0)
	{
		document.getElementById('a').style.backgroundColor='#F77';
		chk=1;
	}

	if (document.getElementById('p').value!=document.getElementById('p1').value)
	{
		document.getElementById('p').style.backgroundColor='#F77';
		document.getElementById('p1').style.backgroundColor='#F77';
		chk=1;
		alert("Passwords Don't Match");
	}

	if (chk==0)
	{
		document.frm.submit(); 
	}
	else
		alert('Please Fix The High-Lighted Problems!');
}

function vchk()
{
	if (document.getElementById('o').value=='o')
		document.getElementById('onm').style.visibility='visible';
}
</script>

</head>

<body style="background-color:#c7fd9c;" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">

<div align=center>
<img src='templates/title.jpg' width='100%' />
</div>

<div align='center'>
<div style='position:relative; top:-200px; left:0px;'>
<img src='templates/headd.png' />
</div>

<div style='position:relative; top:-400px; left:-5px;'>
<img src='templates/mlr.png' />
</div>


<div style="position:relative; top:-350px; background-color:#870524; width:600px;">

<center style="color:white; font-size:large;">New User</center>

<form name="frm" id="frm" action="nu.php" method="POST" enctype="multipart/form-data">

<table style="color:white;">
<tr>
<td>Organization</td>
<td><select name="o" onclick="vchk();" id="o">

<?php
include "dcon.php";

$s="select * from org where stat='a' order by org";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	echo "<option value='".$r['org']."'>".$r['org']."</option>";
}

?>
<option value="o">New</option>
</select></td>

<td>Login Name</td>
<td><input id='n' type="text" name="n" size="15" /></td>
</tr>
<tr>
<td>Password</td>
<td><input id='p' type="password" name="p" size="15" /></td>

<td>Confirm Password</td>
<td><input id='p1' type="password" name="p1" size="15" /></td>
</tr>
<tr>
<td colspan="4" align="center">Title<select name=t><option value=Mr.>Mr.</option><option value=Ms.>Ms.</option><option value=Miss>Miss</option><option value=Mrs>Mrs</option><option value=Dr.>Dr.</option></select></td>
</tr>
<tr>
<td>First Name</td>
<td><input id='f' type="text" name="f" size="15" /></td>
<td>Last Name</td>
<td><input id='l' type="text" name="l" size="15" /></td>
</tr>
<tr>
<td>Email Address</td>
<td><input id='e' type="text" name="e" size="15" /></td>
<td>Signature</td>
<td><input id='' type="file" name="s" size="6" style="width:15px;" /></td>
</tr>
<tr>
<td valign="middle" colspan="4" align="center">About Me<textarea id="a" name="a" cols="20" rows="5"></textarea></td>
<tr>
<td colspan="4" align="center"><input style="color:white; background-color:#870524;" onclick="chkr();" type="button" value="Submit" /></td>
</tr>
<tr>
<td><a href=index.html style="color:white;">Login Page</a></td>
<td align="center"><a href=fp.html style="color:white;">Forgotten Password</a></td>
</tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
</table>

</form>

</div>

</div>

<div align="center" id='onm' style="background-image:url('templates/aks2.png');position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; visibility:hidden;">
<div align="right">
<div onclick="document.getElementById('onm').style.visibility='hidden';" style="cursor : pointer; height : 50px; width : 50px;"><img src="templates/close.png" /></div>
</div>
<iframe src="nad.php" width="80%" height="100%" scrolling="no"></iframe>
</div>

</body>

</HTML>