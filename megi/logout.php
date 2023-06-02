<?php
//	
	session_start();
	
	
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_PASSW']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Dalje</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body background="red">
<p align="center">&nbsp;</p>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" >&nbsp;</h4>
<h4 align="center" class="error">Ju keni dalë nga programi!</h4>
<p align="center" class="error">Klikoni këtu për të <a href="login.php" class="enter">Hyrë</a></p>
</body>
</html>