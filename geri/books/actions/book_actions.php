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
	if ($_POST["action"] == "CHECKBOOK") {
		echo checkBook($link,$_POST['isbn']);	
	}
	else{
	if ($_POST["action"] == "INSERTBOOK") {
		echo insertBook($link);	
	}}
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}

function checkBook($link,$isbn){

 
   if( $result = mysqli_query($link,"SELECT * FROM libri WHERE isbn= '{$isbn}'"))
		{
		if (mysqli_num_rows($result) > 0)
			return 0;		
		else
			return 1;
	
		}
	
}

function insertBook($link){
	$titulli = $_POST['titulli'];
	$cmimi =$_POST['cmimi'];
	$botimi =$_POST['botimi'];
	$pershkrimi =$_POST['pershkrimi'];
	$sasia_inventar =$_POST['sasia_inventar'];
	$isbn =$_POST['isbn'];
	$viti_publikimit =$_POST['viti_publikimit'];
	$autoret =$_POST['autoret'];
	$shtepia_botuese =$_POST['shtepia_botuese'];
	$kategoria =$_POST['kategoria']; 
	
 
	
	if(mysqli_query($link,"INSERT INTO libri(titulli,cmimi,botimi,pershkrimi,sasia_inventar,sasia_aktuale,isbn,viti_publikimit,autoret,kategoria,shtepia_botuese)
					VALUES('$titulli',$cmimi,'$botimi','$pershkrimi' ,$sasia_inventar,$sasia_inventar,'$isbn' ,$viti_publikimit,'$autoret' ,$kategoria,$shtepia_botuese)"))
{
		return 1;
		
	}
	else
	return mysql_error();
}


?>  