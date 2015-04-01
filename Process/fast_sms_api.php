<?php
// api connect function

function api_connect($Username, $Password, $ParameterArray)
{
   // Create the URL to send the message.
   // The variables are set using the input from an HTML form

   $err = array();
   $url = "api.fastsms.co.uk";
   $headers = "POST /api/api.php HTTP/1.0\r\n";
   $headers .= "Host: ".$url."\r\n";

   // Create post string
   // Username and Password
   $poststring = "Username=".$Username."&";
   $poststring .= "Password=".$Password;

   // Turn the parameter array into the variables

   while (list($Key, $Value)=@each($ParameterArray))
   {
      $poststring .= "&".$Key."=".urlencode($Value);
   }

   // Finish off the headers
   $headers .= "Content-Length: ".strlen($poststring)."\r\n";
   $headers .= "Content-Type: application/x-www-form-urlencoded\r\n";


   // Open a socket
   $http = fsockopen ($url, 80, $err[0], $err[1]);
   if (!$http)
   {
      echo "Connection to ".$url.":80 failed: ".$err[0]." (".$err[1].")";
      exit();
   }

   // Socket was open successfully, post the data.
   fwrite ($http, $headers."\r\n".$poststring."\r\n");
   
   // Read the results from the post
   $result = "";
   while (!feof($http))
   {
      $result .= fread($http, 8192);
   }

   // Close the connection
   fclose ($http);

   // Strip the headers from the result
   list($resultheaders, $resultcode)=preg_split("/\r\n\r\n/", $result, 2);

   return $resultcode;
}


?>