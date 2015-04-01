function addiv(nam, p, norm, ndp, count,div, eid)
{
	var v=document.getElementById(nam);
	var n=document.getElementById(norm).value;
	var no=document.getElementById(ndp).value;
	var pe=document.getElementById(p).value;
//	var c=document.getElementById(count).value;
	
	
	
	if (v.value=='all')
	{
		var i=0;
		while (v[i].value!='all')
		{
			adit(v[i].value,pe,n,no,count,div,eid);
			i=i+1;
		}
	}
	else
	{
		var i=0;
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
		anbu='and';
	
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
	
	newb.setAttribute('onclick','ignoreit'+id+'('+num+')');
	
// alert (tIdName);
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
}



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
	btn.setAttribute('onclick','unblockitu('+a+')');
	
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
	btn.setAttribute('onclick','ignoreitu('+a+')');
	
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
	btn.setAttribute('onclick','unblockitb('+a+')');
	
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
	btn.setAttribute('onclick','ignoreitb('+a+')');
	
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
	btn.setAttribute('onclick','unblockitl('+a+')');
	
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
	btn.setAttribute('onclick','ignoreitl('+a+')');
	
	tb.setAttribute('value','Block');
// 	alert (s.value);
}