<?php include('css/style.css');
require_once('auth.php');
//
?>

<html>

	<head>
		<title> Admin Panel</title>
		
		<script type = "text/javascript" >
			document.getElementById('logout').style.visibility = 'visible';
			
		</script>
		
		<script type="text/javascript">
		
		$(document).ready(function (){
		
			$('#computing_area_id').load("admin/students/all_students.php");
		});
		
		</script>
	</head>

	<body bgcolor = "#f0f0f0">

	<div class = "admin_bar" >
	<a class="logout" href= "logout.php"> Dilni</a>
	<a class= "profile" href = "profile/profile.php" >  
		<?php
			echo $_SESSION['SESS_EMRI']." ".$_SESSION['SESS_MBIEMRI'];
			
?>
	</a>	
	</div>
	
	<div class = "icon_space" ><img src = "images/thenie.gif"/></div>
	
	<div style="text-align:center" class= "table_space" >	 
		<table  align="center" border = "0" >			
			<tr>
				<td>
					<form class="click" action="admin/students/student_panel.php" >
					  <input class="buton1" type = "submit" value= "Studentet" />
					</form> 
				</td>
				
				<td>
					<form class="click" action="admin/books/book_panel.php">
						<input class = "buton1" type = "submit" value= "Librat" />
					</form>
				</td>
				
				<td>
					<form class="click" action="admin/staf/staf_panel.php">
						<input class = "buton1" type = "submit" value= "Stafi" />
					</form>
				</td>
				
				  
			</tr>

		</table>
	  
	</div>

		<div id = "computing_area_id" class = "computing_area" > </div>
		
		

	<div id="action_area" class="actions"></div>
	<script src="jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="admin/js/nav.js"></script> 
	<script type="text/javascript" src="profile/js/nav.js"></script> 
	<script type="text/javascript" src="admin/students/js/nav.js"></script> 


	</body>
</html>
