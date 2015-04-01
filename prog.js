function generate(n)
{
	iter=document.getElementById('elems').value;
	
	for (i=0; i<iter; i++)
	{
		if (document.getElementById('sentence['+i+']').value=='1')
		{
			progdiv(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
		else if (document.getElementById('sentence['+i+']').value=='2')
		{
			progdiv2(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
		else if (document.getElementById('sentence['+i+']').value=='3')
		{
			progdiv3(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
		else if (document.getElementById('sentence['+i+']').value=='4')
		{
			progdiv4(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
		else if (document.getElementById('sentence['+i+']').value=='5')
		{
			progdiv5(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
	}
}


function generate2(n, i)
{

	if (document.getElementById('sentence['+i+']').value=='1')
	{
		progdiv(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
	}
	else if (document.getElementById('sentence['+i+']').value=='2')
	{
		progdiv2(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
	}
	else if (document.getElementById('sentence['+i+']').value=='3')
		{
			progdiv3(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
	else if (document.getElementById('sentence['+i+']').value=='4')
		{
			progdiv4(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
	else if (document.getElementById('sentence['+i+']').value=='5')
		{
			progdiv5(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value, document.getElementById('resd0['+i+']').value, document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value, document.getElementById('wr['+i+']').value);
		}
}


function progdiv(n,pr,c,c2,o,l,t,d0,d,p,s,res, wr)
{
// 	alert(p+' '+c+' '+o);

	var ni = document.getElementById('pro');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var fin='';
	
if(res!='resolved')
{
	if (c!='..' && c!='secondary to')
		fin=fin+'The '+pr+' is due to '+c+'. ';
	else if (c=='secondary to')
		fin=fin+'The '+pr+' is '+c+' '+c2+'. ';
	else if (c=='..')
		fin=fin+'The '+pr+' is due to '+o+'. ';
	
	fin=fin+'It is currently causing '+l+' disability. ';
	
	
	
	
	if (t=='plastic surgery')
	{
		fin=fin+'I recommend having a plastic surgery. ';
	}
	else if (t=='cphysio')
	{
		fin=fin+'I recommend continuing physiotherapy';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cortho')
	{
		fin=fin+'I recommend continuing orthopaedic treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='ortho')
	{
		fin=fin+'I recommend referral to an orthopaedic for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cdent')
	{
		fin=fin+'I recommend continuing dentist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='dent')
	{
		fin=fin+'I recommend referral to a dentist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsy')
	{
		fin=fin+'I recommend continuing psychologist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psy')
	{
		fin=fin+'I recommend referral to a psychologist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsyc')
	{
		fin=fin+'I recommend continuing psychatrist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psyc')
	{
		fin=fin+'I recommend referral to a psychatrist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cspec')
	{
		fin=fin+'I recommend continuing specialist treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='spec')
	{
		fin=fin+'I recommend referral to a specialist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='exer')
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';
	else if (t=='none')
		fin=fin+'Additional treatment would not be necessary. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition' && wr=='will resolve over')
		if (d0=='')
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d0+' to ' + d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	else if (c!='exacerbation of a pre-existing condition' && wr=='will resolve over')
	{
		if (d0=='')
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d0+' to '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	}
	else if (wr=='depends on the expert')
		fin=fin+'The prognosis is dependent on the examination and assessment by the specialist.';
	else if (wr=='will not resolve')
	{
		fin=fin+'The '+pr+' will not resolve.';
	}
	else if (wr=='slowly')
	{
		fin=fin+'The '+pr+' will resolve slowly and steadily.';
	}


}
else
{
	fin='The '+pr+' has resolved.';
}


var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('readonly','true');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');
newb.onclick=new Function("ignore("+num+")");

newb.style.width='80px';
newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newb);
ni.appendChild(newt);
ni.appendChild(newbr);
}

///////////////////////////////////////////////////////////--sentence 2--//////////////////////////////////////////////////////////////


function progdiv2(n,pr,c,c2,o,l,t,d0,d,p,s,res, wr)
{
// 	alert(p+' '+c+' '+o);

	var ni = document.getElementById('pro');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var fin='';
	
if(res!='resolved')
{
	fin=fin+'Currently, the ' + pr + ' is causing '+l+' disability. ';
	
	if (c!='..' && c!='secondary to')
		fin=fin+'The index problem is a result of '+c+'. ';
	else if (c=='secondary to')
		fin=fin+'The index problem is '+c+' '+c2+'. ';
	else if (c=='..')
		fin=fin+'The index problem is a result of '+o+'. ';

	if (t=='plastic surgery')
	{
		fin=fin+'I recommend having a plastic surgery. ';
	}
	else if (t=='cphysio')
	{
		fin=fin+'Continued physiotherapy is recommended';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cortho')
	{
		fin=fin+'I recommend continuing orthopaedic treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='ortho')
	{
		fin=fin+'I recommend referral to an orthopaedic for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cdent')
	{
		fin=fin+'I recommend continuing dentist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='dent')
	{
		fin=fin+'I recommend referral to a dentist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsy')
	{
		fin=fin+'I recommend continuing psychologist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psy')
	{
		fin=fin+'I recommend referral to a psychologist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsyc')
	{
		fin=fin+'I recommend continuing psychatrist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psyc')
	{
		fin=fin+'I recommend referral to a psychatrist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cspec')
	{
		fin=fin+'I recommend continuing specialist treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='spec')
	{
		fin=fin+'I recommend referral to a specialist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='exer')
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';
	else if (t=='none')
		fin=fin+'No additional treatment would be necessary. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition' && wr=='will resolve over')
		if (d0=='')
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d0+' to ' + d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	else if (c!='exacerbation of a pre-existing condition' && wr=='will resolve over')
	{
		if (d0=='')
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d0+' to '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	}
	else if (wr=='depends on the expert')
		fin=fin+'The prognosis is dependent on the examination and assessment by the specialist.';
	else if (wr=='will not resolve')
	{
		fin=fin+'The '+pr+' will not resolve.';
	}
	else if (wr=='slowly')
	{
		fin=fin+'The '+pr+' will resolve slowly and steadily.';
	}


}
else
{
	fin='The '+pr+' has resolved.';
}


var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('readonly','true');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');
newb.onclick=new Function("ignore("+num+")");

newb.style.width='80px';
newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newb);
ni.appendChild(newt);
ni.appendChild(newbr);
}




function progdiv3(n,pr,c,c2,o,l,t,d0,d,p,s,res, wr)
{
// 	alert(p+' '+c+' '+o);

	var ni = document.getElementById('pro');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var fin='';
	
if(res!='resolved')
{
	fin=fin+'Currently, the ' + pr + ' is causing '+l+' disability. ';
	
	if (c!='..' && c!='secondary to')
		fin=fin+'The index problem is a result of '+c+'. ';
	else if (c=='secondary to')
		fin=fin+'The index problem is '+c+' '+c2+'. ';
	else if (c=='..')
		fin=fin+'The index problem is a result of '+o+'. ';

	if (t=='plastic surgery')
	{
		fin=fin+'I recommend having a plastic surgery. ';
	}
	else if (t=='cphysio')
	{
		fin=fin+'Continued physiotherapy is recommended';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cortho')
	{
		fin=fin+'I recommend continuing orthopaedic treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='ortho')
	{
		fin=fin+'I recommend referral to an orthopaedic for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cdent')
	{
		fin=fin+'I recommend continuing dentist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='dent')
	{
		fin=fin+'I recommend referral to a dentist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsy')
	{
		fin=fin+'I recommend continuing psychologist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psy')
	{
		fin=fin+'I recommend referral to a psychologist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsyc')
	{
		fin=fin+'I recommend continuing psychatrist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psyc')
	{
		fin=fin+'I recommend referral to a psychatrist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cspec')
	{
		fin=fin+'I recommend continuing specialist treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='spec')
	{
		fin=fin+'I recommend referral to a specialist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='exer')
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';
	else if (t=='none')
		fin=fin+'No additional treatment would be necessary. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition' && wr=='will resolve over')
		if (d0=='')
		{
			fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d0+' to ' + d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	else if (c!='exacerbation of a pre-existing condition' && wr=='will resolve over')
	{
		if (d0=='')
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d0+' to '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	}
	else if (wr=='depends on the expert')
		fin=fin+'The prognosis is dependent on the examination and assessment by the specialist.';
	else if (wr=='will not resolve')
	{
		fin=fin+'On the balance of probabilities, I anticipate that the '+pr+' will not resolve.';
	}
	else if (wr=='slowly')
	{
		fin=fin+'On the balance of probabilities, I anticipate that the '+pr+' will resolve slowly and steadily.';
	}


}
else
{
	fin='The '+pr+' has resolved.';
}


var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('readonly','true');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');
newb.onclick=new Function("ignore("+num+")");

newb.style.width='80px';
newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newb);
ni.appendChild(newt);
ni.appendChild(newbr);
}




function progdiv4(n,pr,c,c2,o,l,t,d0,d,p,s,res, wr)
{
// 	alert(p+' '+c+' '+o);

	var ni = document.getElementById('pro');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var fin='';
	
if(res!='resolved')
{
	if (c!='..' && c!='secondary to')
		fin=fin+'The '+pr+' is due to '+c+'. ';
	else if (c=='secondary to')
		fin=fin+'The '+pr+' is '+c+' '+c2+'. ';
	else if (c=='..')
		fin=fin+'The '+pr+' is due to '+o+'. ';
	
	fin=fin+'It is currently causing '+l+' disability. ';
	
	
	
	
	if (t=='plastic surgery')
	{
		fin=fin+'I recommend having a plastic surgery. ';
	}
	else if (t=='cphysio')
	{
		fin=fin+'I recommend continuing physiotherapy';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cortho')
	{
		fin=fin+'I recommend continuing orthopaedic treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='ortho')
	{
		fin=fin+'I recommend referral to an orthopaedic for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cdent')
	{
		fin=fin+'I recommend continuing dentist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='dent')
	{
		fin=fin+'I recommend referral to a dentist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsy')
	{
		fin=fin+'I recommend continuing psychologist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psy')
	{
		fin=fin+'I recommend referral to a psychologist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsyc')
	{
		fin=fin+'I recommend continuing psychatrist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psyc')
	{
		fin=fin+'I recommend referral to a psychatrist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cspec')
	{
		fin=fin+'I recommend continuing specialist treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='spec')
	{
		fin=fin+'I recommend referral to a specialist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='exer')
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';
	else if (t=='none')
		fin=fin+'Additional treatment would not be necessary. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition' && wr=='will resolve over')
		if (d0=='')
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d0+' to ' + d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	else if (c!='exacerbation of a pre-existing condition' && wr=='will resolve over')
	{
		if (d0=='')
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
		else
		{
			fin=fin+'On the balance of probabilities, I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d0+' to '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
		}
	}
	else if (wr=='depends on the expert')
		fin=fin+'The prognosis is dependent on the examination and assessment by the specialist.';
	else if (wr=='will not resolve')
	{
		fin=fin+'On the balance of probabilities, I anticipate that the '+pr+' will not resolve.';
	}
	else if (wr=='slowly')
	{
		fin=fin+'On the balance of probabilities, I anticipate that the '+pr+' will resolve slowly and steadily.';
	}


}
else
{
	fin='The '+pr+' has resolved.';
}


var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('readonly','true');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');
newb.onclick=new Function("ignore("+num+")");

newb.style.width='80px';
newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newb);
ni.appendChild(newt);
ni.appendChild(newbr);
}



function progdiv5(n,pr,c,c2,o,l,t,d0,d,p,s,res, wr)
{
// 	alert(p+' '+c+' '+o);

	var ni = document.getElementById('pro');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var fin='';
	
if(res!='resolved')
{
	if (c!='..' && c!='secondary to')
		fin=fin+'The '+pr+' is due to '+c+'. ';
	else if (c=='secondary to')
		fin=fin+'The '+pr+' is '+c+' '+c2+'. ';
	else if (c=='..')
		fin=fin+'The '+pr+' is due to '+o+'. ';
	
	fin=fin+'It is currently causing '+l+' disability. ';
	
	
	
	
	if (t=='plastic surgery')
	{
		fin=fin+'I recommend having a plastic surgery. ';
	}
	else if (t=='cphysio')
	{
		fin=fin+'I recommend continuing physiotherapy';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cortho')
	{
		fin=fin+'I recommend continuing orthopaedic treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='ortho')
	{
		fin=fin+'I recommend referral to an orthopaedic for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cdent')
	{
		fin=fin+'I recommend continuing dentist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='dent')
	{
		fin=fin+'I recommend referral to a dentist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsy')
	{
		fin=fin+'I recommend continuing psychologist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psy')
	{
		fin=fin+'I recommend referral to a psychologist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cpsyc')
	{
		fin=fin+'I recommend continuing psychatrist';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='psyc')
	{
		fin=fin+'I recommend referral to a psychatrist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='cspec')
	{
		fin=fin+'I recommend continuing specialist treatment';
		
		if (s.length>0)
			fin=fin+' for further '+s+' sessions';
		fin=fin+'.';
	}
	else if (t=='spec')
	{
		fin=fin+'I recommend referral to a specialist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else if (t=='exer')
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';
	else if (t=='none')
		fin=fin+'Additional treatment would not be necessary. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition' && wr=='will resolve over')
		if (d0=='')
		{
			fin=fin+'In my opinion, on the balance of probability, the '+ pr +'  will resolve to the pre-accident level within '+d+' '+p+' of the date of accident. ';
		}
		else
		{
			fin=fin+'In my opinion, on the balance of probability, the '+ pr +'  will resolve to the pre-accident level within '+d0+'-' + d+' '+p+' of the date of accident. ';
		}
	else if (c!='exacerbation of a pre-existing condition' && wr=='will resolve over')
	{
		if (d0=='')
		{
			fin=fin+'In my opinion, on the balance of probability, the '+ pr +' should resolve within |b|'+d+'|/b| '+p+' of the date of accident. ';
		}
		else
		{
			fin=fin+'In my opinion, on the balance of probability, the '+ pr +' should resolve within |b|'+d0+'-'+d+'|/b| '+p+' of the date of accident. ';
		}
	}
	else if (wr=='depends on the expert')
		fin=fin+'The prognosis is dependent on the examination and assessment by the specialist.';
	else if (wr=='will not resolve')
	{
		fin=fin+'On the balance of probability, I anticipate that the '+pr+' will not resolve. ';
	}
	else if (wr=='slowly')
	{
		fin=fin+'On the balance of probability, I anticipate that the '+pr+' will resolve slowly and steadily. ';
	}


}
else
{
	fin='The '+pr+' has resolved.';
}


var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','hidden');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');

var newb = document.createElement('input');
var bIdName = 'b'+'['+num+']';
newb.setAttribute('id',bIdName);
newb.setAttribute('type','button');
newb.setAttribute('readonly','true');
newb.setAttribute('name',bIdName);
newb.setAttribute('value','Block');
newb.onclick=new Function("ignore("+num+")");

newb.style.width='80px';
newb.style.backgroundColor='#AA3333';
newb.style.cursor='pointer';
newb.style.color='#FFF';

var newbr = document.createElement('br');

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newb);
ni.appendChild(newt);
ni.appendChild(newbr);
}



function ignore(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');
	var hdn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#AA2222';
	hdn.setAttribute('value','Unblock');
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblock("+a+")");
// 	alert (s.value);
}

function unblock(a)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');
	var hdn=document.getElementById('h['+a+']');

	txt.style.backgroundColor='#FFF';
	hdn.setAttribute('value','Block');
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignore("+a+")");
// 	alert (s.value);
}

function refffun(a)
{
	var v='ftrt['+a+']';
	var w='wr['+a+']';
	var ses='sess['+a+']';
// 	alert(v);
	if (document.getElementById(v).value=='exer')
	{
// 		alert(document.getElementById(v).value);
		document.getElementById(ses).style.visibility='hidden';
	}
	else if ( document.getElementById(v).value=='none')
	{
// 		alert(document.getElementById(v).value);
		document.getElementById(ses).style.visibility='hidden';
	}
	else
	{
// 		alert(document.getElementById(v).value);
		document.getElementById(ses).style.visibility='visible';
//		document.getElementById(w).innerHTML=document.getElementById(w).innerHTML+"<option value='depends on the expert'>depends on the expert</option>";

		createOption('frm',w,'depends on the expert','depends on the expert')
	}


}

function createOption(f,e,newValue,newText)
{

var objSelect=document.forms[f].elements[e];
var objOption = document.createElement("option");
objOption.text = newText
objOption.value = newValue

if(document.all && !window.opera)
  {objSelect.add(objOption);}
 else
  {objSelect.add(objOption, null);};

}



function resove(i)
{
	var v='wr'+i+'';
// alert(v);
	var w='resdx'+i+'';

	if (document.getElementById(v).value=='will resolve over')
	{
		document.getElementById(w).style.visibility='visible';
	}
	else
	{
		document.getElementById(w).style.visibility='hidden';
	}
}