<!-- NEED TO MAKE A CHANGE TO THE IF STATEMENT REGARDING SOMETHING HAPPPENING 
	 IN CASE SOMEONE SIGNS IN INCORRECTLY 
	 AS OF 3/30 IT JUST UNSUCCESSFULLY TRIES TO LOG IN BUT BECAUSE THE LOG STATUS NEVER GETS CHANGED FROM 0 TO 1 THE PAGE COMES 
	 BACK WITH REQ_METH = POST, AND SUBSEQUENTLY REDIRECTS RIGHT ON BACK TO THE ORIGINAL SCREEN 
	 WOULD BE NICE TO HAVE AN EXPLANATINON REGARDING WHY WE JUST SENT THEM BACK!  -->
<?php
	include './connect.php';
	session_start();
	echo "req meth = " . $_SERVER["REQUEST_METHOD"] . "<br />";
	echo "logStatus = " . $_SESSION["logStatus"] . "<br />";
	echo "logName = " . $_SESSION["logName"] . "<br />";
	echo "logID = " . $_SESSION["logID"] . "<br />";
?>

<html>
	<head>
		<title> Freetime </title>
		<link rel = "stylesheet" type = "text/css" href ="./general.css" />
		<link rel = "stylesheet" type = "text/css" href = "./homePage.css" />
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,700,600,800,900'
		 rel='stylesheet' type='text/css'>
		<!-- THIS JAVASCRIPT FUNCTION IS INCLUDED BECAUSE THERE IS A LAG BETWEEN WHERE A PAGE ENDS UP AFTER A 
			 FORM SUBMISSION AND WHERE THEY SHOULD BE
		 -->
		<script language = "JavaScript">
		<!--
			function goHome()
			{
				window.location = "./";
			}

		//-->
		</script>
	</head>

<?php
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		echo "<body onload = 'goHome()'>";
	}
	else
	{
		echo "<body>";
	}
	  echo "<div id = 'container'>
				<div id = 'header'>
					<div id = 'pageTitle'>";
						// LOGSTATUS = 1 MEANS USER IS SIGNED IN 
						// LOGSTATUS =0 MEANS USER IS NOT SIGNED IN
						if( ($_SESSION["logStatus"] == 1 ) && ( isset( $_SESSION["logName"] ) ) )
						{
							echo "<h1>Welcome back to <strong>Freetime," . 
									$_SESSION["logName"] . "</strong>!</h1>";
						}
						else
						{
							echo "<h1>Welcome to <strong>Freetime</strong>!</h1>";
						}
				echo "</div>"; //ends pageTitle
		if( $_SERVER["REQUEST_METHOD"] != "POST" )
		{
			//EVERYTHING WITHIN THIS IF STATEMENT RIGHT BELOW HERE IS WHAT IS VIEWED AFTER A SUCCESSFUL LOGIN
			if( ($_SESSION["logStatus"] == 1 ) && ( isset( $_SESSION["logName"] ) ) )
			{
				$signOut = "./signOut.php";
				// CLICKING THIS SIGNOUT LINK WILL REDIRECT TO SIGNOUT PAGE 
				// SIGNOUT PAGE WILL CLEAR ALL SESSION VARIABLES AND REDIRECT BACK TO HOME
				echo "<p>All Done Here? - <a href = './signOut.php'>Sign Out!</a></p>";
				// echo "<button onclick = 'window.location.href = " . $signOut . ";'>Sign Out</button>";

				echo "<br /><br /><br />";
					 //  <div id = 'homePageContent'>
						// <h4>You're logged the fuck in god damn</h4>
					 //  </div>";
			}
			//THIS ELSE REPRESENTS A NON-REGISTERED USERS HOME SCREEN
			else
			{
				echo "<div id = 'signinForm'>
						<form method = 'post' action = './signIn.php'>
							<div id = 'existingUsername'>
								<p>Username: <input type = 'text' name = 'usernameExist' required /></p>
							</div>
							<div id = 'existingPassword'>
								<p>Password: <input type = 'password' name = 'passwordExist' required /></p>
							</div>
							<div id = 'existingSubmit'>
								<input type = 'submit' value = 'Sign In' id = 'submit' />
							</div>
						</form>
					  </div>
					  <div id = 'homePageContent'>
					  	<div id = 'aboutFreeTime'>
					  		<h1>Meet up with<br />you groups.</h1>
					  		<h2>Compare availibility and see what<br />times work for everyone</h2>
					  	</div>
					  	<div id = 'signUpForm'>
					  		<h2>Sign Up For Freetime</h2>
					  		<form method = 'post' action = './signUp.php'>
						  		<div id = 'username'>
						  			<textarea name = 'userName' placeholder = 'Username' required></textarea>
						  		</div>
						  		<div id = 'password'>
						  			<p>Password: <input type = 'password' name = 'passCode' value = 'Password' required /></p>
						  		</div>
						  		<div id = 'signUp'>
						  			<input type = 'submit' value = 'Sign Up' id = 'submit' />
						  		</div>
						  	</form>
						</div>";
			}
		}
?>
				




<!-- 			<div id = "homePageContent">
				<div id = "aboutFreeTime">
					<h1>Meet up with<br />your groups.</h1>
					<h2>Compare availibility and see what<br />times work for 
						everyone.</h2>
				</div> 
				<div id = "signUpForm">
					<h2>Sign Up For Freetime</h2>
					<form method = "post" action = "./signUp.php">
						<input type = "hidden" name = "imperative" value = "signUp" />
						<div id = "username">
							<textarea name = "userName" placeholder = "Username" required></textarea>
						</div>
						<div id = "password">
							<p>Password: <input type = "password" name = "passCode" value = "Password" required/> </p>
						</div>
						<div id = "signUp">
							<input type = "submit" value = "Sign Up" id = "submit" />
						</div>
					</form>
				</div>
			</div> -->






















		
