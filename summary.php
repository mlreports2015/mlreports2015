<?php

include 'template.php';

head('Summary', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="<script language="javaScript" type="text/javascript" src="Scripts/summary.js"></script>', '', '','');
?>

<BODY background="images/back.png" onLoad="doeF();">


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Summary', $org, $id);

?>

<FORM method="POST" action="Process/summary.php">

<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />

<?
$org=$_SESSION['o'];
  $q=mysql_query("select * from claimant where cid=$id and org='$org'");
  $r=mysql_fetch_array($q);
  $g=$r['gen'];
  
  if ($g=='m')
  {
  $g1='His';
  $g2='his';
  $g='He';
  $g3='he';
  }
  else
  {
  $g1='Her';
  $g2='her';
  $g='She';
  $g3='she';
  }
  
  $n=$r['ct']." ".$r['cln'];
  
  
?>

<DIV align="center" style="font-family:sans-serif;">

<H3>Summary Impression</H3>

<TABLE align="center" rules="all" cellpadding='5px' border="1">
	<TR>
		<TD align="center" colspan="2">
			<SELECT name="hist">
				<OPTION value="I was able to obtain a good history.">I was able to obtain a good history</OPTION>
				<OPTION value="I was unable to obtain a good history.">I was unable to obtain a good history</OPTION>
			</SELECT>
		</TD>
	</TR>
	<TR>
		<TD>Were his injuries consistent with the account of the accident</TD>
		<TD>
			<SELECT name="inj">consistent with the account of the accident
				<OPTION value="<? echo trim($n); ?>'s injuries were entirely consistent with the account of the accident">Yes</OPTION>
				<OPTION value="<? echo trim($n); ?> injuries were not consistent with the account of the accident">No</OPTION>
				<OPTION value="<? echo trim($n); ?> injuries were mainly consistent with the account of the accident">Mainly</OPTION>
				<OPTION value="<? echo trim($n); ?> injuries were almost consistent with the account of the accident">Almost</OPTION>
			</SELECT>
		</TD>
	</TR>
	
	<TR>
		<TD>Treatment</TD>
		<TD>
			<SELECT name="treat">
				<OPTION value="<? echo $g1; ?> treatment has been appropriate. ">Appropriate</OPTION>
				<OPTION value="<? echo $g1; ?> treatment has not been appropriate. ">Inappropriate</OPTION>
			</SELECT>
		</TD>
	</TR>
	
	<TR>
		<TD>Problems in home life</TD>
		<TD>
			<SELECT name="hlyf">
				<OPTION value="The claimed problems in <?echo trim($n); ?>'s home life are consistent and reasonable.">Reasonable</OPTION>
				<OPTION value="The claimed problems in <?echo trim($n); ?>'s home life are inconsistent and unreasonable.">Reasonable</OPTION>
			</SELECT>
		</TD>
	</TR>
</TABLE>

<H3>Job Prospects</H3>

<?php

	$se="select * from claimant where cid='$id'";
	$qe=mysql_query($se);
	$re=mysql_fetch_array($qe);

	echo '<b>'.$re['emp'].'</b>';


	if (strcasecmp($re['emp'], 'Retired')==0)
	{
?>

<TABLE align="center" border="0" rules="all" cellpadding="5px" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
            	<option value="<? echo $g;?> is retired."><? echo $g;?> is retired.
			</SELECT>
			
			<DIV align="center" id="jab" onClick="notres2();" style="visibility:hidden;">
				<SELECT name="jabs" id="jabs">
					<OPTION value=".">...</OPTION>
					<OPTION value="<? echo $g1;?> ability to work is likely to improve steadily">Would Steadily Improve</OPTION>
					<OPTION value="<? echo $g;?> might never be able to manage work properly">Might Never improve</OPTION>
					<OPTION value="<? echo $g1;?> ability to work would return to normal">Would Return to Normal</OPTION>
				</SELECT>
				
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be moderately restricted">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>

<?php

	}
	else if (strcasecmp($re['emp'], 'Home Maker')==0)
	{
?>

<TABLE align="center" border="1" rules="all" cellpadding="5px" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
            	<option value="<? echo $g;?> is a home-maker."><? echo $g;?> is a home-maker.</option>
                <OPTION value="<?echo $g;?> would be fit to work if <?echo $g3;?> chose to do so.">would be fit to work if <?echo $g3;?> chose to do so.</OPTION>
				<OPTION value="<?echo $g;?> would be mildly restricted at work if <?echo $g3;?> chose to do so.">would be mildly restricted at work if <?echo $g3;?> chose to do so.</OPTION>
				<OPTION value="<?echo $g;?> would only be able to manage sedentary work if <?echo $g3;?> chose to do so.">would only be able to manage sedentary work if <?echo $g3;?> chose to do so.</OPTION>
                
                <OPTION value="<?echo $g;?> does not face any problems with <?echo $g2;?> daily chores.">would be fit to carry out <?echo $g2;?> daily chores.</OPTION>
				<OPTION value="<?echo $g;?> is mildly restricted with <?echo $g2;?> daily chores.">would be mildly restricted with <?echo $g2;?> daily chores.</OPTION>
				
			</SELECT>
			
			<DIV align="center" id="jab" onClick="notres2();" style="visibility:hidden;">
				<SELECT name="jabs" id="jabs">
					<OPTION value=".">...</OPTION>
					<OPTION value="<? echo $g1;?> ability to work is likely to improve steadily">Would Steadily Improve</OPTION>
					<OPTION value="<? echo $g;?> might never be able to manage work properly">Might Never improve</OPTION>
					<OPTION value="<? echo $g1;?> ability to work would return to normal">Would Return to Normal</OPTION>
				</SELECT>
				
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>

<?php

	}
	
		else if (strcasecmp($re['emp'], 'Unemployed')==0)
	{
?>

<TABLE align="center" border="1" cellpadding="5px" rules="all" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
            	<option value="<? echo $g;?> is unemployed at the moment."><? echo $g;?> is unemployed.</option>
                <OPTION value="<?echo $g;?> would be fit to work if <?echo $g3;?> chose to do so.">would be fit to work if <?echo $g3;?> chose to do so.</OPTION>
				<OPTION value="<?echo $g;?> would be mildly restricted at work if <?echo $g3;?> chose to do so.">would be mildly restricted at work if <?echo $g3;?> chose to do so.</OPTION>
				<OPTION value="<?echo $g;?> would only be able to manage sedentary work if <?echo $g3;?> chose to do so.">would only be able to manage sedentary work if <?echo $g3;?> chose to do so.</OPTION>
                
                <OPTION value="<?echo $g;?> does not face any problems with <?echo $g2;?> daily chores.">would be fit to carry out <?echo $g2;?> daily chores.</OPTION>
				<OPTION value="<?echo $g;?> is mildly restricted with <?echo $g2;?> daily chores.">would be mildly restricted with <?echo $g2;?> daily chores.</OPTION>
				
			</SELECT>
			
			<DIV align="center" id="jab" onClick="notres2();" style="visibility:hidden;">
				<SELECT name="jabs" id="jabs">
					<OPTION value=".">...</OPTION>
					<OPTION value="<? echo $g1;?> ability to work is likely to improve steadily">Would Steadily Improve</OPTION>
					<OPTION value="<? echo $g;?> might never be able to manage work properly">Might Never improve</OPTION>
					<OPTION value="<? echo $g1;?> ability to work would return to normal">Would Return to Normal</OPTION>
				</SELECT>
				
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be moderately restricted .">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>

<?php

	}
	
		else if (strcasecmp($re['emp'], 'Child')==0)
	{
?>

<TABLE align="center" border="1" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
            	<option value="<? echo $g;?> is a child."><? echo $g;?> is a child.
			</SELECT>
			
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>

<?php

	}
		else if (strcasecmp($re['emp'], 'Student')==0)
	{
?>

<TABLE align="center" border="1" rules="all" cellpadding="5px" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
            	<option value="<? echo $g;?> is a student."><? echo $g;?> is a student.
                <OPTION value="<?echo $g;?> is currently fit to work.">fit to work</OPTION>
				<OPTION value="Currently, <?echo $g;?> is mildly restricted at work.">mildly restricted at work</OPTION>
                <OPTION value="Currently, <?echo $g;?> is moderately restricted at work.">moderately restricted at work</OPTION>
				<OPTION value="Currently, <?echo $g;?> can only manage sedentary work.">only able to manage sedentary work</OPTION>
			</SELECT>
			
			<DIV align="center" id="jab" onClick="notres2();" style="visibility:hidden;">
				<SELECT name="jabs" id="jabs">
					<OPTION value=".">...</OPTION>
					<OPTION value="<? echo $g1;?> ability to work is likely to improve steadily">Would Steadily Improve</OPTION>
					<OPTION value="<? echo $g;?> might never be able to manage work properly">Might Never improve</OPTION>
					<OPTION value="<? echo $g1;?> ability to work would return to normal">Would Return to Normal</OPTION>
				</SELECT>
				
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>

<?php

	}
	
	else
	{
?>

<TABLE align="center" border="1" rules="all" cellpadding="5px" width=700px>
	<TR>
		<TD align="center">
			<?echo $n;?> is currently
			<SELECT id="jrest" name="jrest" onclick="notres('<?php echo $g?>');">
				<OPTION value="<?echo $g;?> is currently fit to work.">fit to</OPTION>
				<OPTION value="<?echo $g;?> is currently mildly restricted at work.">mildly restricted at</OPTION>
                <OPTION value="<?echo $g;?> is currently moderately restricted at work.">moderately restricted at</OPTION>
				<OPTION value="Currently, <?echo $g;?> can only manage sedentary work.">only able to manage sedentary</OPTION>
			</SELECT>
			work.
			<DIV align="center" id="jab" onClick="notres2();" style="visibility:hidden;">
				<SELECT name="jabs" id="jabs">
					<OPTION value=".">...</OPTION>
					<OPTION value="<? echo $g1;?> ability to work is likely to improve steadily">Would Steadily Improve</OPTION>
					<OPTION value="<? echo $g;?> might never be able to manage work properly">Might Never improve</OPTION>
					<OPTION value="<? echo $g1;?> ability to work would return to normal">Would Return to Normal</OPTION>
				</SELECT>
				
				<DIV align="center" id="jaba" style="visibility:hidden;">
					
					<TABLE align="center">
						<TR><TD align="center">
							<INPUT type="text" size="3" id="mpas" name="mpas" />
							<SELECT name="mmpast" id="mmpast">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD></TR>
					</TABLE>
				</DIV>
			</DIV>
			<SELECT name="ltef" id="ltef">
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.">In the long term, <?php echo $g2; ?> employment prospects on the open job market are likely to be unaffected.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.">In the long term, <?php echo $g2; ?> employment prospects on the open job market would be mildly restricted.</OPTION>
				<OPTION value="In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.">In the long term, <?php echo $g2; ?> employment prospects would be moderately affected on the open job market.</OPTION>
				<OPTION value="In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.">In the long term, <?php echo $g3; ?> would be severely hindered on the open job market.</OPTION>
			</SELECT>
				<br />
		</TD>
	</TR>
</TABLE>
<?php
	}
?>

<INPUT type="submit" value="Submit">

</DIV>

</FORM>

<script type="text/javascript" language="javascript">
function notres(a)
{
	var n=document.getElementById('jab');

	if (document.getElementById('jrest').value!=a+' is fit to work.')
	{
		n.style.visibility='visible';
	}
	else
	{
		n.style.visibility='hidden';
		document.getElementById('jaba').style.visibility='hidden';
	}
}

function notres2()
{
	var n=document.getElementById('jaba');

	if (document.getElementById('jabs').value==document.getElementById('jabs')[3].value)
	{
		n.style.visibility='visible';
	}
	else
	{
		n.style.visibility='hidden';
	}
}

</script>


</BODY>

</HTML>

<!--Mr. XYZ is currently  work.
His ability to work is likely to return to normal over the next 4 months.


Mr. XYZ is currently  work.
His ability to work is likely to improve steadily.
In the long term, his employment prospects are likely to be unaffected.-->



