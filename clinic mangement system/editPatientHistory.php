<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>


<?php
include 'dbconfig.php';
// echo "<h3 class='text-center'>In home page</h3>";
try {
	$id = $_GET ['id'];
} catch ( Exception $e ) {
}

echo "<br>";
/*
 * - check value of the id
 * - search in database to retrive the result and display msg
 */
// check value (not string and empty)
if (empty ( $id )) {
	echo "<h3 class='text-center'> Please Enter ID of the patient </h3>";
} elseif (! (is_numeric ( $id ))) {
	echo "<h3> Please enter number not string </h3>";
} else {
	$sql = "SELECT `fn`, `ln`, `age`, `type`, `phone` FROM `patient` WHERE `id` = $id";
	$sqlCheck = mysql_query ( $sql );
	// array to save student info
	$studentArray = array ();
	$studentArray [0] = ''; // to make sure that there's value comes form the database
	if (isset ( $sqlCheck )) {
		
		while ( $row = mysql_fetch_row ( $sqlCheck ) ) {
			// check if the id not repeated more than one ****
			echo "<h4>Patient Name : $row[0] $row[1] </h4>";
			echo "<h4>Age : $row[2]</h4>";
			echo "<h4> phone : $row[4]</h4>";
			$studentArray [0] = $row [0];
			$studentArray [1] = $row [1];
			$studentArray [2] = $row [2];
			$studentArray [3] = $row [3];
			$studentArray [4] = $row [4];
		}
	} else {
		echo "<h3>Error commentcating to database</h3>";
	}
	// if there's no value comes from the database
	echo "<br>";
	if ($studentArray [0] == '') {
		echo "<h3>Sorry we couldn't find the id = [$id] please try agin</h3>";
	} else {
		// here we will print the history of the patient
		$sql = "SELECT `past`, `present`, `medical`, `family` FROM `history` WHERE `id` = $id";
		$sqlCheck = mysql_query ( $sql );
		// array to save student info
		$studentHistoryArray = array ();
		$studentHistoryArray [0] = ''; // to make sure that there's value comes form the database
		if (isset ( $sqlCheck )) {
			
			?>
						<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal"
		data-target="#myModal">Edit Medical History</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit History</h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="PaID" value="<?php echo $id;?>">
					<div>
						<h3>Past</h3>
						<textarea class="form-control" rows="5" id="pastHistory" class="form-control"></textarea>
					</div>
					<div>
						<h3>Medical</h3>
						<textarea class="form-control" rows="5" id="Medical" class="form-control"></textarea>
					</div>
					<div>
						<h3>Family</h3>
						<textarea class="form-control" rows="5" id="Family"></textarea>
					</div>

				</div>
				<div class="modal-footer">

					<input type="button" name="addV" id="addVi" value="Save"
						class="btn btn-default" onclick="addHistoryToDb()" data-dismiss="modal">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div>

		</div>
	</div>

	<!-- 	 -->
						<?php
			
			echo "<br><h4> History Of the Patient</h4>";
			echo "<table class='table table-bordered table-hover' id='patientInfo'> <tr class='info'>";
			echo "<td>Past History</td>";
			echo "<td>Present History</td>";
			echo "<td>Medical History</td>";
			echo "<td>Family History</td>";
			echo "</tr>";
			
			while ( $row = mysql_fetch_row ( $sqlCheck ) ) {
				// check if the id not repeated more than one ****
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td> $row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td> $row[3]</td>";
				$studentHistoryArray [0] = $row [0];
				$studentHistoryArray [1] = $row [1];
				$studentHistoryArray [2] = $row [2];
				$studentHistoryArray [3] = $row [3];
				echo "<tr>";
			}
			echo "</table>";
			
			echo "<br> <h3>Visits</h3>";
			
			// display the visits of the patient
			$sqlVisits = "SELECT `No`,`Complaint`, `Diagnosis`, `Comments` FROM `visits` WHERE `id` = $id";
			$sqlCheckVisits = mysql_query ( $sqlVisits );
			echo "<table class='table table-bordered table-hover' id='patientInfo'> <tr class='success'> ";
			echo "<td>No.</td>";
			echo "<td>Complaint</td>";
			echo "<td>Diagnosis</td>";
			echo "<td>Comments</td>";
			echo "</tr>";
			$studentvisitsArray = array ();
			$studentvisitsArray [0] = '';
			
			while ( $row = mysql_fetch_row ( $sqlCheckVisits ) ) {
				// check if the id not repeated more than one ****
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td> $row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				$studentvisitsArray [0] = $row [0];
				$studentvisitsArray [1] = $row [1];
				$studentvisitsArray [2] = $row [2];
				$studentvisitsArray [3] = $row [2];
				echo "<tr>";
			}
		
			echo "</tr> </table>";
		echo "<br> <h3>Reports</h3>";	
			//report
			$sqlrs = "SELECT `id`, `comment`, `type` FROM `reports` WHERE `id` = $id";
			$sqlCheckR = mysql_query ( $sqlrs );
			echo "<table class='table table-bordered table-hover' id='patientInfo'> <tr class='danger'> ";
			echo "<td>Comment</td>";
			echo "<td>Type</td>";
			echo "</tr>";
			$studentReportArray = array ();
			$studentReportArray [0] = '';
				
			while ( $row = mysql_fetch_row ( $sqlCheckR ) ) {
				// check if the id not repeated more than one ****
				echo "<tr>";
				echo "<td> $row[1]</td>";
				echo "<td>$row[2]</td>";
				$studentReportArray [1] = $row [1];
				$studentReportArray [2] = $row [2];
				echo "<tr>";
			}
				
			echo "</tr> </table>";
			
			if ($studentReportArray = '') {
				echo "<h3>There's no Reports of the patient</h3>";
			}
		} else {
			echo "<h3>Error commentcating to database</h3>";
		}
		if ($studentHistoryArray = '') {
			echo "<h3>There's no history </h3>";
		}
	}
}

?>
<div id="AddResult"></div>


</body>
</html>