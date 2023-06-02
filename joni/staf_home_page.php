<?php include('css/style.css');
require_once('auth.php');//?>

<html>

	<head>
		<title> Staf Panel</title>
			
		
		<script src="jquery-1.3.2.min.js"></script>
		<script type = "text/javascript" >
			document.getElementById('logout').style.visibility = 'visible';
			
		</script>
		
		<script type="text/javascript">
		
		$(document).ready(function (){
		
			$('#computing_area_id').load("staf/students/all_students.php");
		});
		
		</script>
		
		<script type="text/javascript">
		
		$(document).ready(function (){
			$("#stud").click(function (e)
            {
				
			$('#computing_area_id').load("staf/students/all_students.php");
		
			})

		});
		
    </script>
	
	
	</script>
		
		<script type="text/javascript">
		
		$(document).ready(function (){
			$("#book").click(function (e)
            {
				
			$('#computing_area_id').load("staf/books/all_books.php");
		
			})

		});
		
    </script>
		
		
		
	</head>

	<body bgcolor = "#F0F0F0">
	
	<div class = "admin_bar" >
	<a class="logout" href= "logout.php"> Dilni</a>
	<a class= "profile" href = "profile/profile.php" >  
		<?php
			echo $_SESSION['SESS_EMRI']." ".$_SESSION['SESS_MBIEMRI'];
			
?>
	</a>	
	</div>
	<div class = "icon_space" > <img src = "images/thenie.gif"/></div>
	
	<div style="text-align:center" class= "table_space" >	 
		<table  align="center" border = "0" >			
			<tr>
				<td>			
					  <input  id = "stud" class="buton1" type = "button" value= "Studentet" />			
				</td>			
				<td>
						<input  id = "book" class = "buton1" type = "button" value= "Librat" />
				</td> 
			</tr>
		</table>
	  
	</div>

		<div id = "computing_area_id" class = "computing_area" > 
		</div>
		
		

	<div id="action_area" class="actions"><img  src = "images/actions.jpg" ></img></div>
	
	

	<script type="text/javascript" src="profile/js/nav.js" ></script> 
	


	</body>
</html>
