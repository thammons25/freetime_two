<?php
	include './connect.php';
	// include './transaction.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ./index.php' );
	}
	else
	{
		// begin();

		$sqlPrep = $myConn->prepare( "INSERT INTO projects( projName , projAdmin ) VALUES(?,?)" );
		echo $sqlPrep . "<br />";
		$sqlPrep->bind_param( "si" , $newName , $newAdmin );

		$newName = filter_var( $_POST["projectName"] , FILTER_SANITIZE_STRING );
		$newAdmin = filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );

		$prepCheck = $sqlPrep->execute();

		if( !$prepCheck )
		{
			// rollback();
			echo "Transaction failed man ";
			// exit();
		}
		else
		{
			// $newProjID = mysqli_insert_id( $myConn );
			$newProjID = 1;

			$sqlPrepTwo = $myConn->prepare( "INSERT INTO projectMembers( projNum , userNum ) VALUES(?,?)" );
			$sqlPrepTwo->bind_param( "ii" , $projectID , $userID );

			$projectID = filter_var( $newProjID , FILTER_VALIDATE_INT );
			$userID = filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );

			$prepCheckTwo = $sqlPrepTwo->execute();

			if( !$prepCheckTwo )
			{
				// rollback();
				echo "Transaction failed man ( 2 ) ";
				// exit();

			}
			else
			{
				$prepThree = $myConn->prepare( "INSERT INTO projectDays( startDay , endDay , projNum , userNum )
											    VALUES( ?, ? , ? , ? )" );
				$prepThree->bind_param( "ssii" , $start , $end , $proj , $user );

				// $start = date_format( $_POST["startDate"] , "Y-m-d" );
				// $end = date_format( $_POST["endDate"] , "Y-m-d" );
				$start = date( "Y-m-d" , strtotime( $_POST["startDate"] ) )
				$end = date( "Y-m-d" , strtotime( $_POST["endDate"] ) );
				$proj = filter_var( $newProjID , FILTER_VALIDATE_INT );
				$user = filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );

				$finalResult = $prepThree->execute();

				if( !$finalResult )
				{
					// rollback();
					echo "Transaction failed man ( 3 ) ";
					// exit();

				}
				else
				{
					// commit();
					echo "I have no idea wtf just happened";

				}
			}
		}
		// $sqlPrep->close();
		// $sqlPrepTwo->close();
		// $prepThree->close();
		echo "jesus christ this worked";
	}








?>
