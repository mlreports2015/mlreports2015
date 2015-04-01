<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include "dcon.php";


$sols = "select MAX(sid) from solicitor";
$solsres = mysql_query($sols);
$solsprint=mysql_fetch_row($solsres);
$maxsolid=$solsprint[0];

$t="select * from claimant";
$qt=mysql_query($t);
$rt=mysql_fetch_array($qt);

if (strcmp('nli', file_get_contents('http://www.mlreports.com/mlr/soldeload3.php?solid='.$maxsolid.'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p']))==0)
{
    echo '<div align="center" style="color:#f00;">Unfortunately, this session has expired and you would have to login again! Click <a href="index.html" target="_parent">here</a> to login again!</div>';
}
else if (file_get_contents('http://www.mlreports.com/mlr/soldeload3.php?solid='.$maxsolid.'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p'])===false)
{
    echo '<div align="center" style="color:#f00;">We can not seem to connect to the server at <a href="http://www.mlreports.com" target="_blank" style="color:#f00;">www.mlreports.com</a>. Please check if your internet connection is up and running...!</div>';
}
else
{
    $sqlG= str_replace('\\\\', '|', file_get_contents('http://www.mlreports.com/mlr/soldeload3.php?solid='.$maxsolid.'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p']));
    $sqlG= str_replace('\\', '', $sqlG);
    $sqlG= str_replace('|', '\\', $sqlG);
    $sqlG= strip_tags($sqlG);

    $sql=explode(';', $sqlG);

    $i=0;
    $e=0;
    foreach ($sql as $s)
    {
        $i=$i+1;
		echo $s;
        $q=  mysql_query($s);

        if (mysql_error()===false)
        {
          $e=$e+1;
        }
    }

    echo '<div align="center">Total Downloads : '.$i.'<br /><span style="color:#f00;">'.$e.' Unsuccessful Imports</span><br /><span style="color:#3f3;">'.($i-$e).' Successful Imports</span></div>';
}
?>