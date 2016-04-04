<?php
	// include './connect.php';

	function begin()
	{
		mysqli_query( "BEGIN" );
	}

	function commit()
	{
		mysqli_query( "COMMIT" );
	}

	function rollback()
	{
		mysqli_query( "ROLLBACK" );
	}
?>
