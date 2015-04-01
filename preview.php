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

<input type="button" value="Generate Report" onclick="window.location='repgen2.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>';"  style="border-radius:6px;height:30px;border:none;"/>


<div style="width:100%;height:70px;font-family:Verdana, Geneva, sans-serif;" align="center">

	<h2> REVIEW REPORT </h2>
   Preview and edit your report
   
</div>
<center>
<iframe style="padding:10px;width:80%;height:650px;" align="center" frameborder=0 src="./process/previewTest.php?section=1&cid=<? echo $id; ?>"></iframe>
</center>

</body>
</html>