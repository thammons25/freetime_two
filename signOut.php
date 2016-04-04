<!-- PAGE WILL CLEAR ALL SESSION VARIABLES AND THEN REDIRECT BACK TO HOMEPAGE USING JAVASCRIPT -->
<script language = "JavaScript">
<!--
	function goHome()
	{
		window.location = './';
	}


//-->
</script>

<?php
	include './connect.php';
	// include './header.php';
	session_start();
	




	$_SESSION = array();

	if( ini_get( "session.use_cookies" ) )
	{
		$params = session_get_cookie_params();
		setcookie( session_name() , '', time()-42000 , 
			$params["path"] , $params["domain"] ,
			$params["secure"] , $params["httponly"]);
	}
	session_destroy();
	echo "<body onload = 'goHome()'>";

	// include './footer.php';








?>
