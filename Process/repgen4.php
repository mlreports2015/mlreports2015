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
$pmh=sel2("pmh",$id);

//accid
$accid=selacc("accid",$id);
$accidi=strstr($accid, '*');


$accid=str_replace('*', '•', $accid);
$accid=str_replace('!', '<br>', $accid);

//symptoms
$eff1=seleff("eff",$id);
$eff2=seleff2("eff",$id);

//treatment
$tr1=sel3("treat",$id."' and stat='i",2);
$tr2=sel3("treat",$id."' and stat='l",2);

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
$eot='';
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
$str2=nl2br(file_get_contents("templateNF",1));


$str22=nl2br(file_get_contents("template_History",1));

$strDL=nl2br(file_get_contents("template_DailyLife",1));

$strEF=nl2br(file_get_contents("template_EFind",1));

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
$str=str_replace("|dob|",hdt($claimant['cdb']),$str);
$str=str_replace("|doa|",hdt($claimant['cda']),$str);
$str=str_replace("|occ|",$claimant['emp'],$str);
$str=str_replace("|doe|",hdt($claimant['cde']),$str);
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
$str2=str_replace("|dnme|",$sab['title']." ".$sab['fname']." ".$sab['lname'],$str2);
$str2=str_replace("|qual|", $sab['qualif'],$str2);
$str2=str_replace("|claimer|", $claimant['ct'].' '.trim($claimant['cfn']).' '.trim($claimant['cln']),$str2);
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

$strDL=str_replace("|hcc|",$hcc,$strDL);
$strDL=str_replace("|trvl|",$trv,$strDL);
$strDL=str_replace("|dlv|",$dlv,$strDL);
$strDL=str_replace("|Lnm|",$claimant['ct'].' '.trim($claimant['cln']),$strDL);

$strEF=str_replace("|dh|",$dh,$strEF);

$strEF=str_replace("|ga|",$ga,$strEF);

$strEF=str_replace("|iws|",$iw,$strEF);

$strEF=str_replace("|eon|",$eon,$strEF);
$strEF=str_replace("|eou|",$eou,$strEF);
$strEF=str_replace("|eob|",$eob,$strEF);
$strEF=str_replace("|eot|",$eot,$strEF);
$strEF=str_replace("|eol|",$eol,$strEF);

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
$strEF=str_replace("|mh|","• ".$mh['msg1']."<br>"."• ".$mh['msg2']."<br>",$strEF);
// // $str=str_replace("||",$claimant[''],$str);
// 

$w=split("¢",$str3);

//generating filename
$file=trim(str_replace('.','',$claimant['ct'])).'-'.trim($claimant['cfn']).'-'.trim($claimant['cln']);

//creating paragraph formats

$par0Center = new parFormat('center');
$par0Center->setSpaceBetweenLines(2);

// //
$par0LeftB = new parFormat('left');
$par0LeftB->setSpaceBetweenLines(2);
$par0LeftB->setBackColor('#aaaaaa');


$box=new BorderFormat('1', '#aaaaaa');

$par0LeftBor = new parFormat('left');
$par0LeftBor->setSpaceBetweenLines(2);
$par0LeftBor->setIndentLeft(0.1);
$par0LeftBor->setIndentRight(0.1);
$par0LeftBor->setBorders($box, true, true, true, true);

//left alligned with 2-line spacing for first page
$par0Left = new parFormat();
$par0Left->setSpaceBetweenLines(2);
//
$par0 = new parFormat();
$par0->setSpaceBetweenLines(2);
$par0->setIndentLeft(1);

$par0Sum = new parFormat();
$par0Sum->setSpaceBetweenLines(2);
$par0Sum->setIndentLeft(1);
//left alligned with 1.5 line spacing for rest of document
$par0Body = new parFormat();
$par0Body->setSpaceBetweenLines(2);

$par0Foot = new parFormat();
$par0Foot->setSpaceBetweenLines(0);

// //center alligned for main heading
$parCenter = new ParFormat('center');
$parCenter->setSpaceBetweenLines(2);

// //
$parLeftB = new ParFormat('left');
$parLeftB->setSpaceBetweenLines(1.5);
$parLeftB->setBackColor('#aaaaaa');


$box=new BorderFormat('1', '#aaaaaa');

$parLeftBor = new ParFormat('left');
$parLeftBor->setSpaceBetweenLines(1.5);
$parLeftBor->setIndentLeft(0.1);
$parLeftBor->setIndentRight(0.1);
$parLeftBor->setBorders($box, true, true, true, true);

//left alligned with 2-line spacing for first page
$parLeft = new ParFormat();
$parLeft->setSpaceBetweenLines(1.5);
//
$par = new ParFormat();
$par->setSpaceBetweenLines(1.5);
$par->setIndentLeft(1);

$parSum = new ParFormat();
$parSum->setSpaceBetweenLines(1.5);
$parSum->setIndentLeft(1);
//left alligned with 1.5 line spacing for rest of document
$parBody = new ParFormat();
$parBody->setSpaceBetweenLines(1.5);

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
$top->writeText("<scaps>".ucwords($FNm)."</scaps>", new Font(9,"Arial"), $parLeft);


//creating footer for document
$bot = &$rtf->addFooter();
$bot->writeText("<scaps>".$sab['title']." ".$sab['fname']." ".$sab['lname']."<br>".$sab['qualif']."</scaps>", new Font(9,"Arial"), $parFoot);


//creating title page

$qualiffication=str_replace('<br>', ")<br>(", $sab['qualif']);

$ttlPg = &$rtf->addSection();
$ttlPg->setBorders(new BorderFormat(2, '#666666', 'double'));

if (strcmp('ML Doctors 2 Limited', $age['an'])==0)
{
	$img=&$ttlPg->addImage("Logos/mlDocF2.jpg",$null, 15, 0, new parFormat('center'));
}
else
{
	$ttlPg->writeText("<scaps>".$age['an']."</scaps>", new Font(18, $fF, $fFC), new parFormat('center'));
	$ttlPg->writeText(str_replace(', ', '<br>', '<scaps>'.$age['aa'].'</scaps>').'<br><scaps>'.$age['ap'].'</scaps>', new Font(16, $fF, $fFC), new parFormat('center'));
	$ttlPg->writeText('<b>Tel : </b>'.$age['ac'].' <b>Fax : </b>'.$age['af'].' <b>Email : </b>'.$age['ae'], new Font(13, $fF, $fFC), new parFormat('center'));
}
$ttlPg->writeText('<br><br><scaps><b>Medical Report</b></scaps>', new Font(26, $fF, $fFC), new parFormat('center'));
$ttlPg->writeText('<scaps>(Prepared for the Court)</scaps>', new Font(16, $fF, $fFC), new parFormat('center'));
$ttlPg->writeText('<br><scaps>By</scaps><br>', new Font(13, $fF, $fFC), new parFormat('center'));
//expert
$ttlPg->writeText("<scaps>".$sab['title']." ".$sab['fname']." ".$sab['lname']."</scaps>", new Font(20, $fF, $fFC), new parFormat('center'));
$ttlPg->writeText("<scaps>(".$qualiffication.')</scaps>', new Font(16, $fF, $fFC), new parFormat('center'));
$ttlPg->writeText('<br><scaps>On</scaps><br>', new Font(13, $fF, $fFC), new parFormat('center'));
//claimant
$ttlPg->writeText("<scaps>".$claimant['ct'].' '.trim($claimant['cfn']).' '.trim($claimant['cln'])."</scaps>", new Font(20, $fF, $fFC), new parFormat('center'));
$ttlPg->writeText("<scaps>".$claimant['ca1']."</scaps>".'<br>'."<scaps>".$claimant['ca2']."</scaps>".'<br>'."<scaps>".$claimant['cp']."</scaps>", new Font(16, $fF, $fFC), new parFormat('center'));
//solicitor
$ttlPg->writeText('<br><br><br><br><br><scaps><b>Instructing Solicitor	: </b>	'.$rsol['sn']."</scaps>", new Font(13, $fF, $fFC), new parFormat('left'));
$ttlPg->writeText('<scaps><b>Solicitor Reference	: </b></scaps>	'.$claimant['csolref'], new Font(13, $fF, $fFC), new parFormat('left'));
$ttlPg->writeText('<scaps><b>Our Reference		: </b></scaps>	'.$claimant['cageref'], new Font(13, $fF, $fFC), new parFormat('left'));

//creating first page

$sect = &$rtf->addSection();
$header = &$sect->addHeader();
$header->writeText($FNm.'<br>', new Font(9,"Arial"), $par0Left);
$sect->setBorders($border);
$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong>MEDICAL REPORT</strong>", new Font(14, $fF, $fFC), $par0Center);
$cell->writeText("Low Value Personal Injury Claims In Road Traffic Accidents (£1,000 to £10,000)", new Font(12, $fF, $fFC), $par0Center);


//$cell->writeText("<i>The First Report is Without Notes Except Where Requested By Medical Experts</i><br>", new Font(10, $fF, $fFC), $par0Center);

$cell->writeText("<strong><scaps>Section A </scaps></strong>- Claimant's Details", new Font(14, $fF, $fFC), $par0LeftB);

$sect->writeText('', new Font(14, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(13);
$table2->addColumn(10);
$table2->addColumn(5);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);


$cell2=&$table2->getCell(1, 1);
$cell2->writeText("<strong>Claimant's full name</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2->writeText($FNm, new Font(12, $fF, $fFC), $par0LeftBor);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("<strong>Date of birth</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2->writeText(hdt($claimant['cdb']), new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(2, 1);
$cell2->writeText("<strong>Address</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2->writeText($claimant['ca1'].', '.$claimant['ca2'].', '.$claimant['cp'], new Font(12, $fF, $fFC), $par0LeftBor);

$cell2=&$table2->getCell(2, 2);
$cell2->writeText("<strong>Occupation</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2->writeText($claimant['emp'], new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(3, 1);
$cell2->writeText("<br><strong>1.1 Has photo ID Been confirmed?</strong>", new Font(12, $fF, $fFC), $par0Left);

$cell2=&$table2->getCell(3, 2);

if (strlen($ident)>0)
{
	$cell2->writeText('<br><br><br>þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}
else
{
	$cell2->writeText('<br><br><br>o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}
//
$cdb=strtotime($claimant['cdb']);
$cdb=date('Y', $cdb);

$cde=strtotime($claimant['cde']);
$cde=date('Y', $cde);

$ade=ageCalc(date('d-m-Y', strtotime($claimant['cdb'])));

$cell2=&$table2->getCell(4, 1);
$cell2->writeText("<strong>    If Yes, what type of photo ID was Checked</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(4, 2);
$cell2->writeText($ident, new Font(12, $fF, $fFC), $par0LeftBor);

$cell2=&$table2->getCell(5, 1);
$cell2->writeText("<strong>    If No, what other ID was provided</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(5, 2);
$cell2->writeText('', new Font(12, $fF, $fFC), $par0LeftBor);

$cell2=&$table2->getCell(6, 1);
$cell2->writeText("<strong>1.2 Age of claimant at time of accident</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(6, 2);
$cell2->writeText($ade." years", new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(7, 1);
$cell2->writeText("<strong>1.3 Date of examination</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(7, 2);
$cell2->writeText(hdt($claimant['cde']), new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(8, 1);
$cell2->writeText("<strong>1.4 Date of accident</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(8, 2);
$cell2->writeText(hdt($claimant['cda']), new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(9, 1);
$cell2->writeText("<strong>1.5 Date of report</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(9, 2);
$cell2->writeText(date('d-m-Y'), new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(10, 1);
$cell2->writeText("<strong>1.6 Name of instructing solicitors</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(10, 2);
$cell2->writeText($rsol['sn'], new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(11, 1);
$cell2->writeText("<strong>1.7 Solicitors Reference</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(11, 2);
$cell2->writeText($claimant['csolref'], new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(12, 1);
$cell2->writeText("<strong>1.8 Name of instructing agency</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(12, 2);
$cell2->writeText($age['an'], new Font(12, $fF, $fFC), $par0LeftBor);

//
$cell2=&$table2->getCell(13, 1);
$cell2->writeText("<strong>1.9 Agency Reference</strong>", new Font(12, $fF, $fFC), $par0Left);
$cell2=&$table2->getCell(13, 2);
$cell2->writeText($claimant['cageref'], new Font(12, $fF, $fFC), $par0LeftBor);

//creating SECTION B
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

$cell->writeText("<strong><scaps>Section B </scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell = &$table->getCell(2, 1);
$cell->writeText("<br><strong>B(i) History</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($str22, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section b and section c
$sect->writeText('', new Font(12,$fontR, $fRC), $parBody);


$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong>B(ii) Later Symptoms</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($eff2, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section b and section c
$sect->writeText('', new Font(12,$fontR, $fRC), $parBody);

//creating section c
$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong><scaps>Section C </scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell = &$table->getCell(2, 1);
$cell->writeText("<br><strong>C(i) Employment Position/Education</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("<b><u>Current Status</u></b><br>".$jb."<br><b><u>Future Prospects</u></b><br>".$jp, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section d and section e
$sect->writeText('', new Font(12,$fontR, $fRC), $parBody);


$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong>C(ii) Consequential effects</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($strDL, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section e and section f
$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);


//section d

$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong><scaps>Section D </scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell = &$table->getCell(2, 1);
$cell->writeText("<br><strong>D(i) Past Medical History</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($pmh, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section f and section g
$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);


$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong>D(ii) On examination</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($strEF, new Font(12, $fF, $fFC), $parLeftBor);

//creating space b/w section g and section h
$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);


$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong>D(iii) Diagnosis opinion and prognosis</strong>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$ppp=str_replace('|b|', '<b>',$ppp);
$ppp=str_replace('|/b|', '</b>',$ppp);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("<u><strong>Summary</strong></u><br>".$sum."<br><u><strong>Prognosis</strong></u><br>Taking into account the following prognostic factors,<br>a) Age of the claimant<br>b) Mechanism of the accident<br>c) Onset of the pain<br>d) Examination<br><br>Considering the mechanism of injury and progression of symptoms, it is my opinion that the client sustained soft tissue injury to the cervical, thoracic and Lumbar spine, consistent with Whiplash Associated Disorder. Studies have shown that the rate of recovery of a soft tissue injury to the cervical, thoracic and lumbar spine resulting in a whiplash injury without nerve route compression or bony injury following a road traffic accident is variable. Whiplash injury is defined as a traumatic injury to the soft tissue structures of the spine including muscles, ligaments, intervertebral discs and facet joints due to hyper flexion and hyper extension, rotational injury and transmitted impact from the seat belt.<br><br>".$ppp, new Font(12, $fF, $fFC), $parLeftBor);

$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);

//creating section e

$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong><scaps>Section E</scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell=&$table->getCell(2, 1);
$cell->writeText("<br><strong>Seatbelts</strong>", new Font(13, $fF, $fFC), new parFormat());


$table2 = &$sect->addTable();
$table2->addRows(2);
$table2->addColumn(0.3);
$table2->addColumn(9.7);
$table2->addColumn(5);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("Was the claimant wearing a seatbelt?", new Font(12, $fF, $fFC), $par0Left);

$cell2=&$table2->getCell(1, 3);

$sBelt="select * from sBelt where id='".$_SESSION['n']."' and org='".$_SESSION['o']."' and cid='".$id."'";
$qBelt=mysql_query($sBelt);
$rBelt=mysql_fetch_array($qBelt);

if ($rBelt['sBelt']==true)
{
	$cell2->writeText('<br>þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}
else
{
	$cell2->writeText('<br>o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}

$cell2=&$table2->getCell(2, 2);
$cell2->writeText("Does the claimant have an exemption from wearing a seatbelt?", new Font(12, $fF, $fFC), $par0Left);

$cell2=&$table2->getCell(2, 3);

if (strlen(trim($rBelt['sBexemp']))>0)
{
	$cell2->writeText('<br>þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}
else
{
	$cell2->writeText('<br>o ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('Yes', new Font(12, $fF, $fFC), $null);
	$cell2->writeText('  þ ', new Font(12, 'Wingdings', $fFC), $null);
	$cell2->writeText('No', new Font(12, $fF, $fFC), $null);
}

$table2 = &$sect->addTable();
$table2->addRows(2);
$table2->addColumn(0.3);
$table2->addColumn(14.7);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("If Yes, please state form of exemption", new Font(12, $fF, $fFC), $parLeft);

$cell2=&$table2->getCell(2, 2);
$cell2->writeText($rBelt['frmExemp'], new Font(12, $fF, $fFC), $parLeftBor);

$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);


$table2 = &$sect->addTable();
$table2->addRows(2);
$table2->addColumn(0.3);
$table2->addColumn(14.7);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("If No, state what extent would each of the claimant's injuries have been prevented all together; have been less severe; or have been unchanged by the claimant's failure to wear a seatbelt?", new Font(12, $fF, $fFC), $parLeft);

$cell2=&$table2->getCell(2, 2);
$cell2->writeText('', new Font(12, $fF, $fFC), $parLeftBor);

$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);

//section f

$table = &$sect->addTable();
$table->addRows(2);
$table->addColumn(15);

$cell = &$table->getCell(1, 1);

$fF=$_POST['fF'];
$fFC=$_POST['fFC'];
$fRC=$_POST['fRC'];

$cell->writeText("<strong><scaps>Section F</scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell=&$table->getCell(2, 1);
$cell->writeText("<br><strong>Future treatment and rehabilitation</strong><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.3);
$table2->addColumn(14.7);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$ftr=explode('. I recommend ', $ppp);

$ftrFF='';

for ($i=1; $i<count($ftr); $i++)
{
	$ftrF=explode('In my opinion', $ftr[$i]);
	$ftrFF=$ftrFF.'• I recommend '.$ftrF[0].'<br>';
}

$cell2=&$table2->getCell(1, 2);
$cell2->writeText($ftrFF, new Font(12, $fF, $fFC), $parLeftBor);

$sect->writeText('', new Font(9,$fontR, $fRC), $parBody);
//section g
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

$cell->writeText("<strong><scaps>Section G </scaps></strong>", new Font(14, $fF, $fFC), $parLeftB);

$cell = &$table->getCell(2, 1);
$cell->writeText("<br><b>Statement of truth</b><br>", new Font(13, $fF, $fFC), new parFormat());

$table2 = &$sect->addTable();
$table2->addRows(1);
$table2->addColumn(0.5);
$table2->addColumn(14.5);
$table2->setVerticalAlignmentOfCells('center', 1, 1, 9, 2);

$cell2=&$table2->getCell(1, 2);
$cell2->writeText("Where I am not able to give my opinion without qualification, I have stated the qualification.<br><br>I confirm that I understand my duty to the court and have complied and will continue to comply with that duty.<br><br>I confirm that in so far as the facts stated in my report are within my own knowledge I have made clear which they are and I believe them to be true and that the opinions I have expressed represent my true and complete professional opinion<br><br><b>Signature</b><br>", new Font(12, $fF, $fFC), $parLeftBor);
$img=&$cell2->addImage($sab['signat'],$parLeftBor);
$cell2->writeText($sab['title']." ".$sab['fname']." ".$sab['lname'], new Font(12,$fF, $fRC), $parLeftBor);
$cell2->writeText("<br><b>Date</b>", new Font(12,$fF, $fRC), $parLeftBor);
$cell2->writeText(hdt($claimant['cde']), new Font(12,$fF, $fRC), $parLeftBor);


//appendix
$append= &$rtf->addSection($parBody);
$append->setBorders($border2);

$append->writeText(''.$str2, new Font(12,$fontR, $fRC), $parBody);

//references
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


function ageCalc($dob)
{
	$dt=date('d-m-Y');
//	echo $dob;
	
	$bd=explode('-', $dob);
	$td=explode('-', $dt);
	
	$age=$td[2]-$bd[2];
	
	//echo 'After Year Calculation, Age = '.$age;
	
	//echo '<br /><br />Is Current Month After dob month ? ';
	
	
	if (strcmp($td[1], $bd[1])>0)
	{
	//	echo 'No';
	}
	else if (strcmp($td[1], $bd[1])<0)
	{
	//	echo 'Yes';
		
	//	echo '<br /><br />Subtracting a year, Corrected Age = ';
		
		$age=$age-1;
		
	//	echo $age;
	}
	else
	{
	//	echo 'Checking Dates!<br /><br /> Is Current Date Greater than dob date ? ';
	
		if ((float)$bd[2]%4==0 && strcmp($bd[1], '02')==0 && strcmp($td[1], '02')==0)
		{
			if (strcmp($bd[0], '29')==0 && strcmp($td[0], 28)==0)
			{
//				echo 'Leapling';
				$td[0]='29';
			}
		}
		
		if (strcmp($td[0], $bd[0])>0)
		{
	//		echo 'No';
		}
		else if (strcmp($td[0], $bd[0])<0)
		{
	//		echo 'Yes';
			
	//		echo '<br /><br />Subtracting a year, Corrected Age = ';
			
			$age=$age-1;
			
	//		echo $age;
		}
		else
		{
	//		echo 'Happy Birthday!';
		}
	}
	
	return $age;
}
?>