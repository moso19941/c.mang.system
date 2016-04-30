
<?php
include_once 'dbconfig.php';

$id = $_REQUEST['patientID'];


/*

	- check value of the id
	- search in database to retrive the result and display msg

*/

	// check value (not string and empty)

	if(empty($id))
	{
		echo "<h3> please enter id </h3>";
	} elseif (!(is_numeric($id))) 
	{
		echo "<h3> please enter number not string </h3>";
	} else 
	{

		$sql = "SELECT `fn`, `ln`, `age`, `type` FROM `patient` WHERE `id` = $id";
		$sqlCheck = mysql_query ( $sql );

		// array to save student info
		$studentArray = array();
		$studentArray[0] = ''; // to make sure that there's value comes form the database
		if(isset($sqlCheck))
		{

			while ($row = mysql_fetch_row( $sqlCheck ))
			{
				// check if the id not repeated more than one ****

				echo "<h3>Patient Name : $row[0] $row[1] ";
				echo "<h3> Age : $row[2]</h3>";
				$studentArray[0] = $row[0];
				$studentArray[1] = $row[1];
				$studentArray[2] = $row[2];
				$studentArray[3] = $row[3];
			}
		}else 
		{
			echo "<h3>Error commentcating to database</h3>";
		}
		// if there's no value comes from the database

		if($studentArray[0] == ''){
			echo "<h3>Sorry we couldn't find the id = [$id] please try agin</h3>";
		}else {
			// here we will print the history of the patient 
			$sql = "SELECT `past`, `present`, `medical`, `family` FROM `history` WHERE `id` = $id";
			$sqlCheck = mysql_query ( $sql );

			// array to save student info
			$studentHistoryArray = array();
			$studentHistoryArray[0] = ''; // to make sure that there's value comes form the database
			if(isset($sqlCheck))
			{

				while ($row = mysql_fetch_row( $sqlCheck ))
				{
					// check if the id not repeated more than one ****

					echo "<h3>Past History : $row[0]</h3>";
					echo "<h3>Present History : $row[1]</h3>";
					echo "<h3>Medical History : $row[2]</h3>";
					echo "<h3>Family History : $row[3]</h3>";

					$studentHistoryArray[0] = $row[0];
					$studentHistoryArray[1] = $row[1];
					$studentHistoryArray[2] = $row[2];
					$studentHistoryArray[3] = $row[3];
				}
			}else 
			{
				echo "<h3>Error commentcating to database</h3>";
			}
			if($studentHistoryArray = ''){
				echo "<h3>There's no history </h3>";
			}
		}

	}


?>
