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
	
	if ($_POST["action"] == "SELECT") {
		echo selectUser($link,$_POST['id']);	
	}
	if ($_POST["action"] == "DELETE") {
		echo deleteUser($link,$_POST['id']);	
	}
	
	if ($_POST["action"] == "UPDATE") {
		echo updateUser($link,$_POST['id']);	
	}
	
	
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}

function checkUsername($link,$username){
	if( $result = mysqli_query($link,"SELECT * FROM perdoruesi WHERE username= '{$username}'"))
		{
		if (mysqli_num_rows($result) > 0)
			return 0;		
		else
			return 1;
	
		}
}

function deleteUser($link,$id){
$data=$id;

if(mysqli_query($link," DELETE FROM perdoruesi WHERE id = $data"))
 if(mysqli_query($link,"DELETE FROM huazo WHERE id_perdoruesi = $data"))
   if(mysqli_query($link,"DELETE FROM prenoto WHERE id_perdoruesi = $data"))
	return 1;
else
	return 0;
}

function selectUser($link,$id){
	if( $result = mysqli_query($link,"SELECT * FROM perdoruesi WHERE id=$id"))
		{
		if (mysqli_num_rows($result) > 0){
		
			$row = mysqli_fetch_array($result);
		
			$col_name = 'emri';
			$col_mbiemri = 'mbiemri';
			$col_email = 'email';
			$col_id = 'id';
			$col_vendlindja = 'vendlindja';
			$col_nrtel = 'nrtel';
			$col_adresa_1 = 'adresa_1';
			$col_adresa_2 = 'adresa_2';
			$col_datelindja = 'datelindja';
			$col_data_regjistrimit = 'data_regjistrimit';
			$col_data_skadimit = 'data_skadimit';
			
			$data=array(
			
			'emri'=>$row[$col_name],
			'mbiemri'=>$row[$col_mbiemri],
			'vendlindja' => $row[$col_vendlindja],
			'email' => $row[$col_email],
			'nrtel' => $row[$col_nrtel],
			'adresa_1' => $row[$col_adresa_1],
			'adresa_2' => $row[$col_adresa_2],
			'datelindja' => $row[$col_datelindja],
			'data_regjistrimit' => $row[$col_data_regjistrimit],
			'data_skadimit' => $row[$col_data_skadimit]
			);	
			
			$datas[] = $data;
			
			return  json_encode($datas);
			
			}	
		else
			return 0;
	
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

function updateUser($link,$id){
    $emri = $_POST['emri'];
	$mbiemri =$_POST['mbiemri'];
	$Vendlindja =$_POST['Vendlindja'];
	$Email =$_POST['Email'];
	$Nr_Tel =$_POST['Nr_Tel'];
	$Adresa_1 =$_POST['Adresa_1'];
	$Adresa_2 =$_POST['Adresa_2'];
	
if(mysqli_query($link," UPDATE perdoruesi SET
 emri='$emri', 
 mbiemri='$mbiemri' ,
 vendlindja='$Vendlindja',
 email='$Email ',
 nrtel='$Nr_Tel',
 adresa_1='$Adresa_1' ,
 adresa_2='$Adresa_2' 
 
 WHERE id  = $id"))
		return 1;
	else
		return 0;
}
?>  