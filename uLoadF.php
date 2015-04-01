<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_SESSION['n'])==1)
{
    include "dcon.php";
?>

<html>
    <head>
        <title>Upload Cases to http://www.mlreports.com</title>
        <script language="javascript" type="text/javascript">
            var ids=new Array();
            var id;

            function askNextID()
            {
                id=parent.getNextID();

                if (id!==false)
                {
                    window.location='uLoadF2.php?id='+id;
                }
                else
                {
                    document.getElementById('iidd').innerHTML='No cases to upload!';
                }
            }
        </script>

    </head>

    <body onload="askNextID();">
        <div id="iidd"></div>
    </body>

<?php
}
?>
