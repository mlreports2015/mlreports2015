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

mysql_query("delete from prog where id=$id and org='$o'");

//echo file_get_contents('php://input');
//print_r($_POST['prob']);
$arrayProbs=array();
foreach($_POST['prob'] as $problem){
    array_push($arrayProbs,$problem);
}
print_r($arrayProbs);

echo $_POST['tv'].'<br />';

if ($_POST['tv']>-1)
{
$i=0;
	while ($i<($_POST['tv']+1))
	{
	   $probId='';
		$x=$_POST['t'][$i];
echo $x."<br>";
		$y=$_POST['h'][$i];
		if (strcmp($y,'Block')==0)
		{
		
		    for($n =0; $n < count($arrayProbs); $n++){
			   if(strpos($x,$arrayProbs[$n])===false){
			   
			   }else{
			    $probId = $arrayProbs[$n];   
			   } 
			     
			}
	    	
			if(!empty($probId)){	
			$s="insert into prog set id=$id, prob='$probId',prog='$x',org='$o'";
			}else{
			$s="insert into prog set id=$id,prog='$x',org='$o'";
			}
			echo "$s<br>";
			mysql_query($s);
		}
		$i++;
	}
}

if($_POST['finalComms']!=''){

		$finComms = mysql_escape_string(trim($_POST['finComms']));
		$finCommsIns = "insert into final_comms set cid=$id , msg='$finComms', org='$o'";
		echo $finCommsIns;
		mysql_query($finCommsIns);

	
}


rdrctr("Added","../repgen2.php?cid=$id");
// 	echo "<a style='font-size:large;' href='../repgen.php?cid=$id'>Click Here to Continue</a>";
}
?>