<?php
	session_start();
	include './connect.php';
	include './header.php';

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ./index.php' );
	}
	else
	{
		// $sqlPrep = "INSERT INTO users( username , userpass ) VALUES( ?, ? )" 
		$sqlPrep = $myConn->prepare( "INSERT INTO users( username , userpass ) VALUES( ?,?)" );
		$sqlPrep->bind_param( "ss" , $newUser , $newPass );

		$newUser = filter_var( $_POST["userName"] , FILTER_SANITIZE_STRING );
		$newPass = md5( $_POST["passCode"] );

		$status = $sqlPrep->execute();
		if( !$status )
		{
			echo "Error -> <a href = './index.php'>Return Home</a> And Try Again";
		}
		else
		{
			$_SESSION["logStatus"] = 1;
			$_SESSION["logName"] = $newUser;
			echo "Success! Welcome to Freetime.<br />";
			echo "<a href = './index.php'>Return Home!</a>";
			$sqlPrep->close();
		}
	}


	include './footer.php';
?>
