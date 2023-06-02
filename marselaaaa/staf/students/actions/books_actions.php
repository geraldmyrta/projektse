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
	
	if ($_POST["action"] == "TERHIQ") {
		echo terhiqLiber($link);	
	}
	if ($_POST["action"] == "KTHE") {
		echo ktheLiber($link);	
	}
	
	
	
}
else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
}


function terhiqLiber($link){

	$id_libri = $_POST['id_book'];
	$id_perdoruesi = $_POST['id_user'];
	
	if(mysqli_query($link,"UPDATE huazo 
					SET statusi = 'm'
					WHERE id_libri = $id_libri AND id_perdoruesi = $id_perdoruesi "))
	
	{
		return "Libri eshte i disponueshem per tu terhequr!";
	}
	else
	{
		return "Nuk mund ta terhiqni librin ne keto momente!";
	}
	
	

}

function ktheLiber($link){

	$id_libri = $_POST['id_book'];
	$id_perdoruesi = $_POST['id_user'];
	
	if(mysqli_query($link,"UPDATE huazo 
					SET statusi = 'k'
					WHERE id_libri = $id_libri AND id_perdoruesi = $id_perdoruesi "))
	
	{
		if(mysqli_query($link," UPDATE libri set sasia_aktuale = sasia_aktuale + 1 WHERE id = $id_libri  "  ))
		return "Statusi juaj u rifreskua!";
	}
	else
	{
		return "Pati nje problem ne rifreskimin e gjendjes se librit! Ju lutem provojeni me vone!!";
	}
	

}

?>