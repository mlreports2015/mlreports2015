<?php
session_start();

include "inc.php";

unset($_SESSION['n']);
unset($_SESSION['org']);
unset($_SESSION['id']);
session_destroy();

header("url:index.html");

rdrctr("You Have Signed Out!", "index.html");

?>