<?php
//session_start();

//if (isset($_SESSION['n']))
//{

//include 'includes/dcon.php';

$uploaddir = 'uploads/';
//$s=$_GET['sol'];

//$uploaddir=$uploaddir.$s.'/Images/';
//$thumbsdir=$uploaddir.$s.'/Thumbs/';

//chmod("/uploaddir", 0777);

$file = $uploaddir . basename($_FILES['uploadfile']['name']);
//$thumb = $thumbsdir . basename($_FILES['uploadfile']['name']); 

$size=$_FILES['uploadfile']['size'];
  if($size>1048576)
   {
	echo "error file size > 50 MB";
	unlink($_FILES['uploadfile']['tmp_name']);
	exit;
   }

   if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
      echo "success";
//  include 'thumb.php';
  
//  thumb($file, $thumb);
    }
    else
    {
	echo "error ".$_FILES['uploadfile']['error']." --- ".$_FILES['uploadfile']['tmp_name']." %%% ".$file."($size)";
     }
//}
//else
//{
	//include 'inc.php';
	//red('index2.php');
//}
?>