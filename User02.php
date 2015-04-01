<?php


session_start();


include('dcon.php');


$incs = "select * from about where name='".$_GET['nm']."' and org='".$_GET['org']."'";
//echo $incs;
$incsres = mysql_query($incs);
$incsPrint = mysql_fetch_array($incsres);

$incDets = $_GET['nm']."','".$_GET['org'];

?>	


<div style="width:450px;">
<center>
<u>
<?php echo strtoupper($_SESSION['o'])." DETAILS"; ?>	
</u>
</center>
<div align="center" style="float:left;width:200px;">
	<a href='#' onclick="chngdets('user','<?php echo $incDets; ?>')" style='text-decoration:none;'>User Details</a>
</div>

<div align="center" style="float:left;width:200px;">
	<a href='#' onclick="chngdets('finance','<?php echo $incDets; ?>')" style='text-decoration:none;'>User Finance Details</a>
</div>

<iframe id='usrifrm' name='usrifrm' src='./process/updateUser02.php' style='width:450px;height:500px;overflow:hidden;' frameborder='0'></iframe>

</div>

<script type="text/javascript" language="javascript">

	function chngdets(typ,usr,org){
		
		switch(typ){
			
			case 'user':
						document.getElementById('usrifrm').src="./process/updateUser02.php?nm="+usr+"&org="+org;
						break;
			case 'finance':
						document.getElementById('usrifrm').src="./process/updateUserFinanceInfo.php?nm="+usr+"&org="+org;
						break;
						
		}
		
	}

</script>
