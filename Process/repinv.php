<?
session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{

require_once("rtf/Rtf.php");

include "../dcon.php";
//include "mysql.php";

$id=$_POST['id'];
$chrge=$_POST['chrge'];

if($chrge==''){
	
	$chrgState = "select GP_cost from aboutcst where org='".$_SESSION['o']."' and name='".$_SESSION['n']."'";
	$chrgeRes = mysql_query($chrgState);
	$chrgePrint = mysql_fetch_array($chrgeRes);
	$chrge=$chrgePrint['GP_cost'];
	
}

// $q=mysql_query("select * from org where org='".$_SESSION['o']."'");
// $r=mysql_fetch_array($q);

$about="select * from about where org='".$_SESSION['o']."' and name='".$_SESSION['n']."'";
$qab=mysql_query($about);
$sab=mysql_fetch_array($qab);

$q2=mysql_query("select * from claimant where org='".$_SESSION['o']."' and cid='$id'");
//echo $q2;
$r2=mysql_fetch_array($q2);

$q3=mysql_query("select * from agency where aid='".$r2['cage']."'");
//echo $q3;
$r3=mysql_fetch_array($q3);

$q4=mysql_query("select * from mreps where org='".$_SESSION['o']."' and id='$id' and msg='The claimant\'s medical records were used in compiling this report.'");
$r4=mysql_num_rows($q4);

$mlinvs = "insert into mlrinvs set org='".$_SESSION['o']."', `name`='".$_SESSION['n']."', case_id='$id', descript='GP Medical Report', dated='".time()."', qty='1', aref='".$r2['cageref']."', price = '".$chrge."'";
echo $mlinvs;
mysql_query($mlinvs);

$file=$r2['ct']."_".$r2['cfn']."_".$r2['cln'];


$str=nl2br(file_get_contents("templateinv",1));

$str=str_replace("|dt|", date('d-m-Y'), $str);

$str=str_replace("|cnm|", $r2['ct']." ".$r2['cfn']." ".$r2['cln'],$str);
$str=str_replace("|cref|", $r2['cageref'],$str);

$str=str_replace("|anm|", $r3['an'],$str);
$aAd=str_replace('<br>', ', ', $r3['aa']);
$str=str_replace("|aad|", $aAd.'<br>', $str);

$str=str_replace("|dr|", $sab['title']." ".$sab['fname']." ".$sab['lname'],$str);

if ($r4>0)
	$str=str_replace("|med|", "Medical examination with notes review", $str);
else
	$str=str_replace("|med|", "Medical Examination", $str);

$vat=20*$chrge/100;

$str=str_replace("|chr|", $chrge, $str);
$str=str_replace("|vat|", $vat, $str);
$str=str_replace("|tot|", $vat+$chrge, $str);

$parCenter = new ParFormat('center');
$parCenter->setSpaceBetweenLines(1);
//left alligned with 2-line spacing for first page
$parLeft = new ParFormat();
$parLeft->setSpaceBetweenLines(2);
//left alligned with 1.5 line spacing for rest of document
$parBody = new ParFormat();
$parBody->setSpaceBetweenLines(2);

//initiating RTF object
$rtf = new Rtf();
$null = null;

$top = &$rtf->addHeader();
// $top->writeText($FNm, new Font("Arial",11), $parLeft);

$sect = &$rtf->addSection();
$table = &$sect->addTable();
$table->addRows(4);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);
$cell->writeText('<strong>'.$sab['title']." ".$sab['fname']." ".$sab['lname'].' '.$sab['qualif'].'</strong>', new Font(16), $parCenter);

$cell = &$table->getCell(2, 1);
$cell->writeText($sab['address'], new Font(13), $parCenter);

$cell = &$table->getCell(3, 1);
$cell->writeText('<strong>INVOICE</strong><br>', new Font(25), $parCenter);

$cell = &$table->getCell(4, 1);
$cell->writeText($str, new Font(12,'Arial'), $parLeft);

$rtf->sendRtf($file.'_INVOICE');
}

?>