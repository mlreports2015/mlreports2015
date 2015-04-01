function notres(a,b,c)
{
	var n=document.getElementById(a);
	var p=document.getElementById(b);

	if (document.getElementById(c).value=='resolved after')
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

function notresBurn(a,b,c)
{
	var n=document.getElementById(a);
	var p=document.getElementById(b);

	if (document.getElementById(c).value=='resolved after')
	{
		p.style.visibility='hidden';
		n.style.visibility='visible';
	}
	else if (document.getElementById(c).value=='has not resolved')
	{
		p.style.visibility='visible';
		n.style.visibility='hidden';
	}
	else
	{
		p.style.visibility='hidden';
		n.style.visibility='hidden';
	}
}

function finx()
{
	if (document.getElementById('il').value=='l')
	{
		document.getElementById('latetm').style.visibility='visible';
	}
	else
		document.getElementById('latetm').style.visibility='hidden';
}

function stiff()
{
	if (document.getElementById('iii').value=='0')
	{
		//document.getElementById('iib').style.backgroundColor='#47D';
		document.getElementById('iib').checked=true;
		document.getElementById('iii').value='1';
	}
	else
	{
		//document.getElementById('iib').style.backgroundColor='#DDD';
		document.getElementById('iib').checked=false;
		document.getElementById('iii').value='0';
	}
}

function chkresolvemnths(mnth, reso){
		
		dateDff = document.getElementById('dtdiff').value;
		
		
		if(dateDff < mnth){
			
			 
			 if(reso=='resolved after'){
				
				alert('Warning' + parseInt(mnth) + 'months have not yet passed');
				
			 }
				
		}
	
}

function addshock()
{
	var ni = document.getElementById('shk');
	var shkopts = document.getElementById('shck').options
	
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;
	
	alert(shkopts.length);
	var shock =  $("#shck").multipleSelect("getSelects", "text");


 for(var i=0;i<shock.length;i++){


	if(shock[i]!=""){
		
	
	var newt = document.createElement('textarea');
	var tIdName = 'i'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	newt.setAttribute('style','background-color:#77a9c9;border-radius:8px;');
	//var sre=document.getElementById('sre').value;
    var sre = $("#sre").val();
	var sress='';
//alert(sre);
 
/*
    if(document.getElementById('sresa').value=='month'){
	  chkresolvemnths(document.getElementById('sress').value,sre);
	}else if(document.getElementById('sresa').value=='week'){
		
	  chkresolvemnths((document.getElementById('sress').value/4),sre)	;
	
	}else if(document.getElementById('sresa').value=='day'){
		
	   chkresolvemnths((document.getElementById('sress').value/28),sre);		
	
	}
*/	
	if(sre=='resolved after')
	{
		var sres=document.getElementById('sress');
		if (sres.value.length>0)
		{
			if (sres.value=='1')
				sress=' . This resolved a '+$("#sresa").val()+' after the indexed accident.';
			else
				sress=' . This resolved '+sres.value+' '+$("#sresa").val()+'s after the indexed accident';

			var newh = document.createElement('input');
			var hIdName = 'ih'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			var newh = document.createElement('input');
			var hIdName = 'ih'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','unresolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		
		if($("input:radio[name=shlv]:checked").val().trim() == document.getElementById('srdis').value){
			sress='. It has not improved and is still '+document.getElementById('srdis').value;
		}else{
			
			if(document.getElementById('srdis').value=='severe'){
			
			sress='. It has worsened and is currently '+document.getElementById('srdis').value;
			  
			}else{
			
			sress='. It is improving and is currently '+document.getElementById('srdis').value;
			}
		}
		var newh = document.createElement('input');
		var hIdName = 'ih'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}


	//alert(sress);


	var newp = document.createElement('input');
	var pIdName = 'ip'+'['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',shock[i]);

/*
	var pnlvl = document.createElement('input');
	var pnlvIdName = 'plv['+num+']';
		pnlvl.setAttribute('id',pnlvIdName);
		pnlvl.setAttribute('type','text');
		pnlvl.setAttribute('name',pnlvIdName);
		pnlvl.setAttribute('value',$("#srdis").val());
			
	var pnlvli = document.createElement('input');
	var pnlvliIdName = 'plvli['+num+']';
		pnlvli.setAttribute('id',pnlvliIdName);
		pnlvli.setAttribute('type','text');
		pnlvli.setAttribute('name',pnlvliIdName);
		pnlvli.setAttribute('value',$("#shlev:checked").val());		
	
	var newphhx = document.createElement('input');
	var phhIdName = 'pphhi'+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	*/
var newphh = document.createElement('input');
var phhIdName = 'pphhib'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Remove');

//alert(sress);


newphh.onclick=new Function("ignorei("+num+")");

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');



ni.appendChild(newp)
//ni.appendChild(newphh);
//ni.appendChild(newphhx);
ni.appendChild(newbr);

			

			  if(shock[i].trim()=="Crying"){
			  fin='Experienced crying after the accident'+sress;
			  alert(fin);
			  }
			  else if(shock[i].trim()=="Vomiting"){
			  fin='Started to vomit from the accident'+sress;
			  }else{
			  fin='Suffered from '+$("input:radio[name=shlv]:checked").val()+" "+shock[i]+sress;
			  }

	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
	//ni.appendChild(newbr);
	//ni.appendChild(pnlvli);
	//ni.appendChild(pnlvl);	
	}
	
 }
	
}


function addpain()
{
	var ni = document.getElementById('pn');
	
	var nprobopts = document.getElementById('prob').options;
	
	var numi='';
	var nm='';
	var num='';
	var ilvv='';


for(var i =0;i<nprobopts.length;i++){


   if(nprobopts[i].selected){
	   
	 

	if (document.getElementById('pinsym').checked)
	{
		numi = document.getElementById('theValue');
		nm='i';
		num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
		ilvv='Suffered from';
	}
	else if(document.getElementById('platsym').checked)
	{
		numi = document.getElementById('theValue2');
		nm='l';
		num = (document.getElementById('theValue2').value -1)+ 2;
		numi.value = num;
		ilvv='Developed';
	}

	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	newt.setAttribute('style','background-color:#77a9c9;border-radius:8px;');

	var sre=document.getElementById('re').value;

	var ress='';
// alert(sre);
     if(document.getElementById('resa').value=='month'){
	chkresolvemnths(document.getElementById('ress').value,sre);
	}else if(document.getElementById('resa').value=='week'){
		
	chkresolvemnths((document.getElementById('ress').value/4),sre)	;
	
	}else if(document.getElementById('resa').value=='day'){
		
	chkresolvemnths((document.getElementById('ress').value/28),sre);		
	
	}
	
	//chkresolvemnths(document.getElementById('ress').value,sre);
	
	if(sre=='resolved after')
	{
		var res=document.getElementById('ress');
		if (res.value.length>0)
		{
			if (res.value=='1')
				ress=' which resolved after '+res.value+' '+document.getElementById('resa').value;
			else
				ress=' which resolved after '+res.value+' '+document.getElementById('resa').value+'s';

			if (document.getElementById('cause').value=='.')
				ress=ress;
			else if (document.getElementById('cause').value!='secondary to')
				ress=ress+'. It was due to '+document.getElementById('cause').value;
			else if (document.getElementById('cause').value=='secondary to')
				ress=ress+'. It was secondary to a '+document.getElementById('cause2').value;

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','hidden');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			ress=' which has resolved';


			if (document.getElementById('cause').value=='.')
				ress=ress;
			else if (document.getElementById('cause').value!='secondary to')
				ress=ress+'. It was due to '+document.getElementById('cause').value;
			else if (document.getElementById('cause').value=='secondary to')
				ress=ress+'. It was secondary to a '+document.getElementById('cause2').value;

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','hidden');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		var ress='';
		
		if (document.getElementById('rdis').value=='persisting')
		{
			ress='. It is still '+document.getElementById('rdis').value;
		
		
		}
		else if(document.getElementById('rdis').value==document.getElementById('hlev').value){
			ress='. It is still persisting';
		
		}
		else
		{
		
			if(document.getElementById('rdis').value=='severe'){
			
			ress='. This has now worsened and is currently causing '+document.getElementById('rdis').value+' pain';
			
			}else{
		
			ress='. This has gradually improved and is currently '+document.getElementById('rdis').value;

			}
		
		}
		var newh = document.createElement('input');
		var hIdName = nm+'h'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','hidden');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}

	fin=ilvv +' '+$("input:radio[name=hlvl]:checked").val()+' '+nprobopts[i].value;

	if (document.getElementById('iii').value=='1')
		fin=fin+' and stiffness';

/*
	if (document.getElementById('il').value=='l' && document.getElementById('ltme').value.length>0)
	{
		if (document.getElementById('ltme').value>'1')
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value+'s';
		else
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value;
	}
*/

	fin=fin+ress;

	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',nprobopts[i].value);
	alert(pIdName);
	var newpax = document.createElement('input');
	var pIdNameAdd = 'add'+pIdName;
	newpax.setAttribute('id', pIdNameAdd);
	newpax.setAttribute('type','button');
	newpax.setAttribute('value','AddMe');
	newpax.onclick=new Function("addExtendedPain('"+pIdName+"','"+tIdName+"')");

	var psugg = document.createElement('input');
	var pIdNameSug = 'add'+pIdName;
	psugg.setAttribute('id', pIdNameSug);
	psugg.setAttribute('type','button');
	psugg.setAttribute('value','suggestions');
	psugg.onclick=new Function("tgglside()");



	var pnlvl = document.createElement('input');
	var pnlvIdName = nm+'plv['+num+']';
		pnlvl.setAttribute('id',pnlvIdName);
		pnlvl.setAttribute('type','hidden');
		pnlvl.setAttribute('name',pnlvIdName);
		pnlvl.setAttribute('value',document.getElementById('rdis').value);
		
	var pnlvli = document.createElement('input');
	var pnlvliIdName = nm+'plvli['+num+']';
	    pnlvli.setAttribute('id',pnlvliIdName);
		pnlvli.setAttribute('type','hidden');
		pnlvli.setAttribute('name',pnlvliIdName);
		pnlvli.setAttribute('value',$("input:radio[name=hlvl]:checked").val());
		

	var newphhx = document.createElement('input');
	var phhIdName = 'pphh'+nm+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	
var newphh = document.createElement('input');
var phhIdName = 'pphh'+nm+'b'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Remove');
if (nm=='i')
	newphh.onclick= new Function("ignorei("+num+")");
else
	newphh.onclick= new Function("ignorel("+num+")");

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');
	ni.appendChild(newp);
	ni.appendChild(newpax);
	ni.appendChild(psugg);
	ni.appendChild(newphh);
	ni.appendChild(newphhx);
	ni.appendChild(newbr);
	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
	ni.appendChild(pnlvli);
	ni.appendChild(pnlvl);
	ni.appendChild(newbr);
	
   }

  }

}

function addFracture()
{
	var ni = document.getElementById('fracs');
	var numi = document.getElementById('theValue');
	var num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

	var newt = document.createElement('textarea');
	var tIdName = 'i'+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var sre=document.getElementById('facre').value;

	var sress='';
// alert(sre);
/*
    if(document.getElementById('sresa').value=='month'){
	  chkresolvemnths(document.getElementById('sress').value,sre);
	}else if(document.getElementById('sresa').value=='week'){
		
	  chkresolvemnths((document.getElementById('sress').value/4),sre)	;
	
	}else if(document.getElementById('sresa').value=='day'){
		
	   chkresolvemnths((document.getElementById('sress').value/28),sre);		
	
	}
*/
	if(sre=='healed')
	{
		//var sres=document.getElementById('sress');
		
				sress=' . This fracture has now '+ sre;
			

			var newh = document.createElement('input');
			var hIdName = 'ih'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		
	}
	else
	{
		
		if(document.getElementById('faclvl').value == document.getElementById('facrdis').value){
			sress='. It has not improved and is still '+document.getElementById('facrdis').value;
		}else{
			
			if(document.getElementById('facrdis').value=='severe'){
			
			sress='. It has worsened and is currently '+document.getElementById('facrdis').value;
			  
			}else{
				
				alert(document.getElementById('facre').value);
				
				if(document.getElementById('facre').value=='not-healed'){
				   sress='. The fracture has not yet healed';
				}else{
			      sress='. It is improving and is currently '+document.getElementById('facrdis').value;
				}
			}
		}
		var newh = document.createElement('input');
		var hIdName = 'ih'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}
	
	
	alert(document.getElementById('facprob').value);
	
	var newp = document.createElement('input');
	var pIdName = 'ip'+'['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',document.getElementById('facprob').value + " Fracture");
	
	var pnlvl = document.createElement('input');
	var pnlvIdName = 'plv['+num+']';
		pnlvl.setAttribute('id',pnlvIdName);
		pnlvl.setAttribute('type','text');
		pnlvl.setAttribute('name',pnlvIdName);
		pnlvl.setAttribute('value',document.getElementById('facrdis').value);
			
	var pnlvli = document.createElement('input');
	var pnlvliIdName = 'plvli['+num+']';
		pnlvli.setAttribute('id',pnlvliIdName);
		pnlvli.setAttribute('type','text');
		pnlvli.setAttribute('name',pnlvliIdName);
		pnlvli.setAttribute('value',document.getElementById('faclvl').value);		

	var newphhx = document.createElement('input');
	var phhIdName = 'pphhi'+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Block');
	
var newphh = document.createElement('input');
var phhIdName = 'pphhib'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Block');

newphh.onclick=new Function("ignorei("+num+")");

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');

	ni.appendChild(newp);
ni.appendChild(newphh);
ni.appendChild(newphhx);
ni.appendChild(newbr);

	if (document.getElementById('facprob').value!='crying')
	     if(document.getElementById('facprob').value=='unconscience'){
			
		      fin='Suffered Loss of Conscienceness. ';
		 
		 }else if(document.getElementById('facprob').value=='vomiting'){
			 
			 fin='Vomited immediately after the accident.';
			  
		 }else{
			  fin='Suffered '+document.getElementById('faclvl').value+' '+document.getElementById('facprob').value+sress;
		}
	
	else
		   fin='Started to cry as a result of the accident';

	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
	ni.appendChild(newbr);
	ni.appendChild(pnlvli);
	ni.appendChild(pnlvl);
}






function addmenhlth()
{
	var ni = document.getElementById('mpn');

	var numi='';
	var nm='';
	var num='';
	var ilvv='';

    var nmhopts = document.getElementById('mprob').options;
	
  for(var i =0; i<nmhopts.length;i++){


	if(nmhopts[i].selected){

	if (document.getElementById('mhini').checked)
	{
		numi = document.getElementById('theValue');
		nm='i';
		num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
		ilvv='Suffered from';
	}
	else if(document.getElementById('mhltr').checked)
	{
		numi = document.getElementById('theValue2');
		nm='l';
		num = (document.getElementById('theValue2').value -1)+ 2;
		numi.value = num;
		ilvv='Developed';
	}

	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);
	newt.setAttribute('style','background-color:#77a9c9;border-radius:8px;');

	var sre=document.getElementById('mre').value;

	var ress='';
// alert(sre);

chkresolvemnths(document.getElementById('mress').value,sre);

	if(sre=='resolved after')
	{
		var res=document.getElementById('mress');
		if (res.value.length>0)
		{
			if (res.value=='1')
				ress=' which resolved after '+res.value+' '+document.getElementById('mresa').value;
			else
				ress=' which resolved after '+res.value+' '+document.getElementById('mresa').value+'s';

			if (document.getElementById('mcause').value=='.')
				ress=ress;
			else if (document.getElementById('mcause').value!='secondary to')
				ress=ress+'. It was due to '+document.getElementById('cause').value;
			else if (document.getElementById('mcause').value=='secondary to')
				ress=ress+'. It was secondary to a '+document.getElementById('cause2').value;

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			ress=' which has resolved';


			if (document.getElementById('mcause').value=='.')
				ress=ress;
			else if (document.getElementById('mcause').value!='secondary to')
				ress=ress+'. It was due to '+document.getElementById('mcause').value;
			else if (document.getElementById('mcause').value=='secondary to')
				ress=ress+'. It was secondary to a '+document.getElementById('mcause2').value;

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}

	}
	else
	{
		var ress='';
		
		if(document.getElementById('mcause').value!=''){
			ress='. It was due to '+document.getElementById('mcause').value;
		}
		
		if (document.getElementById('mrdis').value=='persisting')
			ress=ress + '. It is '+document.getElementById('mrdis').value;
		else
			ress= ress+ '. It has improved and is now '+document.getElementById('mrdis').value;

		var newh = document.createElement('input');
		var hIdName = nm+'h'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}

	fin=ilvv +' '+document.getElementById('mhlev').value+' '+nmhopts[i].value;

	if (document.getElementById('iii').value=='1')
		fin=fin+' and stiffness';

	/*
	if (document.getElementById('il').value=='l' && document.getElementById('ltme').value.length>0)
	{
		if (document.getElementById('ltme').value>'1')
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value+'s';
		else
			fin=fin+' after '+document.getElementById('ltme').value+' '+document.getElementById('ltmh').value;
	}
	*/
	
	fin=fin+ress;

	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',nmhopts[i].value);


	var newphhx = document.createElement('input');
	var phhIdName = 'pphh'+nm+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Remove');
	
var newphh = document.createElement('input');
var phhIdName = 'pphh'+nm+'b'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Remove');
if (nm=='i')
	newphh.onclick= new Function("ignorei("+num+")");
else
	newphhonclick= new Function("ignorel("+num+")");

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

   var newbr = document.createElement('br');
	ni.appendChild(newp);
	ni.appendChild(newphh);
	ni.appendChild(newphhx);
	ni.appendChild(newbr);
	newt.innerHTML = fin+'.';
	ni.appendChild(newt);
	ni.appendChild(newbr);


  }


 }


}


function addbruise()
{
	var ni = document.getElementById('bru');

	var numi='';
	var nm='';
	var num='';

	numi = document.getElementById('theValue');
	nm='i';
	num = (document.getElementById('theValue').value -1)+ 2;
	numi.value = num;

// alert(nm);
	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);

	var sre=document.getElementById('bre').value;

	var ress='';
// alert(sre);

	if(sre=='resolved after')
	{
		var res=document.getElementById('bress');
		if (res.value.length>0)
		{
			if (res.value=='1')
				ress=' which resolved after '+res.value+' '+document.getElementById('bresa').value;
			else
				ress=' which resolved after '+res.value+' '+document.getElementById('bresa').value+'s';

			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		else
		{
			ress=' which have resolved';
			
			var newh = document.createElement('input');
			var hIdName = nm+'h'+'['+num+']';
			newh.setAttribute('id',hIdName);
			newh.setAttribute('type','text');
			newh.setAttribute('name',hIdName);
			newh.setAttribute('value','resolved');

			ni.appendChild(newh);
		}
		
		if (document.getElementById('causeBurn').value=='.')
		{
			ress=ress;
		}
		else if (document.getElementById('causeBurn').value!='secondary to')
		{
			ress=ress+'. It was due to '+document.getElementById('causeBurn').value;
		}
		else if (document.getElementById('causeBurn').value=='secondary to')
		{
			ress=ress+'. It was secondary to a '+document.getElementById('cause2Burn').value;
		}

	}
	else if (sre!='')
	{
		ress='. It is now '+document.getElementById('brdis').value;

		var newh = document.createElement('input');
		var hIdName = nm+'h'+'['+num+']';
		newh.setAttribute('id',hIdName);
		newh.setAttribute('type','text');
		newh.setAttribute('name',hIdName);
		newh.setAttribute('value','unresolved');

		ni.appendChild(newh);
	}
	
	var resss=document.getElementById('bre').value;
	var ressss=document.getElementById('bress').value;
	
	var fin='';

	if (document.getElementById('bil').value!='torn ligaments' && document.getElementById('bil').value!='torn tendon')
	{
		fin='Suffered from '+document.getElementById('bhlev').value+' '+ document.getElementById('bil').value + ' to '+document.getElementById('bprob').value+ress+'.';
	}
	else
	{
		fin='Suffered ' + document.getElementById('bil').value + ' in '+document.getElementById('bprob').value+ress+'.';
	}
// alert(document.getElementById('bil').value);
	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value',document.getElementById('bil').value+' to ' +document.getElementById('bprob').value);

	var newphhx = document.createElement('input');
	var phhIdName = 'pphh'+nm+'['+num+']';
	newphhx.setAttribute('id',phhIdName);
	newphhx.setAttribute('type','hidden');
	newphhx.setAttribute('readonly','true');
	newphhx.setAttribute('name',phhIdName);
	newphhx.setAttribute('value','Remove');
	
var newphh = document.createElement('input');
var phhIdName = 'pphh'+nm+'b'+'['+num+']';
newphh.setAttribute('id',phhIdName);
newphh.setAttribute('type','button');
newphh.setAttribute('readonly','true');
newphh.setAttribute('name',phhIdName);
newphh.setAttribute('value','Remove');
if (nm=='i')
	newphh.onclick=new Function("ignorei("+num+")");
else
	newphh.onclick=new Function("ignorel("+num+")");

newphh.style.width='80px';
newphh.style.backgroundColor='#AA3333';
newphh.style.cursor='pointer';
newphh.style.color='#FFF';

var newbr = document.createElement('br');
	ni.appendChild(newp);
	ni.appendChild(newphh);
	ni.appendChild(newphhx);
	ni.appendChild(newbr);
	newt.innerHTML = fin;
	ni.appendChild(newt);
	ni.appendChild(newbr);
}


function addother()
{
	var ni = document.getElementById('myDiv');

	var numi='';
	var nm='';
	var num='';

	if (document.getElementById('oil').value=='i')
	{
		numi = document.getElementById('theValue');
		nm='i';
		num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
	}
	else
	{
		numi = document.getElementById('theValue2');
		nm='l';
		num = (document.getElementById('theValue2').value -1)+ 2;
		numi.value = num;
	}
// alert(nm);
	var newt = document.createElement('textarea');
	var tIdName = nm+'['+num+']';
	newt.setAttribute('cols',100);
	newt.setAttribute('id',tIdName);
	newt.setAttribute('name',tIdName);


	var newh = document.createElement('input');
	var hIdName = nm+'h'+'['+num+']';
	newh.setAttribute('id',hIdName);
	newh.setAttribute('type','text');
	newh.setAttribute('name',hIdName);
	newh.setAttribute('value',document.getElementById('ores').value);

	ni.appendChild(newh);

	newt.innerHTML = document.getElementById('oth').value;

	var newp = document.createElement('input');
	var pIdName = nm+'p['+num+']';
	newp.setAttribute('id',pIdName);
	newp.setAttribute('type','text');
	newp.setAttribute('name',pIdName);
	newp.setAttribute('value','Other');

	ni.appendChild(newp);

	ni.appendChild(newt);
}

function addExtendedPain(pn2,txtID){
	pnx2=document.getElementById(pn2).value
	alert(pnx2);
	
	var innerhtml =  new String(document.getElementById(txtID).innerHTML)
    
	textsplit =innerhtml.split(".");
	
	document.getElementById(txtID).innerHTML=textsplit[0] +" "+pnx2 + ". "+ textsplit[1];

}

function processall(){

addpain();
addmenhlth();
	
}


function ignorei(a,b)
{
	var txt=document.getElementById('i['+a+']');
	var te=document.getElementById('pphhi['+a+']');
	var btn=document.getElementById('pphhib['+a+']');
	
	txt.style.backgroundColor='#AA2222';
	txt.style.display="none";
	te.setAttribute('value','Unblock');
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblocki("+a+","+b+")");
// 	alert (s.value);
}

function ignoreall(a)
{
	
	
  for(var i=1;i<=a-1;i++){
	  
	ignorei(i,i);
	
  }
	
	
}

function unblocki(a,b)
{
	var txt=document.getElementById('i['+a+']');
	var te=document.getElementById('pphhi['+a+']');
	var btn=document.getElementById('pphhib['+a+']');

	txt.style.backgroundColor='#FFF';
	te.setAttribute('value','Block');
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignorei("+a+","+b+")");
// 	alert (s.value);
}

function ignorel(a,b)
{
	var txt=document.getElementById('l['+a+']');
	var te=document.getElementById('pphhl['+a+']');
	var btn=document.getElementById('pphhlb['+a+']');

	
	txt.style.backgroundColor='#AA2222';
	te.setAttribute('value','Unblock');
	btn.setAttribute('value','Unblock');
	btn.style.backgroundColor='#33AA33';
	btn.onclick=new Function("unblockl("+a+","+b+")");
// 	alert (s.value);
}

function unblockl(a,b)
{
	var txt=document.getElementById('l['+a+']');
	var te=document.getElementById('pphhl['+a+']');
	var btn=document.getElementById('pphhlb['+a+']');

	txt.style.backgroundColor='#FFF';
	te.setAttribute('value','Block');
	btn.setAttribute('value','Block');
	btn.style.backgroundColor='#AA3333';
	btn.onclick=new Function("ignorel("+a+","+b+")");
// 	alert (s.value);
}

function secon()
{
	if (document.getElementById('cause').value=='secondary to')
		document.getElementById('dsec').style.visibility='visible';
	
}

function seconBurn()
{
	if (document.getElementById('causeBurn').value=='secondary to')
		document.getElementById('dsecBurn').style.visibility='visible';
	
}


function tglshk(){
  if(document.getElementById('tblsh').style.display=='block')
  {
	 document.getElementById('tblsh').style.display='none';
	 document.getElementById('tglshock').value='+'
  }else{
	  document.getElementById('tblsh').style.display='block';
	  document.getElementById('tglshock').value='-';	
  }
	
}

function tglpain(){
	
   if(document.getElementById('tblpn').style.display=='none'){
	   
		document.getElementById('tblpn').style.display='block';   
		document.getElementById('tglpn').value='-';
   }else{
		 
		document.getElementById('tblpn').style.display='none';
		document.getElementById('tglpn').value='+';
   }


}


function tglil(){
	
   if(document.getElementById('tblil').style.display=='none'){
	   
		document.getElementById('tblil').style.display='block';   
		document.getElementById('tglmh').value='-';
		
   }else{
		 
		document.getElementById('tblil').style.display='none';
		document.getElementById('tglmh').value='+';
   }


}

function tgfracs(){
	
   if(document.getElementById('tbfacs').style.display=='none'){
	   
		document.getElementById('tbfacs').style.display='block';   
		document.getElementById('tglfacs').value='-';
		
   }else{
		 
		document.getElementById('tbfacs').style.display='none';
		document.getElementById('tglfacs').value='+';
   }


}



function tglbrn(){
	
   if(document.getElementById('tblbrn').style.display=='none'){
	   
		document.getElementById('tblbrn').style.display='block';  
		document.getElementById('tglbrnh').value='-';
   }else{
		 
		document.getElementById('tblbrn').style.display='none';
		document.getElementById('tglbrnh').value='+';
   }


}