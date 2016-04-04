<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
	$(document).ready( function()
	{
		$("#newProject").click( function()
		{
			$("#nameAndDate").css( 
			{
				"display":"block"
			});
			$("#newProject").css(
			{
				"display":"none"
			});


		});
		$("#setNameAndDate").click( function()
		{
			$("#nameAndDate").css(
			{
				"display":"none"
			});
			$("#availableTimes").css(
			{
				"display":"block"
			});
			$("#lastButton").css(
			{
				"display":"block"
			});
		});
	});
</script>








<button id = "newProject">Create New Project</button>
<br />

<div id = 'wholeForm'>
	<form method = 'post' action = './createNewProject.php'>
		<div id = 'nameAndDate' style = "display:none;">
			<p>Name It: <input type = 'text' name = 'projectName' /> </p>
			<p>Start ?: <input type = 'date' name = 'startDate' /> </p>
			<p>End ?: <input type = 'date' name = 'endDate' /> </p>
			<br />
			<!-- <button id = 'setNameAndDate'>All Set! </button> -->
			<style type = "text/css">
				#setNameAndDate {
					width: 17%;
				}
				#setNameAndDate:hover {
					text-transform: uppercase;
					font-weight: bold;
					cursor: pointer;

				}
			</style>

			<p id = 'setNameAndDate'>Set My Times!</button>
		</div>
		<div id = 'availableTimes' style = "display:none;">
			<?php
				session_start();

				$days = array( "Monday" , "Tuesday" , "Wednesday" , 
							   "Thursday" , "Friday" , "Saturday" , "Sunday" );
				$i = 0;
				while( $i < count( $days ) )
				{
					$j = $i + 1 ;
					echo "<p>". $days[$i] . "</p>";
					echo "<ul>";
						echo "<li>Free From <input type = 'time' name = 'freeFromDay" . $j . "' /></li>";
						echo "<br />";
						echo "<li>Free Until <input type = 'time' name = 'freeUntilDay" . $j . "' /></li>";
					echo "</ul>";
					$i++;
				}
			?>
		
			<br />
			<input type = 'submit' value = 'Create Project!'/>
		</div>
	</form>
</div>

