var advyz='';
var preyz='';
var refyz='';
var snotyz='';

function addinit(a)
{
var itr=document.getElementById('itr');

var ith=document.getElementById('ith').value;
var iaf=document.getElementById('iaf').value;
var ide=document.getElementById('ide').value;

var itf=document.getElementById('itf');
var itb=document.getElementById('itb');

var it='';

var l='';
var i=1;
var qq='';
var j=0;
var qq22='';

if (ith!='')
{
	if (iaf=='ambulance')
		it=ith+' and went '+ide+' by '+iaf;
	else if (iaf=='continued')
		it=ith+' and '+iaf+' '+ide;
	else
		it=ith+' and took a '+iaf+' '+ide;
}
else
{
	if (iaf=='ambulance')
		it='went '+ide+' by '+iaf;
	else if (iaf=='continued')
		it=iaf+' '+ide;
	else
		it='took a '+iaf+' '+ide;
}

if (itr.value=='.' && itb[0].selected==true)
{
	l=a+' did not receive any treatment';
	qq='';
}
else if (itr[0].selected!=true)
{
	var i=1;
	var j=0;
	var k=0;
// alert('123');
	while (i<5)
	{
		if (itr[i].selected==true)
			j=j+1;
		i=i+1;
	}

	i=1;
	while (i<5)
	{
		if (itr[i].selected==true)
		{
	// 		alert(itr[i].value);
			if (k==0)
			{
				k=1;
				qq=' '+itr[i].value;
			}
			else if (i<j)
				qq=qq+', '+itr[i].value;
			else
				qq=qq+' and '+itr[i].value;
		}
		i=i+1;
	}

l='Initial treatment included ';


if (itb[0].selected!=true)
{
	i=1;
	j=0;
	k=0;

	while (i<8)
	{
		if (itb[i].selected==true)
			j=j+1;
		i=i+1;
	}

	i=1;
	while (i<8)
	{
		if (itb[i].selected==true)
		{
	// 		alert(itr[i].value);
			if (k==0)
			{
				k=1;
				qq22=' by '+itb[i].value;
			}
			else if (i<j)
				qq22=qq22+', '+itb[i].value;
			else
				qq22=qq22+' and '+itb[i].value;
		}
		i=i+1;
	}
}
}
else if (itr[0].selected==true && itb[0].selected!=true)
{
	var i=1;
	var j=0;
	var k=0;
// alert('123');
	while (i<8)
	{
		if (itb[i].selected==true)
			j=j+1;
		i=i+1;
	}

	i=1;
	while (i<8)
	{
		if (itb[i].selected==true)
		{
	// 		alert(itr[i].value);
			if (k==0)
			{
				k=1;
				qq22=' by '+itb[i].value;
			}
			else if (i<j)
				qq22=qq22+', '+itb[i].value;
			else
				qq22=qq22+' and '+itb[i].value;
		}
		i=i+1;
	}

	l='Initial treatment was administered';

}
itf.innerHTML=l+qq+qq22+' at the scene of the accident. '+a+' then '+it+'.';
}

function ltroo()
{
// var ltr=document.getElementById('ltr');
// if (ltr.value=='other')
// {
// 	document.frm.ltro.disabled=false;
// }
}

function addlater()
{

var ltp=document.getElementById('ltp').value;
var ltl=document.getElementById('ltl').value;
var ldr=document.getElementById('ld').value;
// var ltr=document.getElementById('ltr').value;
var lad=document.getElementById('lad').value;

if (lad=='advised to use')
	alert(adviced());

var lt='';
//if (ltr=='other')
//	lt=document.getElementById('ltro').value;
//else
//	lt=document.getElementById('ltr').value;


var ni = document.getElementById('nu');
var numi = document.getElementById('theValue');
var num = (document.getElementById('theValue').value -1)+ 2;
numi.value = num;

var newt = document.createElement('textarea');
var tIdName = 'l'+'['+num+']';
newt.setAttribute('cols',100);
newt.setAttribute('id',tIdName);
newt.setAttribute('name',tIdName);

alert(tIdName);

var fin='';

if (ltp!='Began taking over the counter')
{
	if (ldr=='immediately')
		fin=ltp + ' immediately after the accident '+ ' and ' + lad + ' ' + lt;
	else if (ldr=='shortly')
		fin=ltp + ' shortly after the accident '+ ' and ' + lad + ' ' + lt;
	else
		fin=ltp + ' after '+ ltl + ' ' + ldr + ' and ' + lad +' ' + lt;
}
else
{
	if (ldr=='immediately')
		fin=ltp + ' ' + lt + ' immediately after the accident';
	else if (ldr=='shortly')
		fin=ltp + ' ' + lt + ' shortly after the accident';
	else
		fin=ltp + ' ' + ' after '+ ltl + ' ' + ldr;
}

newt.innerHTML = fin+'.';
ni.appendChild(newt);
}

function safter()
{
	if (document.getElementById('saft').value=='later')
	{
		document.getElementById('satm').style.visibility='visible';
	}
	else
		document.getElementById('satm').style.visibility='hidden';
}

function togglex(a,b)
{
	a=document.getElementById(a);
	b=document.getElementById(b);
// alert(b.value);

	if (b.value=='0')
	{
		b.value='1';
		a.style.backgroundColor='#33B';
	}
	else
	{
		b.value='0';
		a.style.backgroundColor='#CCC';
	}
}

function addlater2()
{
var ltp=document.getElementById('ltp').value;
var ltl=document.getElementById('ltl').value;
var ldr=document.getElementById('ld').value;
// var ltr=document.getElementById('ltr').value;
var lad=document.getElementById('lad').value;

var lt='';
//if (ltr=='other')
//	lt=document.getElementById('ltro').value;
//else
//	lt=document.getElementById('ltr').value;

var ni = document.getElementById('nu');
var numi = document.getElementById('theValue');
var num = (document.getElementById('theValue').value -1)+ 2;
numi.value = num;

var newt = document.createElement('textarea');
var tIdName = 'l'+'['+num+']';
newt.setAttribute('cols',100);
newt.setAttribute('id',tIdName);
newt.setAttribute('name',tIdName);

// alert(tIdName);

var fin='';

var lt='';

if (advyz==true)
{
	lt='was advised '+adviced();

// alert (lt);

	if (preyz==true)
	{
// 		alert('xyz');
		lt=lt+' and prescribed to use '+prescrip();
	}
}
else
{
	if (preyz==true)
	{
// 		alert('xyz');
		lt='was prescribed to use '+prescrip();
	}
}
// 	alert(lt);

if (ltp!='Began taking over the counter')
{
	if (ldr=='immediately')
		fin=ltp + ' immediately after the accident and ' + lt;
	else if (ldr=='shortly')
		fin=ltp + ' shortly after the accident and ' + lt;
	else
	{
		if (ltl>'1')
			fin=ltp + ' after '+ ltl + ' ' + ldr + 's and ' + lt;
		else
			fin=ltp + ' after '+ ltl + ' ' + ldr + ' and ' + lt;
	}
}
else
{
	if (ldr=='immediately')
	{
		fin=ltp + ' ' + ltotc() + ' immediately after the accident';
// alert(ltp);
	}
	else if (ldr.value=='shortly')
		fin=ltp + ' ' + ltotc() + ' shortly after the accident';
	else
	{
		if (ltl.value>'1')
			fin=ltp +' ' + ltotc() + ' ' + ltl+ ' ' + ldr+'s after the accident';
		else
			fin=ltp +' ' + ltotc() + ' ' + ltl+ ' ' + ldr+ ' after the accident';
	}

	if (document.getElementById('otcdur').value.length>0)
	{
		if (document.getElementById('otcdur').value>'1')
			fin=fin+'. The treatment was continued for '+document.getElementById('otcdur').value+' '+document.getElementById('otcdur2').value+'s';
		else
			fin=fin+'. The treatment was continued for '+document.getElementById('otcdur').value+' '+document.getElementById('otcdur2').value;
	}
	if (document.getElementById('otceff').value=='1')
		fin=fin+'. It was effective';
}

if (refyz==true && advyz==false && preyz==false)
	fin=fin+'was referred to a '+referexy();
else if (refyz==true)
	fin=fin+' and was referred to a '+referexy();

if (refyz==false && advyz==false && preyz==false && snotyz==true)
{
	if (document.getElementById('skdz').value>1)
		fin=fin+'was given a sick-note for '+document.getElementById('skdz').value+' '+document.getElementById('skdzt').value+'s';
	else
		fin=fin+'was given a sick-note for '+document.getElementById('skdz').value+' '+document.getElementById('skdzt').value;
}
else if (snotyz==true)
{
	if (document.getElementById('skdz').value>1)
		fin=fin+' and was given a sick-note for '+document.getElementById('skdz').value+' '+document.getElementById('skdzt').value+'s';
	else
		fin=fin+' and was given a sick-note for '+document.getElementById('skdz').value+' '+document.getElementById('skdzt').value;
}

newt.innerHTML = fin+'.';

var newh = document.createElement('input');
var hIdName = 't'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');

newb.setAttribute('onclick','ignoreit('+num+')');

newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

ni.appendChild(newt);
ni.appendChild(newb);
ni.appendChild(newh);
ni.appendChild(newbr);

advyz='';
preyz='';
refyz='';
snotyz='';

document.getElementById('advised').style.visibility='hidden';
document.getElementById('presc').style.visibility='hidden';
document.getElementById('reff').style.visibility='hidden';
document.getElementById('rstrtxyz').style.visibility='hidden';
document.getElementById('reffin').style.visibility='hidden';
document.getElementById('refcon').style.visibility='hidden';
document.getElementById('refben').style.visibility='hidden';
document.getElementById('snot').style.visibility='hidden';
document.getElementById('otcdv').style.visibility='hidden';
}


function adviced()
{
	var i=0;
	var j=0;
	
	var ad='';
	
	var b='';
	
	while (i<6)
	{
		b='ad['+i+']';
		ad=document.getElementById(b).value;
		if (ad=='1')
		{
			j=j+1;
		}
		i=i+1;
	}
	
// 	alert('j='+j);
	
	i=0;
	
	var ret='';
	
	var ab;
	var l=0;
	var k=0;
	
	if (j>1)
	{
		while (i<6)
		{
			b='ad['+i+']';
			ad=document.getElementById(b).value;
			
			if (l<(j-1))
			{
				if (ad=='1')
				{
					if (k==0)
					{
						k=1;
						ret=valx(i);
	// 					alert (ret);
					}
					else if (k==1)
					{
						ret=ret+', '+valx(i);
					}
					l=l+1;
// 					alert('l='+l);
// 					alert ('ret='+ret);
				}
			}
			else
			{
				if (ad=='1')
				{
					ret=ret+' and '+valx(i);
				}
			}
			i=i+1;
		}
	}
	else
	{
		while (i<6)
		{
			b='ad['+i+']';
			ad=document.getElementById(b).value;
			
			if (ad=='1')
			{
				ret=valx(i);
			}
			i=i+1;
		}
	}
	
	return ret;
}

function valx(i)
{
	if (i==0)
		if (document.getElementById('ltp').value!='Began taking over the counter')
			return 'to use painkillers';
		else
			return 'painkillers';
	if (i==1)
		return 'to stay-active';
	if (i==2)
		return 'to exercise';
	if (i==3)
		return 'to rest';
	if (i==4)
		if (document.getElementById('ltp').value!='Began taking over the counter')
			return 'to use NSAID';
		else
			return 'NSAID';
	if (i==5)
		return '______';
}


function prescrip()
{
	;
}


function togadpr()
{
	var lad=document.getElementById('lad');

	if (lad.value=='advised')
	{
		document.getElementById('presc').style.visibility='hidden';
		document.getElementById('advised').style.visibility='visible';
	}
	else if (lad.value=='prescribed')
	{
		document.getElementById('presc').style.visibility='visible';
		document.getElementById('advised').style.visibility='hidden';
	}
}

function ltpotc()
{
	if (document.getElementById('ltp').value=='Began taking over the counter')
	{
// 		alert(document.getElementById('ltp').value);
		document.getElementById('otcdv').style.visibility='visible';
		document.getElementById('advised').style.visibility='hidden';
		document.getElementById('presc').style.visibility='hidden';
		document.getElementById('lad').style.visibility='hidden';
	}
	else
	{
		document.getElementById('otcdv').style.visibility='hidden';
// 		if (document.getElementById('lad').value=='advised')
// 			document.getElementById('advised').style.visibility='visible';
// 		else
// 			document.getElementById('presc').style.visibility='visible';
		document.getElementById('lad').style.visibility='visible';
	}
}


function ltotc()
{
	var i=0;
	var j=0;
	
	var ad='';
	
	var b='';
	
	while (i<3)
	{
		b='otcx['+i+']';
		ad=document.getElementById(b).value;
		if (ad=='1')
		{
			j=j+1;
// alert(j);
		}
		i=i+1;
	}
	
// 	alert('j='+j);
// alert(j);
	i=0;
	
	var ret='';
	
	var ab;
	var l=0;
	var k=0;
	
	if (j>1)
	{
		while (i<3)
		{
			b='otcx['+i+']';
			ad=document.getElementById(b).value;
			
			if (l<(j-1))
			{
				if (ad=='1')
				{
					if (k==0)
					{
						k=1;
						ret=ltotcp(i);
	// 					alert (ret);
					}
					else if (k==1)
					{
						ret=ret+', '+ltotcp(i);
					}
					l=l+1;
// 					alert('l='+l);
// 					alert ('ret='+ret);
				}
			}
			else
			{
				if (ad=='1')
				{
					ret=ret+' and '+ltotcp(i);
				}
			}
			i=i+1;
		}
	}
	else
	{
		while (i<3)
		{
			b='otcx['+i+']';
			ad=document.getElementById(b).value;
			
			if (ad=='1')
			{
				ret=valx(i);
			}
			i=i+1;
		}
	}
	
	return ret;
}


function ltotcp(i)
{
// alert('x');
	if (i==0)
		return 'painkillers';
	if (i==1)
		return 'NSAID';
	if (i==2)
		return '______';
}

function setvis()
{
	var p=document.getElementById('lad').value;

	if (p=='advised')
	{
		advyz=true;
		document.getElementById('advised').style.visibility='visible';
	}
	if (p=='prescribed')
	{
		preyz=true;
		document.getElementById('presc').style.visibility='visible';
	}
	if (p=='referred')
	{
		refyz=true;
		document.getElementById('reff').style.visibility='visible';
	}
	if (p=='sick-note')
	{
		snotyz=true;
		document.getElementById('snot').style.visibility='visible';
	}
}


function prescrip()
{
	var i=0;
	var j=0;
	
	var ad='';
	
	var b='';
	
	while (i<7)
	{
		b='pr['+i+']';
		ad=document.getElementById(b).value;
		if (ad=='1')
		{
			j=j+1;
		}
		i=i+1;
	}
	
// 	alert('j='+j);
	
	i=0;
	
	var ret='';
	
	var ab;
	var l=0;
	var k=0;
	
	if (j>1)
	{
		while (i<7)
		{
			b='pr['+i+']';
			ad=document.getElementById(b).value;
			
			if (l<(j-1))
			{
				if (ad=='1')
				{
					if (k==0)
					{
						k=1;
						ret=valpre(i);
	// 					alert (ret);
					}
					else if (k==1)
					{
						ret=ret+', '+valpre(i);
					}
					l=l+1;
// 					alert('l='+l);
// 					alert ('ret='+ret);
				}
			}
			else
			{
				if (ad=='1')
				{
					ret=ret+' and '+valpre(i);
				}
			}
			i=i+1;
		}
	}
	else
	{
		while (i<6)
		{
			b='pr['+i+']';
			ad=document.getElementById(b).value;
			
			if (ad=='1')
			{
				ret=valpre(i);
			}
			i=i+1;
		}
	}
	
	return ret;
}


function valpre(i)
{
	if (i==0)
		return 'painkillers';
	if (i==1)
		return 'NSAID';
	if (i==2)
		return 'anti-depressants';
	if (i==3)
		return 'gel';
	if (i==4)
		return 'sleeping-pills';
	if (i==5)
		return 'muscle-relaxants';
	if (i==6)
		return '______';
}

function rstrtx()
{
	if (document.getElementById('rstrt').checked)
	{
		document.getElementById('rstrtxyz').style.visibility='visible';
		document.getElementById('refben').style.visibility='visible';
	}
	else
	{
		document.getElementById('rstrtxyz').style.visibility='hidden';
		document.getElementById('refben').style.visibility='hidden';
	}
}

function refstx()
{
	if (document.getElementById('refst').value=='finished')
	{
		document.getElementById('reffin').style.visibility='visible';
		document.getElementById('refcon').style.visibility='hidden';
	}
	else if (document.getElementById('refst').value=='continuing')
	{
		document.getElementById('reffin').style.visibility='hidden';
		document.getElementById('refcon').style.visibility='visible';
	}
	else
	{
		document.getElementById('reffin').style.visibility='hidden';
		document.getElementById('refcon').style.visibility='hidden';
	}
}

function referexy()
{
	var b=document.getElementById('scoon').value;

	if (document.getElementById('rstrt').checked)
	{
		if (document.getElementById('rstrtaft').value=='immediately')
			b=b+'. The treatment started immediately';
		else
		{
			if (document.getElementById('rstrttm').value>'1')
				b=b+'. The treatment started after '+document.getElementById('rstrttm').value+' '+document.getElementById('rstrtaft').value+'s';
			else
				b=b+'. The treatment started after '+document.getElementById('rstrttm').value+' '+document.getElementById('rstrtaft').value;
		}
		if (document.getElementById('refst').value=='finished')
		{
			if (document.getElementById('reffas').value>'1')
				b=b+' and finished after '+document.getElementById('reffas').value+' sessions';
			else
				b=b+' and finished after '+document.getElementById('reffas').value+' session';
		}
		else if (document.getElementById('refst').value=='continuing')
		{
			if (document.getElementById('refssof').value>'1')
				b=b+'. So far there have been '+document.getElementById('refssof').value+' sessions';
			else
				b=b+'. So far there has been '+document.getElementById('refssof').value+' '+document.getElementById('rstrtaft').value+' sesssion';
		}
		if (document.getElementById('refcond').value=='worse')
		{
			b=b+'. The treatment resulted in a worsening of the condition';
		}
		else if (document.getElementById('refcond').value!='.')
		{
			b=b+'. The treatment has '+document.getElementById('refcond').value+' useful';
		}
	}
	else
		b=b+'. The treatment has not yet begun';

// 	alert(b);
	return b;
}

function ignoreit(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('l['+a+']');
	var tb=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockit('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockit(a,b)
{
	var txt=document.getElementById('l['+a+']');
	var btn=document.getElementById('b['+a+']');
	var tb=document.getElementById('t['+a+']');

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreit('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}