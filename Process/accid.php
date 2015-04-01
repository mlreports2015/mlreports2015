<?
session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","../index.html");
}
else
{
$o=$_SESSION['o'];

include "../dcon.php";

$id=$_POST['id'];
$tm=$_POST['t'];
$sa=$_POST['loc'];
$ve=$_POST['veh'];
$aw=$_POST['aw'];
$sb=$_POST['sb'];
$hr=$_POST['hr'];
$ab=$_POST['ab'];
$abd=$_POST['abd'];
$st=$_POST['stat'];
$lo=$_POST['locat'];
$co=$_POST['cost'];
$im=$_POST['impact'];
$th=$_POST['thr'];
$dmg=$_POST['dam'];
$spd=$_POST['spe'];
$gc=$_POST['gc'];

$s1="select * from claimant where cid=$id and org='$o'";
$q1=mysql_query($s1);
$r1=mysql_fetch_array($q1);

$tt=$r1['ct'];
$nm=trim($r1['cln']);
$g=$r1['gen'];

$x='';
if ($g=='m')
	$x='He';
else
	$x='She';

$d="The accident occurred in the $tm. $tt $nm occupied the $sa's seat in a $ve. $x $sb wearing a seatbelt. A head restraint $hr fitted. An air-bag $ab fitted,";

if ($abd=='deployed')
{
	$d=$d." and it deployed. ";
}
else
	$d=$d." but it did not deploy. ";


$d=$d."At the moment of impact, the claimant's car was $st on a $lo. The claimant's $ve $co $aw";

if ($spd!="")
 $d=$d." at $spd mph. ";
else
 $d=$d.". The speed of the impact is not known. ";

$d=$d."The impact came from the $im. ";

if ($dmg!="unknown")
	$d=$d."Its force was sufficient to $dmg the car. ";
else
	$d=$d."The damage caused to the $ve is not known. ";



$d=$d."$tt $nm was thrown $th. $x ";

$d=$d.$gc;
// echo $d;

$s2="delete from accid where id=$id";
$q2=mysql_query($s2);

$s3="insert into accid set id=$id, accid=\"$d\", org='$o'";
echo "<Form method='POST' action='accid2.php?cid=$id'><table align=center><tr><td><textarea rows=4 cols=100 name=accid>$d</textarea></td></tr><tr><td><input type=submit value=submit /></td></tr></table></form>";
$q3=mysql_query($s3);

}
?>