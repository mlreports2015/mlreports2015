<head>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAYPZsBf6onOkX7jBPcG-eRhROQGNTnT49rb9sb017ZStsrScfERQHWJxzkUf9l3JYhKJdL6tJzOaFAw" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAAYPZsBf6onOkX7jBPcG-eRhSS8ErPSmOYoanqozeXX2gkj70IRhQbfP5lXLfofmHgqrwEAoK0A_7_tg" type="text/javascript"></script>
<script src="gmap.js" type="text/javascript"></script>

<script type="text/javascript" language="javascript">

function submitIt()
{
	alert(document.getElementById('llI').value);
	if (document.getElementById('llI').value!='')
	{
		alert ('submit');
		document.ll.submit();
	}
	
	setTimeout("submitIt()", 2000);
}

</script>

</head>

<body onload="javascript:usePointFromPostcode('<?php echo $_GET['pc']; ?>', showPointLatLng); submitIt();">

<form name="ll" id="ll" action="gmapP.php" method="post">
<input type="text" id="llI" value="" name="llI" />
</form>

</body>