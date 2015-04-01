<?php

include 'template.php';

head('Generate Report', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', "<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/summary.js\"></script>", '', '<script language=\'JavaScript\' type=\'text/javascript\'>

function chnge(a)
{
	var b=document.getElementById(a);
	if (b.checked==true)
	{
		var c=document.getElementById(a+\'x\');
		c.value=a;
	}
	else
	{
		var c=document.getElementById(a+\'x\');
		c.value=\'\';
	}
}

function hlp()
{
	document.getElementById(\'hlpp\').style.visibility=\'visible\';
}

function hlpg()
{
	document.getElementById(\'hlpp\').style.visibility=\'hidden\';
}
</script>','');
?>

<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Generate Report', $org, $id);

?>


<select id="op" onChange="fSel();">
	<option value="">...</option>
	<option value="1">Report Format 1</option>
    <option value="2">Report Format 2</option>
    <option value="3">Report Format 3</option>
    <option value="4" title="Title Page in Small Caps">Report Format 4</option>
</select>

<script language="javascript" type="text/javascript">

function fFCfun(col)
{
	document.getElementById('fFC').value='#'+col;
	document.getElementById('fP').style.backgroundColor='#'+col;
}

function fRCfun(col)
{
	document.getElementById('fRC').value='#'+col;
	document.getElementById('rD').style.backgroundColor='#'+col;
}

function fSel()
{
	var a=document.getElementById('op').value;
	
	switch(a)
	{
		case '1':
			window.location='repgen.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>';
			break;
		case '2':
			window.location='repgen1.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>';
			break;
		case '3':
			window.location='repgen2.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>';
			break;
		case '4':
			window.location='repgen3.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>';
			break;
	}
}
</script>

</BODY>

</HTML>