var main=0;

function xtogglex()
{

	var n=document.getElementById('n');
	var p=document.getElementById('p');

	if (document.getElementById('pmh').value==1)
	{
		p.style.visibility='visible';
		n.style.visibility='hidden';
	}
	else
	{
		p.style.visibility='hidden';
		n.style.visibility='visible';
	}
}

function pmhm()
{
	var p=document.getElementById('pas').value;

	if (p=="accident"){
		document.getElementById('acc').style.display="block";
		document.getElementById('med').style.display="none";
	}
	if (p=="medical"){
	    document.getElementById('acc').style.display="none";
		document.getElementById('med').style.display="block";
		document.getElementById('musc').style.display="none";
	}
	if (p=="musculoskeletal"){
		document.getElementById('acc').style.display="none";
		document.getElementById('med').style.display="none";
		document.getElementById('musc').style.display="block";
	
	}
	if (p=="confidential")
		addconf();
	if (p=="other")
		document.getElementById('other').style.visibility='visible';

	document.getElementById('hhh').style.visibility='visible';
}

function otherid()
{
	if (document.getElementById('sfrom').value=='.')
	{
		var i=document.getElementById('othid');
		i.style.visibility='visible';
	}
	else
	{
		var i=document.getElementById('othid');
		i.style.visibility='hidden';
	}
}

function notres()
{
	var n=document.getElementById('resolve');
	var p=document.getElementById('nresolve');

	if (document.getElementById('re').value=='resolved')
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

function addacc(b)
{
	var ni = document.getElementById('xac');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.style.borderRadius="5px";
	newt.style.marginTop="10px";
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	
	var textos = document.createTextNode(tIdName);

	var tp=document.getElementById('atp').value;
	var cinx=document.getElementById('ci');
	
	var tin=document.getElementById('ago').value;
	if(tin!=''){
	var tse=document.getElementById('agot').value;
	}
	
	var dtedago = document.getElementById('dtago').value;	
	
	var re=document.getElementById('re').value;

	var ress='';
	var resas='';
	var rdis='';

	var tt='';
	
	var cin='';
	var k=0;
	
	for (i=0; i<18; i++)
	{
		if (cinx[i].selected==true)
		{
			k=k+1;
		}
	}
	
	var j=0;
	
	if (k>1)
	{
		for (i=0; i<39; i++)
		{
			if (cin=='' && cinx[i].selected==true)
			{
				cin=cinx[i].value;
				j=j+1;
			}
			else if (cinx[i].selected==true && j<k-1)
			{
				cin=cin+', '+cinx[i].value;
				j=j+1;
			}
			else if (cinx[i].selected==true && j==k-1)
			{
				cin=cin+' and '+cinx[i].value;
			}
		}
	}
	else
	{
		for (i=0; i<39; i++)
		{
			if (cinx[i].selected==true)
			{
				cin=cinx[i].value;
			}
		}
	}
	
	if (cinx[39].selected==true && cin=='')
	{
		cin='whiplash';
	}
	else if (cinx[39].selected==true && cin!='')
	{
		cin=cin+' along with a whiplash injury';
	}

	if(tin.length>0)
	{
		if (tin=='1')
		{
			tt=' '+tin+' '+tse+' ago';
		}
		else
			tt=' '+tin+' '+tse+'s ago';
	}
	
	if(dtedago.length>0){
		
		tt=' on ' + dtedago ;
	
	}
	
	
	if (re!='.')
	{
		if(re=='resolved')
		{
			var res=document.getElementById('res').value;
			if (res.length>0)
			{
				if (res=='1')
					ress=' which resolved after '+res+' '+document.getElementById('resa').value;
				else
					ress=' which resolved after '+res+' '+document.getElementById('resa').value+'s';
			}
			else
			{
				ress=' which had resolved before this accident'; 
			}
		}
		else
		{
			if (k==1)
			{
				ress='. It was '+document.getElementById('rdis').value+' before the accident';
			}
			else
			{
				ress='. These were causing '+document.getElementById('rdis').value+' disability before the accident';
			}
		}
	}

	newt.innerHTML = document.getElementById('claimName').value + ' had '+tp;
	
	if (cin!='' && cin!='whiplash')
	{
		newt.innerHTML = newt.innerHTML+' causing injury to '+b+' '+cin+tt+ress+'.'
	}
	else if (cin=='whiplash')
	{
		newt.innerHTML = newt.innerHTML+' causing a whiplash injury'+tt+ress+'.';
	}
	else
	{
		newt.innerHTML = newt.innerHTML+tt+ress+'.'
	}
	var newh = document.createElement('input');
	var hIdName = 'te'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','hidden');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Remove');
	
	var newb = document.createElement('input');
	var bIdName = 'b'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Remove');
	
	newb.onclick=new Function("ignoreit('"+num+"');");
	
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');
	
	ni.appendChild(newh);
	
	ni.appendChild(newt);
	
	ni.appendChild(newb);
	
	//ni.appendChild(textos);
	
	ni.appendChild(newbr);
}

function addmed()
{
	var ni = document.getElementById('xme');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.style.borderRadius="5px";
	newt.style.marginTop="10px";
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var tp=document.getElementById('sfrom').value;
	var cin=document.getElementById('ssev').value;
	var tin=document.getElementById('mpast').value;
	var tse=document.getElementById('mpastt').value;

	var fin='Has a ';

	if (tin.length>0)
	{
		if (tin=='1')
			fin=fin+tin+' '+tse+' old ';
		else
			fin=fin+tin+' '+tse+'s old ';
	}

	fin=fin+'history of ';

	if (cin!='none')
		fin=fin+cin+' ';

	fin=fin+tp;


	newt.innerHTML = fin+'.';

	var newh = document.createElement('input');
	var hIdName = 'te'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','hidden');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Remove');
	
	var newb = document.createElement('input');
	var bIdName = 'b'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Remove');
	
	newb.onclick=new Function("ignoreit('"+num+"');");
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');
	
	ni.appendChild(newh);
	
	ni.appendChild(newt);
	
	ni.appendChild(newb);
	
	ni.appendChild(newbr);
}

function addmusc()
{
	var ni = document.getElementById('xmu');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.style.borderRadius="5px";
	newt.style.marginTop="10px";
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var tp=document.getElementById('msuf').value;
	var cin=document.getElementById('msev').value;
	var tin=document.getElementById('msympt').value;
	var tse=document.getElementById('mpas').value;
	var mmpast=document.getElementById('mmpast').value;
	var meff=document.getElementById('meff').value;

	var fin='Has a ';

	if (tse.length>0)
	{
		if (tse=='1')
			fin=fin+tse+' '+mmpast+' old '
		else
			fin=fin+tse+' '+mmpast+'s old '
	}

	fin=fin+'history of ';

	if (cin!='none')
		fin=fin+cin+' ';

	fin=fin+tp;

	if (tin=='yes')
		fin=fin+' which was symptomatic at the time of accident.';

	if (meff=='yes')
		fin=fin+' It has been exacerbated by the accident'
	else
		fin=fin+' It has not been exacerbated by the accident'


	newt.innerHTML = fin+'.';

	var newh = document.createElement('input');
	var hIdName = 'te'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','hidden');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Remove');
	
	var newb = document.createElement('input');
	var bIdName = 'b'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Remove');
	
	newb.onclick=new Function("ignoreit('"+num+"');");
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');
	
	ni.appendChild(newh);
	
	ni.appendChild(newt);
	
	ni.appendChild(newb);
	
	ni.appendChild(newbr);
}

function addconf()
{
	var ni = document.getElementById('myDiv');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 't'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	fin='Has a confidential medical history.';

	newt.innerHTML = fin;
	var newh = document.createElement('input');
	var hIdName = 'te'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','hidden');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Remove');
	
	var newb = document.createElement('input');
	var bIdName = 'b'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Remove');
	
	newb.onclick=new Function("ignoreit('"+num+"');");
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');
	
	ni.appendChild(newh);
	
	ni.appendChild(newt);
	
	ni.appendChild(newb);
	
	ni.appendChild(newbr);
}

// function final()
// {
// 	var document.getElementBy
//	for 

function ignoreit(a)
{
	var txt=document.getElementById('t['+a+']');
	var tb=document.getElementById('te['+a+']');
	var btn=document.getElementById('b['+a+']');
	
//	alert('123');

	txt.style.backgroundColor='#AA2222';
	txt.style.display="none";
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockit('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockit(a,b)
{
	var txt=document.getElementById('t['+a+']');
	var btn=document.getElementById('b['+a+']');
	var tb=document.getElementById('te['+a+']');

	txt.style.backgroundColor='#FFF';
	txt.style.display="none";
	btn.setAttribute('value','Remove');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreit('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}