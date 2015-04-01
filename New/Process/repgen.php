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

//retrieving data from database

//elements for the first page
$claimant=sel1("claimant",$id);

//agency
$age=age("agency",$claimant['cage']);

//elements for case details
$accomp=sel1("accomp",$id);
$mrec=sel4("mreps",$id);
$ident=sel6("ident",$id);
// $ident=sel1("ident",$id);

//pmh
$pmh=sel2("pmh",$id);

//accid
$accid=sel2("accid",$id);

//symptoms
$eff1=sel3("eff",$id."' and tp='l",4);
$eff2=sel3("eff",$id."' and tp='i",4);

//treatment
$tr1=sel3("treat",$id."' and stat='i",2);
$tr2=sel3("treat",$id."' and stat='l",2);

//investigation
$inv=sel2("inves",$id);

//ability to work
$inv=sel2("inves",$id);

$jb=sel2("emp",$id);

$hcc=sel2("hcirc",$id);

$trv=sel2("travel",$id);

$dlv=sel2("dlive",$id);
// echo $dlv;

$dh=sel2("domh",$id);

$ga=sel2("genap",$id);

$mh=sel4("menh",$id);

$iw=sel2("iwse",$id);

$eon=sel2("neck",$id);
$eou=sel2("upper",$id);
$eob=sel2("back",$id);
$eol=sel2("lower",$id);

// $shit=sel2("shlist",$id);

$sum=sel5("shist",$id);
$jp=sel10("job",$id);

$ppp=sel2("prog",$id);

//setting some more commonly used elements
$FNm=$claimant['ct'].' '.trim($claimant['cfn']).' '.trim($claimant['cln']);

$G1='';
if ($claimant['gen']=='m')
{
	$G1="he";
}
else
	$G1="she";

//retrieving first page template (besides main heading, that gets set in this document)
$str=nl2br(file_get_contents("templatehead",1));
//retrieving main body template
$str2=nl2br(file_get_contents("template",1));

$str22=nl2br(file_get_contents("template2",1));

$str23=nl2br(file_get_contents("template3",1));
//retreiving court undertaking
$str3=nl2br(file_get_contents("templatefoot",1));

$iddd=1000+$claimant['cid'];

$str=str_replace("|ref|","MLR$iddd",$str);
$str=str_replace("|fnm|",$FNm,$str);
$str=str_replace("|ad1|",$claimant['ca1'],$str);
$str=str_replace("|ad2|",$claimant['ca2'],$str);
$str=str_replace("|pcd|",$claimant['cp'],$str);
$str=str_replace("|dob|",hdt($claimant['cdb']),$str);
$str=str_replace("|doa|",hdt($claimant['cda']),$str);
$str=str_replace("|occ|",$claimant['emp'],$str);
$str=str_replace("|doe|",hdt($claimant['cde']),$str);
$str=str_replace("|sref|",$claimant['csolref'],$str);
$str=str_replace("|oref|",$claimant['cageref'],$str);
$str=str_replace("|cage|",$age['an'],$str);
$str=str_replace("|ddd|",date('d-m-Y'),$str);

$sol="select * from solicitor where sid='".$claimant['csol']."'";
// echo $sol;
$qsol=mysql_query($sol);
$rsol=mysql_fetch_array($qsol);
// echo $rsol['sn'];
$str2=str_replace("|snme|",$rsol['sn'],$str2);
$str2=str_replace("|dob|",hdt($claimant['cdb']),$str2);
$str2=str_replace("|doa|",hdt($claimant['cda']),$str2);
$str2=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str2);

if (strlen($ident)>0)
	$str2=str_replace("|cdet|","• ".$accomp['accomp'].'<br />• '.$mrec['msg']."<br />• To confirm the id:<br />".$ident,$str2);
else
	$str2=str_replace("|cdet|","• ".$accomp['accomp'].'<br />• '.$mrec['msg']."<br />",$str2);

$str2=str_replace("|pmh|",$pmh,$str2);

$str2=str_replace("|accid|",$accid,$str2);


$str22=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str22);

$str22=str_replace("|isymp|",$eff1,$str22);
$str22=str_replace("|lsymp|",$eff2,$str22);

$str22=str_replace("|itreat|",$tr1,$str22);
$str22=str_replace("|ltreat|",$tr2,$str22);

$str22=str_replace("|inv|",$inv,$str22);

$str22=str_replace("|eaw|",$jb,$str22);

$str22=str_replace("|hcc|",$hcc,$str22);

$str22=str_replace("|trvl|",$trv,$str22);

$str22=str_replace("|dlv|",$dlv,$str22);

$str22=str_replace("|dh|",$dh,$str22);

$str22=str_replace("|ga|",$ga,$str22);

$str22=str_replace("|iws|",$iw,$str22);

$str22=str_replace("|eon|",$eon,$str22);
$str22=str_replace("|eou|",$eou,$str22);
$str22=str_replace("|eob|",$eob,$str22);
$str22=str_replace("|eol|",$eol,$str22);

$str22=str_replace("|sum|", $sum,$str22);

$str22=str_replace("|jp|", $jp,$str22);

$str23=str_replace("|ppp|", $ppp,$str23);
$str23=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str23);

$str22=str_replace("|G1|", $G1,$str22);


$str3=str_replace("|edt|", hdt($claimant['cde']),$str3);


$str2=str_replace("|mh|","• ".$mh['msg1']."<br>"."• ".$mh['msg2']."<br>",$str2);
$str22=str_replace("|mh|","• ".$mh['msg1']."<br>"."• ".$mh['msg2']."<br>",$str22);
// // $str=str_replace("||",$claimant[''],$str);
// 


$w=split("¢",$str3);





//generating filename
$file=trim($claimant['cln']).'-'.trim($claimant['cfn']).'-'.trim($claimant['ct']);

//creating paragraph formats

// //center alligned for main heading
$parCenter = new ParFormat('center');
$parCenter->setSpaceBetweenLines(2);
//left alligned with 2-line spacing for first page
$parLeft = new ParFormat();
$parLeft->setSpaceBetweenLines(2);
//left alligned with 1.5 line spacing for rest of document
$parBody = new ParFormat();
$parBody->setSpaceBetweenLines(2);

$parFoot = new ParFormat();
$parFoot->setSpaceBetweenLines(0);

//initiating RTF object
$rtf = new Rtf();
$null = null;



//creating header for document
$top = &$rtf->addHeader();
$top->writeText($FNm, new Font(9,"Arial"), $parLeft);

$bot = &$rtf->addFooter();
$bot->writeText("Dr H Rehman<br>MBBS MRCOG", new Font(9,"Arial"), $parFoot);
//creating first page

$sect = &$rtf->addSection();
$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);
$cell->writeText('<strong>Dr H Rehman</strong><br><strong>MBBS MRCOG</strong><br>60 Thornton Lodge Road<br>Huddersfield HD1 3SB<br><br><strong>MEDICOLEGAL REPORT</strong><br>on<br><strong>'.$claimant['ct'].' '.$claimant['cfn'].' '.$claimant['cln'].'</strong><br>'.$claimant['ca1'].'<br>'.$claimant['ca2'].'<br>'.$claimant['cp'], new Font(14, 'Arial'), $parCenter);


$cell = &$table->getCell(2, 1);
$cell->writeText($str, new Font(12,'Arial'), $parLeft);

//creating main body
$body = &$rtf->addSection($parBody);
$body->writeText($str2, new Font(12,'Arial'), $parBody);

$body = &$rtf->addSection($parBody);
$body->writeText($str22, new Font(12,'Arial'), $parBody);

$body = &$rtf->addSection($parBody);
$body->writeText($str23, new Font(12,'Arial'), $parBody);

$court = &$rtf->addSection($parBody);
$court->writeText($w[0], new Font(12,'Arial'), $parBody);
$img=&$court->addImage('sig.png',$parBody);
$court->writeText($w[1], new Font(12,'Arial'), $parBody);

$refer= &$rtf->addSection($parBody);
$refer->writeText($w[2], new Font(12,'Arial'), $parBody);

$rtf->sendRtf($file.'_'.$claimant['cageref']);

}
?>