<?php
include 'dbconfig.php';
$id = $_GET ['id'];
$comment = $_GET ['comment'];
$type = $_GET ['type'];

//echo $id . " " . $comment;

// check twoice

// one for if the id is exisist
// second if the comment not empty
// in both cases will not save in db

if (empty ( $id ) && $comment == '') {
	echo "<h3 class='text-center'> Please Enter ID of the patient and your Comment</h3>";
} elseif (! (is_numeric ( $id ))) {
	echo "<h3> Please enter number not string </h3>";
} else {
	$sql = "SELECT `fn`, `ln`, `age`, `type`, `phone` FROM `patient` WHERE `id` = $id";
	$sqlCheck = mysql_query ( $sql );
	$studentArray = array ();
	$studentArray [0] = '';
	if (isset ( $sqlCheck )) {
		
		while ($row = mysql_fetch_row( $sqlCheck )) {
			// check if the id not repeated more than one ****
			$studentArray [0] = $row [0];
			$studentArray [1] = $row [1];
			$studentArray [2] = $row [2];
			$studentArray [3] = $row [3];
			$studentArray [4] = $row [4];
		}
		if($studentArray [0] == ''){
			echo "<h3 class='text-center' style='color:red'>ID Not Found</h3>";
		}else {
			$sqlTODB = "INSERT INTO `reports`(`id`, `comment`, `type`) 
			VALUES('$id','$comment','$type')";
			$sqlTODBCheck =mysql_query ( $sqlTODB );
			if (isset ( $sqlTODBCheck )) {
				echo "<h3 class='text-center' style='color:green'>Report is Saved</h3>";
			}
		}
	} else {
		 echo "ID Doesn't Match";
	}
}
?>