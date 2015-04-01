<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include "dcon.php";

$sqlclaimantDets = "SELECT ct,cfn,cln,cde,cageref FROM claimant WHERE cid ='".$_GET['mlr']."'";
//echo $sqlclaimantDets;

	$sqlclaimantDetsRes = mysql_query($sqlclaimantDets);
	
	$sqlClaimantDetsPrint = mysql_fetch_array($sqlclaimantDetsRes);
	
	$fullname = $sqlClaimantDetsPrint['ct'].' '.$sqlClaimantDetsPrint['cfn'].' '.$sqlClaimantDetsPrint['cln'];
	

?>
<html>
    <head>
        <title></title>
		<link type="text/css" rel="stylesheet" rev="stylesheet" href="style/style.css" />

        <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>

        <script type="text/javascript">
                tinyMCE.init({
                        // General options
                        mode : "textareas",
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

                        // Theme options
                        theme_advanced_buttons1 : "forecolor,backcolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect,bullist,numlist,|,outdent,indent,|,hr,|,sub,sup",
                        theme_advanced_buttons2 : "",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : false,

                        // Example content CSS (should be your site CSS)
                    //    content_css : "css/content.css",

                        // Drop lists for link/image/media/template dialogs
                     /*
					    template_external_list_url : "lists/template_list.js",
                        external_link_list_url : "lists/link_list.js",
                        external_image_list_url : "lists/image_list.js",
                        media_external_list_url : "lists/media_list.js",
					*/
                        // Style formats
                        style_formats : [
                                {title : 'Bold text', inline : 'b'},
                                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                                {title : 'Example 1', inline : 'span', classes : 'example1'},
                                {title : 'Example 2', inline : 'span', classes : 'example2'},
                                {title : 'Table styles'},
                                {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
                        ],

                        // Replace values for the template plugin
                        template_replace_values : {
                                username : "Some User",
                                staffid : "991234"
                        }
                });
        </script>
    </head>
    <body>
        <div align="center">
            <h2>Create New Email</h2>
            <form method="post" action="emailInvoiceP2.php" id="form">
                <table>
                    <tr>
                        <td>To</td>
                        <td> : </td>
                        <td>
                            <input type="text" value="" id="to" name="to" style="width:610px;" onFocus="dCons();" onKeyDown="dContacts(event);" onBlur="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td> : </td>
                        <?php if($_GET['typ']=='DNA'){ ?>
                           <td><input type="text" id="sub" name="sub" style="width:610px;" value='MLREPORTS DNA Notice' /></td>
                    	
						<?php $msg = "Please note that ".$fullname." with agency ref: ".$sqlClaimantDetsPrint['cageref']." has not attend their appointment on the ". $sqlClaimantDetsPrint['cde']."<br/>";  }else if($_GET['typ']=='cancel'){ ?>
						
                        	<td><input type="text" id="sub" name="sub" style="width:610px;" value='MLREPORTS Cancellation Notice' /></td>
						
						<?php $msg = "Please note that ".$fullname." with agency ref: ".$sqlClaimantDetsPrint['cageref']." has cancelled their appointment for the ". $sqlClaimantDetsPrint['cde']."<br/>"; }else if($_GET['typ']=='attend'){ ?>
                        
                             <td><input type="text" id="sub" name="sub" style="width:610px;" value="MLREPORTS Appointment Attended Notice" /></td>
                        
                        	<?php $msg = "Please note that ".$fullname." with agency ref: ".$sqlClaimantDetsPrint['cageref']." has attended their appointment for the ". $sqlClaimantDetsPrint['cde']."<br/>"; ?>
                        
                        
						<?php } ?>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br />
                            <div contenteditable="true" id="msgD" style="border:1px inset #666; padding: 5px 5px 5px 5px; color:#0033CC;">
                                <textarea id="elm1" name="elm1" rows="13" cols="85" style="width: 100%">
                                    <p style="color:#0033CC; font-family: arial;font-size:13pt">
                                    <?php echo $msg; ?>
                                    
                                        <br><br><br><br>
                                        Kind Regards
                                        <br><br>
                                        ML REPORTS
                                    </p>
                                    <br><br>
                                   
                                    <span style="color:#0033CC; font-family: arial;">Please consider the environment before printing this e-mail</span>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><div style="display: none;"><textarea name="msg" id="msgT"></textarea></div></td>
                    <tr>
                        <th colspan="3"><input type="button" value="Send Mail" onClick="sndMail();" /></th>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript" language="javascript">

			function sndMail()
            {
                //document.getElementById('msgT').innerHTML=tinyMCE.get('elm1').getContent();
                document.getElementById('form').submit();
            }

        </script>
    </body>
</html>