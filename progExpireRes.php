<?php 

include('dcon.php');

$prob=$_GET['prob'];
$cid = $_GET['cid'];


$updateprob = "update eff set stat='resolved' where cid='".$cid."' and prob='".$prob."'";
echo $updateprob;


$selProb = "select msg from eff where cid='".$cid."' and prob ='".$prob."'";
echo $selProb;
$selProbRes = mysql_query($selProb);
$msg = mysql_fetch_row($selProbRes);

$rewrite=substr($msg[0],0,strpos($msg[0],'. '));

  $rewrite.='. This has now resolved';
   echo $rewrite;


$updateprob = "update eff set stat='resolved',msg='".$rewrite."' where cid='".$cid."' and prob='".$prob."'";
echo $updateprob;
mysql_query($updateprob);


$selProg = "select prog from `prog` where id ='".$cid."' and prob ='".$prob."'";
echo $selProg;
$selProgRes = mysql_query($selProg);

if(mysql_num_rows($selProgRes)>=1){
  $delProg = "delete from prog where id ='".$cid."' and prob ='".$prob."'";
  echo $delProg;
   $delRes=mysql_query($delProg);
}

?>
