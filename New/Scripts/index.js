var Gcsa=0;
var Gsb=0;

function init()
{
	Gcsa=0;
}

function showacr()
{
	var v=document.getElementById('acr');
	v.style.visibility='visible';

	var v=document.getElementById('cdets');
	v.style.top='0px';

	var c=document.getElementById('ccr');
	c.style.visibility='hidden';

	if (Gcsa==0)
	{
// 		var h=document.getElementById('csa').style.height;
// 		h=h.replace('px','');
// 		h=h*1+70;

		Gcsa=0;

// 		document.getElementById('csa').style.height=h;
	}
}

function resetc()
{
	var v=document.getElementById('acr');
	v.style.visibility='hidden';

	var c=document.getElementById('c');
	c.style.visibility='visible';

	v=document.getElementById('acrs');
	v.style.visibility='visible';
}

function showccr()
{
	var v=document.getElementById('ccr');
	v.style.visibility='visible';

	var v=document.getElementById('cdets');
	v.style.top='-110px';

	var c=document.getElementById('acr');
	c.style.visibility='hidden';

	if (Gcsa==1)
	{
		var h=document.getElementById('csa').style.height;
// 		h=h.replace('px','');
// 		h=h*1-70;

		Gcsa=0;

// 		document.getElementById('csa').style.height=h;
	}
}

function togleac()
{
	var v=document.getElementById('acm');

	var val=v.value;

	if (val=='1')
	{
		showacr();
// 		alert('Checked');
	}
	else
		showccr();
}

function showchkd()
{
	var v=document.getElementById('chkd');
	v.style.visibility='visible';
}

function hidechkd()
{
	var v=document.getElementById('chkd');
	v.style.visibility='hidden';
}

function toglechk()
{
	var v=document.getElementById('iid');

	var val=v.value;

	if (val=='1')
	{
		showchkd();
// 		alert('Checked');
	}
	else
		hidechkd();
}

function showacm()
{
	var v=document.getElementById('acmd');
	v.style.visibility='visible';
// 	v.style.height='300px';
}

function hideacm()
{
	var v=document.getElementById('acmd');
	v.style.visibility='hidden';
// 	v.style.height='0px';
}

function togleacm()
{

// alert('123');
	var v=document.getElementById('acm');
// alert('1234');
	var val=v.value;
// alert(val);
	if (val=='1')
	{
// alert('Checked1');
		showacm();
// 		alert('Checked');
	}
	else
		hideacm();
}

function showsoi()
{
	var v=document.getElementById('soid');
	v.style.visibility='visible';

	var v=document.getElementById('boi');
	v.style.top='0px';

	if (Gsb==0)
	{
		var h=document.getElementById('sb').style.height;
		h=h.replace('px','');
		h=h*1+70;

		Gsb=0;

		document.getElementById('sb').style.height=h;
	}
	
}

function hidesoi()
{
	var v=document.getElementById('soid');
	v.style.visibility='hidden';
	
	var v=document.getElementById('boi');
	v.style.top='-350px';

	if (Gsb==0)
	{
		var h=document.getElementById('sb').style.height;
		h=h.replace('px','');
		h=h*1+70;

		Gsb=0;

		document.getElementById('sb').style.height=h;
	}
}

function toglesoi()
{

// alert('123');
	var v=document.getElementById('soi');
// alert('1234');
	var val=v.value;
// alert(val);
	if (val=='1')
	{
// alert('Checked1');
		showsoi();
// 		alert('Checked');
	}
	else
		hidesoi();
}

function admin()
{
	document.getElementById('admin').style.visibility='visible';
	document.getElementById('rep').style.visibility='hidden';
}

function rep()
{
	document.getElementById('admin').style.visibility='hidden';
	document.getElementById('rep').style.visibility='visible';
}

function closit(a,b)
{
	document.getElementById(a).style.visibility='hidden';
	document.getElementById(b).style.visibility='visible';
}

function ref1()
{
// 	<SCRIPT type='text/javascript' language='JavaScript'>javascript:parent.ref();</SCRIPT>
}

function refh()
{
	document.getElementById('msg').style.visibility='hidden';
}

function pic(a,b)
{
	var v=document.getElementById(a).value;
	if (v==0)
	{
		document.getElementById(a).value='1';
// 		document.getElementById('p').style.backgroundImage="url(images/tt.png)";
		document.getElementById(b).style.backgroundColor="#0000AA";
	}
	else if (v==1)
	{
		document.getElementById(a).value='0';
		document.getElementById(b).style.backgroundColor="#AAAAFF";
	}
}

function showcage()
{
	var v=document.getElementById('cage');
	v.style.visibility='visible';
	v=document.getElementById('nage');
	v.style.visibility='hidden';

	v=document.getElementById('aar');
	v.style.top='-150px';

	v=document.getElementById('ss');
	v.style.top='-130px';

	v=document.getElementById('ssr');
	v.style.top='-160px';

	if (Gcsa==1)
	{
		var h=document.getElementById('csa').style.height;
		h=h.replace('px','');
		h=h*1-70;

		Gcsa=0;

		document.getElementById('csa').style.height=h;
	}
}

function togleag()
{

// alert('123');
	var v=document.getElementById('agen');
// alert('1234');
	var val=v.value;
// alert(val);
	if (val=='1')
	{
// alert('Checked1');
		shownage();
// 		alert('Checked');
	}
	else
		showcage();
}

function shownage()
{
	var v=document.getElementById('cage');
	v.style.visibility='hidden';
	v=document.getElementById('nage');
	v.style.visibility='visible';

	v=document.getElementById('aar');
	v.style.top='0px';

	v=document.getElementById('ss');
	v.style.top='0px';

	v=document.getElementById('ssr');
	v.style.top='-160px';

// alert('125');

	if (Gcsa==0)
	{
		var h=document.getElementById('csa').style.height;
		h=h.replace('px','');
		h=h*1+70;

		Gcsa=0;

		document.getElementById('csa').style.height=h;
	}
}

function showcsol()
{
	var v=document.getElementById('csol');
	v.style.visibility='visible';
	v=document.getElementById('nsol');
	v.style.visibility='hidden';

	v=document.getElementById('ssr');
	v.style.top='-160px';

	if (Gcsa==1)
	{
		var h=document.getElementById('csa').style.height;
		h=h.replace('px','');
		h=h*1-70;

		Gcsa=0;

		document.getElementById('csa').style.height=h;
	}
}

function togleso()
{

// alert('123');
	var v=document.getElementById('sol');
// alert('1234');
	var val=v.value;
// alert(val);
	if (val=='1')
	{
// alert('Checked1');
		shownsol();
// 		alert('Checked');
	}
	else
		showcsol();
}

function shownsol()
{
	var v=document.getElementById('csol');
	v.style.visibility='hidden';
	v=document.getElementById('nsol');
	v.style.visibility='visible';

	v=document.getElementById('ssr');
	v.style.top='0px';

	if (Gcsa==0)
	{
		var h=document.getElementById('csa').style.height;
		h=h.replace('px','');
		h=h*1+70;

		document.getElementById('csa').style.height=h;
		Gcsa=1;
	}
}

function addclinic()
{
	var v=document.getElementById('acr');
	v.style.visibility='hidden';

	v=document.getElementById('nvenD');
	v.style.visibility='visible';

	v=document.getElementById('nvenI');
	v.value=document.getElementById('cn1').value;
}

function eVen()
{
	var v=document.getElementById('acr');
	v.style.visibility='visible';
}

function addsolic()
{
	var v=document.getElementById('nsol');
	v.style.visibility='hidden';

	v=document.getElementById('nsolD');
	v.style.visibility='visible';

	v=document.getElementById('nsolI');
	v.value=document.getElementById('sn').value;
}

function eVen()
{
	var v=document.getElementById('nsolD');
	v.style.visibility='visible';
}