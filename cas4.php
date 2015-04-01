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

function pCoder($pc)
{
	$pC=str_replace(" ", "", $pc);
	
	return $pC;
}

function latlong($arg)
{
	$ltlg=explode(',', $arg);
	
	return array('Lat'=>$ltlg[0], 'Lng'=>$ltlg[1]);
}

function calcDistance2($ds1, $ds2) 
{
	$dst1 = latlong($ds1);
	$dst2 = latlong($ds2);
	
    $kms = rad2deg(acos(sin(deg2rad($dst1['Lat'])) * sin(deg2rad($dst2['Lat'])) +   
        cos(deg2rad($dst1['Lat'])) * cos(deg2rad($dst2['Lat'])) *  
        cos(deg2rad($dst1['Lng'] - $dst2['Lng'])))) * 60 * 1.1515 * 1.609344;  

    return ($kms/1.61);
}


//calcDistance('r3g3j6', 'r0c3e0') . ' kms'; // prints 37.... kms 


//get the q parameter from URL
$q=$_GET["q"];


//lookup all links from the xml file if length of q>0
if (strlen($q) > 0)
{
$hint="";

include 'dcon.php';
	  
	  $s="select * from solicitor where sn like '$q%' group by sn";
	  $que=mysql_query($s);
	  $numRow=mysql_num_rows($que);
	  
//	  echo $s;

  if ($numRow>0)
    {
    //find a link matching the search text
	$hint="<table width='100%'>";
	while ($r=mysql_fetch_array($que))
	{
      if ($hint=="")
        {
        $hint=$hint . "<tr><td><a style='color:#000; cursor:pointer;' onclick='placerS(\"".$r['sn'].'","'.$r['sid'].'","'.$r['aid']."\");'>" .$r['sn'] . "</a></td><td><input type='button' value='select' onclick='placerS(\"".$r['sn'].'","'.$r['sid'].'","'.$r['sid']."\");'></td></tr>";
        }
      else
        {
        $hint=$hint . "<tr><td><a style='color:#000; cursor:pointer;' onclick='placerS(\"".$r['sn'].'","'.$r['sid']."\");'>" .$r['sn'] . "</a></td><td><input type='button' value='select' onclick='placerS(\"".$r['sn'].'","'.$r['sid'].'","'.$r['sid']."\");'></td></tr>";
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