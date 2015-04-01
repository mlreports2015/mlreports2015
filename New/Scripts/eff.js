function notres(a,b,c)
{
	var n=document.getElementById(a);
	var p=document.getElementById(b);

	if (document.getElementById(c).value=='resolved after')
	{
		p.style.visibility='hidden';
		n.style.visibility='visible';
	}
	else
	{
		p.style.visibility='visible';
		n.style.visibility='hidden';
	}
}

function finx()
{
	if (document.getElementById('il').value=='l')
	{
		document.getElementById('latetm').style.visibility='visible';
	}
	else
		document.getElementById('latetm').style.visibility='hidden';
}

function stiff()
{
	if (document.getElementById('iii').value=='0')
	{
		document.getElementById('iib').style.backgroundColor='#47D';
		document.getElementById('iii').value='1';
	}
	else
	{
		document.getElementById('iib').style.backgroundColor='#DDD';
		document.getElementById('iii').value='0';
	}
}

function addshock()
{
	var ni = document.getElementById('shk');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 'i'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var sre=document.getElementById('sre').value;

	var sress='';
// alert(sre);

	if(sre=='resolved after')
	{
		var sres=document.getElementById('sress');
		if (sres.value.length>0)
		{
			if (sres.value=='1')
				sress=' which resolved after '+sres.value+' '+document.getElementById('sresa').value;
			else
				sress=' which resolved after '+sres.value+' '+document.getElementById('sresa').value+'s';

			var newh = document.createElement('input');
			var hIdName = 'ih'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			var newh = document.createElement('input');
			var hIdName = 'ih'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','unresolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		sress='. It is now '+document.getElementById('srdis').value;

		var newh = document.createElement('input');
		var hIdName = 'ih'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}
	
	var newp = document.createElement('input');
	var pIdName = 'ip'+'['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value','Shock');

	var newphhx = document.createElement('input');
	var phhIdName = 'pphhi'+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	
var newphh = document.createElement('input');
var phhIdName = 'pphhib'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Block');

newphh.setAttribute('onclick','ignorei('+num+')');

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');

	ni.appendChild(newp);
ni.appendChild(newphh);
ni.appendChild(newphhx);
ni.appendChild(newbr);
	fin='Experienced '+document.getElementById('shlev').value+' shock'+sress;

	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
}


function addpain()
{
	var ni = document.getElementById('pn');

	var numi='';
	var nm='';
	var num='';
	var ilvv='';

	if (document.getElementById('il').value=='i')
	{
		numi = document.getElementById('theValue');
		nm='i';
		num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
		ilvv='Suffered from';
	}
	else
	{
		numi = document.getElementById('theValue2');
		nm='l';
		num = (document.getElementById('theValue2').value -1)+ 2;
		numi.value = num;
		ilvv='Developed';
	}

	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var sre=document.getElementById('re').value;

	var ress='';
// alert(sre);

	if(sre=='resolved after')
	{
		var res=document.getElementById('ress');
		if (res.value.length>0)
		{
			if (res.value=='1')
				ress=' which resolved after '+res.value+' '+document.getElementById('resa').value;
			else
				ress=' which resolved after '+res.value+' '+document.getElementById('resa').value+'s';

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','unresolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		var ress='';
		
		if (document.getElementById('rdis').value=='persisting')
			ress='. It is '+document.getElementById('rdis').value;
		else
			ress='. It has improved and is now '+document.getElementById('rdis').value;

		var newh = document.createElement('input');
		var hIdName = nm+'h'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}

	fin=ilvv +' '+document.getElementById('hlev').value+' '+document.getElementById('prob').value;

	if (document.getElementById('iii').value=='1')
		fin=fin+' and stiffness';

	if (document.getElementById('il').value=='l' && document.getElementById('ltme').value.length>0)
	{
		if (document.getElementById('ltme').value>'1')
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value+'s';
		else
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value;
	}

	fin=fin+ress;

	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',document.getElementById('prob').value);


	var newphhx = document.createElement('input');
	var phhIdName = 'pphh'+nm+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	
var newphh = document.createElement('input');
var phhIdName = 'pphh'+nm+'b'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Block');
if (nm=='i')
	newphh.setAttribute('onclick','ignorei('+num+')');
else
	newphh.setAttribute('onclick','ignorel('+num+')');

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');
	ni.appendChild(newp);
	ni.appendChild(newphh);
	ni.appendChild(newphhx);
	ni.appendChild(newbr);
	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
	ni.appendChild(newbr);
}


function addbruise()
{
	var ni = document.getElementById('bru');

	var numi='';
	var nm='';
	var num='';

	numi = document.getElementById('theValue');
	nm='i';
	num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

// alert(nm);
	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var sre=document.getElementById('bre').value;

	var ress='';
// alert(sre);

	if(sre=='resolved after')
	{
		var res=document.getElementById('bress');
		if (res.value.length>0)
		{
			if (res.value=='1')
				ress=' which resolved after '+res.value+' '+document.getElementById('bresa').value;
			else
				ress=' which resolved after '+res.value+' '+document.getElementById('bresa').value+'s';

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','unresolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		ress=' It is now '+document.getElementById('brdis').value;

		var newh = document.createElement('input');
		var hIdName = nm+'h'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}

	fin='Suffered from '+document.getElementById('bhlev').value+' '+ document.getElementById('bil').value + ' to '+document.getElementById('bprob').value+ress+'.';
// alert(document.getElementById('bil').value);
	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',document.getElementById('bil').value+' to ' +document.getElementById('bprob').value);

	var newphhx = document.createElement('input');
	var phhIdName = 'pphh'+nm+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	
var newphh = document.createElement('input');
var phhIdName = 'pphh'+nm+'b'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Block');
if (nm=='i')
	newphh.setAttribute('onclick','ignorei('+num+')');
else
	newphh.setAttribute('onclick','ignorel('+num+')');

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');
	ni.appendChild(newp);
	ni.appendChild(newphh);
	ni.appendChild(newphhx);
	ni.appendChild(newbr);
	newt.innerHTML = fin;
	ni.appendChild(newt);
	ni.appendChild(newbr);
}


function addother()
{
	var ni = document.getElementById('myDiv');

	var numi='';
	var nm='';
	var num='';

	if (document.getElementById('oil').value=='i')
	{
		numi = document.getElementById('theValue');
		nm='i';
		num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
	}
	else
	{
		numi = document.getElementById('theValue2');
		nm='l';
		num = (document.getElementById('theValue2').value -1)+ 2;
		numi.value = num;
	}
// alert(nm);
	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);


	var newh = document.createElement('input');
	var hIdName = nm+'h'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','text');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value',document.getElementById('ores').value);

	ni.appendChild(newh);

	newt.innerHTML = document.getElementById('oth').value;

	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value','Other');

	ni.appendChild(newp);

	ni.appendChild(newt);
}


function ignorei(a,b)
{
	var txt=document.getElementById('i['+a+']');
	var te=document.getElementById('pphhi['+a+']');
	var btn=document.getElementById('pphhib['+a+']');

	txt.style.backgroundColor='#AA2222';
	te.setAttribute('value','Unblock');
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblocki('+a+','+b+')');
// 	alert (s.value);
}

function unblocki(a,b)
{
	var txt=document.getElementById('i['+a+']');
	var te=document.getElementById('pphhi['+a+']');
	var btn=document.getElementById('pphhib['+a+']');

	txt.style.backgroundColor='#FFF';
	te.setAttribute('value','Block');
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignorei('+a+','+b+')');
// 	alert (s.value);
}

function ignorel(a,b)
{
	var txt=document.getElementById('l['+a+']');
	var te=document.getElementById('pphhl['+a+']');
	var btn=document.getElementById('pphhlb['+a+']');

	
	txt.style.backgroundColor='#AA2222';
	te.setAttribute('value','Unblock');
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockl('+a+','+b+')');
// 	alert (s.value);
}

function unblockl(a,b)
{
	var txt=document.getElementById('l['+a+']');
	var te=document.getElementById('pphhl['+a+']');
	var btn=document.getElementById('pphhlb['+a+']');

	txt.style.backgroundColor='#FFF';
	te.setAttribute('value','Block');
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignorel('+a+','+b+')');
// 	alert (s.value);
}