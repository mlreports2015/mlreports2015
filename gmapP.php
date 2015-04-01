<?php

$stringData = $_POST['llI'];
echo $stringData;

$myFile = "latlang.php";
$fh = fopen($myFile, 'w') or die("can't open file");

fwrite($fh, $stringData);

fclose($fh);

?>