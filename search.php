<?php

include 'template.php';

head('Details', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>', '', '', 'doeF();');

include 'template2.php';



$id=$_GET['cid'];



$org=$_SESSION['o'];



bTop('Details', $org, $id);

$_SESSION['chkrer']=1;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Doc</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="CSS/" />
</head>

<body>
<div align='center'>
<form method='post' action='searchProcessor.php' id='frm'>
    <table>
        <tr class="tr1">
                   <td align='left'>MLReports ID</td>
                   <td><input type='text' id='cid' name='cid' tabindex='1' /></td>
                   <td align='left'>Organization</td>
                   <td><input type='text' id='org' name='org' value='<?php echo $_SESSION['o']; ?>' tabindex='1' /></td>
                   <td align='left'>Client Title</td>
                   <td><input type='text' id='ct' name='ct' tabindex='1' /></td>
            </tr>
        <tr class="tr1">
                   <td align='left'>Client First Name</td>
                   <td><input type='text' id='cfn' name='cfn' tabindex='1' /></td>
                   <td align='left'>Client Last Name</td>
                   <td><input type='text' id='cln' name='cln' tabindex='1' /></td>
                   <td align='left'>Client DoB</td>
                   <td><input type='text' id='cdb' name='cdb' tabindex='1' /></td>
            </tr>
        <tr class="tr1">
                   <td align='left'>Job</td>
                   <td><input type='text' id='emp' name='emp' tabindex='1' /></td>
                   <td align='left'>Client Date of Accident</td>
                   <td><input type='text' id='cda' name='cda' tabindex='1' /></td>
                   <td align='left'>Client Date of Examination</td>
                   <td><input type='text' id='cde' name='cde' tabindex='1' /></td>
            </tr>
        <tr class="tr1">
                   <td align='left'>Client Address 1</td>
                   <td><input type='text' id='ca1' name='ca1' tabindex='1' /></td>
                   <td align='left'>Client Address 2</td>
                   <td><input type='text' id='ca2' name='ca2' tabindex='1' /></td>
                   <td align='left'>Client Post Code</td>
                   <td><input type='text' id='cp' name='cp' tabindex='1' /></td>
            </tr>
        <tr class="tr1">
                   <td align='left'>Client Contact 1</td>
                   <td><input type='text' id='cc1' name='cc1' tabindex='1' /></td>
                   <td align='left'>Client Contact 2</td>
                   <td><input type='text' id='cc2' name='cc2' tabindex='1' /></td>
                   <td align='left'>Agency Ref</td>
                   <td><input type='text' id='cageref' name='cageref' tabindex='1' /></td>
            </tr>
        <tr class="tr1">
                   <td align='left'>Solicitor Ref</td>
                   <td><input type='text' id='csolref' name='csolref' tabindex='1' /></td>
                   <td align='left'>Gender</td>
                   <td><input type='text' id='gen' name='gen' tabindex='1' /></td>
        <tr>
            <td colspan='6' align='center'><input type='submit' value='Search' /></td>
        </tr>
    </table>
    </form>
    </div>
    </body>
    </html>