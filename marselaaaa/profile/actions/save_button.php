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
			if ($_POST["action"] == "UPDATE") {
					echo update($link);
			
			}
		}
	else{
	
	echo "Veprimi nuk mund te kryhet. Ju lutem kontaktoni me WebMasterin";
	
	}
function update($link){

	
	$username = $_SESSION['SESS_FIRST_NAME'];
	
	if(mysqli_query($link,"UPDATE perdoruesi 
	
				SET emri = '{$_POST['emri']}',
					mbiemri = '{$_POST['mbiemri']}',
					vendlindja = '{$_POST['Vendlindja']}',
					email = '{$_POST['Email']}',
					nrtel = '{$_POST['Nr_Tel']}',
					adresa_1 = '{$_POST['Adresa_1']}',
					adresa_2 = '{$_POST['Adresa_2']}',
					datelindja = '{$_POST['Datelindja']}'
	
				WHERE username= '{$username}'")
		)

		{
		return "Te dhenat u modifikuan me sukses";
		}
	}

	
	?>  