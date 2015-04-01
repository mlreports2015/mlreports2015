<FORM method="POST" action="Process/repinv.php">
<input type="hidden" value="<?php $id= $_GET['cid']; echo $id; ?>" name="id" />

<DIV align="center" style="padding-top : 50pxpx;">
Charges &#163;<input type="text" name="chrge" size=1 />
<br />
<INPUT type="submit" value="Generate Invoice with VAT" />
</DIV>

</FORM>