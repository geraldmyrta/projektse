<?php
	//
	session_start();
	extract($_POST);
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bibloteka</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />


</head>
<body >
<?php

	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) { ?>
		<script type="text/javascript">
		window.alert("Kujdes, nuk ke plotesuar nje nga fushat e meposhteme. Provoni te logoheni perseri ose kontaktoni administratorin e faqes.");
		</script>
		<?php
		unset($_SESSION['ERRMSG_ARR']);
	}


?>
<form id="loginForm" name="loginForm" method="post" action="login_exec.php">
  <div class="mbajtese">
 
    <p class = "label"> Emri i Perdoruesit </p>
    <input class = "user" id="usr" type="text" name="username" />
	<p class = "label">Fjalekalimi</p>
    <input class = "user" type="password" name="password" />
	<input class = "buton" type="submit" value="Log In" />

  </div>
  
  
</form>

</body>
</html>
