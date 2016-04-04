<?php
	include './connect.php';
	include './header.php';

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ./index.php' );
	}
	else
	{
		$safeUser = filter_var( $_POST["usernameExist"] , FILTER_SANITIZE_STRING );
		$safePass = md5( $_POST["passwordExist"] );

		$sqlSelect = "SELECT userID , username , userpass FROM users WHERE username = '" . $safeUser . "' 
					  AND userpass = '" . $safePass . "'";
		$result = mysqli_query( $myConn , $sqlSelect );
		if( !$result )
		{
			echo "error(2) -> " . mysqli_error( $myConn );
		}

		if( mysqli_num_rows( $result ) == 1 )
		{
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$_SESSION["logID"] = filter_var( $row["userID"] , FILTER_VALIDATE_INT );
				$_SESSION["logName"] = filter_var( $row["username"] , FILTER_SANITIZE_STRING );
			}
			$_SESSION["logStatus"] = 1;
			
			echo "Successful login!";
			echo "<br />";
			echo "Return to <a href = './index.php'>Home Page</a>";
		}
		// IF YOU ATTEMPT TO LOGIN UNSUCCESSFULLY IT JUST REDIRECTS BACK TO THE HOMEPAGE WITHOUT HAVING SAID ANYTHING 
		// NOT SURE WHY BUT WILL LOOK INTO IT LATER 
		// PROBABLY BECAUSE A POST REQUEST METHOD ON THE HEADER REFRESHES THE PAGE BACK TO THE INDEX? (3/30/16)
		else
		{
			$_SESSION["logStatus"] = 0;
			echo "Login Unsuccessful!";
			echo "<br />";
			echo "Return to <a href = './index.php'>Home Page</a> And Try Again";
		}
	}
	include './footer.php';





?>
