<?php
include 'dbconfig.php';
$id = $_REQUEST ['id'];
$comp = $_REQUEST ['comp'];
$dia = $_REQUEST ['dia'];
$comm = $_REQUEST ['comm'];


// echo $id . "<br>";
// echo $comp . "<br>";
// echo $dia . "<br>";
// echo $comm . "<br>";

if ($id != '') {
	$sql = "INSERT INTO `visits`(`id`, `No`, `Complaint`, `Diagnosis`, `Comments`) VALUES ('".$id."','','".$comp."','".$dia."','".$comm."')";
// 	echo $sql;
	$sqlCheck = mysql_query($sql);
// 	echo $sqlCheck;
	if ($sqlCheck) {
		echo '<div class="alert alert-success">
  				<strong>Success!</strong> Add to database.
			</div>';
		if($dia != ''){
			$sqlHistory = "INSERT INTO `history`(`past`, `present`, `medical`, `family`, `id`) VALUES 
					('','".$dia."','','','$id')";
			$sqlHistoryCheck = mysql_query($sqlHistory);
		}
	} else {
		echo "<br>Can't add to db<br>";
	}
}else {
	echo "error in addvitit";
}




?>