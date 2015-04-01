var gender;
var gender2;
var claim;

function init(a,b,c)
{
	gender=a;
	gender2=b;

	claim=c;
}


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
	{
		document.getElementById('work1').innerHTML=g+' works for '+wh+' hours a week.';
	}
	if (wo=='1' && wo.length>0)
	{
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+' off from work.';
	}
	else if (wo>'1' && wo.length>0)
	{
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+'s off from work.';
	}
	else
	{
		document.getElementById('work2').innerHTML=g+' did not take any time off from work.';
	}
}
else
{
	document.getElementById('work0').innerHTML=g+' works as a '+wj+'.';
	if (wh.length>0)
	{
		if (wh>1)
		{
			document.getElementById('work1').innerHTML=g+' works for '+wh+' hours a week.';
		}
		else
		{
			document.getElementById('work1').innerHTML=g+' works for '+wh+' hour a week.';
		}
		
	}
	if (wo=='1' && wo.length>0)
	{
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+' off from work.';
	}
	else if (wo>'1' && wo.length>0)
	{
		document.getElementById('work2').innerHTML=g+' had to take '+wo+' '+wt+'s off from work.';
	}
	else
	{
		document.getElementById('work2').innerHTML=g+' did not take any time off from work.';
	}
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
{
	g1='his';
}
else
{
	g1='her';
}

if (l=='alone')
{
	document.getElementById('daily').innerHTML=g+' lives alone.';
}
else
{
	document.getElementById('daily').innerHTML=g+' lives with '+g1+' '+l+'.';
}

if (lch>1)
{
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+' There are '+lch+' children in the house.';

var lche='';
	if (lch11.length>0)
	{
		lche=lch11+' years';
	}
	if (lch12.length>0)
	{
		lche=lche+' and '+lch12+' months';
	}

var lchy='';
	if (lch21.length>0)
	{
		lchy=lch21+' years';
	}
	if (lch22.length>0)
	{
		lchy=lchy+' and '+lch22+' months';
	}

if (lche.length>0 && lche==lchy)
{
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+g+' has '+lchy+' old twins.';
}
else
{
	var lch1='';
	if (lche.length>0 && lchy.length>0)
	{
		lch1='The eldest is '+lche+' and the youngest is '+lchy+' old.';
	}
	else if (lche.length>0)
	{
		lch1='The eldest is '+lche+' old.';
	}
	else if (lchy.length>0)
	{
		lch1='The youngest is '+lchy+' old.';
	}
	
	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+lch1;
}
}
else if (lch==1)
{
	var lche1='';
	if (lch11.length>0)
	{
		lche1=lch11+' years';
	}
	if (lch12.length>0)
	{
		lche1=lche+' and '+lch12+' months';
	}

	if (lche.length>0)
	{
		lche1=lche+" old";
	}

	document.getElementById('daily').innerHTML=document.getElementById('daily').innerHTML+' There is one '+lche1+' child in the house.';
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
{
	f=n+' did not face any problems while driving.';
}
else if (twd=='does not drive')
{
	f=n+' does not drive';
}
else
{
	f=n+' suffered from '+twdc+' '+ twd + ' while driving.';

	if (tdr=='resolved')
	{
		if (tdrr=='1' && tdrr.length>0)
		{
			f=f+' The problem resolved after '+tdrr+' '+tddr+'.';
		}
		else if (tdrr>'1' && tdrr.length>0)
		{
			f=f+' The problem resolved after '+tdrr+' '+tddr+'s.';
		}
		else
		{
			f=f+' The problem has resolved.';
		}
	}
	else if (tdr=='-')
	{
		var axyo=0+0;
	}
	else
	{
		if (tdrr=='1' && tdrr.length>0)
		{
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'.';
		}
		else if (tdrr>'1' && tdrr.length>0)
		{
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'s.';
		}
		else
		{
			f=f+' The problem will resolve.';
		}
	}
}

	document.getElementById('tdrv').innerHTML=f;

}


function adddrve2()
{

var twd=document.getElementById('twd').value;
var twdc=document.getElementById('twdc').value;
var tdr=document.getElementById('tdr').value;
var tdrr=document.getElementById('tdrr').value;
var tddr=document.getElementById('tddr').value;

var f='';

if (twd=='none')
{
	f=claim+' did not face any problems while driving.';
}
else if (twd=='does not drive')
{
	f=claim+' does not drive';
}
else
{
	f=claim+' suffered from '+twdc+' '+ twd + ' while driving.';

	if (tdr=='resolved')
	{
		if (tdrr=='1' && tdrr.length>0)
		{
			f=f+' The problem resolved after '+tdrr+' '+tddr+'.';
		}
		else if (tdrr>'1' && tdrr.length>0)
		{
			f=f+' The problem resolved after '+tdrr+' '+tddr+'s.';
		}
		else
		{
			f=f+' The problem has resolved.';
		}
	}
	else if (tdr=='-')
	{
		var axyo=0+0;
	}
	else
	{
		if (tdrr=='1' && tdrr.length>0)
		{
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'.';
		}
		else if (tdrr>'1' && tdrr.length>0)
		{
			f=f+' The problem will resolve after '+tdrr+' '+tddr+'s.';
		}
		else
		{
			f=f+' The problem will resolve.';
		}
	}
}

	document.getElementById('tdrv').innerHTML=f;

}


function adddrve3()
{

	var twdca=document.getElementById('twdca').value;
	var tdra=document.getElementById('tdra').value;
	var tdrra=document.getElementById('tdrra').value;
	var tddra=document.getElementById('tddra').value;

	var twdcd=document.getElementById('twdcd').value;
	var tdrd=document.getElementById('tdrd').value;
	var tdrrd=document.getElementById('tdrrd').value;
	var tddrd=document.getElementById('tdrd').value;

	var f='';

	f='When driving '+claim+' suffered from '+twdca+' anxiety';
	f=f+' and '+twdcd+' physical discomfort.';

	var chk='';

	if (tdra=='resolved')
	{
		if (tdrra=='1' && tdrra.length>0)
		{
			f=f+' The anxiety resolved after '+tdrra+' '+tddra;
		}
		else if (tdrra>'1' && tdrra.length>0)
		{
			f=f+' The anxiety resolved after '+tdrra+' '+tddra+'s';
		}
		else
		{
			f=f+' The anxiety has resolved';
		}
		chk='c';
	}
	else if (tdra=='-')
	{
		var axyo=0+0;
	}
	else
	{
		if (tdrra=='1' && tdrra.length>0)
		{
			f=f+' The anxiety will resolve after '+tdrra+' '+tddra;
		}
		else if (tdrra>'1' && tdrra.length>0)
		{
			f=f+' The anxiety will resolve after '+tdrra+' '+tddra+'s';
		}
		else
		{
			f=f+' The anxiety will resolve';
		}
		chk='c';
	}

	var p2;

	if (chk=='c')
	{
		p2=' while the';
	}
	else
	{
		p2=' The';
	}

	if (tdrd=='resolved')
	{
		if (tdrrd=='1' && tdrrd.length>0)
		{
			f=f+p2+' physical discomfort resolved after '+tdrrd+' '+tddrd+'.';
		}
		else if (tdrrd>'1' && tdrrd.length>0)
		{
			f=f+p2+' physical discomfort resolved after '+tdrrd+' '+tddrd+'s.';
		}
		else
		{
			f=f+p2+' physical discomfort has resolved.';
		}
	}
	else if (tdrd=='-' && chk=='c')
	{
		f=f+'.';
	}
	else if (tdrd=='will resolve after')
	{
		if (tdrrd=='1' && tdrrd.length>0)
		{
			f=f+p2+' physical discomfort will resolve after '+tdrrd+' '+tddrd+'.';
		}
		else if (tdrrd>'1' && tdrrd.length>0)
		{
			f=f+p2+' physical discomfort will resolve after '+tdrrd+' '+tddrd+'s.';
		}
		else
		{
			f=f+p2+' physical discomfort will resolve.';
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
//alert (twp);
	if (twp=='none')
	{
		f=n+' did not face any problems while travelling as a passenger.';
	}
	else
	{
		f=n+' suffered from '+twpc+' '+ twp + ' while travelling as a passenger.';

		if (tpr=='resolved')
		{
			if (tprr=='1' && tprr.length>0)
			{
				f=f+' The problem resolved after '+tprr+' '+tppr+'.';
			}
			else if (tprr>'1' && tprr.length>0)
			{
				f=f+' The problem resolved after '+tprr+' '+tppr+'s.';
			}
			else
			{
				f=f+' The problem has resolved.';
			}
		}
		else if (tpr=='-')
		{
			var axyo=0+0;
		}
		else
		{
			if (tprr=='1' && tprr.length>0)
			{
				f=f+' The problem will resolve after '+tprr+' '+tppr+'.';
			}
			else if (tprr>'1' && tprr.length>0)
			{
				f=f+' The problem will resolve after '+tprr+' '+tppr+'s.';
			}
			else
			{
				f=f+' The problem will resolve.';
			}
		}
	}

	document.getElementById('tpass').innerHTML=f;

}

function addpass2()
{

	var twp=document.getElementById('twp').value;
	var twpc=document.getElementById('twpc').value;
	var tpr=document.getElementById('tpr').value;
	var tprr=document.getElementById('tprr').value;
	var tppr=document.getElementById('tppr').value;

	var f='';

	if (twp=='none')
	{
		f=n+' did not face any problems while travelling as a passenger.';
	}
	else
	{
		f=gender+' suffered from '+twpc+' '+ twp + ' while travelling as a passenger.';

		if (tpr=='resolved')
		{
			if (tprr=='1' && tprr.length>0)
			{
				f=f+' The problem resolved after '+tprr+' '+tppr+'.';
			}
			else if (tprr>'1' && tprr.length>0)
			{
				f=f+' The problem resolved after '+tprr+' '+tppr+'s.';
			}
			else
			{
				f=f+' The problem has resolved.';
			}
		}
		else if (tpr=='-')
		{
			var axyo=0+0;
		}
		else
		{
			if (tprr=='1' && tprr.length>0)
			{
				f=f+' The problem will resolve after '+tprr+' '+tppr+'.';
			}
			else if (tprr>'1' && tprr.length>0)
			{
				f=f+' The problem will resolve after '+tprr+' '+tppr+'s.';
			}
			else
			{
				f=f+' The problem will resolve.';
			}
		}
	}

	document.getElementById('tpass').innerHTML=f;

}

function addpass3()
{

	var twpca=document.getElementById('twpca').value;
	var tpra=document.getElementById('tpra').value;
	var tprra=document.getElementById('tprra').value;
	var tppra=document.getElementById('tppra').value;

	var twpcd=document.getElementById('twpcd').value;
	var tprd=document.getElementById('tprd').value;
	var tprrd=document.getElementById('tprrd').value;
	var tpprd=document.getElementById('tpprd').value;

	var f='';

	f='When travelling as a passenger '+gender2+' suffered from '+twpca+' anxiety';
	f=f+' and '+twpcd+' physical discomfort.';

	var chk='';

	if (tpra=='resolved')
	{
		if (tprra=='1' && tprra.length>0)
		{
			f=f+' The anxiety resolved after '+tprra+' '+tppra;
		}
		else if (tprra>'1' && tprra.length>0)
		{
			f=f+' The anxiety resolved after '+tprra+' '+tppra+'s';
		}
		else
		{
			f=f+' The anxiety has resolved';
		}
		chk='c';
	}
	else if (tpra=='-')
	{
		var axyo=0+0;
	}
	else
	{
		if (tprra=='1' && tprra.length>0)
		{
			f=f+' The anxiety will resolve after '+tprra+' '+tppra;
		}
		else if (tprra>'1' && tprra.length>0)
		{
			f=f+' The anxiety will resolve after '+tprra+' '+tppra+'s';
		}
		else
		{
			f=f+' The anxiety will resolve';
		}
		chk='c';
	}

	var p2;

	if (chk=='c')
	{
		p2=' while the';
	}
	else
	{
		p2=' The';
	}

	if (tprd=='resolved')
	{
		if (tprrd=='1' && tprrd.length>0)
		{
			f=f+p2+' physical discomfort resolved after '+tprrd+' '+tpprd+'.';
		}
		else if (tprrd>'1' && tprrd.length>0)
		{
			f=f+p2+' physical discomfort resolved after '+tprrd+' '+tpprd+'s.';
		}
		else
		{
			f=f+p2+' physical discomfort has resolved.';
		}
	}
	else if (tprd=='-' && chk=='c')
	{
		f=f+'.';
	}
	else if (tprd=='will resolve after')
	{
		if (tprrd=='1' && tprrd.length>0)
		{
			f=f+p2+' physical discomfort will resolve after '+tprrd+' '+tpprd+'.';
		}
		else if (tprrd>'1' && tprrd.length>0)
		{
			f=f+p2+' physical discomfort will resolve after '+tprrd+' '+tpprd+'s.';
		}
		else
		{
			f=f+p2+' physical discomfort will resolve.';
		}
	}

	document.getElementById('tpass').innerHTML=f;

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

function prres()
{
	if (document.getElementById('dls').value=='resolved after')
	{
		document.getElementById('prres').style.visibility='visible';
		document.getElementById('fut').style.visibility='hidden';
	}
	else
		document.getElementById('prres').style.visibility='hidden';
}

function ttwp1(a)
{
	if(document.getElementById('twp').value=='anxiety and physical discomfort')
	{
		document.getElementById('difp').style.visibility='visible';
	}
	else
	{
		document.getElementById('difp').style.visibility='hidden';
		document.getElementById('p2xyz').style.visibility='hidden';
		document.getElementById('p1xyz').style.visibility='visible';
		document.getElementById('addp').setAttribute('onclick', 'addpass2()');
	}
}

function ttwp2(a)
{
	if (document.getElementById('diffp').checked==true)
	{
		document.getElementById('p2xyz').style.visibility='visible';
		document.getElementById('p1xyz').style.visibility='hidden';
		document.getElementById('addp').setAttribute('onclick', 'addpass3()');
	}
	else
	{
		document.getElementById('p2xyz').style.visibility='hidden';
		document.getElementById('p1xyz').style.visibility='visible';
		document.getElementById('addp').setAttribute('onclick', 'addpass2()');
	}
}

function ttwd1(a)
{
	if(document.getElementById('twd').value=='anxiety and physical discomfort')
	{
		document.getElementById('difd').style.visibility='visible';
	}
	else
	{
		document.getElementById('difd').style.visibility='hidden';
		document.getElementById('d2xyz').style.visibility='hidden';
		document.getElementById('d1xyz').style.visibility='visible';
		document.getElementById('addd').setAttribute('onclick', 'adddrve2()');
	}
}

function ttwd2(a)
{
	if (document.getElementById('diffd').checked==true)
	{
		document.getElementById('d2xyz').style.visibility='visible';
		document.getElementById('d1xyz').style.visibility='hidden';
		document.getElementById('addd').setAttribute('onclick', 'adddrve3()');
	}
	else
	{
		document.getElementById('d2xyz').style.visibility='hidden';
		document.getElementById('d1xyz').style.visibility='visible';
		document.getElementById('addd').setAttribute('onclick', 'adddrve2()');
	}
}