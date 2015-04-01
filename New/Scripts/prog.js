function generate(n)
{
	iter=document.getElementById('elems').value;
	
	for (i=0; i<iter; i++)
	{
		progdiv(n,document.getElementById('prob['+i+']').value, document.getElementById('cause['+i+']').value,  document.getElementById('cause2['+i+']').value, document.getElementById('oth['+i+']').value,document.getElementById('hlev['+i+']').value,document.getElementById('ftrt['+i+']').value,document.getElementById('resd['+i+']').value,document.getElementById('resp['+i+']').value,document.getElementById('psess['+i+']').value,document.getElementById('rex['+i+']').value);
	}
}

function progdiv(n,pr,c,c2,o,l,t,d,p,s,res)
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
		fin='The '+pr+' is due to a '+c+'. ';
	else if (c=='secondary to')
		fin='The '+pr+' is '+c+' '+c2+'. ';
	else if (c=='..')
		fin='The '+pr+' is due to a '+o+'. ';
	
	fin=fin+'It is currently causing '+l+' disability. ';
	
	if (t=='physio')
	{
		fin=fin+'I recommend referral to a physiotherapist for further assessment and treatment. ';
		
		if (s.length>0)
			fin=fin+s+' sessions would be appropriate. ';
	}
	else
		fin=fin+'Additional treatment would not be beneficial apart from gentle exercise. ';

	if(p=='years')
	dd=Number(n)+(Number(d)*12);
	if(p=='days')
	dd=Number(n)+1;
	if(p=='weeks')
	dd=Number(n)+Number(d)/4;
	if(p=='months')
	dd=Number(n)+Number(d);
		
	if (c=='exacerbation of a pre-existing condition')
	fin=fin+'I anticipate that with appropriate management, the '+ pr +'  will resolve to the pre-accident level over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';
	else
		fin=fin+'I anticipate that with appropriate management, the '+ pr +' will resolve over the next '+d+' '+p+' from the date of assessment (approximately '+dd+' months from date of accident). ';


}
else
{
	fin='The '+pr+' has resolved.';
}

var newh = document.createElement('input');
var hIdName = 'h'+'['+num+']';
newh.setAttribute('id',hIdName);
newh.setAttribute('type','text');
newh.setAttribute('readonly','true');
newh.setAttribute('name',hIdName);
newh.setAttribute('value','Block');
newh.setAttribute('onclick','ignore('+num+')');

newh.style.width='80px';
newh.style.backgroundColor='#AA3333';
newh.style.cursor='pointer';
newh.style.color='#FFF';

newt.innerHTML = fin;
ni.appendChild(newh);
ni.appendChild(newt);
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