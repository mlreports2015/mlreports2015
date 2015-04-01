<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

/*$tbl="CREATE TABLE IF NOT EXISTS `updates` (
  `updateId` int(11) NOT NULL AUTO_INCREMENT,
  `caseId` varchar(50) NOT NULL,
  `tblName` varchar(50) NOT NULL,
  `clmUpd8d` varchar(50) NOT NULL,
  `newValue` varchar(500) NOT NULL,
  `tStamp` int(15) NOT NULL,
  PRIMARY KEY (`updateId`)
)";*/

//$tbl="ALTER TABLE  `Updates` ADD  `user` VARCHAR( 30 ) NOT NULL";

$tbl="drop table Updates";
echo nl2br($tbl);
include 'dcon.php';
mysql_query($tbl);

$tbl="CREATE TABLE IF NOT EXISTS `updates` (
  `updateId` int(11) NOT NULL AUTO_INCREMENT,
  `caseId` varchar(50) NOT NULL,
  cFN varchar(50) not null,
  cLn varchar(50) not null,
  PRIMARY KEY (`updateId`)
)";
echo nl2br($tbl);
include 'dcon.php';
mysql_query($tbl);

?>

</body>
</html>