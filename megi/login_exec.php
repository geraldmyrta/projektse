<?php
	//
	session_start();
	extract($_POST);
	require_once('config.php');
	
	$errmsg_arr = array();
	
	$errflag = false;
	
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error().);
	}
	
	
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysqli_error().);
	}
	
	function clean($link, $str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link, $str);
	}
	
	
	$login = clean($link, $_POST['username']);
	$password = clean($link, $_POST['password']);
	
	if($login == '') {
		$errmsg_arr[] = 1;
		$errflag = true;
	}
	
	if($password == '') {
		$errmsg_arr[] = 2;
		$errflag = true;
	}
	
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
	
	
	$qry="SELECT * FROM perdoruesi WHERE username='$login' AND passw='$password'";
	$result=mysqli_query($link, $qry);
	if($result) {
		
		if(mysqli_num_rows($result) == 1 ) {
			$row = mysqli_fetch_array($result);		
			$niveli = $row["niveli"];
			
			$_SESSION['SESS_MEMBER_ID'] = $row['id'];				//keto session mbahen kur duam ti therrasim variablat nga nje file tjeter php
			$_SESSION['SESS_FIRST_NAME'] = $row['username'];
			$_SESSION['SESS_PASSW'] = $row['passw'];
			$_SESSION['SESS_EMRI'] = $row['emri'];
			$_SESSION['SESS_MBIEMRI'] = $row['mbiemri'];			
				
			if ($niveli == "admin"){
			
			session_write_close();
			header("location: admin_home_page.php");
			exit(); }
			
			if ( $niveli == "staf"){		
			session_write_close();
		    header("location: staf_home_page.php");
			exit(); }
			
			if ($niveli == "student"){
			session_write_close();
			header("location: student_home_page.php");
			exit(); 
			}
			
			
		}
		else {
		
			header("location: login.php");
			exit();
		}
		}
	else {
		
			header("location: login.php");
			exit();
		}
?>