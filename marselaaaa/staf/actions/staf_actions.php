<?php
//
require_once('../../../auth.php');
require_once('../../../config.php');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(!$link) {
	die('Nuk mund te lidhet me serverin:' . mysql_error());
}

$db = mysqli_select_db(DB_DATABASE);

if(!$db) {
	die("Nuk mund te aksesohet databaza" . mysql_error());
}


if (isset ($_POST["action"]))
{
	if ($_POST["action"] == "CHECKUSERNAME") {
		echo checkUsername($link,$_POST['username']);	
	}
	else{
	if ($_POST["action"] == "INSERT") {
		echo insertUser($link);	
	}}
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}

function checkUsername($link,$username){
	if( $result = mysqli_query($link,"SELECT * FROM perdoruesi 	WHERE username= '{$username}'"))
		{
		if (mysqli_num_rows($result) > 0)
			return 0;		
		else
			return 1;
	
		}
}

function insertUser($link){
	$emri = $_POST['emri'];
	$mbiemri =$_POST['mbiemri'];
	$Vendlindja =$_POST['Vendlindja'];
	$Email =$_POST['Email'];
	$Nr_Tel =$_POST['Nr_Tel'];
	$Adresa_1 =$_POST['Adresa_1'];
	$Adresa_2 =$_POST['Adresa_2'];
	$username =$_POST['username'];
	$password =$_POST['password'];
	$Datelindja =$_POST['Datelindja']; 
	$level =$_POST['level'];
	$data_regj =$_POST['data_regj'];
	$data_skad =$_POST['data_skad'];
	

	
	if(mysqli_query($link,"INSERT INTO perdoruesi (emri,mbiemri,vendlindja,email,nrtel,adresa_1,adresa_2,username,passw,datelindja,niveli,data_regjistrimit,data_skadimit) VALUES 
	('$emri','$mbiemri','$Vendlindja','$Email' ,'$Nr_Tel','$Adresa_1' ,'$Adresa_2' ,'$username' ,'$password','$Datelindja' ,'$level' ,'$data_regj' ,'$data_skad ')"))

{
		return 1;}
	else
	{	return 0;}
}
?>  