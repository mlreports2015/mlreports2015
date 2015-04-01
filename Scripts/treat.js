var advyz='';
var preyz='';
var refyz='';
var snotyz='';
var invesyz='';

function itrdets(v,n)
{
	// var itrlen  = document.getElementById('itr').options.length;
	// var itr = document.getElementById('itr');
	 // var  count;
	
	/*
	for(var i=0; i < itrlen; i++){
		
			if(itr[i].selected==true){
				count =count + ','+i;
				
			}
	}
	
	itrcount = count.split(',');
	//alert(itrcount.length-1);
	
	*/

	
	if(v.checked){
	
	var docsextend = document.getElementById('extendby');
	
	if(document.getElementById('itrcount').value != 0)
	{
		document.getElementById('itrcount').value = (parseInt(document.getElementById('itrcount').value) + 1);
	}else{
	
		document.getElementById('itrcount').value= 0;
		document.getElementById('itrcount').value = (parseInt(document.getElementById('itrcount').value) + 1);
	}
	
		var n = document.getElementById('itrcount').value;
	//docsextend.innerHTML='';
	
	//for(var n =1; n<itrcount.length; n++){
		//alert(itrcount[n]);
		docsextend.innerHTML=docsextend.innerHTML+"<br/><u>"+v.value+"</u><br/>First Aider<input type='checkbox' id='frstAider["+n+"]' name='frstAider["+n+"]'>Paramedic<input type='checkbox' id='paramedic["+n+"]' name='paramedic["+n+"]' >Passer by<input type='checkbox' id='public["+n+"]' name='public["+n+"]'>doctor<input type='checkbox' id='doctor["+n+"]' name='doctor["+n+"]'>police<input type='checkbox' id='police["+n+"]' name='police["+n+"]'/>fire officer<input type='checkbox' id='fireofficer["+n+"]' name='fireofficer["+n+"]'/>";
	
	}
	
	


}


function addinit(a)
{

var itr=document.getElementsByName('itr');
var ith=document.getElementById('ith').value;
var iaf=document.getElementById('iaf').value;
var ide=document.getElementById('ide').value;

var itf=document.getElementById('itf');
//var itb=document.getElementById('itb');

var qq='';
var it='';
var gen='';






if(a=='He'){
  gen='his';	
} 

if(a=='She'){
  gen='her';	
}

var l='';
var i=1;
var qq='';
var j=0;
var qq22='';

if (ith!='')
{
	
	if(ith=='oth'){
			
		ith=document.getElementById('othith').value;
	
	}
	
	if (iaf=='ambulance')
		it=ith+' and went '+ide+' by '+iaf;
	else if (iaf=='continued')
		   if((ide=='home')||(ide=='journey')){
				it=ith+' and '+iaf+' '+gen+' '+ide;
		   }else{
			   	it=ith+' and '+iaf+' '+ide;
		   }
				
	else if (iaf=='waited')
	{
		it=ith+' and waited '+ide;
	}
	else if (iaf!='')
	{
		//alert(ide);
		it=ith+' and took a '+iaf+' '+ide;
	}
	else
		it=ith;
}
else
{
	if (iaf=='ambulance')
		it='went '+ide+' by '+iaf;
	else if (iaf=='continued')
		it=iaf+' '+ide;
	else if (iaf=='waited')
	{
		it='waited '+ide;
	}
	else if (iaf!='')
		it='took a '+iaf+' '+ide;
	else
		it='';
}

if (itr.value=='.' && itb[0].selected==true)
{
	l=a+' did not receive any treatment.';

	qq='';
}
else if (itr[0].selected!=true)
{
	var i=1;
	var j=0;
	var k=0;
   alert('123');

if(itrcount.length >=2){

		

	for(var n=1;n<itrcount.length;n++){
	
	  if(qq==''){
		qq = itr[itrcount[n]].value;
		}else{
		qq= qq+' and '+itr[itrcount[n]].value;	
		}
		
		paramedic  = "paramedic["+n+"]";
		firstAid  = "frstAider["+n+"]";
		
    if(document.getElementById("paramedic["+n+"]").checked){ 
	   qq = qq + ' by paramedics';
	  
    }else if(document.getElementById("frstAider["+n+"]").checked){
	  
	   qq = qq + ' by a first aider';
	}else if(document.getElementById("public["+n+"]").checked){
	
		qq = qq + ' by a member of the public';
	
	}else if(document.getElementById("police["+n+"]").checked){
		
		qq=qq+' by the police';	
	}else if(document.getElementById("fireofficer["+n+"]").checked){
	
		qq = qq+' by the fire brigade';
		
	}
   
   }
	
	alert(qq);

}else{
	
	for(var n =1; n<itr.length; n++){
	
			if(itr[n].checked){
			   
			   if(qq==''){
			    qq = itr[n].value;
			   }else{
				qq =qq+ itr[n].value;	 
			   }
	
    if(document.getElementById("paramedic[1]").checked){ 
	   qq = qq + ' by paramedics';
	  
    }else if(document.getElementById("frstAider[1]").checked){
	  
	   qq = qq + ' by a first aider';
	}else if(document.getElementById("public[1]").checked){
	
		qq = qq + ' by a member of the public';
	
	}else if(document.getElementById("police[1]").checked){
		
		qq=qq+' by the police';	
	}else if(document.getElementById("fireofficer[1]").checked){
	
		qq = qq+' by the fire brigade';
		
	}

		    
			   
		 }// checked radio buttons
    }
	
}




	

//l='Initial treatment included';
l='At the scene of the accident; ';
/*
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
				qq22=' was administered by '+itb[i].value;
			}
			else if (i<j)
				qq22=qq22+', '+itb[i].value;
			else
				qq22=qq22+' and '+itb[i].value;
		}
		i=i+1;
	}
}
*/

	

}
/*
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
				qq22='was administed by '+itb[i].value;
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
*/

var scenicT=l+qq+'. '+qq22;



if (it!='')
{
	scenicT=scenicT+' '+a+' then '+it+'.'
}

itf.innerHTML=scenicT;
}

function ltroo()
{
// var ltr=document.getElementById('ltr');
// if (ltr.value=='other')
// {
// 	document.frm.ltro.disabled=false;
// }
}


function impctNoChck(id)
{


	if(id=='multiple'){
		id=4;	
	}

	var tble = document.getElementById('impctTbl');
	

	
	

	
	
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
newt.style.backgroundColor="#333";
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
	else if (ldr=='')
	{
		fin=ltp + ' after the accident '+ ' and ' + lad + ' ' + lt;
	}
	else
		fin=ltp + ' after '+ ltl + ' ' + ldr + ' and ' + lad +' ' + lt;
}
else
{
	if (ldr=='immediately')
		fin=ltp + ' ' + lt + ' immediately after the accident';
	else if (ldr=='shortly')
		fin=ltp + ' ' + lt + 'shortly after the accident';
	else if (ldr=='')
	{
		fin=ltp + ' ' + lt + ' after the accident';
	}
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
	
	var named=a.toString();

	a=document.getElementById(a);
	b=document.getElementById(b);
    

	if (b.value=='0')
	{
		b.value='1';
		a.style.backgroundColor='#33B';
		
		if(named=='mri')
		{
					
			document.getElementById('invesres').style.visibility='visible';
					
		}
		else if(named=='xray')
		{
				
			document.getElementById('invesres').style.visibility='visible';
		
		}
		else if(named=="ot1")
		{
		
			
			document.getElementById('proth').setAttribute('type','text');
		
		}
		else if(named=="ot")
		{
			
			document.getElementById('adoth').setAttribute('type','text');
		
		}
		
	}
	else
	{
		b.value='0';
		a.style.backgroundColor='#CCC';
		
	
		
		
	}
}
function invesDet(det)
{

  if(det=='attended')
  {
	 
	 document.getElementById('invesoth').style.visibility='visible'
  
  }
	
	
}
function addlater2(gen)
{
var ltp=document.getElementById('ltp').value; // whom they attended for treatment (GP, Hospital, Walkin, AE)
var ltl=document.getElementById('ltl').value; // How soon or later after the accident they attend some one for treatment.
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
newt.setAttribute('rows',3);
newt.setAttribute('id',tIdName);
newt.setAttribute('name',tIdName);
newt.style.border='none';
newt.style.backgroundColor='#cfe2ee'
newt.style.borderRadius="6px"
newt.style.padding="7px"
// alert(tIdName);

var fin='';

var lt='';
var Errorr=false;

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
	else if (ldr=='')
	{
		fin=gen+' '+ltp + ' after the accident and ' + lt;
	}
	else
	{
		if (ltl>'1')
			fin=gen+' '+ ltp + ' ' + ltl + ' ' + ldr + 's' + ' after the index accident, and ' + lt;
		else
			fin= gen +' '+ ltp +' '+ ltl + ' ' + ldr + ' after the index accident, and ' + lt;
	}
}
else
{
	if (ltotc()!='')
	{
	if (ldr=='immediately')
	{
		fin=ltp + ' ' + ltotc() + ' immediately after the accident';
// alert(ltp);
	}
	else if (ldr.value=='shortly')
		fin=ltp + ' ' + ltotc() + 'shortly after the accident';
	else if (ldr=='')
	{
		fin=ltp + ' ' + ltotc() + ' after the accident';
	}
	else
	{
		if (ltl.value>'1')
			fin=ltp +' ' + ltotc() + ' ' + ltl+ ' ' + ldr+'s after the accident';
		else
			fin=ltp +' ' + ltotc() + ' ' + ltl+ ' ' + ldr+ ' after the accident';
	}
	}
	else
	{		
		alert('No prescription selected!');
		Errorr=true;
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


if (refyz==false && advyz==false && preyz==false && snotyz==false && invesyz==true)
{
		
	fin=fin+' was recommended '+investxy(gen);
}
else if (invesyz==true)
{
	fin=fin+'. '+gen+' was also recommended'+investxy(gen);
}

if (!Errorr)
{
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

newb.onclick=new Function("ignoreit("+num+")");

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
	if (p=='investigation')
	{
		invesyz=true;
		document.getElementById('invest').style.visibility='visible';
	}
}

function sethidad()
{
	document.getElementById('advised').style.visibility='hidden';
	advyz=false;
}

function sethidpr()
{
	document.getElementById('presc').style.visibility='hidden';
	preyz=false;
}

function sethidre()
{
	document.getElementById('reff').style.visibility='hidden';
	refyz=false;
}

function sethidsn()
{
	document.getElementById('snot').style.visibility='hidden';
	snotyz=false;
}

function sethidin()
{
	document.getElementById('invest').style.visibility='hidden';
	document.getElementById('invesres').style.visibility='hidden';
	document.getElementById('invesoth').style.visibility='hidden';
	document.getElementById('invesInjury').style.visibility='hidden';
	invesyz=false;
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
		
		if(document.getElementById('proth').value!==''){
		
			ret = document.getElementById('proth').value;
			
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

function rstrtx2()
{
	if (document.getElementById('rstrt2').checked)
	{
		document.getElementById('rstrtxyz2').style.visibility='visible';
		document.getElementById('refben2').style.visibility='visible';
	}
	else
	{
		document.getElementById('rstrtxyz2').style.visibility='hidden';
		document.getElementById('refben2').style.visibility='hidden';
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

function refstx2()
{
	if (document.getElementById('refst2').value=='finished')
	{
		document.getElementById('reffin2').style.visibility='visible';
		document.getElementById('refcon2').style.visibility='hidden';
	}
	else if (document.getElementById('refst2').value=='continuing')
	{
		document.getElementById('reffin2').style.visibility='hidden';
		document.getElementById('refcon2').style.visibility='visible';
	}
	else
	{
		document.getElementById('reffin2').style.visibility='hidden';
		document.getElementById('refcon2').style.visibility='hidden';
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
				b=b+'. The treatment has started '+document.getElementById('rstrtaft').value;
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
				b=b+'. So far there has been '+document.getElementById('refssof').value+' '+' session';
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


function referexy2(a)
{
	var ni = document.getElementById('nrefff');
	var numi=document.getElementById('reffff');
	var num = (document.getElementById('reffff').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 'ref'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	newt.style.backgroundColor="#cfe2ee";
	newt.style.border='none';
	newt.style.borderRadius="6px";

	var b=a+' was referred to a ';

	b=b+document.getElementById('scoon2').value;


	if (document.getElementById('rstrt2').checked)
	{
		if (document.getElementById('rstrtaft2').value=='immediately'){
			
			b=b+'. The treatment started immediately';
	    }
		else if(document.getElementById('rstrtaft2').value==' ')
		{
			b = b+'. The treatment started';
		}
		else
		{
			if (document.getElementById('rstrttm2').value>'1')
				b=b+'. The treatment started after '+document.getElementById('rstrttm2').value+' '+document.getElementById('rstrtaft2').value+'s';
			else
				b=b+'. The treatment started after '+document.getElementById('rstrttm2').value+' '+document.getElementById('rstrtaft2').value;
		}
		if (document.getElementById('refst2').value=='finished')
		{
			if (document.getElementById('reffas2').value>'1')
				b=b+' and finished after '+document.getElementById('reffas2').value+' sessions';
			else
				b=b+' and finished after '+document.getElementById('reffas2').value+' session';
		}
		else if (document.getElementById('refst2').value=='continuing')
		{
			if (document.getElementById('refssof2').value>'1')
				b=b+'. So far there have been '+document.getElementById('refssof2').value+' sessions';
			else
				b=b+'. So far there has been '+document.getElementById('refssof2').value+' '+' session';
		}
		if (document.getElementById('refcond2').value=='worse')
		{
			b=b+'. The treatment resulted in a worsening of the condition';
		}
		else if (document.getElementById('refcond2').value!='.')
		{
			b=b+'. The treatment has '+document.getElementById('refcond2').value+' useful';
		}
	}
	else
	{

		if(refst2.value ==""){
		 b=b+'. The treatment has not yet begun';
		}else{
	        if(refst2.value=="awaiting appointment"){
			    b = b+". "+a+" is " +refst2.value;
		    }else if(refst2.value=="attended appointment"){
			    b = b+". "+a+" has "+refst2.value;
		    }else if(refst2.value=="continuing"){
				b = b + ". " + a +" has attended appointment and continuing to see them ";
			}
		
		}
	}
	newt.innerHTML=b+'.';

	var newh = document.createElement('input');
	var hIdName = 'tr'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','text');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Block');
	
	var newb = document.createElement('input');
	var bIdName = 'br'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Block');
	
	newb.onclick=new Function("ignoreitr("+num+")");
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');

	ni.appendChild(newh);
	
	ni.appendChild(newt);
	
	ni.appendChild(newb);
	
	ni.appendChild(newbr);

// 	alert(b);
	return b;
}


function referto(spcl){
	
  if(spcl=="orthopaedic surgeon")
  {
	
	var optionalTyp = document.getElementById('refst2');
	
	var option = document.createElement('option');
	    option.text = "Await";
		option.value = "awaiting appointment";
	
	var option2 = document.createElement('option');
		option2.text = "Attended";
		option2.value = "attended appointment"
	
	optionalTyp.appendChild(option);
	optionalTyp.appendChild(option2);
	
	optionalTyp.style.visibility="visible";
	
	}

	
	
	
}


function ignoreit(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('l['+a+']');
	var tb=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');

	txt.style.backgroundColor='#AA2222';
	txt.style.display='none';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockit("+a+")");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}


function ignoreall(a)
{
	 for(var i=1;i<=a;i++){
	 ignoreit(i);
	 }
}

function unblockit(a)
{
	var txt=document.getElementById('l['+a+']');
	var btn=document.getElementById('b['+a+']');
	var tb=document.getElementById('t['+a+']');

	txt.style.backgroundColor='#FFF';
	txt.style.display='inline';
	btn.setAttribute('value','Remove');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreit("+a+")");
	
	tb.setAttribute('value','Remove');
// 	alert (s.value);
}


function ignoreitr(a)
{
//	alert('t['+a+']');
	var txt=document.getElementById('ref['+a+']');
	var tb=document.getElementById('tr['+a+']');
	var btn=document.getElementById('br['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitr("+a+")");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitr(a)
{
	var txt=document.getElementById('ref['+a+']');
	var btn=document.getElementById('br['+a+']');
	var tb=document.getElementById('tr['+a+']');

	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitr("+a+")");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}


function refer()
{
	if (document.getElementById('scoopn2').value!='none')
		document.getElementById('iftru').style.visibility='visible';
}

function ithchk(val)
{
	
		if(val=='oth'){
		   document.getElementById('othith').style.visibility='visible';
			
		}


}

function chkinvestLocal(v)
{
	
	if(v=="boney injury"){
	
		document.getElementById('invesInjury').style.visibility='visible';
		
	}else{
	
		document.getElementById('invesInjury').style.visibility='visible';
	}
	
}



function investxy(g)
{
	var i='';
	
	if (document.getElementById('inve[0]').value=='1')
	{ 
		i=' an X-Ray';
			if(document.getElementById('invesres').value=='attended'){
					
				i = i + '. '+g + ' has attended an x-ray';
				
				   if(document.getElementById('invesoth').value!=''){			
						
						if(document.getElementById('invesoth').value=='no results'){
						i = i + " but,  " + document.getElementById('invesoth').value;	
							
						}else{
						i = i + " and the results identified a  " + document.getElementById('invesoth').value;
						
						 if(document.getElementById('invesInjury').value!=''){
							 
							i = i + " to the "+document.getElementById('invesInjury').value;
						 }
						
						
						}
				   }
			}else{
				
				i = i + '. '+ g + ' has not yet attended an x-ray';	
			}
	}
	
	if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='1')
	{
		i=i+', an MRI Scan, a CT Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='0')
	{
		i=i+', an MRI Scan and a CT Scan';
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='1')
	{
		i=i+', an MRI Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='0')
	{
		i=i+' and an MRI Scan';
		
	
		
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='1')
	{
		i=i+', a CT Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='0')
	{
		i=i+' and a CT Scan';
	}
	else if (document.getElementById('inve[0]').value=='1' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='1')
	{
		i=i+' and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='1')
	{
		i=' an MRI Scan, a CT Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='0')
	{
		i=' an MRI Scan and a CT Scan';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='1')
	{
		i=' an MRI Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='1' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='0')
	{
		i=' an MRI Scan' ;
		
		if(document.getElementById('invesres').value=='attended'){
					
					
			i = i + '. '+ g + ' has attended an MRI Scan'; 
			
				if(document.getElementById('invesoth').value!=''){			
						i = i + " and results are " + document.getElementById('invesoth').value;
						
						 if(document.getElementById('invesInjury').value!=''){
							 
							i = i + " to the ".document.getElementById('invesInjury').value;
						 }
				
				}
	            
				
	    }else{
			
			i = i + '. '+ g + ' has not yet attended an MRI Scan';	
		}
		
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='1')
	{
		i=' a CT Scan and an Ultra Sound';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='1' && document.getElementById('inve[3]').value=='0')
	{
		i=' a CT Scan';
	}
	else if (document.getElementById('inve[0]').value=='0' && document.getElementById('inve[1]').value=='0' && document.getElementById('inve[2]').value=='0' && document.getElementById('inve[3]').value=='1')
	{
		i=' an Ultra Sound';
	}
	
	return i;
}



