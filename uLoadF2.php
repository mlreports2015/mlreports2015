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
    </head>

    <body onload="askNextID();">
        <?php
            echo $_GET['id'];
        ?>
        <script language="javascript" type="text/javascript">
            window.location='uLoadF.php';
        </script>
    </body>

<?php
}
?>
