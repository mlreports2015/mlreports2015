<?

session_start();

include "inc.php";
		session_destroy();
		rdrctr("Logged Out...Good Day","index.html");
        exit();

?>