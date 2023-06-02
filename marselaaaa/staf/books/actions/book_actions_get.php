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
		echo selectBook($link,$_POST['id']);	
	}
	if ($_POST["action"] == "DELETE") {
		echo deleteBook($link,$_POST['id']);	
	}
	if ($_POST["action"] == "UPDATE") {
		echo updateBook($link,$_POST['id']);	
	}
	
	
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}

function checkBook($link,$isbn){
	if( $result = mysqli_query($link,"SELECT * FROM libri	WHERE isbn= '{$isbn}'"))
		{
		if (mysqli_num_rows($result) > 0)
			return 0;		
		else
			return 1;
	
		}
}


function getKat($link,$id){

	if( $result = mysqli_query($link,"SELECT * FROM kategoria WHERE id= $id"))
		{
			if (mysqli_num_rows($result) > 0){
			
				$row = mysqli_fetch_array($result);
				$kategoria = $row['emri'];
				return $kategoria;
			}

		}
  return " ";
}


function getPub($link,$id){

	if( $result = mysqli_query($link,"SELECT * FROM publikuesi WHERE id= $id"))
		{
			if (mysqli_num_rows($result) > 0){
			
				$row = mysqli_fetch_array($result);
				$publikuesi = $row['emri'];
				return $publikuesi;
			}

		}
  return " ";
}

function selectBook($link,$id){
	if( $result = mysqli_query($link,"SELECT * FROM libri WHERE id=$id"))
		{
		if (mysqli_num_rows($result) > 0){
		
			$row = mysqli_fetch_array($result);
		
			$col_titulli = 'titulli';
			$col_autoret = 'autoret';
			$col_cmimi = 'cmimi';
			$col_botimi = 'botimi';
			$col_pershkrimi = 'pershkrimi';
			$col_sasia_inventar = 'sasia_inventar';
			$col_sasia_aktuale = 'sasia_aktuale';
			$col_isbn = 'isbn';
			$col_viti_publikimit = 'viti_publikimit';
			$col_shtepia_botuese = 'shtepia_botuese';
			$col_kategoria = 'kategoria';
			
			$col_emri = 'emri';
			
			$kategoria_id = $row[$col_kategoria];
			$publikuesi_id = $row[$col_shtepia_botuese];
			$publikuesi = getPub($link,$publikuesi_id);
			$kategoria = getKat($link,$kategoria_id);
			
			
			
			
			$data=array(
			
			'titulli'=>$row[$col_titulli],
			'autoret'=>$row[$col_autoret],
			'cmimi' => $row[$col_cmimi],
			'botimi' => $row[$col_botimi],
			'pershkrimi' => $row[$col_pershkrimi],
			'sasia_inventar' => $row[$col_sasia_inventar],
			'sasia_aktuale' => $row[$col_sasia_aktuale],
			'isbn' => $row[$col_isbn],
			'viti_publikimit' => $row[$col_viti_publikimit],
			'shtepia_botuese' => $publikuesi,
			'kategoria' => $kategoria
			);	
			
			$datas[] = $data;
			
			return  json_encode($datas);
			
			}	
		else
			return 0;
	
		}
}

function deleteBook($link,$id){
if(mysqli_query($link," DELETE FROM libri WHERE id  = $id"))
		return 1;
	else
		return 0;
}

function insertBook($link){
	$titulli = $_POST['titulli'];
	$autoret =$_POST['autoret'];
	$cmimi =$_POST['cmimi'];
	$botimi =$_POST['botimi'];
	$pershkrimi =$_POST['pershkrimi'];
	$sasia_inventar =$_POST['sasia_inventar'];
	$sasia_aktuale =$_POST['sasia_aktuale'];
	$isbn =$_POST['isbn'];
	$viti_publikimit =$_POST['viti_publikimit'];
	$shtepia_botuese =$_POST['shtepia_botuese']; 
	$kategoria =$_POST['kategoria'];
	
	
 
	
	if(mysqli_query($link,"INSERT INTO perdoruesi (titulli,autoret,cmimi,botimi,pershkrimi,sasia_inventar,sasia_aktuale,isbn,viti_publikimit,shtepia_botuese,kategoria) VALUES 
	('$titulli','$autoret','$cmimi','$botimi' ,'$pershkrimi','$sasia_inventar','$sasia_aktuale' ,'$isbn' ,'$viti_publikimit','$shtepia_botuese' ,'$kategoria' )"))

{
		return 1;}
	else
	{	return 0;}
}



function updateBook($link,$id){
   $titulli = $_POST['titulli'];
	$autoret =$_POST['autoret'];
	$cmimi =$_POST['cmimi'];
	$botimi =$_POST['botimi'];
	$pershkrimi =$_POST['pershkrimi'];
	
	$viti_publikimit =$_POST['viti_publikimit'];
	
if(mysqli_query($link," UPDATE libri SET
 titulli='$titulli', 
 autoret='$autoret' ,
 cmimi='$cmimi',
 botimi='$botimi ',
 pershkrimi='$pershkrimi',
 viti_publikimit='$viti_publikimit' 

 
 WHERE id  = $id"))
		return 1;
	else
		return 0;
}
?>  