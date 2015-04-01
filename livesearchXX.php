<style type="text/css">
a:link {
	color: #000000;
}

a:visited {
  color: #000000;
}

a:hover {
	text-decoration: none;
	color:#A61515;
}

a:active {
	color: #000000;
}
</style>

<?php

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q) > 0)
{
$hint="";

include 'dcon.php';
	  
	  $s="select * from claimant where cfn like '$q%' and org='".$_SESSION['o']."' or cln like '$q%' and org='".$_SESSION['o']."' or cageref like '$q%' and org='".$_SESSION['o']."' or csolref like '$q%' || concat(cfn, ' ', cln) like '$q%' and org='".$_SESSION['o']."'";
	  $que=mysql_query($s);
	  $numRow=mysql_num_rows($que);

  if ($numRow>0)
    {
    //find a link matching the search text
	$hint="<table width='100%'><tr><th>Claimant Name</th><th>Solicitor Ref.</th><th>Agent Ref.</th></tr>";
	while ($r=mysql_fetch_array($que))
	{
      if ($hint=="")
        {
        $hint="<tr><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['cfn'].' '.$r['cln'] . "</a></td><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['csolref']."</td><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['cageref']."</td></tr>";
        }
      else
        {
        $hint=$hint . "<tr><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['cfn'].' '.$r['cln'] . "</a></td><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['csolref']."</td><td><a style='color:#000;' href='detNewer.php?cid=".$r['cid'].
        "'>" .$r['cageref']."</td></tr>";
        }
      }
	  $hint=$hint . '</table>';
    }
	
	$s="select * from claimant where cln like '$q'";
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?> 