<?php
class MailClass {


	protected $smtpinfo = array();
	protected $plaintxt = "";
	protected $attachPath = "" ;
	protected $crlf = "";
	protected $mime = "";
	protected $headers = array();
	

	function __construct()
	{
	
	
	$this->smtpinfo["host"] = "mail.mldoctors.com";
	$this->smtpinfo["port"] = "25";
	$this->smtpinfo["auth"] = true;
	$this->smtpinfo["username"] = "admin@mldoctors.com";
	$this->smtpinfo["password"] = "bismillah";
    $crlf="\n";
	
	$this->headers['To'] = "Dan <danradd.2010@gmail.com>";
	$this->headers['Bcc']= "Dan <danradd.2010@gmail.com>";
	$this->headers['From'] = "admin <admin@mldoctors.com>";
	
	
	$this->mime = new Mail_mime(array('eol' => $crlf));
		
	}
	
	function __construct1($txt)
	{
		
		
	$this->smtpinfo["host"] = "mail.mldoctors.com";
	$this->smtpinfo["port"] = "25";
	$this->smtpinfo["auth"] = true;
	$this->smtpinfo["username"] = "admin@mldoctors.com";
	$this->smtpinfo["password"] = "bismillah";
	$this->plaintxt = $txt;
	$crlf="\n";
	
	$this->headers['To'] = "Dan <danradd.2010@gmail.com>";
	$this->headers['Bcc']= "Dan <danradd.2010@gmail.com>";
	$this->headers['From'] = "admin <admin@mldoctors.com>";
	
	
	
	
	$mime = new Mail_mime(array('eol' => $crlf));
	
	
	}
	
	function setPlainTxt($txt){
		
		
		$this->plaintxt=$txt;
	
	
	}
	
	function getPlainTxt(){
		
		
		return $this->plaintxt; 
	
	}
	
	function setSubject($subjecttl){
		
	
		$this->headers['Subject']=$subjecttl;
	
	}
	
	
	function setAttachmentPath($attach)
	{
		
	
		$this->attachPath = $attach;
		
	}

	function addAttachments($attach)
	{
	
	$this->mime->setTXTBody($this->plaintxt);
	$this->mime->addAttachment($attach, 'application/msword');

	//$hdrs = $mime->headers($headers);

		
	}
	
	function getBody()
	{
		
		return $this->mime->get();
	
	}
	
	function getHeaders()
	{
		
		return $this->mime->headers($this->headers);
	}

	

	
}



?>
