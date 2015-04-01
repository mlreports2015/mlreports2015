<?php

			$url = "http://localhost/mlr2/upload-file.php";
// Any other field you might want to catch
//post_data['name'] = "khan";
// File you want to upload/post
$post_data['uploadfile'] = "@c:/temp/912.pdf";
 
// Initialize cURL
$ch = curl_init();
// Set URL on which you want to post the Form and/or data
curl_setopt($ch, CURLOPT_URL, $url);
// Data+Files to be posted
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
// Pass TRUE or 1 if you want to wait for and catch the response against the request made
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// For Debug mode; shows up any error encountered during the operation
curl_setopt($ch, CURLOPT_VERBOSE, 1);
// Execute the request
$response = curl_exec($ch);

echo $response;

?>
