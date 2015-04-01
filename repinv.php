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

$q2=mysql_query("select * from claimant where org='".$_SESSION['o']."' and id='$id'");
$r2=mysql_fetch_array($q2);

$q3=mysql_query("select * from agency where aid='".$r2['cage']."'");
$r3=mysql_fetch_array($q3);

$str=nl2br(file_get_contents("templateinv",1));

$str=str_replace("|dt|", date('d-m-Y'), $str);

$str=str_replace("|cnm|", $r2['ct']." ".$r2['cfn']." ".$r2['cln'],$str);
$str=str_replace("|cref|", $r3['cageref'],$str);

$str=str_replace("|anm|", $r3['an'],$str);
$str=str_replace("|aad|", $r3['aa'],$str);
$str=str_replace("|chr|", $chrge, $str);

$parCenter = new ParFormat('center');
$parCenter->setSpaceBetweenLines(2);
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
$top->writeText($FNm, new Font("Arial",11), $parLeft);

$sect = &$rtf->addSection();
$table = &$sect->addTable();
$table->addRows(3);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);
$cell->writeText('<strong>Dr H Rehman</strong><br><strong>MBBS MRCOG</strong><br>60 Thornton Lodge Road<br>Thornton Lodge<br>Huddersfield<br>HD1 3SB<br><strong>MEDICOLEGAL REPORT</strong><br><strong>Phone: 0844 477 4007</strong><br><strong>Fax: 0844 477 3404</strong><br>drhhrehman@yahoo.co.uk</strong>', new Font(14, 'Arial'), $parCenter);

$cell = &$table->getCell(2, 1);
$cell->writeText('<strong>INVOICE</strong>');

$cell = &$table->getCell(3, 1);
$cell->writeText($str, new Font(12,'Arial'), $parLeft);
}

?>