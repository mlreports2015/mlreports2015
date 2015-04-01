<FORM method="POST" action="Process/repinvx.php">
<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="idx" />

<DIV align="center" style="padding-top : 50pxpx;">
Charges &#163;<input type="text" name="chrgex" size=1 />
<br />
<INPUT type="submit" value="Generate Invoice with without VAT" />
</DIV>

<!-- <TEXTAREA id='ta' title=xyz>a  x </TEXTAREA> -->
</FORM>