function addiv(nam, p, norm, ndp, count,div, eid)
{
	var v=document.getElementById(nam);
	var n=document.getElementById(norm).value;
	var no=document.getElementById(ndp).value;
	var pe=document.getElementById(p).value;
//	var c=document.getElementById(count).value;
  if(v.value!=''){
	
	if (v.value=='all')
	{
		var i=1;
		while (v[i].value!='all')
		{
			adit(v[i].value,pe,n,no,count,div,eid);
			i=i+1;
		}
	}
	else
	{
		var i=1;
		while ((v[i].value!='all'))
		{
			if (v[i].selected==true)
			{
				adit(v[i].value,pe,n,no,count,div,eid);
			}
			i=i+1;
		}
	}
	
  }
}

function adit(v,per, n, no, c, div, id)
{
	var fin='';
	
	var p=per;
	var anbu='';
	if (per.length==0 && no!='appeared to be painless')
	{
		anbu='but';
	}
	else if (per.length==0 && no=='appeared to be painless')
	{
		anbu='and';
	}
	else if (per<100 && no!='appeared to be painless')
	{
		anbu='and';
	}
	else if (per<100 && no=='appeared to be painless')
	{
		anbu='but';
	}
	else
	{
		anbu='and';
	}
	
	if (per.length==0)
		var fin=v+' was '+n+' '+anbu+' '+no+'.';
	else
		var fin=v+' was '+per+'% of normal '+ anbu + ' ' +no+'.';
	
	
	var ni = document.getElementById(div);
	var numi = document.getElementById(c);
	var num = (document.getElementById(c).value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = id+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('rows',1);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	
	var newh = document.createElement('input');
	var hIdName = id+'t'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','hidden');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value','Block');
	
	var newb = document.createElement('input');
	var bIdName = id+'b'+'['+num+']';
	newb.setAttribute('id',bIdName);
	newb.setAttribute('type','button');
	newb.setAttribute('name',bIdName);
	newb.setAttribute('value','Block');
	
	
	newb.style.backgroundColor='#AA3333';
	newb.style.cursor='pointer';
	newb.style.color='#FFF';

	var newbr = document.createElement('br');
	
	newb.onclick=new Function("ignoreit"+id+"('"+num+"');");
	
/* alert(div);
 alert (document.getElementById(div).innerHTML);*/
	newt.innerHTML = fin;
	ni.appendChild(newt);
	ni.appendChild(newh);
	ni.appendChild(newb);
	
	ni.appendChild(newbr);
}


function ignoreitn(a)
{
//	alert('t['+a+']');
	
//	alert(b);
	
	var txt=document.getElementById('n['+a+']');
	var tb=document.getElementById('nt['+a+']');
	var btn=document.getElementById('nb['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitn('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitn(a)
{
	var txt=document.getElementById('n['+a+']');
	var tb=document.getElementById('nt['+a+']');
	var btn=document.getElementById('nb['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitn('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}



/*function ignoreitn(a)
{
//	alert('t['+a+']');
	
//	alert(b);
	
	var txt=document.getElementById('n['+a+']');
	var tb=document.getElementById('nt['+a+']');
	var btn=document.getElementById('nb['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.setAttribute('onclick','unblockitn('+a+')');
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitn(a)
{
	var txt=document.getElementById('n['+a+']');
	var tb=document.getElementById('nt['+a+']');
	var btn=document.getElementById('nb['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.setAttribute('onclick','ignoreitn('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}*/



function ignoreitu(a)
{
//	alert('t['+a+']');
	
//	alert(b);
	
	var txt=document.getElementById('u['+a+']');
	var tb=document.getElementById('ut['+a+']');
	var btn=document.getElementById('ub['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitu('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitu(a)
{
	var txt=document.getElementById('u['+a+']');
	var tb=document.getElementById('ut['+a+']');
	var btn=document.getElementById('ub['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitu('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}



function ignoreitb(a)
{
//	alert('t['+a+']');
	
//	alert(b);
	
	var txt=document.getElementById('b['+a+']');
	var tb=document.getElementById('bt['+a+']');
	var btn=document.getElementById('bb['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitb('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitb(a)
{
	var txt=document.getElementById('b['+a+']');
	var tb=document.getElementById('bt['+a+']');
	var btn=document.getElementById('bb['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitb('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function ignoreitt(a)
{
	var txt=document.getElementById('t['+a+']');
	var tb=document.getElementById('tt['+a+']');
	var btn=document.getElementById('tb['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitt('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitt(a)
{
	var txt=document.getElementById('t['+a+']');
	var tb=document.getElementById('tt['+a+']');
	var btn=document.getElementById('tb['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitt('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}



function ignoreitl(a)
{
//	alert('t['+a+']');
	
//	alert(b);
	
	var txt=document.getElementById('l['+a+']');
	var tb=document.getElementById('lt['+a+']');
	var btn=document.getElementById('lb['+a+']');

	txt.style.backgroundColor='#AA2222';
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockitl('"+a+"');");
	
	tb.setAttribute('value','Unblock');
// 	alert (s.value);
}

function unblockitl(a)
{
	var txt=document.getElementById('l['+a+']');
	var tb=document.getElementById('lt['+a+']');
	var btn=document.getElementById('lb['+a+']');
	
	txt.style.backgroundColor='#FFF';
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignoreitl('"+a+"');");
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}

function neck2()
{
	var nPC=document.getElementById('nPC').value;
	var nBT=document.getElementById('nBT').value;
	var nTT=document.getElementById('nTT').value;
	var nMS=document.getElementById('nMS').value;
	var nND=document.getElementById('nND').value;
	
	if (nPC!='')
	{
	  var id='n';
		
	  var ni = document.getElementById('nk');
	  var numi = document.getElementById('cn');
	  var num = (document.getElementById('cn').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = nPC;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (nBT!='')
	{
	  var id='n';
		
	  var ni = document.getElementById('nk');
	  var numi = document.getElementById('cn');
	  var num = (document.getElementById('cn').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = nBT;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (nMS!='')
	{
	  var id='n';
		
	  var ni = document.getElementById('nk');
	  var numi = document.getElementById('cn');
	  var num = (document.getElementById('cn').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = nMS;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (nTT!='')
	{
	  var id='n';
		
	  var ni = document.getElementById('nk');
	  var numi = document.getElementById('cn');
	  var num = (document.getElementById('cn').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = nTT;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (nND!='')
	{
	  var id='n';
		
	  var ni = document.getElementById('nk');
	  var numi = document.getElementById('cn');
	  var num = (document.getElementById('cn').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = nND;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
}


function back2()
{
	var bBT=document.getElementById('bBT').value;
	var bTT=document.getElementById('bTT').value;
	var bMS=document.getElementById('bMS').value;
	var bND=document.getElementById('bND').value;	
	
	if (bBT!='')
	{
	  var id='b';
		
	  var ni = document.getElementById('bk');
	  var numi = document.getElementById('cb');
	  var num = (document.getElementById('cb').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = bBT;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (bMS!='')
	{
	  var id='b';
		
	  var ni = document.getElementById('bk');
	  var numi = document.getElementById('cb');
	  var num = (document.getElementById('cb').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = bMS;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (bTT!='')
	{
	  var id='b';
		
	  var ni = document.getElementById('bk');
	  var numi = document.getElementById('cb');
	  var num = (document.getElementById('cb').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = bTT;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (bND!='')
	{
	  var id='b';
		
	  var ni = document.getElementById('bk');
	  var numi = document.getElementById('cb');
	  var num = (document.getElementById('cb').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitn('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = bND;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
}



function thorax2()
{
	var tLSS=document.getElementById('tLSS').value;
	var tLS=document.getElementById('tLS').value;
	var tS=document.getElementById('tS').value;
	var tTV=document.getElementById('tTV').value;
	var tR=document.getElementById('tR').value;
	
	if (tLSS!='')
	{
	  var id='t';
		
	  var ni = document.getElementById('tDiv');
	  var numi = document.getElementById('ct');
	  var num = (document.getElementById('ct').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitt('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = tLSS;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (tLS!='')
	{
	  var id='t';
		
	  var ni = document.getElementById('tDiv');
	  var numi = document.getElementById('ct');
	  var num = (document.getElementById('ct').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitt('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = tLS;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (tS!='')
	{
	  var id='t';
		
	  var ni = document.getElementById('tDiv');
	  var numi = document.getElementById('ct');
	  var num = (document.getElementById('ct').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitt('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = tS;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (tTV!='')
	{
	  var id='t';
		
	  var ni = document.getElementById('tDiv');
	  var numi = document.getElementById('ct');
	  var num = (document.getElementById('ct').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitt('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = tTV;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
	
	if (tR!='')
	{
	  var id='t';
		
	  var ni = document.getElementById('tDiv');
	  var numi = document.getElementById('ct');
	  var num = (document.getElementById('ct').value -1)+ 2;
	  numi.value = num;
  
	  var newt = document.createElement('textarea');
	  var tIdName = id+'['+num+']';
	  newt.setAttribute('cols',100);
	  newt.setAttribute('rows',1);
	  newt.setAttribute('id',tIdName);
	  newt.setAttribute('name',tIdName);
	  
	  var newh = document.createElement('input');
	  var hIdName = id+'t'+'['+num+']';
	  newh.setAttribute('id',hIdName);
	  newh.setAttribute('type','hidden');
	  newh.setAttribute('name',hIdName);
	  newh.setAttribute('value','Block');
	  
	  var newb = document.createElement('input');
	  var bIdName = id+'b'+'['+num+']';
	  newb.setAttribute('id',bIdName);
	  newb.setAttribute('type','button');
	  newb.setAttribute('name',bIdName);
	  newb.setAttribute('value','Block');
	  
	  newb.style.backgroundColor='#AA3333';
	  newb.style.cursor='pointer';
	  newb.style.color='#FFF';
	  
	  
	  newb.onclick=new Function("ignoreitt('"+num+"');");
  
	  var newbr = document.createElement('br');
	  
	  newt.innerHTML = tR;
	  
	  ni.appendChild(newt);
	  ni.appendChild(newh);
	  ni.appendChild(newb);
	  ni.appendChild(newbr);
	}
}



function minimize(div, b)
{
	document.getElementById(div).style.height='30px';
	document.getElementById(div).style.overflow='hidden';
	
	document.getElementById(b).value=' + ';
	document.getElementById(b).onclick=new Function("expand('"+div+"','"+b+"')");
}

function expand(div, b)
{
	document.getElementById(div).style.height='auto';
	document.getElementById(div).style.overflow='visible';
	
	document.getElementById(b).value=' - ';
	document.getElementById(b).style.right='-2px';
	document.getElementById(b).onclick=new Function("minimize('"+div+"','"+b+"')");
}

function chkOther()
{
	if (document.getElementById('iws').value=='o')
	{
		document.getElementById('other').style.visibility='visible'
		alert('Please manually fill in the details in the input box.');
	}
}

function mrsedChnged(val){
	
	if(val=='metric'){
		
	document.getElementById('non-metDiv').style.display="none";
	document.getElementById('non-metDiv2').style.display="none";
	
	document.getElementById('metricDiv').style.display="block";
	document.getElementById('metricDiv2').style.display="block";
	
	}else if(val=='non-metric'){
		
	document.getElementById('non-metDiv').style.display="block";
	document.getElementById('non-metDiv2').style.display="block";
	
	document.getElementById('metricDiv').style.display="none";
	document.getElementById('metricDiv2').style.display="none";
	
	}
	
	
}