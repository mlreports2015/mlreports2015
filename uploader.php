<?php
session_start();

if (isset($_SESSION['n']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mian Rashid Zia's Website</title>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/jquery.swfupload.js"></script>
<script type="text/javascript">

$(function(){
	var s='<?php echo $_POST['sol']; ?>';
	$('#swfupload-control').swfupload({
		upload_url: "upload-file.php?sol="+s,
		file_post_name: 'uploadfile',
		file_size_limit : "51200",
		file_types : "*.jpg;*.png;*.gif;*.bmp;",
		file_types_description : "Image files",
		file_upload_limit : 25,
		flash_url : "js/swfupload/swfupload.swf",
		button_image_url : 'js/swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log').append(listitem);
			$('li#'+file.id+' .cancel').bind('click', function(){
				var swfu = $.swfupload.getInstance('#swfupload-control');
				swfu.cancelUpload(file.id);
				$('li#'+file.id).slideUp('fast');
			});
			// start the upload since it's queued
			$(this).swfupload('startUpload');
		})
		.bind('fileQueueError', function(event, file, errorCode, message){
			alert('Size of the file '+file.name+' is greater than limit');
		})
		.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			$('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
		})
		.bind('uploadStart', function(event, file){
			$('#log li#'+file.id).find('p.status').text('Uploading...');
			$('#log li#'+file.id).find('span.progressvalue').text('0%');
			$('#log li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="Galleries/<?php echo $_POST['sol']; ?>/Images/'+file.name+'" target="_blank" >view &raquo;</a>';
			item.addClass('success').find('p.status').html('Done!!! | '+pathtofile);
			thumbs('Galleries/<?php echo $_POST['sol']; ?>/Images/'+file.name, 'Galleries/<?php echo $_POST['sol']; ?>/Thumbs/'+file.name);
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});	

</script>
<style type="text/css" >
#swfupload-control p{ margin:10px 5px; font-size:0.9em; }
#log{ margin:0; padding:0; width:500px;}
#log li{ list-style-position:inside; margin:2px; border:1px solid #ccc; padding:10px; font-size:12px; 
	font-family:Arial, Helvetica, sans-serif; color:#333; background:#fff; position:relative;}
#log li .progressbar{ border:1px solid #333; height:5px; background:#fff; }
#log li .progress{ background:#999; width:0%; height:5px; }
#log li p{ margin:0; line-height:18px; }
#log li.success{ border:1px solid #339933; background:#ccf9b9; }
#log li span.cancel{ position:absolute; top:5px; right:5px; width:20px; height:20px; 
	background:url('js/swfupload/cancel.png') no-repeat; cursor:pointer; }
</style>

<link type="text/css" rel="stylesheet" rev="stylesheet" href="style/style.css" />

</head>

<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" rightmargin="0">


<div class="mMenu" align="right">

<table>
<tr>
<td width="100" align="center">
<a href="home.php">
<img src="images/homeIcon.png" title="Home" height="50" border="0" />
<br />
Home
</a>
</td>

<td width="100" align="center">
<a href="">
<img src="images/galleryIcon.png" title="" height="50" border="0" />
<br />
Galleries
</a>
</td>

<?php
if (strcmp($_SESSION['t'],'1')==0)
{
?>
<td width="100" align="center">
<a href="uploader.php">
<img src="images/uploadIcon.png" title="" height="50" border="0" />
<br />
Upload
</a>
</td>
<?php
}
?>

<td width="100" align="center" style="border-left-color:#999; border-left-style:solid; border-left-width:1px;">
<a href="logout.php">
<img src="images/padLock.png" title="Logout" height="50" border="0" />
<br />
Logout
</a>
</td>

</tr>
</table>

</div>


<div class="iText">
Welcome to Mian Rashid Zia's Website.
</div>


<div align="center">
<div id="swfupload-control" class="mCont" align="left">
	<p>Upload upto 25 Files(jpg, png, gif, rtf, bmp), each with a maximum size of 50MB</p>
	<input type="button" id="button" />
	<p id="queuestatus" ></p>
	<ol id="log"></ol>
    <input type="button" value="Finished with current solicito" onclick="window.location.reload();" />
</div>
</div>

<script src="thumb.js" type="text/javascript" language="javascript"></script>

</body>
</html>

<?php
}
else
{
	include 'inc.php';
	red('index2.php');
}
?>