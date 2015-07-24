<?php
session_start();

include "includes/dcon.php";

//$hists = serialize($_SESSION['hist']);
//$histres = mysql_query("update log_hist set hist ='".$hists."' where id='".$_SESSION['id']."'");

     // blank session
      $_SESSION=array();
      if (ini_get("session.use_cookies")) {
    //reset cookie
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    }
  // destroy session
 session_destroy();

?>
<script type="text/javascript" language="javascript">
  //redirect to index page
  window.document.location="./index.php";
</script>