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
include "mysqlNF.php";

$id=$_POST['id'];

//retrieving data from database

$about="select * from about where org='".$_SESSION['o']."' and name='".$_SESSION['n']."'";
$qab=mysql_query($about);
$sab=mysql_fetch_array($qab);

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
$pmh=sel2("pmh",$id,2);

//accid
$accid=selacc("accid",$id);
$accidi=strstr($accid, '*');


$accid=str_replace('*', '•', $accid);
$accid=str_replace('!', '<br>', $accid);

//symptoms
$eff1=seleff("eff",$id);

//treatment
$tr1=sel3("treat",$id."' and stat='i",3);
$tr2=sel3("treat",$id."' and stat='l",3);

//investigation
$inv=sel2("inves",$id);

//ability to work
$inv=sel2("inves",$id);

$jb=selEmp("emp",$id);

$hcc=sel2("hcirc",$id);

$trv=selTr($id);

$dlv=sel2("dlive",$id);
// echo $dlv;

$dh=sel2("domh",$id);

$ga=selgen("genap",$id);

$mh=sel4("menh",$id);

$iw=sel2("iwse",$id);

$eon=sel2("neck",$id);
$eou=sel2("upper",$id);
$eob=sel2("back",$id);
//$eot=sel2("thorax",$id);
$eol=sel2("lower",$id);

$qualiff=selq("qualif", $_SESSION['n'], 3);

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
if (strcmp($_POST['fF'],'Arial')==0)
	$str=nl2br(file_get_contents("templatehead",1));
else if (strcmp($_POST['fF'],'Times New Roman')==0)
	$str=nl2br(file_get_contents("templateheadTNR",1));
else if (strcmp($_POST['fF'],'Calibri')==0)
	$str=nl2br(file_get_contents("templateheadC",1));
else if (strcmp($_POST['fF'],'Arial Black')==0)
	$str=nl2br(file_get_contents("templateheadAB",1));
else if (strcmp($_POST['fF'],'Verdana')==0)
	$str=nl2br(file_get_contents("templateheadV",1));
else if (strcmp($_POST['fF'],'Comic Sans MS')==0)
	$str=nl2br(file_get_contents("templateheadCS",1));
else if (strcmp($_POST['fF'],'Tahoma')==0)
	$str=nl2br(file_get_contents("templateheadT",1));
	
//getting chosen font for the remaining document
$fontR=$_POST['fR'];
//retrieving main body template
$str2=nl2br(file_get_contents("template",1));

$str22=nl2br(file_get_contents("template2b",1));

$str220=nl2br(file_get_contents("template4",1));

$str23=nl2br(file_get_contents("template3",1));

$strPP='';

if ($_POST['p1x']=='p1')
{
	$strPP="Studies have shown that the rate of recovery of a soft tissue injury to the cervical, thoracic and lumbar spine resulting in a whiplash injury without nerve route compression or bony injury following a road traffic accident is variable. Whiplash injury is defined as a traumatic injury to the soft tissue structures of the cervical spine including muscles, ligaments, intervertebral discs and facet joints due to hyper flexion and hyper extension, rotational injury and transmitted impact from the seat belt.<br>";
}

if ($_POST['p2x']=='p2')
{
	$strPP=$strPP."The range of recovery varies from few months of the accident to subjects being left with long term spinal symptoms. Analysis of studies shows that a significant number of subjects sustaining spinal injuries in road traffic accidents will continue to suffer cervical spine pain at 3 years post accident. There is a large body of medical literature both from the United Kingdom and other countries regarding neck injuries and road traffic accidents. Review of the medical literature reveals variation in various prognostic factors for recovery from whiplash injury.";
}	


//retreiving court undertaking
$str3=nl2br(file_get_contents("templatefoot",1));
$strRef=nl2br(file_get_contents("templateRef",1));

$iddd=1000+$claimant['cid'];

$str=str_replace("|ref|","MLR$iddd",$str);
$str=str_replace("|fnm|",$FNm,$str);
$str=str_replace("|ad1|",$claimant['ca1'],$str);
$str=str_replace("|ad2|",$claimant['ca2'],$str);
$str=str_replace("|pcd|",$claimant['cp'],$str);

if (strcmp($claimant['cdb'], '1200-01-01')!=0)
{
	$str=str_replace("|dob|",hdt($claimant['cdb']),$str);
}
else
{
	$str=str_replace("|dob|",'N/A',$str);
}

if (strcmp($claimant['cda'], '1200-01-01')!=0)
{
	$str=str_replace("|doa|",hdt($claimant['cda']),$str);
}
else
{
	$str=str_replace("|doa|",'N/A',$str);
}

$str=str_replace("|occ|",$claimant['emp'],$str);

if (strcmp($claimant['cde'], '1200-01-01')!=0)
{
	$str=str_replace("|doe|",hdt($claimant['cde']),$str);
}
else
{
	$str=str_replace("|doe|",'N/A',$str);
}

$str=str_replace("|sref|",$claimant['csolref'],$str);
$str=str_replace("|oref|",$claimant['cageref'],$str);
$str=str_replace("|cage|",$age['an'],$str);
$str=str_replace("|ddd|",date('d-m-Y'),$str);
$str=str_replace("|dnm|",$sab['title']." ".$sab['fname']." ".$sab['lname'],$str);

$sol="select * from solicitor where sid='".$claimant['csol']."'";
// echo $sol;
$qsol=mysql_query($sol);
$rsol=mysql_fetch_array($qsol);
$str=str_replace("|sol|",$rsol['sn'],$str);
// echo $rsol['sn'];
$str2=str_replace("|snme|",$rsol['sn'],$str2);
$str2=str_replace("|dob|",hdt($claimant['cdb']),$str2);
$str2=str_replace("|doa|",hdt($claimant['cda']),$str2);
$str2=str_replace("|qualiff|",$qualiff,$str2);
$str2=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str2);

$dava='• Instruction letter from '.$rsol['sn'].'.<br>• Instruction letter from '.$age['an'].'.<br>';

if (strcmp($_POST['medical'],'m')==0)
{
	$dava=$dava.'• GP records.<br>';
}

if (strcmp($_POST['medical2'],'m')==0)
{
	$dava=$dava.'• Hospital records.<br>';
}

if (strcmp($_POST['engineer'],'e')==0)
{
	$dava=$dava."• Engineer's report.<br>";
}

$str22=str_replace('|dava|', $dava, $str22);

				   
if (strlen($ident)>0)
	$str22=str_replace("|cdet|","• ".$accomp['accomp']."<br />• To confirm the id:<br />".$ident,$str22);
else
	$str22=str_replace("|cdet|","• ".$accomp['accomp']."<br />",$str22);

$str22=str_replace("|pmh|",$pmh,$str22);

$str22=str_replace("|accid|",$accid,$str22);


$str22=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str22);

$str22=str_replace("|symp|",$eff1,$str22);

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
$str22=str_replace("|eot|",$eot,$str22);
$str22=str_replace("|eol|",$eol,$str22);

$str220=str_replace("|sum|", $sum,$str220);

$str220=str_replace("|jp|", $jp,$str220);

$str23=str_replace("|ppp|", $ppp,$str23);
// $str23=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$str23);

$str24=nl2br(file_get_contents("template5",1));
$records=selReco($id);



$str24=str_replace("|mrecs|", $records, $str24);


$str22=str_replace("|G1|", $G1,$str22);


$str3=str_replace("|edt|", hdt($claimant['cde']),$str3);
$str3=str_replace("|dnm|", $sab['title']." ".$sab['fname']." ".$sab['lname'],$str3);


$str2=str_replace("|mh|","• ".$mh['msg1']."<br>"."• ".$mh['msg2']."<br>",$str2);
$str22=str_replace("|mh|","• ".$mh['msg1']."<br>"."• ".$mh['msg2']."<br>",$str22);
// // $str=str_replace("||",$claimant[''],$str);
// 

$w=split("¢",$str3);

//generating filename
$file=trim(str_replace('.','',$claimant['ct'])).'-'.trim($claimant['cfn']).'-'.trim($claimant['cln']);

//creating paragraph formats

// //center alligned for main heading
$parCenter = new ParFormat('center');
$parCenter->setSpaceBetweenLines(2);
//left alligned with 2-line spacing for first page
$parLeft = new ParFormat();
$parLeft->setSpaceBetweenLines(2);
//
$par = new ParFormat();
$par->setSpaceBetweenLines(2);
$par->setIndentLeft(1);

$parSum = new ParFormat();
$parSum->setSpaceBetweenLines(3);
$parSum->setIndentLeft(1);
//left alligned with 1.5 line spacing for rest of document
$parBody = new ParFormat();
$parBody->setSpaceBetweenLines(2);

$parFoot = new ParFormat();
$parFoot->setSpaceBetweenLines(0);


////////////border format for first two pages///////////////////////

$border=0;
$border2=0;

if ($_POST['mw']=='0' || $_POST['mw']=='1' || $_POST['mw']=='2')
{
	$border=new BorderFormat($_POST['mw'], '#666666');
}
else
{
	$border=new BorderFormat(1, '#666666', $_POST['mw']);
}

if ($_POST['mwR']=='0' || $_POST['mwR']=='1' || $_POST['mwR']=='2')
{
	$border2=new BorderFormat($_POST['mwR'], '#666666');
}
else
{
	$border2=new BorderFormat(1, '#666666', $_POST['mwR']);
}

//initiating RTF object
$rtf = new Rtf();
$null = null;

//creating header for document
$top = &$rtf->addHeader();
$top->writeText($FNm, new Font(9,"Arial"), $parLeft);

$bot = &$rtf->addFooter();
$bot->writeText($sab['title']." ".$sab['fname']." ".$sab['lname']."<br>".$sab['qualif'], new Font(9,"Arial"), $parFoot);
//creating first page

$sect = &$rtf->addSection();
$header = &$sect->addHeader();
$header->writeText($FNm.'<br>', new Font(9,"Arial"), $parLeft);
$sect->setBorders($border);
$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

if (strlen(trim($claimant['ca1']))>0 && strlen(trim($claimant['ca2']))>0)
{
	$cell->writeText("<strong>".$sab['title']." ".$sab['fname']." ".$sab['lname']."</strong><br>(".$sab['qualif'].")<br><strong>".$age['an']."</strong><br>".$age['aa'].", ".$age['ap']."<br>T:".$age['ac']."<br>F:".$age['af']."<br><br><strong>MEDICOLEGAL REPORT</strong><br>on<br><strong>".$claimant['ct'].' '.$claimant['cfn'].' '.$claimant['cln'].'</strong><br>'.trim($claimant['ca1']).'<br>'.trim($claimant['ca2']).'<br>'.$claimant['cp'], new Font(14, $fF, $fFC), $parCenter);
}
else if (strlen(trim($claimant['ca2']))==0)
{
	$cell->writeText("<strong>".$sab['title']." ".$sab['fname']." ".$sab['lname']."</strong> (".$sab['qualif'].")<br><strong>".$age['an']."</strong><br>".$age['aa'].", ".$age['ap']."<br>T:".$age['ac']."<br>F:".$age['af']."<br><br><strong>MEDICOLEGAL REPORT</strong><br>on<br><strong>".$claimant['ct'].' '.$claimant['cfn'].' '.$claimant['cln'].'</strong><br>'.trim($claimant['ca1']).'<br>'.$claimant['cp'], new Font(14, $fF, $fFC), $parCenter);
}
else if (strlen(trim($claimant['ca1']))==0)
{
	$cell->writeText("<strong>".$sab['title']." ".$sab['fname']." ".$sab['lname']."</strong> (".$sab['qualif'].")<br><strong>".$age['an']."</strong><br>".$age['aa'].", ".$age['ap']."<br>T:".$age['ac']."<br>F:".$age['af']."<br><br><strong>MEDICOLEGAL REPORT</strong><br>on<br><strong>".$claimant['ct'].' '.$claimant['cfn'].' '.$claimant['cln'].'</strong><br>'.trim($claimant['ca2']).'<br>'.$claimant['cp'], new Font(14, $fF, $fFC), $parCenter);
}

$cell = &$table->getCell(2, 1);
$cell->writeText($str, new Font(12,$fF, $fFC), $par);


///////////////////////////////////////////-summary section-///////////////////////////////////////////////////////

$s0="select * from mreps where id='$id' and org='".$_SESSION['o']."'";
$q0=mysql_query($s0);
$r0=mysql_fetch_array($q0);

if ($_POST['soc']=='1')
{
	$strSummary='';
	
	if (strcmp($r0['msg'], "The claimant's medical records were used in compiling this report.")==0)
	{
		$strSummary=nl2br(file_get_contents("templateSummary2",1));
	}
	else
	{
		$strSummary=nl2br(file_get_contents("templateSummary1",1));
	}
	
	$body = &$rtf->addSection($parBody);
	$body->setBorders($border2);
	$body->writeText('<strong><u>Summary of Contents</u></strong>', new Font(14,$fontR, $fRC), $parCenter);
	$body->writeText($strSummary, new Font(12,$fontR, $fRC), $parSum);
}

//creating main body
$body = &$rtf->addSection($parBody);
$body->setBorders($border2);
$body->writeText($str2, new Font(12,$fontR, $fRC), $parBody);

$body = &$rtf->addSection($parBody);
$body->setBorders($border2);
$body->writeText($str22, new Font(12,$fontR, $fRC), $parBody);

$body = &$rtf->addSection($parBody);
$body->setBorders($border2);
$body->writeText($str220, new Font(12,$fontR, $fRC), $parBody);

$body = &$rtf->addSection($parBody);
$body->setBorders($border2);
$body->writeText($str23, new Font(12,$fontR, $fRC), $parBody);

if (strlen($strPP)>0)
{
	$body = &$rtf->addSection($parBody);
	$body->setBorders($border2);
	$body->writeText($strPP, new Font(12,$fontR, $fRC), $parBody);
}

if (strcmp($r0['msg'], "The claimant's medical records were used in compiling this report.")==0)
{
	$body = &$rtf->addSection($parBody);
	$body->setBorders($border2);
	$body->writeText($str24, new Font(12,$fontR, $fRC), $parBody);
}

$court = &$rtf->addSection($parBody);
$court->setBorders($border2);
$court->writeText($w[0], new Font(12,$fontR, $fRC), $parBody);
$img=&$court->addImage($sab['signat'],$parBody);
$court->writeText($w[1], new Font(12,$fontR, $fRC), $parBody);

$refer= &$rtf->addSection($parBody);
$refer->setBorders($border2);
$refer->writeText($w[2], new Font(12,$fontR, $fRC), $parBody);

$rtf->sendRtf($file);

$sqlC="select * from repGen where cid='$id' and org='".$_SESSION['o']."'";
$qC=mysql_query($sqlC);
$nC=mysql_fetch_array($qC);

if ($nC==0)
{
	$dt=date('Y-m-d');
	$sqlI="insert into repGen set cid='$id', org='".$_SESSION['o']."', num='1', dt='$dt'";
	$qI=mysql_query($sqlI);
}
else
{
	$rC=mysql_fetch_array($qC);
	$num=$rC['num'];
	$num=$num+1;
	$sqlI="update repGen set num='$num' where cid='$id' and org='".$_SESSION['o']."'";
	$qI=mysql_query($sqlI);
}
}

?>