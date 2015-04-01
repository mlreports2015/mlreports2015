function addemp(g)
{

// alert('123');

var wj=document.getElementById('wjob').value;
var wh=document.getElementById('whour').value;
var wo=document.getElementById('woff').value;
var wt=document.getElementById('whh').value;

//alert (wj);

// alert(wj);

var job0='';
var job1='';
var job2='';
var job3='';

if (wj=="Unemployed")
{
	job0=g+' is unemployed.';
// alert(job0);
}
else if (wj=="Student")
{
// 	alert(wj[0]);
	job0=g+' is a '+document.getElementById('sSac').value+' student.';

	if (document.getElementById('sCur').value=='on sick leave')
	{
		job1=g+' was on a sick leave at the time of accident.';
	}
	else
	{
		job1='The accident occured during '+document.getElementById('sCur').value+'.';
	}

	if (document.getElementById('sWoffs').value=='sick leave')
	{
		job2='He had to take a sick leave because of the accident.';
	}
	else if (document.getElementById('sWoffs').value=='sick leave for')
	{
		if (document.getElementById('Swoff').value==1)
		{
			job2='He had to take a sick leave for '+document.getElementById('Swoff').value+' '+document.getElementById('Swhh').value+' because of the accident.';
		}
		else if (document.getElementById('Swoff').value>1)
		{
			job2='He had to take a sick leave for '+document.getElementById('Swoff').value+' '+document.getElementById('Swhh').value+'s because of the accident.';
		}
	}

	if (document.getElementById('Scourse').value=='could not submit')
	{
		job3='He could not submit his coursework.';
	}
	else if (document.getElementById('Scourse').value=='extension')
	{
		job3='He had to get an extension for his coursework.';
	}
	else if (document.getElementById('Scourse').value=='extension for')
	{
		if (document.getElementById('SED1').value==1)
		{
			job3='He had to get an extension of '+document.getElementById('SED1').value+' '+document.getElementById('SED2').value+' for his coursework.';
		}
		else if (document.getElementById('SED1').value>1)
		{
			job3='He had to get an extension of '+document.getElementById('SED1').value+' '+document.getElementById('SED2').value+'s for his coursework.';
		}

	}
}
else if (wj=='Armed Forces')
{
	job0='He works in the Armed Forcecs.';

	if (document.getElementById('sata').value=='on holidays')
	{
		job0=g+' works as '+wjX+'. '+' '+g+' was on a';
		if (document.getElementById('woffHT').value=='1')
		{
			job0=job0+' 1 '+document.getElementById('whhHS').value;
		}
		else if (document.getElementById('woffHT').value>'1')
		{
			job0=job0+' '+document.getElementById('woffHT').value+' '+document.getElementById('whhHS').value+'s';
		}
		job0=job0+' holiday at the time of the accident';
	}
	else if (document.getElementById('sata').value=='on sick leave')
	{
		job0=g+' works as '+wjX+'. '+' '+g+' was on a';
		if (document.getElementById('woffHT').value=='1')
		{
			job0=job0+' 1 '+document.getElementById('whhHS').value;
		}
		else if (document.getElementById('woffHT').value>'1')
		{
			job0=job0+' '+document.getElementById('woffHT').value+' '+document.getElementById('whhHS').value+'s';
		}
		job0=job0+' sick-leave at the time of the accident';
	}

	
}
else if (wj=="Homemaker")
{
	job0=g+' is a home-maker.';
}
else if (wj=="Retired")
{
	job0=g+' is retired.';
	job1='';
	job2='';
}
else if (wj=="Child")
{
	job0=g+' is a child.';
// 	document.getElementById('tdrv').innerHTML=g+' is a child.';
	job1='';
	job2='';
	job3='';

	document.getElementById('twd').innerHTML="";
}
else
{
	if (wj=="o")
	{
		var wjX='';
	// alert(wj);
	// alert(wj.charAt(0));
	// alert(document.getElementById('wjob1').value);
	// alert(document.getElementById('wjob1').value.charAt(0));
		if (document.getElementById('wjob1').value.charAt(0)=='A' || document.getElementById('wjob1').value.charAt(0)=='E' || document.getElementById('wjob1').value.charAt(0)=='I' || document.getElementById('wjob1').value.charAt(0)=='O' || document.getElementById('wjob1').value.charAt(0)=='U' ||
		document.getElementById('wjob1').value.charAt(0)=='a' || document.getElementById('wjob1').value.charAt(0)=='e' || document.getElementById('wjob1').value.charAt(0)=='i' || document.getElementById('wjob1').value.charAt(0)=='o' || document.getElementById('wjob1').value.charAt(0)=='u')
		{
	// 		alert (wj);
			wjX='an '+document.getElementById('wjob1').value;
	// 		alert (wjX);
		}
		else
		{
			wjX='a '+document.getElementById('wjob1').value;
		}
	}
	else if (wj!='o')
	{
		var wjX='';
	// alert(wj);
	// alert(wj.charAt(0));
		if (wj.charAt(0)=='A' || wj.charAt(0)=='E' || wj.charAt(0)=='I' || wj.charAt(0)=='O' || wj.charAt(0)=='U')
		{
	// 		alert (wj);
			wjX='an '+wj;
	// 		alert (wjX);
		}
		else
		{
			wjX='a '+wj;
		}
// 		alert (wjX);
	}

	if (document.getElementById('sata').value=='unemployed')
	{
		job0=g+' is '+wjX+' by profession but he was unemployed at the time of accident.';
	}
	else if (document.getElementById('sata').value=='on holidays')
	{
		job0=g+' works as '+wjX+'. '+' '+g+' was on a';
		if (document.getElementById('woffHT').value=='1')
		{
			job0=job0+' 1 '+document.getElementById('whhHS').value;
		}
		else if (document.getElementById('woffHT').value>'1')
		{
			job0=job0+' '+document.getElementById('woffHT').value+' '+document.getElementById('whhHS').value+'s';
		}
		job0=job0+' holiday at the time of the accident';
	}
	else if (document.getElementById('sata').value=='on sick leave')
	{
		job0=g+' works as '+wjX+'. '+' '+g+' was on a';
		if (document.getElementById('woffHT').value=='1')
		{
			job0=job0+' 1 '+document.getElementById('whhHS').value;
		}
		else if (document.getElementById('woffHT').value>'1')
		{
			job0=job0+' '+document.getElementById('woffHT').value+' '+document.getElementById('whhHS').value+'s';
		}
		job0=job0+' sick-leave at the time of the accident';
	}
	else if (document.getElementById('sata').value=='working')
	{
		job0=g+' works as '+wjX+'.';
	}
}
// alert(document.getElementById('sata').value);

if (wj!='Unemployed' && wj!='Child' && wj!='Student' && wj!='Homemaker' && wj!='Retired')
{
	if (wh.length>0)
		job1=g+' works for '+wh+' hours a week.';

	if (document.getElementById('hadtoS').value=='take time off for')
	{
		if (wo=='1' && wo.length>0)
		{
			job2=g+' had to take '+wo+' '+wt+' off from work.';
		}
		else if (wo>'1' && wo.length>0)
		{
			job2=g+' had to take '+wo+' '+wt+'s off from work.';
		}
	}
	else if (document.getElementById('hadtoS').value=='will remain off for')
	{
		if (wo=='1' && wo.length>0)
		{
			job2=g+' will stay off for another '+wo+' '+wt+' from work as a result of the accident.';
		}
		else if (wo>'1' && wo.length>0)
		{
			job2=g+' will stay off for another '+wo+' '+wt+'s from work as a result of the accident.';
		}
	}
	else if (document.getElementById('hadtoS').value=='.')
	{
		job2=g+' did not take any time off from work.';
	}
	else if (document.getElementById('hadtoS').value=='take time off')
	{
		job2=g+' had to take time off from work as a result of the acccident.';
	}
	else if (document.getElementById('hadtoS').value=='will remain off')
	{
		job2=g+' will stay off from work as a result of the acccident.';
	}
	else if (document.getElementById('hadtoS').value=='still off')
	{
		job2=g+' is still off from work as a result of the acccident.';
	}


	if (document.getElementById('hadLS').value=='remain on light duties for')
	{
		if (document.getElementById('wLyt').value=='1' && document.getElementById('wLyt').value.length>0)
		{
			job3=g+' had to remain on light duties for '+document.getElementById('wLyt').value+' '+document.getElementById('wlLyt').value+' as a result of the accident.';
		}
		else if (document.getElementById('wLyt').value>'1' && document.getElementById('wLyt').value.length>0)
		{
			job3=g+' had to remain on light duties for '+document.getElementById('wLyt').value+' '+document.getElementById('wlLyt').value+'s as a result of the accident.';
		}
	}
	else if (document.getElementById('hadLS').value=='will stay on light duties for')
	{
		if (document.getElementById('wLyt').value=='1' && wo.length>0)
		{
			job3=g+' will stay on light duties for another '+document.getElementById('wLyt').value+' '+document.getElementById('wlLyt')+' as a result of the accident.';
		}
		else if (document.getElementById('wLyt').value>'1' && wo.length>0)
		{
			job3=g+' will stay on light duties for another '+document.getElementById('wLyt').value+' '+document.getElementById('wlLyt').value+'s as a result of the accident.';
		}
	}
	else if (document.getElementById('hadLS').value=='remain on light duties')
	{
		job3=g+' had to remain on light duties as a result of the acccident.';
	}
	else if (document.getElementById('hadLS').value=='still on light duties')
	{
		job3=g+' is still on light duties.';
	}
	else if (document.getElementById('hadLS').value=='will stay on light duties')
	{
		job3=g+' will stay on light duties as a result of the acccident.';
	}
}

// 	if (wh.length>0)
// 		job1=g+' works for '+wh+' hours a week.';
// 	if (wo=='1' && wo.length>0)
// 		job2=g+' had to take '+wo+' '+wt+' off from work.';
// 	else if (wo>'1' && wo.length>0)
// 		job2=g+' had to take '+wo+' '+wt+'s off from work.';
// 	else
// 		job2=g+' did not take any time off from work.';
// alert(job0);
// alert(job1);
// alert(job2);
// alert(job3);

		var ni = document.getElementById('dEmp');
		var numi = document.getElementById('vEmp');
		var num = (document.getElementById('vEmp').value -1)+ 2;
		numi.value = num;
	
		var newt = document.createElement('textarea');
		var tIdName = 'tEmp0['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp0'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp0'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitE0('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
		newt.innerHTML=job0;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);

		var newt = document.createElement('textarea');
		var tIdName = 'tEmp1['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp1'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp1'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitE1('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
		newt.innerHTML=job1;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);


		var newt = document.createElement('textarea');
		var tIdName = 'tEmp2['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp2'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp2'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitE2('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
		newt.innerHTML=job2;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);


		var newt = document.createElement('textarea');
		var tIdName = 'tEmp3['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp3'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp3'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitE3('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
		var newbr = document.createElement('hr');
	
		newt.innerHTML=job3;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);

		ni.appendChild(newhr);
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

var nD=document.getElementById('nD').value;
var dD=document.getElementById('dD').value;
var aD=document.getElementById('aD').value;
var pD=document.getElementById('pD').value;

var chk=0;

if (nD.length>0)
{
	if (confirm('You have Already Added No Problems Faced While Driving. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}
if (dD.length>0)
{
	if (confirm('You have Already Added That The Claimant Does Not Drive. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

if (aD.length>0 && twd=='anxiety')
{
	if (confirm('You have Already Added Anxiety Details in the Driving Section. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

if (pD.length>0 && twd=='physical discomfort')
{
	if (confirm('You have Already Added Physical Discomfort Details in the Driving Section. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

	if (chk==0)
	{
		var f='';
		
		if (twd=='none')
		{
			document.getElementById('nD').value='1';
			f=n+' did not have any problems while driving.';
		}
		else if (twd=='does not drive')
		{
			document.getElementById('dD').value='1';
			f=n+' does not drive.';
		}
		else
		{
			if (twd=='anxiety')
			{
				document.getElementById('aD').value='1';
			}
			if (twd=='physical discomfort')
			{
				document.getElementById('pD').value='1';
			}

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
		
// 		document.getElementById('tdrv').innerHTML=f;
	
		var ni = document.getElementById('dDrv');
		var numi = document.getElementById('vDrv');
		var num = (document.getElementById('vDrv').value -1)+ 2;
		numi.value = num;
	
		var newt = document.createElement('textarea');
		var tIdName = 'tDrv['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hDrv'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bDrv'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitD('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
		newt.innerHTML=f;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);
	}
}

function addpass(n)
{
	var twp=document.getElementById('twp').value;
	var twpc=document.getElementById('twpc').value;
	var tpr=document.getElementById('tpr').value;
	var tprr=document.getElementById('tprr').value;
	var tppr=document.getElementById('tppr').value;



var dD=document.getElementById('dP').value;
var aD=document.getElementById('aP').value;
var pD=document.getElementById('pP').value;

var chk=0;

if (dD.length>0)
{
	if (confirm('You have Already Added No Problems Faced While Travelling As a Passenger. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

if (aD.length>0 && twp=='anxiety')
{
	if (confirm('You have Already Added Anxiety Details in the Passenger Section. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

if (pD.length>0 && twp=='physical discomfort')
{
	if (confirm('You have Already Added Physical Discomfort Details in the Passenger Section. Are You Sure You Want to Add Another Statement?'))
	{
		var chk=0;
	}
	else
	{
		var chk=1;
	}
}

	if (chk==0)
	{
		var f='';
	
		if (twp=='none')
		{
			f=n+' did not face any problems while travelling as a passenger.';
			document.getElementById('dP').value='1';
		}
		else
		{
			if (twp=='anxiety')
			{
				document.getElementById('aP').value='1';
			}
			if (twp=='physical discomfort')
			{
				document.getElementById('pP').value='1';
			}

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

// 		document.getElementById('tpass').innerHTML=f;


		var ni = document.getElementById('dPas');
		var numi = document.getElementById('vPas');
		var num = (document.getElementById('vPas').value -1)+ 2;
		numi.value = num;
	
		var newt = document.createElement('textarea');
		var tIdName = 'tPas['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hPas'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Block');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bPas'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Block');
		
		newb.setAttribute('onclick','ignoreitP('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
		newt.innerHTML=f;

		ni.appendChild(newh);
		ni.appendChild(newt);
		ni.appendChild(newb);
		ni.appendChild(newbr);
	}
}


function adddl(gen)
{
	g1='';
	gg1='';
	g2='';
	gg2='';
	if (gen=='m')
	{
		g1='His';
		gg1='He';
		g2='his';
		gg2='he';
	}
	else if (gen=='f')
	{
		g1='Her';
		gg1='She';
		g2='her';
		gg2='she';
	}
		
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
	var dlci=document.getElementById('dlsi').value;
	var dlc=document.getElementById('dls').value;
	var dlr=document.getElementById('dlr').value;
	var dlrr=document.getElementById('dlrr').value;
	var dllr=document.getElementById('dllr').value;

// alert(dlp);

	ret='';

	if (dlci!='')
	{
		if (dlci=='unable' && dlp!='child care' && dlp!='children care')
			ret=gg1+' was unable to '+dlp+'.';
		else if (dlci!='unable' && dlp!='child care' && dlp!='children care')
			ret=g1+' ability to '+ dlp+' was ' + dlci + ' restricted.';
		else if (dlci!='unable' && dlp=='child care' && dlp!='children care')
			ret=g1+' '+ dlp+' ability was ' + dlci + ' restricted.';
		else if (dlci!='unable' && dlp!='child care' && dlp=='children care')
			ret=g1+' child care ability was ' + dlci + ' restricted.';
		else if (dlci=='unable' && dlp=='child care' && dlp!='children care' )
			ret=gg1+' was unable to take care of the child.';
		else if (dlci=='unable' && dlp!='child care' && dlp=='children care' )
			ret=gg1+' was unable to take care of the children.';

		if (dlc!='' && dlc!='unable' && dlc!='resolved' && dlc!='resolved after')
		{
			ret=ret+" It is now causing "+dlc+" disability.";
		}
		else if (dlc!='' && dlc=='unable'  && dlc!='resolved' && dlc!='resolved after')
		{
			ret=ret+" It is now causing complete disability.";
		}
		else if (dlc=='resolved' && dlc!='' && dlc!='unable' && dlc!='resolved after')
		{
			ret=ret+" It has now resolved.";
		}
		else if (dlc!='resolved' && dlc!='' && dlc!='unable' && dlc=='resolved after')
		{
			if (document.getElementById('pr1').value>1)
				ret=ret+" It resolved after "+document.getElementById('pr1').value+" "+document.getElementById('pr2').value+"s.";
			else
				ret=ret+" It resolved after "+document.getElementById('pr1').value+" "+document.getElementById('pr2').value+".";
		}

		if (dlc!='resolved' && dlc!='resolved after')
		{
			if (dlr=='will resolve after')
			{
				if (dlrr>1)
					ret=ret+" It "+dlr+" "+dlrr+" "+dllr+'s.';
				else
					ret=ret+" It "+dlr+" "+dlrr+" "+dllr+'.';
			}
			else if (dlr!='will resolve after' && dlr!='')
			{
				ret=ret+" It "+dlr+".";
			}
		}
	}
	else if (dlci=='')
	{
		if (dlp!='child care' && dlp!='children care')
			ret=g1+' ability to '+ dlp+' was restricted.';
		else if (dlp=='child care' && dlp!='children care')
			ret=g1+' '+ dlp+' ability was restricted.';
		else if (dlp!='child care' && dlp=='children care')
			ret=g1+' child care ability was restricted.';

		if (dlc!='' && dlc!='unable' && dlc!='resolved' && dlc!='resolved after')
		{
			ret=ret+" It is now causing "+dlc+" disability.";
		}
		else if (dlc!='' && dlc=='unable'  && dlc!='resolved' && dlc!='resolved after')
		{
			ret=ret+" It is now causing complete disability.";
		}
		else if (dlc=='resolved' && dlc!='' && dlc!='unable' && dlc!='resolved after')
		{
			ret=ret+" It has now resolved.";
		}
		else if (dlc!='resolved' && dlc!='' && dlc!='unable' && dlc=='resolved after')
		{
			if (document.getElementById('pr1').value>1)
				ret=ret+" It resolved after "+document.getElementById('pr1').value+' '+document.getElementById('pr2').value+"s.";
			else
				ret=ret+" It resolved after "+document.getElementById('pr1').value+' '+document.getElementById('pr2').value+".";

		}

		if (dlc!='resolved' && dlc!='resolved after')
		{
			if (dlr=='will resolve after')
			{
				if (dlrr>1)
					ret=ret+" It "+dlr+" "+dlrr+" "+dllr+'s.';
				else
					ret=ret+" It "+dlr+" "+dlrr+" "+dllr+'.';
			}
			else if (dlr!='will resolve after' && dlr!='')
			{
				ret=ret+" It "+dlr+".";
			}
		}
	}
// 	if (dlr!='')
// 	{
// 		if (dlrr.length>0)
// 		{
// 			if (dlr=='resolved')
// 			{
// 				if (dlrr=='1' && dlrr.length>0)
// 					ret=ret+' The problem resolved after '+dlrr+' '+dllr+'.';
// 				else if (dlrr>'1' && dlrr.length>0)
// 					ret=ret+' The problem resolved after '+dlrr+' '+dllr+'s.';
// 				else
// 					ret=ret+' The problem has resolved.';
// 			}
// 			else if (dlrr=='-')
// 				axyo=0+0;
// 			else if (dlrr=='not resolved')
// 				ret=ret+' The problem has not yet resolved.';
// 			else
// 			{
// 				if (dlrr=='1' && dlrr.length>0)
// 					ret=ret+' The problem will resolve after '+dlrr+' '+dllr+'.';
// 				else if (dlrr>'1' && dlrr.length>0)
// 					ret=ret+' The problem will resolve after '+dlrr+' '+dllr+'s.';
// 				else
// 					ret=ret+' The problem will resolve.';
// 			}
// 		}
// 	}
	else
	{
		f=f+' The problem has not resolved.';
	}
	
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
	
	newt.innerHTML = ret;

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

function ignoreitE0(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tEmp0['+a+']');
	var tb=document.getElementById('hEmp0'+a);
	var btn=document.getElementById('bEmp0'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitE0('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitE0(a)
{
	var txt=document.getElementById('tEmp0['+a+']');
	var btn=document.getElementById('bEmp0'+a);
	var tb=document.getElementById('hEmp0'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitE0('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function ignoreitE1(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tEmp1['+a+']');
	var tb=document.getElementById('hEmp1'+a);
	var btn=document.getElementById('bEmp1'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitE1('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitE1(a)
{
	var txt=document.getElementById('tEmp1['+a+']');
	var btn=document.getElementById('bEmp1'+a);
	var tb=document.getElementById('hEmp1'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitE1('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function ignoreitE2(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tEmp2['+a+']');
	var tb=document.getElementById('hEmp2'+a);
	var btn=document.getElementById('bEmp2'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitE2('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitE2(a)
{
	var txt=document.getElementById('tEmp2['+a+']');
	var btn=document.getElementById('bEmp2'+a);
	var tb=document.getElementById('hEmp2'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitE2('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function ignoreitE3(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tEmp3['+a+']');
	var tb=document.getElementById('hEmp3'+a);
	var btn=document.getElementById('bEmp3'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitE3('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitE2(a)
{
	var txt=document.getElementById('tEmp3['+a+']');
	var btn=document.getElementById('bEmp3'+a);
	var tb=document.getElementById('hEmp3'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitE3('+a+')');
	
	tb.setAttribute('value','Block');
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

function ignoreitD(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tDrv['+a+']');
	var tb=document.getElementById('hDrv'+a);
	var btn=document.getElementById('bDrv'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitD('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitD(a)
{
	var txt=document.getElementById('tDrv['+a+']');
	var btn=document.getElementById('bDrv'+a);
	var tb=document.getElementById('hDrv'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitD('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function ignoreitP(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('tPas['+a+']');
	var tb=document.getElementById('hPas'+a);
	var btn=document.getElementById('bPas'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitP('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitP(a)
{
	var txt=document.getElementById('tPas['+a+']');
	var btn=document.getElementById('bPas'+a);
	var tb=document.getElementById('hPas'+a);

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitP('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function fut()
{
	if (document.getElementById('dls').value!='resolved')
		document.getElementById('fut').style.visibility='visible';
	if (document.getElementById('dls').value=='resolved')
	{
		document.getElementById('fut').style.visibility='hidden';
		document.getElementById('fut2').style.visibility='hidden';
	}
}

function fut2()
{
	if (document.getElementById('dlr').value=='will resolve after')
		document.getElementById('fut2').style.visibility='visible';
	if (document.getElementById('dlr').value!='will resolve after')
		document.getElementById('fut2').style.visibility='hidden';
}

function wchange()
{
// alert('123');
	if (document.getElementById('wjob').value=='o')
	{
		document.getElementById('wjob1').style.visibility='visible';
		document.getElementById('wjob1').style.width='100px';
	}
	else
	{
		document.getElementById('wjob1').style.visibility='hidden';
		document.getElementById('wjob1').style.width='0px';

		document.getElementById('sStuL').style.width='0px';
		document.getElementById('sStuA').style.width='0px';
		document.getElementById('atStuA').style.width='0px';
		document.getElementById('coStuA').style.width='0px';
	}

	if (document.getElementById('wjob').value!='Student' && document.getElementById('wjob').value!='Unemployed' && document.getElementById('wjob').value!='Retired' && document.getElementById('wjob').value!='Home Maker' && document.getElementById('wjob').value!='Child' && document.getElementById('wjob').value!='')
	{
		document.getElementById('sataD').style.width='165px';

		document.getElementById('sStuL').style.width='0px';
		document.getElementById('sStuA').style.width='0px';
		document.getElementById('atStuA').style.width='0px';
		document.getElementById('coStuA').style.width='0px';
	}
	else
	{
		document.getElementById('sataD').style.width='0px';
		document.getElementById('hpw').style.width='0px';
		document.getElementById('onholD').style.width='0px';

		document.getElementById('sStuL').style.width='0px';
		document.getElementById('sStuA').style.width='0px';
		document.getElementById('atStuA').style.width='0px';
		document.getElementById('coStuA').style.width='0px';

		document.getElementById('toffD').style.width='0px';
		document.getElementById('tLytD').style.width='0px';
	}
	if (document.getElementById('wjob').value=='Student')
	{
		document.getElementById('sStuL').style.width='220px';
		document.getElementById('sStuA').style.width='150px';
		document.getElementById('atStuA').style.width='200px';
		document.getElementById('coStuA').style.width='150px';
	}
}

function sataF()
{
	if (document.getElementById('sata').value=='working')
	{
		document.getElementById('hpw').style.width='200px';
		document.getElementById('onholD').style.width='0px';
		document.getElementById('toffD').style.width='200px';
		document.getElementById('tLytD').style.width='200px';
	}
	else if (document.getElementById('sata').value=='on holidays' || document.getElementById('sata').value=='on sick leave')
	{
		document.getElementById('hpw').style.width='200px';
		document.getElementById('onholD').style.width='200px';
		document.getElementById('toffD').style.width='200px';
		document.getElementById('tLytD').style.width='200px';
	}
	else if (document.getElementById('sata').value=='unemployed')
	{
		document.getElementById('hpw').style.width='0px';
		document.getElementById('onholD').style.width='0px';
		document.getElementById('toffD').style.width='0px';
		document.getElementById('tLytD').style.width='0px';
	}
}

function hadtoF()
{
	if (document.getElementById('hadtoS').value=='take time off for' ||  document.getElementById('hadtoS').value=='will remain off for')
	{
		document.getElementById('woff').style.visibility='visible';
		document.getElementById('whhD').style.visibility='visible';
	}
	else
	{
		document.getElementById('woff').style.visibility='hidden';
		document.getElementById('whhD').style.visibility='hidden';
	}
}

function hadLF()
{
	if (document.getElementById('hadLS').value=='remain on light duties for' ||  document.getElementById('hadLS').value=='will stay on light duties for')
	{
		document.getElementById('whLD').style.visibility='visible';
// 		document.getElementById('whhD').style.visibility='visible';
	}
	else
	{
		document.getElementById('whLD').style.visibility='hidden';
// 		document.getElementById('whhD').style.visibility='hidden';
	}
}

function sWoff()
{
// alert(document.getElementById('sWoffs').value);
	if (document.getElementById('sWoffs').value=='sick leave for')
	{
		document.getElementById('SwoffD').style.visibility='visible';
// 		document.getElementById('Swhh').style.visibility='visible';
	}
	else
	{
// 		alert('12');
		document.getElementById('SwoffD').style.visibility='hidden';
// 		document.getElementById('Swhh').style.visibility='hidden';
	}
}

function sCourse()
{
// alert(document.getElementById('Scourse').value);
	if (document.getElementById('Scourse').value=='extension for')
	{
		document.getElementById('SEDD').style.visibility='visible';
	}
	else
	{
		document.getElementById('SEDD').style.visibility='hidden';
	}
}