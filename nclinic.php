

<?
session_start();

// if (isset($_SESSION['nm']))
{
echo "<TABLE>
<TH colspan=2 align='center'>New Clinic</TH>
<TR>
<TD>Name</TD><TD><INPUT type='text' name='cn'></TD>
</TR>
<tr>
<TD>Clinic Address</TD><TD><INPUT type='text' name='ca'></TD>
</tr>
<tr>
<TD>Clinic Contact</TD><TD><INPUT type='text' name='cc'></TD>
</tr>
<tr>
<TD colspan=2 align='center'><A href='' onclick=''>Create New Clinic</A></TD>
</TR>
</TABLE>";
}

?>