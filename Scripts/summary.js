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