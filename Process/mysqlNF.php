<?
include "../dcon.php";

// session_start();

// $o=$_SESSION['o'];

function sel1($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];
	$q=mysql_query("select * from $tnm where cid=$id and org='$o'");
	return mysql_fetch_array($q);
}

function sel4($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];
	$q=mysql_query("select * from $tnm where id=$id and org='$o'");
	return mysql_fetch_array($q);
}

function age($tnm,$id)
{
	$q=mysql_query("select * from $tnm where aid='$id'");
	return mysql_fetch_array($q);
}

function sel5($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o'";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	$r=mysql_fetch_row($q);
	
	if ($r!=null)
	foreach($r as $z)
	{
		if($i==0)
		{
			$i=$i;
		}
		else if (strcmp($z,'')!=false)
		{
			if (strcmp($z,$o)!=0){
				if($i==2){
		  			$x = $x.'In my opinion '.$z.' and ';
				}else if($i==3){
					$x = $x.strtolower($z).". ";
				}else{			
				
					$x=$x." ".$z."<br />";
				
				}
				
			
			}	
		}		
		
		$i=$i+1;
		
	}
	$x="• ".$x;
	return $x;
}

function sel2($tnm,$id,$num=1)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o'";
	//echo $s;
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[$num],'')!=0)
			$x=$x."• ".$r[$num]."<br />";
	}
	return $x;
}


function selprogno($tnm,$id)
{
	
	
	
	
// 	session_start();
	$o=$_SESSION['o'];


// echo "$q <br>";
	$x='';
	$i=0;
	
	$extra = "select prob from eff where cid='$id' and org='$o'";
		$extrares = mysql_query($extra);
		
while($nwextra = mysql_fetch_array($extrares))	
{	

	$s="select * from $tnm where id='$id' and org='$o'";
// echo "$tnm ";
   //echo $s;
	$q=mysql_query($s);
	
	while ($r=mysql_fetch_row($q))
	{
	
			if (strcmp($r[1],'')!=0){
		
				if(strpos($r[1],$nwextra['prob'])!==false){
				if($nwextra['prob']=='anxiety'){
				$x=$x."<b><u>Psychological Injuries</u></b><br/><br/>";
				}
				$x=$x."<b><u>".$nwextra['prob']."</u></b><br/><br/>";	
				$x=$x." ".$r[2]."<br /><br />";
	
				}
				
			}
	}
	
 }
 
 $statxtra = "<b>Further Outlook</b><br/><br/>If the claim does not recover within the anticipated time scale then a re-examination may be required.<br/><br/>In my opinion, and on the balance of probabilities, the index accident is responsible for the injuries sustained.<br/><br/> In my opinion, he will have no long term deformity or problem due to this accident.";
 
	return $x."<br/>".$statxtra;
}

function selprogRecomend($tnm, $id){

   $o=$_SESSION['o'];

   $s="select * from $tnm where id='$id' and org='$o' and `prog` like '%I recommend%'";
   //echo $s;
   $qs= mysql_query($s);
   
   while($res = mysql_fetch_array($qs))
   {
   			
   				$x=$x."<br/><br/><b><u>".ucfirst($res['prob'])."</u></b><br/><br/>";	
				$x=$x." ".$res['prog'];
	
   }

	return $x;
}



function selgen($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o'";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
			$x=$x."• ".$r[1]."<br />";
		  if($r[2]!==''){ 
		    $x=$x."• ".$r[2]."<br />";
		  }
	}
	return $x;
}

function sel6($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where cid='$id' and org='$o'";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[3],'')!=false)
		{
		  if($tnm=='ident'){
			
		   
			$t=trim($r[3]);
			$x=$x.$t."<br />".trim($r[5]);
		   
		 
		 }	
		
		
		}
	}
	return $x;
}

function sel3($tnm,$id,$n)
{
// 	session_start();
	$o=$_SESSION['o'];
    //echo "select * from $tnm where cid='$id' and org='$o'";
	$q=mysql_query("select * from $tnm where cid='$id' and org='$o'");
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
	
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r[$n],'')!=false)
			$x=$x."• ".$r[$n]."<br />";
	}
	return $x;
}

function hdt($d)
{
	return date('d-m-Y',strtotime($d));
}

function sel10($tbl,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from job where id='$id' and org='$o'");
	$x='';
	$i=0;
	$r=mysql_fetch_array($q);

	$x="• ".$r['jrest']." ";

	if (strcmp($r['jabs'],'.')!=0)
	{
		$x=$x."• ".$r['jabs'];
	
		if ($r['mpas']!=null)
		{
			if (strcmp($r['mpas'],'1')==0)
				$x=$x." over ".$r['mpas']." ".$r['mmpast'].".";
			else
				$x=$x." over ".$r['mpas']." ".$r['mmpast']."s.";
		}

		
	}

	$x=$x." ".$r['ltef'];

	return $x;
}

function selq($tnm,$id,$n)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where name='$id' and org='$o' order by ord");
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r[$n],'')!=false)
			$x=$x."• ".$r[$n]."<br />";
	}
	return $x;
}

function selacc($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o'";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
			$x=$x."".$r[1]."<br />";
	}
	return $x;
}

function seleff($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where cid='$id' and org='$o' and prob!='-' and stat='resolved' order by tp desc");
	
	$x='';
	$i=0;
	
	while ($r=mysql_fetch_array($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r['msg'],'')!=false)
		{
			$i=$i+1;
			$string = $r['prob'];
			$token = split(" ", $string);
			
			$rx=$string;

// ensuring 'and' and 'to' are not capitalized in the heading!
			if (strcmp($token[1], 'and')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else if (strcmp($token[1], 'to')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else
			{
				$rx=ucwords($string);
			}
			
			$x=$x."<strong>".$rx."</strong><br />";
			$x=$x.$r['msg']."<br>";
		}
	}
	
	$query=mysql_query("select * from $tnm where cid='$id' and org='$o' and prob!='-' and stat='unresolved' order by tp desc");
	
	
	while ($r=mysql_fetch_array($query))
	{
	//print_r($r);
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r['msg'],'')!=false)
		{
			$i=$i+1;
			$string = $r['prob'];
			$token = split(" ", $string);
			
			$rx=$string;

// ensuring 'and' and 'to' are not capitalized in the heading!
			if (strcmp($token[1], 'and')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else if (strcmp($token[1], 'to')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else
			{
				$rx=ucwords($string);
			}

			$x=$x."<strong>".$rx."</strong><br />";
// for unresolved conditions removing the part which tells how long it would take for the patient to recover!
			$msgg=$r['msg'];
			//$msggg=explode($string, $msgg);
			$x=$x." ".$msgg."<br>";
		}
	}
	
	
	return $x;
}


function seleff2($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where cid='$id' and org='$o' and prob!='-' order by tp desc");
	$x='';
	$i=0;
	while ($r=mysql_fetch_array($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r['msg'],'')!=false)
		{
			$i=$i+1;
			$string = $r['prob'];
			$token = split(" ", $string);
			
			$rx=$string;
			
			if (strcmp($token[1], 'and')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else if (strcmp($token[1], 'to')==0)
			{
				$rx=ucwords($token[0]).' '.$token[1].' '.ucwords($token[2]).' '.ucwords($token[3]);
			}
			else
			{
				$rx=ucwords($string);
			}
			
			$x=$x."<strong><u>".$rx."</u></strong><br />";
			$x=$x.$r['msg']."<br><br>";
		}
	}
	return $x;
}


function selprog($tnm,$id)
{
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where id='$id' and org='$o'");
	$x='';
	$i=0;
	while ($r=mysql_fetch_array($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r['prog'],'')!=false)
		{
			$i=$i+1;
			$x=$x."<i><strong>11.$i Prognosis of the ".ucwords($r['prob'])." Injury</strong></i><br />";
			$x=$x.$r['msg']."<br>";
		}
	}
	return $x;
}

function selTr($id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from travel where id='$id' and org='$o' and msg like '%driv%'";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
			$x=$x."• ".$r[1]."<br />";
	}

	$s="select * from travel where id='$id' and org='$o' and msg like '%passenger%'";
	$q=mysql_query($s);
// echo "$q <br>";
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
			$x=$x."• ".$r[1]."<br />";
	}

	return $x;
}


function selEmp($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o' order by num";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x="• ";
	
	$i=0;
	$y='';
	
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
		{
/*			if (strcmp($y,$r[4])!=0)
			{
				$y=$r[4];
				$x=$x."<br />";
			}*/
			$i=$i+1;
			  if(strpos($r[1],'hours a week')!==false){
				 $nwzne = strpos($r[1], ' for ');
				 $nwstat = substr($r[1],$nwzne);
				 $x = substr($x,0,-2).$nwstat." ";
			
			  }else{ 
				
				$x=$x."".$r[1]." ";
			  
			  
			  
			  }
		}
	}
	return $x;
}



function selReco($id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from mrecs where id='$id' and org='$o' order by mid ASC";
// echo "$s ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	
	$i=0;
	$y='';
	while ($r=mysql_fetch_array($q))
	{
		$x=$x.$r['title'];
		$x=$x.'<br />'.$r['rel'];
		
		$s1="select * from mreco2 where id='$id' and org='$o' and mid='".$r['mid']."' order by ord ASC";
		$q1=mysql_query($s1);
		
		while ($r1=mysql_fetch_array($q1))
		{
			$x=$x."<br />• ".$r1['txt'];
		}
		$x=$x.'<br><br>';
	}
//	echo $x;
	return $x;
}

?>
