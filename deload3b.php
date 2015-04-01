<?php
$o=$_GET['org'];
$n=$_GET['lid'];
$p=$_GET['pwd'];

include '../dcon.php';

$s="select * from login where org='$o' and name='$n' and pwd='$p'";
$q=mysql_query($s);
$rn=mysql_numrows($q);

if ($rn>0)
{
?>



<?php 
 
 //altnative possibily
  /* 
   session_start();
   $org = $_SESSION['o'];
   $id=$_SESSION['id'];
 */
 
 $org=$_GET['org'];
 $id=$_GET['id'];
 
 //$cda1=  date('Y-m-d', strtotime($_GET['dt']));

$maxMLR=$_GET['mlrmax'];

 $sqlNewCases="select * from claimant where cid > ".$maxMLR." and unix_timestamp(cde) between ".(time()-2592000)." and ".time()." and org='".$o."'";
 $NewCases = mysql_query($sqlNewCases);
 $NewCaseNum=mysql_num_rows($NewCases);
 $text="<br/>insert into claimant set ";
 $ijk=1;
 
	 while($rows=mysql_fetch_array($NewCases)){
	 $i=0;
	 
	 
		 while ($i < mysql_num_fields($NewCases)) {
		   $NewCaseFields = mysql_fetch_field($NewCases,$i);
		   if($NewCaseFields->name=='cid'){
                       $text.="mlrId='".$rows[$NewCaseFields->name]."',";
                   }else{
                   $text.=$NewCaseFields->name."='".mysql_real_escape_string($rows[$NewCaseFields->name])."',";
                   }

                   $i++;
		 }
		 $text=substr($text, 0, -2);
		 $text.="' on duplicate key update ";
                 $i=1;
                  while ($i < mysql_num_fields($NewCases))
                   {
		   $NewCaseFields = mysql_fetch_field($NewCases,$i);
                    if($NewCaseFields->name=='cid'){

                   }else{
		   $text.=$NewCaseFields->name."='".mysql_real_escape_string($rows[$NewCaseFields->name])."',";
		   
                   }


                   $i++;
		 }
		$text=substr($text, 0, -1);

                //$sAccid="select * from accid where id='".$rows['cid']."'";
                //$qAccid=mysql_query($sAccid);
                //$rAccid=mysql_fetch_array($qAccid);

                //$text.="';<br>insert into accid set id=LAST_INSERT_ID(), accid='".mysql_real_escape_string($rAccid['accid'])."', org='thornton';";

                if ($ijk<$NewCaseNum)
                {
                    $text.=";<br> insert into claimant set ";
                }

                $ijk=$ijk+1;
	 }
         echo $text;
}
else
{
//nli == Not Logged In
    echo 'nli';
}
?>
