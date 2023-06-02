<?php
//
require_once('../../auth.php');
require_once('../../config.php');


$id_perdoruesi = $_SESSION['SESS_MEMBER_ID'];


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
if($_POST['action']=="HUAZO"){
echo shtoHuazim($link,$_POST['id_book']);
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
	

	

function shtoHuazim($link,$id){
	$id_perdoruesi = $_SESSION['SESS_MEMBER_ID'];
	$id_libri = $id;
	$data_aktuale = date("Y/m/d");
	$data_kthimit= date('Y/m/d', strtotime("+14 days", strtotime($data_aktuale)));
	
	$status_rezervuar = checkRezervedBook($link,$id_libri);
	
	$status_marre = checkTakenBook($link,$id_libri);
	
	if( ($status_rezervuar == 0) && ($status_marre==0))
	
		{
					if(mysqli_query($link,"INSERT INTO huazo VALUES ($id_libri,$id_perdoruesi,'r',$data_aktuale, $data_kthimit)"))
								{
									if(mysqli_query($link," UPDATE libri SET sasia_aktuale = sasia_aktuale - 1   
															WHERE id = $id_libri "))
										return "Libri u rezervua per ju. Ju lutem terhiqen ne bibloteke!!";					
									else
										return "Pati nje problem ne rezervimin e librit! Ju lutem provojeni me vone perseri!";
									
								
								
								
								}
					else
								return "Pati nje problem ne rezervimin e librit! Ju lutem provojeni me vone perseri!";
		}
	else
	
	{
		return "Ju nuk mund ta rezervoni kete liber!";
	}

	
	
	
	
	
}


?>