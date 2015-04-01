<?

session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{

include "../dcon.php";
$o=$_SESSION['o'];

$id=$_POST['id'];

mysql_query("delete from pmh where id=$id and org='$o'");


if ($_POST['pmh']==1)
{
	$p=$_POST['tv'];
	
	$qwr=0;
	
	for ($i=1; $i<=$p;$i++)
	{
		$px=$_POST['t'][$i];
	
		$blk=$_POST['te'][$i];
		
		if (strcmp($blk,"Block")==0)
		{
			$qwr=1;
			echo $i.$p."<br>";
	
			$s="insert into pmh set id=$id,hist='$px',org='$o'";
			mysql_query($s);
		}
	}

	if (isset($_POST['oth']))
	{
		$qwr=1;
		$s="insert into pmh set id=$id,hist='".$_POST['oth']."',org='$o'";
		mysql_query($s);
	}
	
	if ($qwr==0)
	{
		$s="insert into pmh set id=$id,hist='There was no relevant past medical history',org='$o'";
		mysql_query($s);
	}

}
else
{
	$s="insert into pmh set id=$id,hist='There was no relevant past medical history',org='$o'";
	mysql_query($s);
}

rdrctr("PMH Added","../accid.php?cid=$id");
}

?>