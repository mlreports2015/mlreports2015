<?php
$tvar=$_GET["chk"];
$tval=$_GET["val"];
$tbl=$_GET["tbl"];

include "dcon.php";

if (strlen($tval)==0)
{
	echo "yes";
}
else
{
  $s="select * from $tbl where $tvar='$tval'";
//  echo $s;
  $q=mysql_query($s);
  $r=mysql_num_rows($q);
  
  if($r>0)
  {
	  echo "no";
  }
  else
  {
	  echo "yes";
  }
}
?>