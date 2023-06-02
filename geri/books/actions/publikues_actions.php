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
	if ($_POST["action"] == "CHECKPUBLIKUESI") {
		echo checkPublishger($link,$_POST["emri"]);	
	}
	
	if ($_POST["action"] == "ADDPUBLIKUESI") {
		echo insertPublisher($link);	
	}

	
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}

function checkPublishger($link,$name){
	if( $result = mysqli_query($link,"SELECT * FROM publikuesi	WHERE emri= '{$name}'"))
		{
		if (mysql_num_rows($result) > 0)
			return 0;		
		else
			return 1;
	
		}
}

function insertPublisher($link){

	$emri = $_POST['emri'];
		
	if(mysqli_query($link,"INSERT INTO publikuesi (emri) VALUES ('$emri')"))
		return 1;
	else
		return 0;	

     	
}


?>  