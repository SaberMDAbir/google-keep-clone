<?php 

header("Refresh:3, URL=signin.php");
	
$_SESSION = array();
session_destroy();
setcookie ('PHPSESSID', '', time()-3600, '/PHPSite/sessions', '', 0, 0);


include('header.php');

echo "<h1>Goodbye!</h1>
<p>You are now logged out!</p>";

include ('footer.php');
?>