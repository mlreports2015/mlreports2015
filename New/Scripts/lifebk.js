function addemp(g)
{

var wj=document.getElementById('wjob').value;
var wh=document.getElementById('whour').value;
var wo=document.getElementById('woff').value;
var wt=document.getElementById('whh').value;

// alert(wj);

if (wj=="Unemployed")
{
	document.getElementById('work0').innerHTML=g+' is unemployed.';
}
else if (wj=="Student")
{
	document.getElementById('work0').innerHTML=g+' is a full time student.';
}
else if (wj=="Homemaker")
{
	document.getElementById('work0').innerHTML=g+' is a home-maker.';
}
else if (wj=="Retired")
{
	document.getElementById('work0').innerHTML=g+' is retired.';
	document.getElementById('work1').innerHTML='';
	document.getElementById('work2').innerHTML='';
}
else if (wj=="Child")
{
	document.getElementById('work0').innerHTML=g+' is a child.';
	document.getElementById('tdrv').innerHTML=g+' is a child.';
	document.getElementById('work1').innerHTML='';
	document.getElementById('work2').innerHTML='';
}
else if (wj==".")
{
	document.getElementById('work0').innerHTML=g+' works as a '+document.getElementById('wjob1').value;
	if (wh.length>0)
		document.getElementById('work1').innerHTML=g+' works for '+wh+' hours a week.';
	if (wo=='1' && wo.length>0)
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+' off from work.';
	else if (wo>'1' && wo.length>0)
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+'s off from work.';
	else
		document.getElementById('work2').innerHTML=g+' did not take any time off from work.';
}
else
{
	document.getElementById('work0').innerHTML=g+' works as a '+wj+'.';
if (wh.length>0)
		document.getElementById('work1').innerHTML=g+' works for '+wh+' hours a week.';
	if (wo=='1' && wo.length>0)
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+' off from work.';
	else if (wo>'1' && wo.length>0)
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+'s off from work.';
	else
		document.getElementById('work2').innerHTML=g+' did not take any time off from work.';
}

}

function addhc(g)
{

var l=document.getElementById('lw').value;
var lch=document.getElementById('lch').value;
var lch11=document.getElementById('lchey').value;
var lch12=document.getElementById('lchem').value;
var lch21=document.getElementById('lchyy').value;
var lch22=document.getElementById('lchym').value;

// alert (lch11+'\n'+lch21);

var g1='';
if (g=='He')
	g1='his';
else
	g1='her';

if (l=='alone')
	document.getElementById('daily').innerHTML=g+' lives alone.';
else
	document.getElementById('daily').innerHTML=g+' lives with '+g1+' '+l+'.'

if (lch>1)
{
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+' There are '+lch+' children in the house.';

var lche='';
	if (lch11.length>0)
		lche=lch11+' years';
	if (lch12.length>0)
		lche=lche+' and '+lch12+' months';

var lchy='';
	if (lch21.length>0)
		lchy=lch21+' years';
	if (lch22.length>0)
		lchy=lchy+' and '+lch22+' months';

if (lche==lchy)
{
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+g+' has '+lchy+' old twins.';
}
else
{
	var lch='';
	if (lche.length>0 && lchy.length>0)
		lch='The eldest is '+lche+' and the youngest is '+lchy+' old.';
	else if (lche.length>0)
		lch='The eldest is '+lche+' old.';
	else if (lchy.length>0)
		lch='The youngest is '+lchy+' old.';
	
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+lch;
}
}
else if (lch==1)
{
	var lche='';
	if (lch11.length>0)
		lche=lch11+' years';
	if (lch12.length>0)
		lche=lche+' and '+lch12+' months';

	if (lche.length>0)
		lche=lche+" old";

	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+' There is one '+lche+' child in the house.';
}

}


function adddrve(n)
{

var twd=document.getElementById('twd').value;
var twdc=document.getElementById('twdc').value;
var tdr=document.getElementById('tdr').value;
var tdrr=document.getElementById('tdrr').value;
var tddr=document.getElementById('tddr').value;

var f='';

if (twd=='none')
	f=n+' did not face any problems while driving.';
else if (twd=='does not drive')
	f=n+' does not drive';
else
{
	f=n+' suffered from '+twdc+' '+ twd + ' while driving.';

	if (tdr=='resolved')
	{
		if (tdrr=='1' && tdrr.length>0)
			f=f+' The problem resolved after '+tdrr+' '+tddr+'.';
		else if (tdrr>'1' && tdrr.length>0)
			f=f+' The problem resolved after '+tdrr+' '+tddr+'s.';
		else
			f=f+' The problem has resolved.';
	}
	else if (tdr=='-')
		axyo=0+0;
	else
	{
		if (tdrr=='1' && tdrr.length>0)
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'.';
		else if (tdrr>'1' && tdrr.length>0)
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'s.';
		else
			f=f+' The problem will resolve.';
	}
}

	document.getElementById('tdrv').innerHTML=f;

}

function addpass(n)
{

	var twp=document.getElementById('twp').value;
	var twpc=document.getElementById('twpc').value;
	var tpr=document.getElementById('tpr').value;
	var tprr=document.getElementById('tprr').value;
	var tppr=document.getElementById('tppr').value;

	var f='';

	if (twp=='none')
	f=n+' did not face any problems while travelling as a passenger.';
	else
	{
		f=n+' suffered from '+twpc+' '+ twp + ' while travelling as a passenger.';

		if (tpr=='resolved')
		{
			if (tprr=='1' && tprr.length>0)
				f=f+' The problem resolved after '+tprr+' '+tppr+'.';
			else if (tprr>'1' && tprr.length>0)
				f=f+' The problem resolved after '+tprr+' '+tppr+'s.';
			else
				f=f+' The problem has resolved.';
		}
		else if (tpr=='-')
			axyo=0+0;
		else
		{
			if (tprr=='1' && tprr.length>0)
				f=f+' The problem will resolve after '+tprr+' '+tppr+'.';
			else if (tprr>'1' && tprr.length>0)
				f=f+' The problem will resolve after '+tprr+' '+tppr+'s.';
			else
				f=f+' The problem will resolve.';
		}
	}

	document.getElementById('tpass').innerHTML=f;

}


function adddl()
{
	var ni = document.getElementById('x');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var dlp=document.getElementById('dlp').value;
	var dlc=document.getElementById('dls').value;
	var dlr=document.getElementById('dlr').value;
	var dlrr=document.getElementById('dlrr').value;
	var dllr=document.getElementById('dllr').value;

	var f=dlp+' has been '+dlc+' restricted.';
	
	
	if (dlr!='')
	{
		if (dlrr.length>0)
		{
			if (dlr=='resolved')
			{
				if (dlrr=='1' && dlrr.length>0)
					f=f+' The problem resolved after '+dlrr+' '+dllr+'.';
				else if (dlrr>'1' && dlrr.length>0)
					f=f+' The problem resolved after '+dlrr+' '+dllr+'s.';
				else
					f=f+' The problem has resolved.';
			}
			else if (dlrr=='-')
				axyo=0+0;
			else if (dlrr=='not resolved')
				f=f+' The problem has not yet resolved.';
			else
			{
				if (dlrr=='1' && dlrr.length>0)
					f=f+' The problem will resolve after '+dlrr+' '+dllr+'.';
				else if (dlrr>'1' && dlrr.length>0)
					f=f+' The problem will resolve after '+dlrr+' '+dllr+'s.';
				else
					f=f+' The problem will resolve.';
			}
		}
	}
	else
		f=f+' The problem has not resolved.'
	
		var newh = document.createElement('input');
		var hIdName = 'te'+'['+num+']';
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
	
	newt.innerHTML = f;

	ni.appendChild(newh);
	ni.appendChild(newt);
	ni.appendChild(newb);
	ni.appendChild(newbr);
}


function ignore(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblock('+a+')');
// 	alert (s.value);
}

function unblock(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignore('+a+')');
// 	alert (s.value);
}

function ignoreit(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('t['+a+']');
	var tb=document.getElementById('te['+a+']');
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
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');
	var tb=document.getElementById('te['+a+']');

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreit('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}