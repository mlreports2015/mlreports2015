<?php

include 'template.php';

head('Medical Records', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="<script language="javaScript" type="text/javascript" src="Scripts/summary.js"></script>', '', '','');
?>

<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Medical Records', $org, $id);

?>

<div align="center" style="" id="reco">
<iframe src="reco.php?cid=<?php echo $id;?>" width="98%" height="800px" ></iframe>
</div>


</BODY>

</HTML>