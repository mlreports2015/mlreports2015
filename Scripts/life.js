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

if (document.getElementById('work').value=='' && document.getElementById('wjob').value!='o')
{
//	workSel(document.getElementById('wjob').value);
	document.getElementById('work').value=document.getElementById('wjob').value;
}
else if (document.getElementById('work').value=='' && document.getElementById('wjob').value=='o')
{
//	workSel(document.getElementById('wjob1').value);
	document.getElementById('work').value=document.getElementById('wjob1').value;
}else{
	
	wj=document.getElementById('work').value;
}

alert(wj);

var also='';

if (document.getElementById('vEmp').value>0)
{
	also=' also';
}

if (wj=="Unemployed")
{
	job0=g+' is unemployed.';
// alert(job0);
}
else if (wj=='Long Term Disabled')
{
		job0=g+' is long term disabled.';
}
else if (wj=='Long Term Ill')
{
		job0=g+' is long term ill.';
}
else if (wj=="Student")
{
// 	alert(wj[0]);
	job0=g+' is'+also+' a '+document.getElementById('sSac').value+' student.';

	if (document.getElementById('sCur').value=='on sick leave')
	{
		job1=g+' was on sick leave at the time of accident.';
	}
	else
	{
		job1='The accident occurred during '+document.getElementById('sCur').value+'.';
	}

	if (document.getElementById('sWoffs').value=='sick leave')
	{
		job2='He had to take sick leave because of the accident.';
	}
	else if (document.getElementById('sWoffs').value=='sick leave for')
	{
		if (document.getElementById('Swoff').value==1)
		{
			job2='He had to take sick leave for '+document.getElementById('Swoff').value+' '+document.getElementById('Swhh').value+' because of the accident.';
		}
		else if (document.getElementById('Swoff').value>1)
		{
			job2='He had to take sick leave for '+document.getElementById('Swoff').value+' '+document.getElementById('Swhh').value+'s because of the accident.';
		}
	}

	if (document.getElementById('Scourse').value=='could not submit')
	{
		job3='He were unable to submit his coursework.';
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
	job0='He'+also+' works in the Armed Forcecs.';

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
else if (wj=="Home Maker")
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
		job0=g+' is'+also+' '+wjX+' by profession but he was unemployed at the time of accident.';
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
		job0=g+also+' works as '+wjX+'. '+' '+g+' was on a';
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
		job0=g+also+' works as '+wjX+'.';
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
		ni.style.width="80%"
		var numi = document.getElementById('vEmp');
		var num = (document.getElementById('vEmp').value -1)+ 2;
		numi.value = num;
	
		var newt = document.createElement('textarea');
		var tIdName = 'tEmp0['+num+']';
		newt.setAttribute('cols',100);
		newt.setAttribute('id',tIdName);
		newt.setAttribute('name',tIdName);
		newt.style.border='none';
		newt.style.backgroundColor='#cfe2ee';
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp0'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','hidden');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Remove');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp0'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Remove');
		
		newb.onclick=new Function("ignoreitE0('"+num+"')");
//		newb.setAttribute('onclick','ignoreitE0('+num+')');
		
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
		newt.style.border='none';
		newt.style.backgroundColor='#cfe2ee';
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp1'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','hidden');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Remove');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp1'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Remove');
		
		newb.onclick=new Function("ignoreitE0('"+num+"')");
//		newb.setAttribute('onclick','ignoreitE1('+num+')');
		
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
		newt.style.border='none';
		newt.style.backgroundColor='#cfe2ee';
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp2'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','hidden');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Remove');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp2'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Remove');
		
		newb.onclick=new Function("ignoreitE0('"+num+"')");
//		newb.setAttribute('onclick','ignoreitE2('+num+')');
		
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
		newt.style.border='none';
		newt.style.backgroundColor='#cfe2ee';
// alert(tIdName);
		var newh = document.createElement('input');
		var hIdName = 'hEmp3'+num;
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','hidden');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','Remove');

// alert(hIdName);
		
		var newb = document.createElement('input');
		var bIdName = 'bEmp3'+num;
		newb.setAttribute('id',bIdName);
		newb.setAttribute('type','button');
		newb.setAttribute('name',bIdName);
		newb.setAttribute('value','Remove');
		
		newb.onclick=new Function("ignoreitE0('"+num+"')");
//		newb.setAttribute('onclick','ignoreitE3('+num+')');
		
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
}


function addhc(g)
{

var l=document.getElementById('lw').value;
var lch=document.getElementById('lch').value;


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
}
else if (lch==1)
{
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+' There is one child in the house.';
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
		newt.style.borderRadius="5px"
		newt.style.border="none";
		newt.style.backgroundColor='#cfe2ee';
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
		
		newb.onclick=new Function("ignoreitD('"+num+"')");
//		newb.setAttribute('onclick','ignoreitD('+num+')');
		
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
		newt.style.borderRadius="5px"
		newt.style.border="none";
		newt.style.backgroundColor="#cfe2ee";
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
		
		newb.onclick=new Function("ignoreitP('"+num+"')");
//		newb.setAttribute('onclick','ignoreitP('+num+')');
		
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
	var dlcii=dlc+'ly';
// alert(dlcii);

	ret='';
// alert(dlp);
	if (dlci==dlcii)
	{
// 		if (dlp=='have sex')
// 		{
// 			ret=gg1+' has been '+dlcii+' restricted at having sex.';
// 		}
// 		else if (dlp=='socialize')
// 		{
// 			ret=gg1+' has been '+dlcii+' restricted at socializing.';
// 		}
// 		else if (dlp=='go for a walk')
// 		{
// 			ret=gg1+' has been '+dlcii+' restricted at going for a walk.';
// 		}
// 		else
// 		{
// 			ret=gg1+' has been '+dlcii+' restricted at '+dlp+'ing.';
// 		}
		if (dlp=='child care')
		{
			ret=g1+' ability to carry out '+dlp+' has been '+dlcii+' restricted.';
		}
		else if (dlp=='children care')
		{
			ret=g1+' ability to take care of the children has been '+dlcii+' restricted.';
		}
		else
		{
			ret=g1+' ability to '+dlp+' has been '+dlcii+' restricted.';
		}
	}
	else if (dlci=='unable' && dlc=='unable')
	{
		ret=gg1+ ' has been unable to ' + dlp + '.';
	}
	else
	{
		if (dlci!='')
		{
			var dgenx='';
			if (dlc=='mild' && dlci=='mild to moderately')
			{
				dgenx='slightly improved';
			}
			if (dlc=='mild' && dlci=='moderately')
			{
				dgenx='improved';
			}
			if (dlc=='mild' && dlci=='severely')
			{
				dgenx='gradually improved';
			}

			if (dlc=='mild to moderate' && dlci=='moderately')
			{
				dgenx='improved';
			}
			if (dlc=='mild to moderate' && dlci=='severely')
			{
				dgenx='gradually improved';
			}

			if (dlc=='moderate' && dlci=='severely')
			{
				dgenx='gradually improved';
			}

// alert(dlci);
			if (dlci=='unable' && dlc=='severe')
			{
				dgenx='improved';
			}
			if (dlci=='unable' && dlc=='moderate')
			{
				dgenx='gradually improved';
			}
			if (dlci=='unable' && dlc=='mild to moderate')
			{
				dgenx='gradually improved';
			}
			if (dlci=='unable' && dlc=='mild')
			{
				dgenx='improved';
			}



			if (dlc=='unable' && dlci=='severely')
			{
				dgenx='worsened';
			}
			if (dlc=='unable' && dlci=='moderately')
			{
				dgenx='worsened';
			}
			if (dlc=='unable' && dlci=='mild to moderately')
			{
				dgenx='worsened';
			}
			if (dlc=='unable' && dlci=='mildly')
			{
				dgenx='worsened';
			}

			if (dlc=='severe' && dlci=='moderately')
			{
				dgenx='worsened';
			}
			if (dlc=='severe' && dlci=='mild to moderately')
			{
				dgenx='worsened';
			}
			if (dlc=='severe' && dlci=='mildly')
			{
				dgenx='worsened';
			}
			if (dlc=='moderate' && dlci=='mild to moderately')
			{
				dgenx='worsened';
			}
			if (dlc=='moderate' && dlci=='mildly')
			{
				dgenx='worsened';
			}
			if (dlc=='mild to moderate' && dlci=='mildly')
			{
				dgenx='worsened';
			}

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
				ret=ret+' It has now '+dgenx+" and is "+dlc+'.';
			}
			else if (dlc!='' && dlc=='unable'  && dlc!='resolved' && dlc!='resolved after')
			{
				ret=ret+" It has "+dgenx+" and now it is completely restricted.";
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
				ret=ret+" Currently, "+gg2+" is "+dlc+"ly restricted.";
			}
			else if (dlc!='' && dlc=='unable'  && dlc!='resolved' && dlc!='resolved after')
			{
				ret=ret+" Currently, "+gg2+" is completely restricted.";
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
	}

	if (dlc!='resolved' && dlc!='resolved after')
	{
		if (dlr=='will resolve after')
		{
			if (dlrr>1)
				ret=ret+" The problem "+dlr+" "+dlrr+" "+dllr+'s.';
			else
				ret=ret+" The problem "+dlr+" "+dlrr+" "+dllr+'.';
		}
		else if (dlr!='will resolve after' && dlr!='')
		{
			ret=ret+" The problem "+dlr+".";
		}
	}

	if (document.getElementById('helper').value=='No')
	{
		ret=ret+' '+gg1+' did not need any help regarding this problem.';
	}
	else if (document.getElementById('helper').value=='relative')
	{
		if (document.getElementById('helpDUx').value=='still')
		{
			if (document.getElementById('hdur').value=='1')
			{
				ret=ret+' '+gg1+' has been taking help from '+g2+' '+document.getElementById('helperRS').value+' for '+document.getElementById('hdur').value+' hour per '+document.getElementById('helpDU').value+'.';
			}
			else
			{
				ret=ret+' '+gg1+' has been taking help from '+g2+' '+document.getElementById('helperRS').value+' for '+document.getElementById('hdur').value+' hours per '+document.getElementById('helpDU').value+'.';
			}
		}
		else
		{
			if (document.getElementById('hdur').value==1)
			{
				ret=ret+' '+gg1+' took help from '+g2+' '+document.getElementById('helperRS').value+' for '+document.getElementById('hdur').value+' hour every '+document.getElementById('helpDU').value;

				if (document.getElementById('hdurx').value==1)
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value;
				}
				else
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value+'s';
				}
			}
			else
			{
				ret=ret+' '+gg1+' took help from '+g2+' '+document.getElementById('helperRS').value+' for '+document.getElementById('hdur').value+' hours every '+document.getElementById('helpDU').value;

				if (document.getElementById('hdurx').value==1)
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value;
				}
				else
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value+'s';
				}
			}

			ret=ret+'.';
		}
	}
	else if (document.getElementById('helper').value=='paid')
	{
// alert(document.getElementById('helpDU').value);
		if (document.getElementById('helpDUx').value=='still')
		{
			if (document.getElementById('hdur').value=='1')
			{
				ret=ret+' '+gg1+' has employeed a helper for &pound;'+document.getElementById('helperW').value+' per hour for '+document.getElementById('hdur').value+' hour per '+document.getElementById('helpDU').value+'.';
			}
			else
			{
				ret=ret+' '+gg1+' has employeed a helper for &pound;'+document.getElementById('helperW').value+' per hour for '+document.getElementById('hdur').value+' hours per '+document.getElementById('helpDU').value+'.';
			}
		}
		else
		{
			if (document.getElementById('hdur').value==1)
			{
				ret=ret+' '+gg1+' employed a helper for &pound;'+document.getElementById('helperW').value+' per hour for '+document.getElementById('hdur').value+' hour every '+document.getElementById('helpDU').value;

				if (document.getElementById('hdurx').value==1)
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value;
				}
				else
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value+'s';
				}
			}
			else
			{
				ret=ret+' '+gg1+' employed a helper for &pound;'+document.getElementById('helperW').value+' per hour for '+document.getElementById('hdur').value+' hours every '+document.getElementById('helpDU').value;

				if (document.getElementById('hdurx').value==1)
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value;
				}
				else
				{
					ret=ret+' for '+document.getElementById('hdurx').value+' '+document.getElementById('helpDUx').value+'s';
				}
			}

			ret=ret+'.';
		}
	}

	if (document.getElementById('sportLS').value!='')
	{
		ret=ret+' '+gg1+' plays as '+document.getElementById('sportLS').value+'.';
	}



	if (document.getElementById('sportTS').value=='No')
	{
		ret=ret+' '+gg1+' does not play for a team.';
	}
	else if (document.getElementById('sportTS').value=='Yes')
	{
		ret=ret+' '+gg1+' plays for a team';



		if (document.getElementById('sportTPS').value!='')
		{
			ret=ret+' but '+document.getElementById('sportTPS').value;
		}

		ret=ret+'.';
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
		
		newb.onclick=new Function("ignoreit('"+num+"')");
//		newb.setAttribute('onclick','ignoreit('+num+')');
		
		newb.style.backgroundColor='#AA3333';
		newb.style.cursor='pointer';
		newb.style.color='#FFF';

		var newbr = document.createElement('br');
	
	newt.innerHTML = ret;

	ni.appendChild(newh);
	ni.appendChild(newt);
	ni.appendChild(newb);
	ni.appendChild(newbr);

	document.getElementById('dlp').value='.';
	document.getElementById('dlsi').value='';
	document.getElementById('dls').value='';
	document.getElementById('dlr').value='';

	document.getElementById('pr1').value='';
	document.getElementById('pr2').value='day';
	document.getElementById('dlrr').value='.';
	document.getElementById('dllr').value='.';

	document.getElementById('helper').value='';
	document.getElementById('helperRS').value='';
	document.getElementById('helperW').value='';
	document.getElementById('hdur').value='';
	document.getElementById('helpDU').value='day';
	document.getElementById('hdurx').value='';
	document.getElementById('helpDUx').value='day';


	document.getElementById('pInit').style.width='0px';
	document.getElementById('pCurr').style.width='0px';
	document.getElementById('fut').style.width='0px';

	document.getElementById('prres').style.visibility='hidden';
	document.getElementById('fut2').style.visibility='hidden';

	document.getElementById('helpH').style.width='0px';
	document.getElementById('helperR').style.width='0px';
	document.getElementById('helperE').style.width='0px';
	document.getElementById('helpD').style.width='0px';

	document.getElementById('sportLS').value='';
	document.getElementById('sportTS').value='';
	document.getElementById('sportTPS').value='';

	document.getElementById('sportL').style.width='0px';
	document.getElementById('sportT').style.width='0px';
	document.getElementById('sportTP').style.width='0px';

}


function ignore(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblock('"+a+"')");
//	btn.setAttribute('onclick','unblock('+a+')');
// 	alert (s.value);
}

function unblock(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignore('"+a+"')");
//	btn.setAttribute('onclick','ignore('+a+')');
// 	alert (s.value);
}

function ignoreitE0(a)
{
	var txt=document.getElementById('tEmp0['+a+']');
	var tb=document.getElementById('hEmp0'+a);
	var btn=document.getElementById('bEmp0'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitE0('"+a+"')");
	
	tb.setAttribute('value','Unblock');
	
	
	var txt=document.getElementById('tEmp1['+a+']');
	var tb=document.getElementById('hEmp1'+a);
	var btn=document.getElementById('bEmp1'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitE0('"+a+"')");
	
	tb.setAttribute('value','Unblock');
	
	
	var txt=document.getElementById('tEmp2['+a+']');
	var tb=document.getElementById('hEmp2'+a);
	var btn=document.getElementById('bEmp2'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitE0('"+a+"')");
	
	tb.setAttribute('value','Unblock');
	
	
	var txt=document.getElementById('tEmp3['+a+']');
	var tb=document.getElementById('hEmp3'+a);
	var btn=document.getElementById('bEmp3'+a);

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitE0('"+a+"')");
	
	tb.setAttribute('value','Unblock');

// 	alert (s.value);
}

function unblockitE0(a)
{
	var txt=document.getElementById('tEmp0['+a+']');
	var tb=document.getElementById('hEmp0'+a);
	var btn=document.getElementById('bEmp0'+a);

	txt.style.backgroundColor='#fff';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitE0('"+a+"')");
	
	tb.setAttribute('value','Block');
	
	
	var txt=document.getElementById('tEmp1['+a+']');
	var tb=document.getElementById('hEmp1'+a);
	var btn=document.getElementById('bEmp1'+a);

	txt.style.backgroundColor='#fff';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitE0('"+a+"')");
	
	tb.setAttribute('value','Block');
	
	
	var txt=document.getElementById('tEmp2['+a+']');
	var tb=document.getElementById('hEmp2'+a);
	var btn=document.getElementById('bEmp2'+a);

	txt.style.backgroundColor='#fff';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitE0('"+a+"')");
	
	tb.setAttribute('value','Block');
	
	
	var txt=document.getElementById('tEmp3['+a+']');
	var tb=document.getElementById('hEmp3'+a);
	var btn=document.getElementById('bEmp3'+a);

	txt.style.backgroundColor='#fff';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitE0('"+a+"')");
	
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
function ignoreitemp(a)
{


    var txt=document.getElementById('tEmp'+a);
	var tb=document.getElementById('hEmp'+a);
	var btn=document.getElementById('bEmp'+a);

	txt.style.backgroundColor='#AA2222';
	txt.style.display='none';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitE3('+a+')');
	
	tb.setAttribute('value','Unblock');


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
	btn.onclick=new Function("unblockit('"+a+"')");
//	btn.setAttribute('onclick','unblockit('+a+')');
	
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
	btn.onclick=new Function("ignoreit('"+a+"')");
//	btn.setAttribute('onclick','ignoreit('+a+')');
	
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
	btn.onclick=new Function("unblockitD('"+a+"')");
//	btn.setAttribute('onclick','unblockitD('+a+')');
	
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
	btn.onclick=new Function("ignoreitD('"+a+"')");
//	btn.setAttribute('onclick','ignoreitD('+a+')');
	
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
	btn.onclick=new Function("unblockitP('"+a+"')");
//	btn.setAttribute('onclick','unblockitP('+a+')');
	
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
	btn.onclick=new Function("ignoreitP('"+a+"')");
//	btn.setAttribute('onclick','ignoreitP('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function fut()
{
	if (document.getElementById('dls').value!='resolved' && document.getElementById('dls').value!='resolved after')
		document.getElementById('fut').style.visibility='visible';
	if (document.getElementById('dls').value=='resolved' || document.getElementById('dls').value=='resolved after')
	{
		document.getElementById('fut').style.visibility='hidden';
		document.getElementById('fut2').style.visibility='hidden';
	}

	if (document.getElementById('dls').value=='resolved after')
	{
		document.getElementById('prres').style.visibility='visible';
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

///////////////////////////////////////

function idr(a)
{
	return document.getElementById(a);
}

//////////////////////////////////////
function dlivin()
{

	var v=idr('dlp');
	if (v.value!="play american football" && v.value!="go for athletics" && v.value!="play badminton"  && v.value!="play basketball" && v.value!="go for boxing" && v.value!="play cricket" && v.value!="go for cross-country" && v.value!="go for cycling" && v.value!="go for diving" && v.value!="go fishing" && v.value!="play football" && v.value!="go for gliding" && v.value!="go to the gym" && v.value!="go for hiking" && v.value!="play hockey" && v.value!="go horse riding" && v.value!="play lawn tennis" && v.value!="do martial arts training" && v.value!="go for motor cross" && v.value!="go mountaineering" && v.value!="play polo" && v.value!="play rugby" && v.value!="go for running" && v.value!="go for scuba diving" && v.value!="go for skating" && v.value!="go for sky diving" && v.value!="go for sports" && v.value!="play squash" && v.value!="go swimming" && v.value!="play table tennis" && v.value!="play volleyball" && v.value!="play water-polor" && v.value!="go for wrestling")
	{
		idr('pInit').style.width='200px';
		idr('pCurr').style.width='200px';
		idr('fut').style.width='200px';
		idr('helpH').style.width='200px';

		idr('sportL').style.width='0px';
		idr('sportT').style.width='0px';
		idr('sportLS').value='';
		idr('sportTS').value='';
		idr('sportTP').style.width='0px';
		idr('sportTPS').value='';
	}
	else
	{
		idr('pInit').style.width='200px';
		idr('pCurr').style.width='200px';
		idr('fut').style.width='200px';
		idr('helpH').style.width='0px';
		idr('helper').value='';

		idr('helperR').style.width='0px';
		idr('helpD').style.width='0px';
		idr('helperRS').value='';
		idr('hdur').value='';
		idr('helpDU').value='';
		idr('hdurx').value='';
		idr('helpDUx').value='';

		idr('helperE').style.width='0px';
		idr('helperW').value='';

		idr('sportL').style.width='200px';
		idr('sportT').style.width='200px';
	}
}

function sportTPX()
{
	if (idr('sportTS').value=='Yes')
	{
		idr('sportTP').style.width='200px';
	}
}

function helpdF()
{
	if (idr('helper').value=='relative')
	{
		idr('helperR').style.width='200px';
		idr('helpD').style.width='300px';

		idr('helperE').style.width='0px';
	}
	else if (idr('helper').value=='paid')
	{
		idr('helperR').style.width='0px';

		idr('helperE').style.width='200px';
		idr('helpD').style.width='300px';

// 		idr('sportL').style.width='200px';
// 		idr('sportT').style.width='300px';
	}
}

function workSel(a)
{
	alert(a);
	var selbox = document.frm.work1;
	
	selbox.options[selbox.options.length] = new Option(a, a);
}