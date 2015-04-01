gCurentB='';
gCurentD='';

function init(a,b)
{
	gCurentB=a;
	gCurentD=b;

	document.getElementById(a).style.color='#AAF';
	document.getElementById(a).style.fontSize='larger';

	c=document.getElementById(b);
	c.style.visibility='visible';

	for (i=0; i<10000; i++)
	{
		if (i%20==0)
			c.style.height=c.style.height+1;
	}

	c.style.height='100%';
}

function mOver(a)
{
// 	if (a!=gCurentB)
// 	{
// 		d=document.getElementById(a);
// 
// 		d.style.fontSize='larger';
// 		d.style.color='#AAF';
// 	}
}

function mOut(a)
{
// 	if (a!=gCurentB)
// 	{
// 		d=document.getElementById(a);
// 
// 		d.style.fontSize='medium';
// 		d.style.color='#FFF';
// 	}
}

function mClick(a,b,c)
{
// 	o=document.getElementById(gCurentB);
// 	o.style.color='#FFF';
// 	o.style.fontSize='medium';
// 
// 	c=document.getElementById(b);
// 	c.style.color='#444';
// 	c.style.fontSize='larger';

	gCurentB=a;


	old=document.getElementById(gCurentD);
	old.style.visibility='hidden';
	old.style.height=0;

	curent=document.getElementById(b);
	curent.style.visibility='visible';

	document.getElementById(c).src=document.getElementById(c).src;
// 	for (i=0; i<100; i++)
// 	{
// 		if (i%100==0)
// 			curent.style.height=curent.style.height+1;
// 	}

// 	curent.style.height='100%';

	gCurentD=b;
}