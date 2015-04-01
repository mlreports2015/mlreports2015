<?php
session_start();

if (isset($_SESSION['n'])==1)
{
include 'dcon.php';
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
 
$cda1=  date('Y-m-d', strtotime($_GET['dt']));
//$cda2='2010-10-15';
//$cda3='2010-10-16';
//$cda4='2010-19-17';
//$cda5='2010-10-18';
//$cda6='2010-10-19';
//$cda7='2010-10-20';
//$cda7='2010-10-21';

 $sqlNewCases="select * from claimant where cde='".$cda1."' or cde='".$cda2."' or cde='".$cda3."' or cde='".$cda4."' or cde='".$cda5."' or cde='".$cda6."' or cde='".$cda7."'";
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
                   $text.=$NewCaseFields->name."='".$rows[$NewCaseFields->name]."',";
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
		   $text.=$NewCaseFields->name."='".$rows[$NewCaseFields->name]."',";
		   
                   }


                   $i++;
		 }
		$text=substr($text, 0, -2);

                $sAccid="select * from accid where id='".$rows['cid']."'";
                $qAccid=mysql_query($sAccid);
                $rAccid=mysql_fetch_array($qAccid);

                $text.="';<br>insert into accid set id=LAST_INSERT_ID(), accid='".mysql_real_escape_string($rAccid['accid'])."', org='thornton';";

                if ($ijk<$NewCaseNum)
                {
                    $text.="<br> insert into claimant set ";
                }

                $ijk=$ijk+1;
	 }
         echo $text;
}
//nli == Not Logged In
echo 'nli';
?>
