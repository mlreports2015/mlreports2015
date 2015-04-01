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
			$i=$i;
		else if (strcmp($z,'')!=false)
			if (strcmp($z,$o)!=0)
				$x=$x."• ".$z."<br />";
		$i=$i+1;
	}
	return $x;
}

function sel2($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$s="select * from $tnm where id='$id' and org='$o'";
// echo "$tnm ";
	$q=mysql_query($s);
// echo "$q <br>";
	$x='';
	$i=0;
	while ($r=mysql_fetch_row($q))
	{
		if (strcmp($r[1],'')!=0)
			$x=$x."• ".$r[1]."<br />";
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
		$x=$x."• ".$r[2]."<br />";
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
		if (strcmp($r[1],'')!=false)
		{
			$t=trim($r[1]);
			$x=$x.$t."<br />";
		}
	}
	return $x;
}

function sel3($tnm,$id,$n)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where id='$id' and org='$o'");
	$x='';
	$ii=0;
	while ($r=mysql_fetch_row($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
            if ($ii!=0)
            {
                $x=$x."<br />";
            }
		if (strcmp($r[$n],'')!=false)
			$x=$x."• ".$r[$n];
                $ii=1;
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

	$x="• ".$r['jrest']."<br />";

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

		$x=$x."<br />";
	}

	$x=$x."• ".$r['ltef'];

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

	$q=mysql_query("select * from $tnm where id='$id' and org='$o' and prob!='-' and stat='resolved' order by tp desc");
	
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
			
			$x=$x."<i><strong>".$rx."</strong></i><br />";
			$x=$x.$r['msg']."<br>";
		}
	}
	
	$q=mysql_query("select * from $tnm where id='$id' and org='$o' and prob!='-' and stat='unresolved' order by tp desc");
	
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

			$x=$x."<i><strong>".$rx."</strong></i><br />";
// for unresolved conditions removing the part which tells how long it would take for the patient to recover!
			$msgg=$r['msg'];
			$msggg=explode($string, $msgg);
			$x=$x.$msggg[0].$string.".<br>";
		}
	}
	
	
	return $x;
}


function seleff2($tnm,$id)
{
// 	session_start();
	$o=$_SESSION['o'];

	$q=mysql_query("select * from $tnm where id='$id' and org='$o' and prob!='-' and stat='unresolved' order by tp desc");
	$x='';
	$i=0;
        $ii=0;
	while ($r=mysql_fetch_array($q))
	{
// rdrctr($r[1,"repgen.php?cid=9");
		if (strcmp($r['msg'],'')!=false)
		{
			$i=$i+1;
			$string = $r['prob'];
			$token = split(" ", $string);
			
			$rx=$string;

                        if ($ii!=0)
                        {
                            $x=$x."<br><br>";
                        }

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
                        $ii=1;
			$x=$x.$r['msg'];
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
	$x='';
	
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
			$x=$x."• ".$r[1]."<br />";
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
