<?php
include 'dbconfig.php';
$id = $_REQUEST ['id'];
$Past = $_REQUEST ['pastHistory'];
$Medical = $_REQUEST ['Medical'];
$Family = $_REQUEST ['Family'];

// echo $id."<br>";
// echo $Past."<br>";
// echo $Medical."<br>";
// echo $Family."<br>";


if ($id != '') {
	$sql = "INSERT INTO `history`(`past`, `present`, `medical`, `family`, `id`) VALUES
					('".$Past."','','".$Medical."','".$Family."','$id')";
	// 	echo $sql;
	$sqlCheck = mysql_query($sql);
	// 	echo $sqlCheck;
	if ($sqlCheck) {
		echo '<div class="alert alert-success">
  				<strong>Success!</strong> Add to database.
			</div>';
	} else {
		echo "<br>Can't add to db<br>";
	}
}else {
	echo "error in addvitit";
}


?>