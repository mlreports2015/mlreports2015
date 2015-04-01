<?php
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
 
$cda1='2010-10-08';
/*
$cda2='2010-09-18';
$cda3='2010-09-19';
$cda4='2010-09-20';
$cda5='2010-09-21';
$cda6='2010-09-22';
$cda7='2010-09-23';
*/
 $sqlNewCases="select * from claimant where cde='".$cda1."' or cde='".$cda2."' or cde='".$cda3."' or cde='".$cda4."' or cde='".$cda5."' or cde='".$cda6."' or cde='".$cda7."'";
 echo $sqlNewCases;
 $NewCases = mysql_query($sqlNewCases);
 $text="<br/>insert into claimant set ";
 
	 while($rows=mysql_fetch_array($NewCases)){
	 $i=0;
	 
	 
		 while ($i < mysql_num_fields($NewCases)) {
		   $NewCaseFields = mysql_fetch_field($NewCases,$i);
		   if($NewCaseFields->name=='cid'){
                       
                       
                   }else{
                   $text.=$NewCaseFields->name."='".$rows[$NewCaseFields->name]."',";
                   }

                   $i++;
		 }
		 $text=substr($text, 0, -2);
		 $text.="' on duplicate key update ";
                 $i=1;
                  while ($i < mysql_num_fields($NewCases)) {
		   $NewCaseFields = mysql_fetch_field($NewCases,$i);
                    if($NewCaseFields->name=='cid'){

                   }else{
		   $text.=$NewCaseFields->name."='".$rows[$NewCaseFields->name]."',";
		   
                   }
                   $i++;
		 }
		$text=substr($text, 0, -2);

                $sAccid="select * from accid where id='".$NewCaseFields->name=='cid'."'";
                $qAccid=mysql_query($sAccid);
                $rAccid=mysql_fetch_array($qAccid);

                $text.=";<br>insert into accid set id='LAST_INSERT_ID()', accid='".$rAccid['accid']."', org='thornton'";
		$text.="';<br> insert into claimant set ";
		
	
		
	 }
    
	echo $text;
?>

