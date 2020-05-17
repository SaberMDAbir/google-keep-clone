<?php 
if (!isset($_COOKIE['user_id'])) {

header("Refresh:3, URL=signin.php");
	
} else {
	setcookie ('user_id', '', time()-3600, '/PHPSite/cookies', '', 0, 0);
	setcookie ('first_name', '', time()-3600, '/PHPSite/cookies', '', 0, 0);
	$_COOKIE = array();
}


include('header.php');

echo "<h1>Goodbye!</h1>
<p>You are now logged out!</p>";

include ('footer.php');
?>