create database mlr;

use mlr;

create table login
(
org varchar(20) not null,
name varchar(20) not null,
pwd varchar(20) not null
);

create table claimant
(
	cid integer not null,
	org varchar(20) not null,
	ct varchar(5) not null,
	cfn varchar(50) not null,
	cln varchar(50) not null,
	cdb date not null,
	emp varchar(30),
	cda date not null,
	cde date not null,
	ca1 varchar(40) not null,
	ca2 varchar(40) not null,
	cp varchar(9) not null,
	cc1 varchar(20) not null,
	cc2 varchar(20) not null,
	ce varchar(50) not null,
	cage integer not null,
	cageref varchar(30) not null,
	csol integer not null,
	csolref varchar(50) not null,
	gen varchar(1) not null,
	clid integer not null
);

create table solicitor
(
	sid integer not null primary key auto_increment,
	sn varchar(50) not null,
	sa varchar(80),
	sp varchar(9),
	sc varchar(15),
	sf varchar(15),
	se varchar(50)
);

create table agency
(
	aid integer not null primary key auto_increment,
	an varchar(50) not null,
	aa varchar(80),
	ap varchar(9),
	ac varchar(20),
	ae varchar(50),
	af varchar(30)
);

create table cclist
(
	cid integer not null primary key auto_increment,
	cn varchar(50) not null,
	ca varchar(80) not null,
	cp varchar(9) not null,
	cc varchar(20) not null
);

create table idchk
(
	cid integer not null,
	chk varchar(20) not null,
	org varchar(20) not null
);

create table soi
(
	cid integer not null,
	chk varchar(100) not null,
	org varchar(20) not null
);

create table booki
(
	cid integer not null,
	bi varchar(100) not null,
	org varchar(20) not null
);

create table comp
(
	id integer not null,
	org varchar(20) not null
);

create table accomp
(
	cid integer not null,
	accomp text not null,
	aby varchar(15),
	afn varchar(30),
	aln varchar(30),
	org varchar(20) not null
);

create table ident
(
	cid integer not null,
	chk text not null,
	org varchar(20) not null
);

create table pmh
(
	id integer not null,
	hist text not null,
	org varchar(20) not null
);

create table accid
(
	id integer not null,
	accid text not null,
	org varchar(20) not null
);

create table eff
(
	id integer not null,
	tp varchar(1) not null,
	prob varchar(50) not null,
	stat varchar(14) not null,
	msg text not null,
	org varchar(20) not null
);

create table treat
(
	id integer not null,
	stat varchar(14) not null,
	msg text not null,
	org varchar(20) not null
);

create table emp
(
	id integer not null,
	msg1 text not null,
	org varchar(20) not null
);

create table hcirc
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table travel
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table dlive
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table inves
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table domh
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table genap
(
	id integer not null,
	msg1 text not null,
	msg2 text not null,
	org varchar(20) not null
);

create table menh
(
	id integer not null,
	msg1 text not null,
	msg2 text not null,
	org varchar(20) not null
);

create table iwse
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table neck
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table upper
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table back
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);

create table lower
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);



create table shist
(
	id integer not null,
	h text,
	inj text,
	treat text,
	hlyf text,
	org varchar(20) not null
);

create table job
(
	id integer not null,
	jrest text,
	jabs text,
	mpas text,
	mmpast text,
	ltef text,
	org varchar(20) not null
);

create table prog
(
	id integer not null,
	prog text,
	org varchar(20) not null
);

create table mreps
(
	id integer not null,
	msg text not null,
	org varchar(20) not null
);


create table user
(
	fName varchar(30) not null,
    lName varchar(30) not null,
    stat varchar(50) not null,
    uName varchar(30) not null,
    tel varchar(20) not null,
    mob varchar(30) not null,
    peml varchar(50) not null,
    weml varchar(50) not null
);