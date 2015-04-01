function accid()
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
	
	var gg='';
	
	if (gen=='m')
		gg='He';
	else
		gg='She';
	
	var d='The accident occurred in the '+tm+'. '+tt+' '+nm+' occupied the '+sa+"'s seat in a "+ve+'. '+gg+' '+sb+' wearing a seatbelt. A head restraint '+hr+' fitted. An air-bag '+ab+' fitted';
	
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

	d=d+"At the moment of impact, the claimant's car was "+st+" on a "+lo+". The claimant's "+ve+' '+co+' '+aw;

	if (spd!="")
		d=d+" at "+spd+". ";
	else
		d=d+". The speed of the impact is not known. ";

	d=d+"The impact came from the "+im+". ";

	if (dmg!="unknown")
	d=d+"Its force was sufficient to "+dmg+" the car. ";
	else
		d=d+"The damage caused to the "+ve+" is not known. ";



	d=d+tt+' '+nm+' was thrown '+th+'. '+gg+' ';

	d=d+gc;
	
	document.getElementById('accident').innerHTML=d;
}