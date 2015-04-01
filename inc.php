<?

function rdrctr($x,$y)
{
	echo "<Script language='JavaScript' type='text/javascript'>alert('$x');</SCRIPT>";
	echo "<Script language='JavaScript' type='text/javascript'>window.location='$y';</SCRIPT>";
}

function red($y)
{
	echo "<Script language='JavaScript' type='text/javascript'>window.location='$y';</SCRIPT>";
}

function trtd($a,$b,$c,$d)
{
	return "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td></tr>";
}

function ref($r)
{
	if (strlen($r)>=3)
		return "ACUK".$r;
	else if(strlen($r)==2)
		return "ACUK00".$r;
	else if(strlen($r)==1)
		return "ACUK000".$r;
}

function id()
{
	include "dcon.php";

	$org=$_SESSION['o'];
	$s="select cid from claimant where org='$org'";
//echo $s;
	$q=mysql_query($s);
	$r=mysql_num_rows($q);

	return $r;
}

function xid($org)
{
	include "dcon.php";

	$s="select cid from claimant where org='$org' ORDER BY cid DESC LIMIT 1";
//echo $s;
	$q=mysql_query($s);
	$r=mysql_fetch_array($q);

	return $r['cid'];
}

function sid()
{
// 	include "dcon.php";

	$s="select sid from solicitor ORDER BY sid DESC LIMIT 1";
	$q=mysql_query($s);
	$r=mysql_fetch_array($q);

	return $r['sid'];
}

function aid()
{
// 	include "dcon.php";

	$s="select aid from agency ORDER BY aid DESC LIMIT 1";
	$q=mysql_query($s);
	$r=mysql_fetch_array($q);

	return $r['aid'];
}

function clid()
{
// 	include "dcon.php";

	$s="select cid from cclist ORDER BY cid DESC LIMIT 1";
	$q=mysql_query($s);
	$r=mysql_fetch_array($q);

	return $r['cid'];
}

function dateDiff($dformat, $endDate, $beginDate)
{
$date_parts1=explode($dformat, $beginDate);
$date_parts2=explode($dformat, $endDate);
$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
return $end_date - $start_date;
}

?>
