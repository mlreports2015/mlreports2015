<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_SESSION['n'])==1)
{
    include "dcon.php";

    $dt=date('Y-m-d', strtotime($_POST['dt']));
?>

<html>
    <head>
        <title>Upload Cases to http://www.mlreports.com</title>
        <script language="javascript" type="text/javascript">
            var ids=new Array();
            var idAssign=new Array();
        </script>

        <style type="text/css">
            td
            {
                border-right: #000 solid 1px;
                border-bottom: #000 solid 1px;
            }

            th
            {
                border-right: #000 solid 1px;
                border-bottom: #000 solid 1px;
                border-left: #000 solid 1px;
                border-top: #000 solid 1px;
            }

            table
            {
                padding: 0px 0px 0px 0px;
            }
        </style>
    </head>

    <body>
        <div align="left">
            <div style="opacity:0.2; filter:alpha(opacity=20);">
                <img src="image/Logo.png" />
            </div>

            <div style="position:relative; top:-177px; width: inherit;">
                <div align="center">
                    <h2>Upload Cases for <?php echo date('d-m-Y', strtotime($_POST['dt'])); ?></h2>
                    <table width="100%" cellspacing="0">
                        <tr>
                            <th align="left">&nbsp;</th>
                            <th align="left">ML Reports ID</th>
                            <th align="left">Name</th>
                            <th align="left">Date of Birth</th>
                            <th align="left">Date of Accident</th>
                            <th align="left">Report Generated</th>
                        </tr>
                        <?php
                            $s="select * from claimant where cde='$dt'";
                            $q=  mysql_query($s);

                            $i=0;

                            while ($r=  mysql_fetch_array($q))
                            {
                                $s3="select * from repGen where cid='".$r['cid']."' and org='".$_SESSION['o']."'";
                                $q3=mysql_query($s3);
                                $n=mysql_num_rows($q3);

                                $yn='';
                                if ($n>0)
                                {
                                        $yn='Yes';
                                }
                                else
                                {
                                        $yn='No';
                                }
                                ?>
                                <script language="javascript" type="text/javascript">

                                    <?php
                                            echo "ids[$i]='".$r['cid']."';
                                                idAssign[$i]=false;
                                                ";
                                    ?>
                                </script>
                                <tr id="tr<?php echo $i; ?>">
                                    <td style="border-left: #000 solid 1px;"><input type="checkbox" value="" id="chk[<?php echo $i; ?>]" checked="checked" onclick="toggle('<?php echo $i; ?>');" /></td>
                                    <td><?php if ($r['mlrId']>0){echo $r['mlrId'];}else { echo '-'; } ?></td>
                                    <td><?php echo $r['ct']; ?> <?php echo $r['cfn']; ?> <?php echo $r['cln']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($r['cdb'])); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($r['cda'])); ?></td>
                                    <td align="center"><?php echo $yn; ?></td>
                                </tr>
                                <?php
                                $i=$i+1;
                            }
                        ?>
                        <tr><td colspan="6" align="center" style="border-left: #000 solid 1px;"><input type="button" value="Upload Selected" onclick="ifrmSrc();" /></td></tr>
                    </table>
                </div>
            </div>
        </div>

        <iframe src="" id="ifrm0"></iframe>
        <iframe src="" id="ifrm1"></iframe>
        <iframe src="" id="ifrm2"></iframe>
        <iframe src="" id="ifrm3"></iframe>
        <iframe src="" id="ifrm4"></iframe>


        <script language="javascript" type="text/javascript">

            function init()
            {

            }

            function test(i)
            {
                alert(i);
                if (document.getElementById('chk['+i+']').checked==true)
                {
                    alert(ids[i]);
                    var tr=document.getElementById('tr'+i);
                    tr.parentNode.removeChild(tr);
                }
                else
                {
                    alert('Unchecked');
                }
            }

            function toggle(i)
            {
                if (document.getElementById('chk['+i+']').checked==false)
                {
                    document.getElementById('tr'+i).style.backgroundColor='#FF2626';
                }
                else
                {
                    document.getElementById('tr'+i).style.backgroundColor='#fff';
                }
            }

            function getNextID()
            {
                var k=0;

                while (k<ids.length)
                {
                    if (idAssign[k]==false && document.getElementById('chk['+k+']').checked==true)
                    {
                        idAssign[k]=true;
                        document.getElementById('tr'+k).style.backgroundColor='#BAFEA3';
                        return ids[k];
                    }
                    k=k+1;
                }
                return false;
            }

            function ifrmSrc()
            {
                document.getElementById('ifrm0').src='uLoadF.php';
                document.getElementById('ifrm1').src='uLoadF.php';
                document.getElementById('ifrm2').src='uLoadF.php';
                document.getElementById('ifrm3').src='uLoadF.php';
                document.getElementById('ifrm4').src='uLoadF.php';
            }
        </script>

    </body>
</html>

<?php
}
?>