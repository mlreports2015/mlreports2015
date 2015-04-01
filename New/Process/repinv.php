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
include "mysql.php";

$id=$_POST['id'];
$chrge=$_POST['chrge'];


// $q=mysql_query("select * from org where org='".$_SESSION['o']."'");
// $r=mysql_fetch_array($q);

$q2=mysql_query("select * from claimant where org='".$_SESSION['o']."' and cid='$id'");
$r2=mysql_fetch_array($q2);

$q3=mysql_query("select * from agency where aid='".$r2['cage']."'");
$r3=mysql_fetch_array($q3);

$q4=mysql_query("select * from mreps where org='".$_SESSION['o']."' and id='$id' and msg='The claimant\'s medical records were used in compiling this report.'");
$r4=mysql_num_rows($q4);


$file=$r2['ct']."_".$r2['cfn']."_".$r2['cln'];


$str=nl2br(file_get_contents("templateinv",1));

$str=str_replace("|dt|", date('d-m-Y'), $str);

$str=str_replace("|cnm|", $r2['ct']." ".$r2['cfn']." ".$r2['cln'],$str);
$str=str_replace("|cref|", $r2['cageref'],$str);

$str=str_replace("|anm|", $r3['an'],$str);
$str=str_replace("|aad|", $r3['aa'],$str);

if ($r4>0)
	$str=str_replace("|med|", "Medical examination with notes review", $str);
else
	$str=str_replace("|med|", "Medical Examination", $str);

$vat=15*$chrge/100;

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
$cell->writeText('<strong>Dr H Rehman MBBS, MRCOG</strong>', new Font(16), $parCenter);

$cell = &$table->getCell(2, 1);
$cell->writeText('60 Thornton Lodge Road<br>Thornton Lodge<br>Huddersfield<br>West Yorkshire<br>HD1 3SB<br>MEDICOLEGAL REPORT<br>Phone: 0844 477 4007<br>Fax: 0844 477 3404<br>drhhrehman@yahoo.co.uk<br>', new Font(13), $parCenter);

$cell = &$table->getCell(3, 1);
$cell->writeText('<strong>INVOICE</strong><br>', new Font(25), $parCenter);

$cell = &$table->getCell(4, 1);
$cell->writeText($str, new Font(12,'Arial'), $parLeft);

$rtf->sendRtf($file.'_INVOICE');
}

?>