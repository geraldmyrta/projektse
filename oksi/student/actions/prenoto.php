<?php
//
require_once('../../auth.php');
require_once('../../config.php');

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
if($_POST['action']=="PRENOTO"){
echo shtoPrenotim($link,$_POST['id_book']);
}
}
else{
		echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	}

	
	
	
function checkRezervedBook($link,$id){
	$id_perdoruesi = $_SESSION['SESS_MEMBER_ID'];
	
	if( $result = mysqli_query($link,"SELECT * FROM huazo
		
		WHERE statusi= 'r' AND id_libri = $id AND id_perdoruesi = $id_perdoruesi " ))
			{
			if (mysqli_num_rows($result) > 0)
				return 1;		
			else
				return 0;
		
			}
}

function checkTakenBook($link,$id){
	$id_perdoruesi = $_SESSION['SESS_MEMBER_ID'];
	
	if( $result = mysqli_query($link,"SELECT * FROM huazo
		
		WHERE statusi= 'm' AND id_libri = $id AND id_perdoruesi = $id_perdoruesi " ))
			{
			if (mysqli_num_rows($result) > 0)
				return 1;		
			else
				return 0;
		
			}
}	
	

function shtoPrenotim($link,$id){

	$id_perdoruesi = $_SESSION['SESS_MEMBER_ID'];
	$id_libri = $id;
	$data_aktuale = date("Ymd");
	
	$status_rezervuar = checkRezervedBook($link,$id_libri);
	
	$status_marre = checkTakenBook($link,$id_libri);
 
	
	if( ($status_rezervuar == 0) && ($status_marre==0))
	
		{
	
				if(mysqli_query($link,"INSERT INTO prenoto VALUES ($id_perdoruesi,$id_libri,$data_aktuale)"))
				{
					return "Prenotimi u krye me sukse! Jini ne pritje te lajmerimit!";}
				else
				{	return " Pati nje problem gjate prenotimit tuaj!";}
				
				
	
	}
	
	else
	
	{
		return "Ju nuk mund ta prenotoni kete liber,pasi e keni rezervuar ate!";
	}
}


?>