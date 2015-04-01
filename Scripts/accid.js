function format()
{
	if (document.getElementById('sentence').value==1)
	{
		if (document.getElementById('veh').value== 'motor-bike' || document.getElementById('veh').value == 'bicycle')
		{
			accidBike();
		}
		else if (document.getElementById('veh').value == 'on foot')
		{
			accidFoot();
		}
		else if (document.getElementById('veh').value == 'mini-bus' || document.getElementById('veh').value == 'MPV' || document.getElementById('veh').value == 'jeep' || document.getElementById('veh').value == 'estate')
		{
			accidBig();
		}
		else
		{
			accid();
		}
	}
	else if (document.getElementById('sentence').value==2)
	{
		if (document.getElementById('veh').value== 'motor-bike' || document.getElementById('veh').value == 'bicycle')
		{
			accid2Bike();
		}
		else if (document.getElementById('veh').value == 'on foot')
		{
			alert('This mode is not supported for Padestrians');
		}
		else if (document.getElementById('veh').value == 'mini-bus' || document.getElementById('veh').value == 'MPV' || document.getElementById('veh').value == 'jeep' || document.getElementById('veh').value == 'estate')
		{
			accid2Big();
		}
		else
		{
			accid2();
		}
	}
	else if (document.getElementById('sentence').value==3)
	{
		if (document.getElementById('veh').value== 'motor-bike' || document.getElementById('veh').value == 'bicycle')
		{
			accid3Bike();
		}
		else if (document.getElementById('veh').value == 'on foot')
		{
			alert('This mode is not supported for Pedestrians');
		}
		else if (document.getElementById('veh').value == 'mini-bus' || document.getElementById('veh').value == 'MPV' || document.getElementById('veh').value == 'jeep' || document.getElementById('veh').value == 'estate')
		{
			accid3Big();
		}
		else
		{
			accid3();
		}
	}
}

function accid()
{

   

// 	var id=document.getElementById('id').value;
	
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	
	if(ve=="____"){
		 if(document.getElementById('othveh').value!=''){
			ve=document.getElementById('othveh').value; 
		 }
	}
	
	var aw=document.getElementById('aw').value;
	if(aw=="____"){
		if(document.getElementById('othaw').value!=''){
			aw=document.getElementById('othaw').value; 	
		}
	}
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	alert(lo);
	if(lo=="____"){
		if(document.getElementById('othlocat').value!=''){
			
			lo = document.getElementById('othlocat').value;	
		}
	}
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	 alert(document.getElementById('aw').value);
	var dtme = new String(document.getElementById('cda').value);
	var arrdtme=dtme.split('-');
	var cda = new Date(arrdtme[0],arrdtme[1],arrdtme[2]);
					   
	var accdte = cda.toLocaleDateString();
	
	//(document.getElementById('impctTbl').rows.length);
	
	//alert(document.getElementById('impcttxt0').value);
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;


	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;

	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	

	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}

	

	var d=tt+' '+nm+' stated at the interview that the accident happened '+tm+' on the '+accdte+' . '+wv+tt+' '+nm+' was occupying the '+sa+"'s seat in a "+ve+'. '+gg+' '+sb+' wearing a seatbelt, a head restraint '+hr+' fitted and an air-bag '+ab+' fitted.';
	
	 
	 
	 if(aw.indexOf(ve)>0){
			aw = ' another '+ve;  
	 }
	
	if (ab!='was not')
	{
		if (abd=='deployed')
		{
			d=d+"An air-bag did deployed at the scene. ";
		}
		else
			d=d+".The air-bag did not deploy at the scene. ";
	}
	else
		d=d+". ";

	
		if(sa.indexOf('passenger')=='-1'){
			
		 
		
		   if(co.indexOf('by')=='-1'){
		
			if(co=='collided with'){
		   d=d+"At the moment of impact, "+tt+" "+nm+"'s "+ve+" was "+st+" "+lo+". The Claimant's "+ve+" "+co+" "+aw+" on the "+im;   
			}else{
			
			  d=d+"At the moment of impact, "+tt+" "+nm+"'s "+ve+" was "+st+" "+lo+". The Claimant's "+ve+" "+co+" from the "+im+" "+aw;
			  
			}
			  
		   }else{
		
		   co =(co.substr(0,co.indexOf('by')));
		   
		   d=d+"At the moment of impact, "+tt+" "+nm+"'s "+ve+" was "+st+" "+lo+". The Claimant's "+ve+" "+co+" from the "+im+" by "+aw;
		
		   }
		
		
		}else{
			
			
			
			if(co.indexOf('by')=='-1'){
			
			//alert(co);
			
		       if(co=='collided with'){
				   
			d=d+"At the moment of impact, the "+ve+" in which "+tt+" "+nm+" was travelling, was "+st+" "+lo+". The "+ve+" "+co+" "+aw+"on the "+im;   
			   }else{
			
			d=d+"At the moment of impact, the "+ve+" in which t"+tt+" "+nm+" was travelling, was "+st+" "+lo+". The "+ve+" "+co+" from the "+im+" "+aw;
			   }
			
			
			}else{
				co=(co.substr(0,co.indexOf('by')));
				   if(aw.indexOf(ve)!==-1){
						aw="another "+ve;   
				   }
				
				d=d+"At the moment of impact, the "+ve+" in which "+tt+" "+nm+" was travelling, was "+st+" "+lo+". The "+ve+" "+co+" from the "+im+" by "+aw;
					
			}
			
			
		}
		
		//if(document.getElementById('impcttxt0').value!=''){
				
			alert(document.getElementById('impctNo').value);
			
			
			
		  if(document.getElementById('impctNo').value!=''){
			   
			   if(document.getElementById('impctNo').value >= 2){
				   
			        d=d+". The claimant "+ve + " "+ document.getElementById('impctdrp0').value + " " + document.getElementById('impcttxt0').value;
					d=d+" and "+ document.getElementById('impctdrp1').value + " "+ document.getElementById('impcttxt1').value;  
					
				}else{
					
					d=d+" and then the "+ ve + " "+ document.getElementById('impctdrp0').value + " " + document.getElementById('impcttxt0').value;
				}
			}
			//}else{
			
			  // alert(d);
			
			//}
			
		//}
	alert(d);
	
	if (spd!=""){
		if(spd !='DNA'){
		d=d+" at "+spd+". ";
		}
	}else{
		d=d+". The speed of the impact has not been determined. ";
	}
	
	if(sa.indexOf('passenger')=='-1'){
	
	d=d+"The impact came from the "+im+". ";

	}

	if (dmg!="unknown")
		d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


//////////////////////////////////////////////////////--format 2--/////////////////////////////////////////////////////////////////

function accid2()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	alert(lo);
	if(lo=="____"){
		if(document.getElementById('othlocat').value!=''){
			
			lo = document.getElementById('othlocat').value;	
		}
	}
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d='* The accident occurred '+tm+'. '+wv;
	
	d=d+'<br>* '+tt+' '+nm+' occupied the '+sa+"'s seat in a "+ve+'.'
	
	d=d+'<br>* '+gg+' '+sb+' wearing a seatbelt.';
	
	d=d+'<br>* A head restraint '+hr+' fitted.'
	
	d=d+'<br>* An air-bag '+ab+' fitted';
	
	if (ab!='was not')
	{
		if (abd=='deployed')
		{
			d=d+", and it deployed. ";
		}
		else
			d=d+", but it did not deploy. ";
	}
	else
		d=d+". ";

	d=d+"<br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


function accid3()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var ind=1;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	var d='<strong><i>6.'+ind+' Accident Time</i></strong><br>The accident occurred '+tm+'.';
	ind=ind+1;
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	
	d=d+'<br><strong><i>6.'+ind+' Seating and Vehicle</i></strong><br>* '+tt+' '+nm+' occupied the '+sa+"'s seat in a "+ve+'.'
	ind=ind+1;
	
	d=d+'<br>* '+gg+' '+sb+' wearing a seatbelt.';
	
	d=d+'<br>* A head restraint '+hr+' fitted.'
	
	d=d+'<br>* An air-bag '+ab+' fitted';
	
	if (ab!='was not')
	{
		if (abd=='deployed')
		{
			d=d+", and it deployed. ";
		}
		else
			d=d+", but it did not deploy. ";
	}
	else
		d=d+". ";

	d=d+"<br><strong><i>6."+ind+" Accident Circumstances</i></strong><br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	ind=ind+1;
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"<br><strong><i>6."+ind+" Aftermath of Accident</i></strong><br>* Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}



function accidBike()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d= tt+' '+nm+' told me that, the accident occurred '+tm+'. '+wv+tt+' '+nm+' occupied the '+sa+"'s position on a "+ve+'. ';
	
	d=d+gg+' was '+hr+'. ';
	

	d=d+"At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+". The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"The impact came from the "+im+". ";

	if (dmg!="unknown")
		d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


//////////////////////////////////////////////////////--format 2--/////////////////////////////////////////////////////////////////

function accid2Bike()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d='* The accident occurred '+tm+'. '+wv;
	
	d=d+'<br>* '+tt+' '+nm+' occupied the '+sa+"'s seat on a "+ve+'.'
	
	d=d+'<br>* '+gg+' was '+hr+'. ';
	
	d=d+"<br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


function accid3Bike()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var ind=1;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	var d='<strong><i>6.'+ind+' Accident Time</i></strong><br>The accident occurred '+tm+'.';
	ind=ind+1;
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	
	d=d+'<br><strong><i>6.'+ind+' Seating and Vehicle</i></strong><br>* '+tt+' '+nm+' occupied the '+sa+"'s seat on a "+ve+'.'
	ind=ind+1;
	
	d=d+'<br>* '+gg+' was '+hr+'. ';
	
	d=d+"<br><strong><i>6."+ind+" Accident Circumstances</i></strong><br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	ind=ind+1;
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"<br><strong><i>6."+ind+" Aftermath of Accident</i></strong><br>* Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}



function accidBig()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d='The accident occurred '+tm+'. '+wv+tt+' '+nm+' '+sa+" in a "+ve+'. '
	
	if (sb!='')
	{
		d=d+gg+' '+sb+' wearing a seatbelt. ';
	}
	
	if (ab!='')
	{
		d=d+'A head restraint '+hr+' fitted. An air-bag '+ab+' fitted';
		
		if (ab!='was not')
		{
		  if (abd=='deployed')
		  {
			  d=d+", and it deployed. ";
		  }
		  else
			  d=d+", but it did not deploy. ";
		  }
		else
		{
			d=d+". ";
		}
	}

	d=d+"At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+". The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"The impact came from the "+im+". ";

	if (dmg!="unknown")
		d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


//////////////////////////////////////////////////////--format 2--/////////////////////////////////////////////////////////////////

function accid2Big()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d='* The accident occurred '+tm+'. '+wv;
	
	d=d+'<br>* '+tt+' '+nm+' '+sa+" in a "+ve+'.'
	
	
	if (sb!='')
	{
		d=d+'<br>* '+gg+' '+sb+' wearing a seatbelt.';
	}
	
	if (hr!='')
	{	
		d=d+'<br>* A head restraint '+hr+' fitted.'
	}
	
	if (ab!='')
	{
	  d=d+'<br>* An air-bag '+ab+' fitted';
	  
	  if (ab!='was not')
	  {
		  if (abd=='deployed')
		  {
			  d=d+", and it deployed. ";
		  }
		  else
			  d=d+", but it did not deploy. ";
	  }
	  else
	  {
		  d=d+". ";
	  }
	}

	d=d+"<br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


function accid3Big()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var ind=1;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	var d='<strong><i>6.'+ind+' Accident Time</i></strong><br>The accident occurred '+tm+'.';
	ind=ind+1;
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	
	d=d+'<br><strong><i>6.'+ind+' Seating and Vehicle</i></strong><br>* '+tt+' '+nm+' '+sa+" in a "+ve+'.'
	ind=ind+1;
	
	if (sb!='')
	{
		d=d+'<br>* '+gg+' '+sb+' wearing a seatbelt.';
	}
	
	if (hr!='')
	{
		d=d+'<br>* A head restraint '+hr+' fitted.'
	}
	
	if (ab!='')
	{
	  d=d+'<br>* An air-bag '+ab+' fitted';
	  
	  if (ab!='was not')
	  {
		  if (abd=='deployed')
		  {
			  d=d+", and it deployed. ";
		  }
		  else
			  d=d+", but it did not deploy. ";
	  }
	  else
	  {
		  d=d+". ";
	  }
	}

	d=d+"<br><strong><i>6."+ind+" Accident Circumstances</i></strong><br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	ind=ind+1;
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"<br><strong><i>6."+ind+" Aftermath of Accident</i></strong><br>* Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}




function accidFoot()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
		if(aw=="____"){
			aw=document.getElementById('othaw').value	
		}
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var st2=document.getElementById('stat2').value;
	var lo=document.getElementById('locat').value;
		if(lo=='____'){
			lo=document.getElementById('othlocat').value;	
		}
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	
	var th2 = document.getElementById('thr2').value;
	
	var th=document.getElementById('thr').value;
		if(th=='__'){
			
			th=document.getElementById('oththr').value;
			
		}
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;
	
	var dtme = new String(document.getElementById('cda').value);
	var arrdtme=dtme.split('-');
	var cda = new Date(arrdtme[0],arrdtme[1],arrdtme[2]);
	
	var accdte = cda.toLocaleDateString();

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d=tt+' '+nm+' stated at the interview that the accident occurred '+tm+' on the ' + accdte+'. '+wv+tt+' '+nm+' was on foot. ';
	
	var prov=onatdoc();
	
	if((co=='tripped on') || (co=='slipped on')){
	
	d=d+"At the time of the accident, " + tt +" "+ nm + " was "+st+" "+st2+" "+prov+" a "+lo+". The claimant "+co+' '+aw;
	
	}else{
	
	d=d+"At the moment of impact, the claimant was "+st+" "+st2+" "+prov+" a "+lo+". The claimant "+co+' '+aw;
	
	}
	
	if(co=='tripped on' || co=='slipped on'){
		
		d = d + ' and ' + document.getElementById('costa').value+' onto the ' + lo;
		
	}

	if (spd!="")
	    if(spd !='DNA'){
		  d=d+" at "+spd+". ";
		}
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"The impact came from the "+im+". ";

	d=d+tt+' '+nm+' '+th2+' '+th+'. ';


	if (gc!='')
	{
		d=d+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


//////////////////////////////////////////////////////--format 2--/////////////////////////////////////////////////////////////////

function accid2Foot()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
	}
	
	var d='* The accident occurred '+tm+'. '+wv;
	
	d=d+'<br>* '+tt+' '+nm+' occupied the '+sa+"'s seat on a "+ve+'.'
	
	d=d+'<br>* '+gg+' was '+hr+'. ';
	
	d=d+"<br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		if(spd!='DNA'){
		d=d+" at "+spd+". ";
		}
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}


function accid3Foot()
{

// 	var id=document.getElementById('id').value;
	var tm=document.getElementById('t').value;
	var sa=document.getElementById('loc').value;
	var ve=document.getElementById('veh').value;
	var aw=document.getElementById('aw').value;
	var sb=document.getElementById('sb').value;
	var hr=document.getElementById('hr').value;
	var ab=document.getElementById('ab').value;
	var abd=document.getElementById('abd').value;
	var st=document.getElementById('stat').value;
	var lo=document.getElementById('locat').value;
	var co=document.getElementById('cost').value;
	var im=document.getElementById('impact').value;
	var th=document.getElementById('thr').value;
	var dmg=document.getElementById('dam').value;
	var spd=document.getElementById('spe').value;
	var gc=document.getElementById('gc').value;
	
	var tt=document.getElementById('tt').value;
	var nm=document.getElementById('cln').value;
	var gen=document.getElementById('gnd').value;

	var vis=document.getElementById('vis').value;
	var wcon=document.getElementById('wcond').value;
	
	var ind=1;
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var wv='';
	
	var d='<strong><i>6.'+ind+' Accident Time</i></strong><br>The accident occurred '+tm+'.';
	ind=ind+1;
	
	if (wcon!='' && vis!='')
	{
		wv='It was '+wcon+' and visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon!='' && vis=='')
	{
		wv='It was '+wcon+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	else if (wcon=='' && vis!='')
	{
		wv='Visibility was '+vis+'. ';
		d=d+'<br><strong><i>6.'+ind+' Visibility</i></strong><br>'+wv;
		ind=ind+1;
	}
	
	d=d+'<br><strong><i>6.'+ind+' Seating and Vehicle</i></strong><br>* '+tt+' '+nm+' occupied the '+sa+"'s seat on a "+ve+'.'
	ind=ind+1;
	
	d=d+'<br>* '+gg+' was '+hr+'. ';
	
	d=d+"<br><strong><i>6."+ind+" Accident Circumstances</i></strong><br>* At the moment of impact, the claimant's "+ve+" was "+st+" "+lo+".";
	ind=ind+1;
	d=d+"<br>* The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"<br>* The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"<br><strong><i>6."+ind+" Aftermath of Accident</i></strong><br>* Its force was sufficient to "+dmg+" the "+ve+". ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+'<br>* '+tt+' '+nm+' was thrown '+th+'. ';


	if (gc!='')
	{
		d=d+'<br>* '+gg+' '+gc;
	}
	
	document.getElementById('accident').innerHTML=d;
}





function idex0(chosen)
{
	if (chosen == 'motor-bike' || chosen == 'bicycle')
	{
		bikeSeat();
		bikeBelt();
		bikeHead();
		bikeBag();
		bikeLocation();
		bikeState();
		bikeImpact();
		bikeThrow();
		bikeDamage();
		bikeGotUp();
	}
	else if (chosen == 'on foot')
	{
		footSeat();
		footBelt();
		footHead();
		footBag();
		footLocation();
		footState();
		footCost();
		footImpact();
		footThrow();
		footSpeed();
		footDamage();
		footGotUp();
	}
	else if (chosen == 'mini-bus' || chosen == 'MPV' || chosen == 'jeep' || chosen == 'estate')
	{
		bigSeat();
		bigBelt();
		bigHead();
		bigBag();
		bigState();
		bigImpact();
		bigThrow();
		bigDamage();
		bigGotUp();
		bigLocation();
	}
	else
	{
		
		if(chosen=="____"){
		   document.getElementById('othveh').setAttribute('type','text');
		  // alert(document.getElementById('othveh').getAttribute('type'));
		}
		carSeat();
		carBelt();
		carHead();
		carBag();
		carState();
		carImpact();
		carThrow();
		carDamage();
		carGotUp();
		carLocation();
	}
	
}


function bikeSeat()
{
	var selbox = document.frm.loc;
	selbox.options.length=0;
	
	  selbox.options[selbox.options.length] = new Option('driver','driver');
	  selbox.options[selbox.options.length] = new Option('rider','rider');
	  selbox.options[selbox.options.length] = new Option('pillion','pillion');
}

function bikeBelt()
{
	var selbox = document.frm.sb;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function bikeHead()
{
	var selbox = document.frm.hr;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('wearing helmet','wearing a helmet');
	selbox.options[selbox.options.length] = new Option('not wearing helmet','not wearing a helmet');
}

function bikeBag()
{
	var selbox = document.frm.ab;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
	
	
	var selbox = document.frm.abd;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function bikeLocation()
{
	var selbox = document.frm.locat;
	selbox.options.length=0;

	  selbox.options[selbox.options.length] = new Option('main road','on a main road');
	  selbox.options[selbox.options.length] = new Option('traffic light','at a set of traffic lights');
	  selbox.options[selbox.options.length] = new Option('side road','on a side road');
	  selbox.options[selbox.options.length] = new Option('residential street','in a residential street');
	  selbox.options[selbox.options.length] = new Option('pelican crossing','at a pelican crossing');
	  selbox.options[selbox.options.length] = new Option('car park','in a car park');
	  selbox.options[selbox.options.length] = new Option('parked','parked');
	  selbox.options[selbox.options.length] = new Option('country lane','in a country lane');
	  selbox.options[selbox.options.length] = new Option('junction','at a junction');
	  selbox.options[selbox.options.length] = new Option('round-about','at a round-about');
	  selbox.options[selbox.options.length] = new Option('mincunian way','on a mincunian way');
	  selbox.options[selbox.options.length] = new Option('motorway slip-road','on a motorway slip-road');
	  selbox.options[selbox.options.length] = new Option('motor way','on a motor way');
}

function bikeState()
{
	var selbox = document.frm.stat;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('stationary','stationary');
	selbox.options[selbox.options.length] = new Option('moving','moving');
	selbox.options[selbox.options.length] = new Option('parked','parked');
	selbox.options[selbox.options.length] = new Option('braking','braking');
	selbox.options[selbox.options.length] = new Option('slowing down','slowing down');
	selbox.options[selbox.options.length] = new Option('braking abruptly','braking abruptly');
}

function bikeImpact()
{
	var selbox = document.frm.impact;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('front','front');
	selbox.options[selbox.options.length] = new Option('rear','rear');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('not known','not known');
}

function bikeThrow()
{
	var selbox = document.frm.thr;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('sideways','sideways');
	selbox.options[selbox.options.length] = new Option('forward then backward','forward then backward');
	selbox.options[selbox.options.length] = new Option('backward then forward','backward then forward');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('in all directions','in all directions');
	selbox.options[selbox.options.length] = new Option('off the bike','off the bike');
	selbox.options[selbox.options.length] = new Option('off the left side of the bike','off the left side of the bike');
	selbox.options[selbox.options.length] = new Option('off the right side of the bike','off the right side of the bike');
	selbox.options[selbox.options.length] = new Option('over the bonnet of the vehicle that struck the bike','over the bonnet of the vehicle that struck the bike');
	selbox.options[selbox.options.length] = new Option('over the bonnet of the vehicle that collided with the bike','over the bonnet of the vehicle that collided with the bike');
	selbox.options[selbox.options.length] = new Option('over the hood of the vehicle that collided with the bike','over the hood of the vehicle that collided with the bike');
	selbox.options[selbox.options.length] = new Option('over the boot of the vehicle that struck the bike','over the boot of the vehicle that struck the bike');
	selbox.options[selbox.options.length] = new Option('over the boot of the vehicle that collided with the bike','over the boot of the vehicle that collided with the bike');
	selbox.options[selbox.options.length] = new Option('over the hood of the vehicle that collided with the bike','over the hood of the vehicle that collided with the bike');
}

function bikeDamage()
{
	var selbox = document.frm.dam;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('write-off','write-off');
	selbox.options[selbox.options.length] = new Option('extensive','cause extensive damage to');
	selbox.options[selbox.options.length] = new Option('moderate','cause moderate damage to');
	selbox.options[selbox.options.length] = new Option('mild','cause mild damage to');
	selbox.options[selbox.options.length] = new Option('unknown','unknown');
}

function bikeGotUp()
{
	var selbox = document.frm.gc;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('---','');
	selbox.options[selbox.options.length] = new Option('got off the bike unaided','got off the bike unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get off the bike','needed help to get off the bike.');
	selbox.options[selbox.options.length] = new Option('got up unaided','got up unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get up','needed help to get up.');
}



function footSeat()
{
	var selbox = document.frm.loc;
	selbox.options.length=0;
	
	  selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function footBelt()
{
	var selbox = document.frm.sb;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function footHead()
{
	var selbox = document.frm.hr;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function footBag()
{
	var selbox = document.frm.ab;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
	
	
	var selbox = document.frm.abd;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function footLocation()
{
	var selbox = document.frm.locat;
	selbox.options.length=0;
	  
	  selbox.options[selbox.options.length] = new Option('pelican crossing','pelican crossing');
	  selbox.options[selbox.options.length] = new Option('zebra Crossing','zebra Crossing');
	  selbox.options[selbox.options.length] = new Option('footpath','footpath');
	  selbox.options[selbox.options.length] = new Option('main road','main road');
	  selbox.options[selbox.options.length] = new Option('main (pelican crossing)','main road from a pelican crossing');
	  selbox.options[selbox.options.length] = new Option('side road','side road');
	  selbox.options[selbox.options.length] = new Option('track','track');
	  selbox.options[selbox.options.length] = new Option('car park','car park');
	  selbox.options[selbox.options.length] = new Option('residential street','residential street');
	  selbox.options[selbox.options.length] = new Option('country lane','country lane');
	  selbox.options[selbox.options.length] = new Option('traffic lights','road at a set of traffic lights');
	  selbox.options[selbox.options.length] = new Option('junction','junction');
	  selbox.options[selbox.options.length] = new Option('round-about','round-about');
	  selbox.options[selbox.options.length] = new Option('mincunian way','mincunian way');
	  selbox.options[selbox.options.length] = new Option('motorway slip-road','motorway slip-road');
	  selbox.options[selbox.options.length] = new Option('motor way','motor way');
	  selbox.options[selbox.options.length] = new Option('other','____');
}

function footState()
{
	var selbox = document.frm.stat;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('standing','standing');
	selbox.options[selbox.options.length] = new Option('walking','walking');
	selbox.options[selbox.options.length] = new Option('walking','walking');
	selbox.options[selbox.options.length] = new Option('jogging','jogging');
	selbox.options[selbox.options.length] = new Option('jogging','jogging');
	selbox.options[selbox.options.length] = new Option('running','running');
	selbox.options[selbox.options.length] = new Option('running','running');
	selbox.options[selbox.options.length] = new Option('crossing','crossing');
	selbox.options[selbox.options.length] = new Option('waiting to cross','waiting to cross');
	
	
	
	
}

function footCost()
{
	
	var selbox = document.frm.cost;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('struck','struck by');
	selbox.options[selbox.options.length] = new Option('collided','collided with');
	selbox.options[selbox.options.length] = new Option('slipped','slipped on');
	selbox.options[selbox.options.length] = new Option('tripped','tripped on');
	selbox.options[selbox.options.length] = new Option('fell','fell down onto');
	
	
}

function footImpact()
{
	var selbox = document.frm.impact;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('front','front');
	selbox.options[selbox.options.length] = new Option('rear','rear');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('not known','not known');
}

function footThrow()
{
	
	var selbox2 = document.frm.thr2;
       selbox2.options.length=0;
	selbox2.options[selbox2.options.length] = new Option('fell','fell');
	selbox2.options[selbox2.options.length] = new Option('fell down','fell down');
	selbox2.options[selbox2.options.length] = new Option('fell over','fell over');
	
	var selbox = document.frm.thr;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('sideways','sideways');
	selbox.options[selbox.options.length] = new Option('forward','forward');
	selbox.options[selbox.options.length] = new Option('backward','backward');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('in all directions','in all directions');
	selbox.options[selbox.options.length] = new Option('over the bonnet of the vehicle that struck the claimant','over the bonnet of the vehicle');
	selbox.options[selbox.options.length] = new Option('over the bonnet of the vehicle that collied with the claimant','over the bonnet of the vehicle');
	selbox.options[selbox.options.length] = new Option('over the boot of the vehicle that struck the claimant','over the boot of the vehicle');
	selbox.options[selbox.options.length] = new Option('over the boot of the vehicle','over the boot of the vehicle');
	selbox.options[selbox.options.length] = new Option('other','__');

}

function footSpeed()
{
	var selbox = document.frm.spe;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('Does Not Apply','DNA');
	selbox.options[selbox.options.length] =  new Option('low speed','low speed');
	selbox.options[selbox.options.length] = new Option('high speed', 'high speed');
	
}

function footDamage()
{
	var selbox = document.frm.dam;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
	
}

function footGotUp()
{
	var selbox = document.frm.gc;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('---','');
	selbox.options[selbox.options.length] = new Option('got up unaided','got up unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get up','needed help to get up.');
	
	var selbox2 = document.frm.stat2;
	alert(selbox2.options.length)
	//selbox2.options.length=0;
	
	selbox2.options[selbox2.options.length] = new Option('on','on');
	selbox2.options[selbox2.options.length] = new Option('at','at');
	selbox2.options[selbox2.options.length] = new Option('in','in');
	alert(selbox2.options.length);
	
	
}



function bigSeat()
{
	var selbox = document.frm.loc;
	selbox.options.length=0;
	
	  selbox.options[selbox.options.length] = new Option('driver',"occupied the driver's seat");
	  selbox.options[selbox.options.length] = new Option('front-passenger','was the front-passenger');
	  selbox.options[selbox.options.length] = new Option('passenger','was a passenger');
	  selbox.options[selbox.options.length] = new Option('passenger (seated)','was a seated passenger');
	  selbox.options[selbox.options.length] = new Option('passenger (standing)','was standing');
	  selbox.options[selbox.options.length] = new Option('passenger (standing with support)','was standing with support');
	  selbox.options[selbox.options.length] = new Option('passenger (standing without support)','was standing without support');
	  selbox.options[selbox.options.length] = new Option('passenger (child seat)','was a passenger in a child seat');
	  selbox.options[selbox.options.length] = new Option('wheel-chair','was in a wheel-chair');
	  selbox.options[selbox.options.length] = new Option('pram','in a pram');
}

function bigBelt()
{
	var selbox = document.frm.sb;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Wearing Seatbelt','was');
	selbox.options[selbox.options.length] = new Option('Not Wearing Seatbelt','was not');
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function bigHead()
{
	var selbox = document.frm.hr;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Was Fitted','was');
	selbox.options[selbox.options.length] = new Option('Not Fitted','was not');
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function bigBag()
{
	var selbox = document.frm.ab;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Was Fitted','was');
	selbox.options[selbox.options.length] = new Option('Not Fitted','was not');
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
	
	
	var selbox = document.frm.abd;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('did not deploy','did not deploy');
	selbox.options[selbox.options.length] = new Option('deployed','deployed');
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function bigLocation()
{
	var selbox = document.frm.locat;
	selbox.options.length=0;

	  selbox.options[selbox.options.length] = new Option('main road','on a main road');
	  selbox.options[selbox.options.length] = new Option('side road','on a side road');
	  selbox.options[selbox.options.length] = new Option('car park','in a car park');
	  selbox.options[selbox.options.length] = new Option('pelican crossing','at a pelican crossing');
	  selbox.options[selbox.options.length] = new Option('residential street','in a residential street');
	  selbox.options[selbox.options.length] = new Option('country lane','in a country lane');
	  selbox.options[selbox.options.length] = new Option('traffic lights','at a set of traffic lights');
	  selbox.options[selbox.options.length] = new Option('junction','at a junction');
	  selbox.options[selbox.options.length] = new Option('round-about','at a round-about');
	  selbox.options[selbox.options.length] = new Option('mincunian way','on a mincunian way');
	  selbox.options[selbox.options.length] = new Option('motorway slip-road','on a motorway slip-road');
	  selbox.options[selbox.options.length] = new Option('motor way','on a motor way');
}

function bigState()
{
	var selbox = document.frm.stat;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('stationary','stationary');
	selbox.options[selbox.options.length] = new Option('moving','moving');
	selbox.options[selbox.options.length] = new Option('parked','parked');
	selbox.options[selbox.options.length] = new Option('braking','braking');
	selbox.options[selbox.options.length] = new Option('slowing down','slowing down');
	selbox.options[selbox.options.length] = new Option('braking abruptly','braking abruptly');
}

function bigImpact()
{
	var selbox = document.frm.impact;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('front','front');
	selbox.options[selbox.options.length] = new Option('rear','rear');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('not known','not known');
}

function bigThrow()
{
	var selbox = document.frm.thr;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('sideways','sideways');
	selbox.options[selbox.options.length] = new Option('forward then backward','forward then backward');
	selbox.options[selbox.options.length] = new Option('backward then forward','backward then forward');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('in all directions','in all directions');
}

function bigDamage()
{
	var selbox = document.frm.dam;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('write-off','write-off');
	selbox.options[selbox.options.length] = new Option('extensive','cause extensive damage to');
	selbox.options[selbox.options.length] = new Option('moderate','cause moderate damage to');
	selbox.options[selbox.options.length] = new Option('mild','cause mild damage to');
	selbox.options[selbox.options.length] = new Option('unknown','unknown');
}

function bigGotUp()
{
	var selbox = document.frm.gc;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('---','');
	selbox.options[selbox.options.length] = new Option('got out of the vehicle unaided','got out of the vehicle unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get off the vehicle','needed help to get off the vehicle.');
	selbox.options[selbox.options.length] = new Option('got up unaided','got up unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get up','needed help to get up.');
}




function carSeat()
{
	var selbox = document.frm.loc;
	selbox.options.length=0;
	
	  selbox.options[selbox.options.length] = new Option('driver','driver');
	  selbox.options[selbox.options.length] = new Option('front-passenger','front-passenger');
	  selbox.options[selbox.options.length] = new Option('passenger','passenger');
	  selbox.options[selbox.options.length] = new Option('passenger (child seat)','passenger (child seat)');
	  selbox.options[selbox.options.length] = new Option('passenger (booster seat)','passenger (booster seat)');
}

function carBelt()
{
	var selbox = document.frm.sb;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Wearing Seatbelt','was');
	selbox.options[selbox.options.length] = new Option('Not Wearing Seatbelt','was not');
}

function carHead()
{
	var selbox = document.frm.hr;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Was Fitted','was');
	selbox.options[selbox.options.length] = new Option('Not Fitted','was not');
	selbox.options[selbox.options.length] = new Option('Does Not Apply','');
}

function carBag()
{
	var selbox = document.frm.ab;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('Was Fitted','was');
	selbox.options[selbox.options.length] = new Option('Not Fitted','was not');
	
	
	var selbox = document.frm.abd;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('did not deploy','did not deploy');
	selbox.options[selbox.options.length] = new Option('deployed','deployed');
}

function carLocation()
{
	var selbox = document.frm.locat;
	selbox.options.length=0;

	  selbox.options[selbox.options.length] = new Option('main road','on a main road');
	  selbox.options[selbox.options.length] = new Option('side road','on a side road');
	  selbox.options[selbox.options.length] = new Option('car park','in a car park');
	  selbox.options[selbox.options.length] = new Option('dual-carriageway', 'on a dual carriageway');
	  selbox.options[selbox.options.length] = new Option('pelican crossing','at a pelican crossing');
	  selbox.options[selbox.options.length] = new Option('residential street','in a residential street');
	  selbox.options[selbox.options.length] = new Option('country lane','in a country lane');
	  selbox.options[selbox.options.length] = new Option('traffic lights','at a set of traffic lights');
	  selbox.options[selbox.options.length] = new Option('junction','at a junction');
	  selbox.options[selbox.options.length] = new Option('round-about','at a round-about');
	  selbox.options[selbox.options.length] = new Option('mincunian way','on a mincunian way');
	  selbox.options[selbox.options.length] = new Option('motorway slip-road','on a motorway slip-road');
	  selbox.options[selbox.options.length] = new Option('motor way','on a motor way');
	  selbox.options[selbox.options.length] = new Option('bridge','on a bridge');
	  selbox.options[selbox.options.length] = new Option('ford','in a ford');
	  selbox.options[selbox.options.length] = new Option('other','____');
	  
}

function carState()
{
	var selbox = document.frm.stat;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('stationary','stationary');
	selbox.options[selbox.options.length] = new Option('moving','moving');
	selbox.options[selbox.options.length] = new Option('parked','parked');
	selbox.options[selbox.options.length] = new Option('braking','braking');
	selbox.options[selbox.options.length] = new Option('slowing down','slowing down');
	selbox.options[selbox.options.length] = new Option('braking abruptly','braking abruptly');
	selbox.options[selbox.options.length] = new Option('reversing', 'reversing');
}

function carImpact()
{
	var selbox = document.frm.impact;
	selbox.options.length=0;
	
	selbox.options[selbox.options.length] = new Option('front','front');
	selbox.options[selbox.options.length] = new Option('rear','rear');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('not known','not known');
}

function carThrow()
{
	var selbox = document.frm.thr;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('sideways','sideways');
	selbox.options[selbox.options.length] = new Option('forward then backward','forward then backward');
	selbox.options[selbox.options.length] = new Option('backward then forward','backward then forward');
	selbox.options[selbox.options.length] = new Option('left side','left side');
	selbox.options[selbox.options.length] = new Option('right side','right side');
	selbox.options[selbox.options.length] = new Option('in all directions','in all directions');
}

function carDamage()
{
	var selbox = document.frm.dam;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('write-off','write-off');
	selbox.options[selbox.options.length] = new Option('extensive','cause extensive damage to');
	selbox.options[selbox.options.length] = new Option('moderate','cause moderate damage to');
	selbox.options[selbox.options.length] = new Option('mild','cause mild damage to');
	selbox.options[selbox.options.length] = new Option('unknown','unknown');
}

function carGotUp()
{
	var selbox = document.frm.gc;
	selbox.options.length=0;

	selbox.options[selbox.options.length] = new Option('---','');
	selbox.options[selbox.options.length] = new Option('got out of the vehicle unaided','got out of the vehicle unaided.');
	selbox.options[selbox.options.length] = new Option('needed help to get off the vehicle','needed help to get out of the vehicle.');
}



function toway()
{
	
	if(document.getElementById('locat').value=='____')
	{
			document.getElementById('othlocat').type='text';
			
	}
	
	if (document.getElementById('locat').value=='set of traffic lights' && document.getElementById('veh').value=='on foot' && document.getElementById('stat').value!='standing' && document.getElementById('stat').value!='crossing' && document.getElementById('stat').value!='waiting to cross')
	{
		//alert('123');
		var selbox = document.frm.stat2;
		selbox.options.length=0;
	
		selbox.options[selbox.options.length] = new Option('towards','towards');
		selbox.options[selbox.options.length] = new Option('away from','away from');
	}
	else
	{
		var selbox = document.frm.stat2;
		selbox.options.length=0;
		
		selbox.options[selbox.options.length] = new Option('on','on');
		selbox.options[selbox.options.length] = new Option('at','at');
		selbox.options[selbox.options.length] = new Option('in','in');
		
	}
}


function onatdoc()
{
	st=document.getElementById('stat').value;
	lo=document.getElementById('locat').value;
	
	var prov='';
	
	if (st=='standing' && lo!='set of traffic lights')
	{
		prov='on';
	}
	else if (st=='standing' && lo=='set of traffic lights')
	{
		prov='at';
	}
	else if (st!='standing' && lo=='set of traffic lights')
	{
		prov=document.getElementById('stat2').value;
	}
	else if (st=='crossing' && lo=='set of traffic lights')
	{
		prov='from';
	}
	else if (st=='waiting to cross' && lo=='set of traffic lights')
	{
		prov='at';
	}
	
	return prov;
}


function submiter()
{
	document.getElementById('accident2').value=document.getElementById('accident').innerHTML;
	
	document.frm.submit();
}

function chkothaw()
{
	
	if(document.getElementById('aw').value=="____"){
					
		document.getElementById('othaw').type='text';
	}
	
}

function costchk(val){
	    
			var ccost=document.getElementById('costa');
	
		if(val=='tripped on' || val=='slipped on'){
			
				ops = document.createElement('OPTION');	
				ops.setAttribute('value','fell forward');
				ops.innerHTML='fell forward';
			    ccost.appendChild(ops);
				opers = document.createElement('OPTION');
				opers.setAttribute('value','fell backwards');
				opers.innerHTML='fell backwards';
				ccost.appendChild(opers);
				ccost.style.visibility='visible';
				
		}
	
}


function toggleExemp()
{
	if (document.getElementById('sb').selectedIndex==1)
	{
		document.getElementById('exempDiv').style.visibility='visible';
		document.getElementById('sbb').value='0';
	}
	else
	{
		document.getElementById('exempDiv').style.visibility='hidden';
		document.getElementById('exemp').selectedIndex='0';
		document.getElementById('sbb').value='1';
	}
}

function toggleExemp2()
{
	if (document.getElementById('exemp').selectedIndex==1)
	{
		document.getElementById('exempSp').style.visibility='visible';
	}
	else
	{
		document.getElementById('exempSp').style.visibility='hidden';
		document.getElementById('exempSp').selectedIndex='0';
	}
}

function exemptst(val){
	
	if(val =='oth'){
		document.getElementById('exemptdiv').style.visibility='visible';	
	}
	
}

function tgglthr(oval){
	
	if(oval=='__'){
		document.getElementById('oththr').style.visibility='visible';	
	}
}

function impctNoChck(id)
{


	if(id=='multiple'){
		id=4;	
	}

	var tble = document.getElementById('impctTbl');
	
	
	for(var n = 0;n<id;n++){
		
		// insert a row to a table
		
		var row = tble.insertRow(n);
		var cell =row.insertCell(0);
		cell.innerHTML="and then:";
			
			var cell1 = row.insertCell(1);
	        var element1 = document.createElement("input");
            element1.type = "text";
			element1.setAttribute('id','impcttxt'+n);
            
		
			var element2 = document.createElement("select");
				element2.setAttribute('id','impctdrp'+n);
			    option1 = document.createElement('option');
			
					option1.text = 'collided';
					option1.value='collided with';
				
					element2.add(option1);
					
				option2 = document.createElement('option');
				    
					option2.text = 'struck';
					option2.value='was struck';
					
					element2.add(option2);
				
				option3 =  document.createElement('option');
			
			          option3.text='spun-around';
					  option3.value='spun-around';
					  
					 element2.add(option3);
			
			cell1.appendChild(element2);
		    cell1.appendChild(element1);
		
		
		
	}
	
	

	
	
}