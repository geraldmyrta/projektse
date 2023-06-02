<?php
//
require_once('../../../auth.php');
require_once('../../../config.php');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(!$link) {
	die('Nuk mund te lidhet me serverin:' . mysql_error());
}

$db = mysqli_select_db($link,DB_DATABASE);

if(!$db) {
	die("Nuk mund te aksesohet databaza" . mysql_error());
}


if (isset ($_POST["action"]))
{
	if ($_POST["action"] == "ADDCATEGORY") {
		echo insertCategory($link);	
	}

}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}


function insertCategory($link){
	$emri = $_POST['emri'];
	$parent_id =$_POST['parent_id'];
	
	if($parent_id == "TOP_CATEGORY")
		if(mysqli_query($link,"INSERT INTO kategoria (emri) VALUES ('$emri')"))
			return 1;
		else
			return 0;	
	else
		if(mysqli_query($link,"INSERT INTO kategoria (emri,kat_prind) VALUES ('$emri','$parent_id')"))
			return 1;
		else
			return 0;
	
}

?>  