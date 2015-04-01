<?php 

// sendmail("Ali", "123@gmail.com", "ali", "alikazmi.2040@gmail.com", "hello", "","1");

function sendmail ($from_name, $from_email, $to_name, $to_email, $subject, $text_message="", $html_message, $attachment="") 
    { 
        $from = "$from_name <$from_email>"; 
        $to   = "$to_name <$to_email>"; 
        $main_boundary = "----=_NextPart_".md5(rand()); 
        $text_boundary = "----=_NextPart_".md5(rand()); 
        $html_boundary = "----=_NextPart_".md5(rand()); 
        $headers  = "From: $from\n"; 
        $headers .= "Reply-To: $from\n"; 
        $headers .= "X-Mailer: Hermawan Haryanto (http://hermawan.com)\n"; 
        $headers .= "MIME-Version: 1.0\n"; 
        $headers .= "Content-Type: multipart/mixed;\n\tboundary=\"$main_boundary\"\n"; 
        $message = "\n--$main_boundary\n"; 
        $message .= "Content-Type: multipart/alternative;\n\tboundary=\"$text_boundary\"\n"; 
        $message .= "\n--$text_boundary\n"; 
        $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n"; 
        $message .= "Content-Transfer-Encoding: 7bit\n\n"; 
        $message .= ($text_message!="")?"$text_message":"Text portion of HTML Email"; 
        $message .= "\n--$text_boundary\n"; 
        $message .= "Content-Type: multipart/related;\n\tboundary=\"$html_boundary\"\n"; 
        $message .= "\n--$html_boundary\n"; 
        $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n"; 
        $message .= "Content-Transfer-Encoding: quoted-printable\n\n"; 
        $message .= str_replace ("=", "=3D", $html_message)."\n"; 
        if (isset ($attachment) && $attachment != "" && count ($attachment) >= 1) 
        { 
            for ($i=0; $i<count ($attachment); $i++) 
            { 
                $attfile = $attachment[$i]; 
                $file_name = basename ($attfile); 
                $fp = fopen ($attfile, "r"); 
                $fcontent = ""; 
                while (!feof ($fp)) 
                { 
                    $fcontent .= fgets ($fp, 1024); 
                } 
                $fcontent = chunk_split (base64_encode($fcontent)); 
                @fclose ($fp); 
                $message .= "\n--$html_boundary\n"; 
                $message .= "Content-Type: application/octetstream\n"; 
                $message .= "Content-Transfer-Encoding: base64\n"; 
                $message .= "Content-Disposition: inline; filename=\"$file_name\"\n"; 
                $message .= "Content-ID: <$file_name>\n\n"; 
                $message .= $fcontent; 
            } 
        } 
        $message .= "\n--$html_boundary--\n"; 
        $message .= "\n--$text_boundary--\n"; 
        $message .= "\n--$main_boundary--\n"; 
        if (mail ($to, $subject, $message, $headers))
		return true;
	else
		return false;
    } 
?>
	

