function showacr()
{
	var v=document.getElementById('acr');
	v.style.visibility='visible';

	var v=document.getElementById('cdets');
	v.style.top='0px';

	var c=document.getElementById('ccr');
	c.style.visibility='hidden';
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
	if (val!='1')
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
	
}

function hidesoi()
{
	var v=document.getElementById('soid');
	v.style.visibility='hidden';
	
	var v=document.getElementById('boi');
	v.style.top='-350px';
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
}

function showcsol()
{
	var v=document.getElementById('csol');
	v.style.visibility='visible';
	v=document.getElementById('nsol');
	v.style.visibility='hidden';

	v=document.getElementById('ssr');
	v.style.top='-160px';
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
}

function doeF()
{
	var dob=document.getElementById('dob').value.replace(/^\s*|\s*$/g,'');
	var doa=document.getElementById('doa').value.replace(/^\s*|\s*$/g,'');
	var doe=document.getElementById('doe').value.replace(/^\s*|\s*$/g,'');

	if (dob=='01-01-1200')
	{
		alert ('Check DoB');
		document.getElementById('dob').value='';
	}

	if (doa=='01-01-1200')
	{
		alert ('Check DoA');
		document.getElementById('doa').value='';
	}

	if (doe=='01-01-1200')
	{
		alert ('Check DoE');
		document.getElementById('doe').value='';
	}

	if (confirm('Set Date of Examination to Current Date?'))
	{
		var dt=new Date();
		var d=dt.getDate();
		var m=dt.getMonth()+1;
		var yrx=dt.getYear();

		if (d<10)
		{
			d='0'+d;
		}
		if (m<10)
		{
			m='0'+m;
		}


		var headID = document.getElementsByTagName('head')[0];
		var cssNode = document.createElement('link');
		var browser=navigator.appName;

		if ((browser=='Microsoft Internet Explorer'))
		{
			yrx=yrx;
		}
		else if (browser=='Netscape' || browser=='Konqueror')
		{
			yrx=yrx+1900;
		}

		document.getElementById('doe').value=d+'-'+m+'-'+yrx;
	}
}