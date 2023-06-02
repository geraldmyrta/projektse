<?php 
//
include('css/style.css');
require_once('auth.php');


require_once('config.php');



$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}
?>

<html>

	<head>
		<title> Student</title>
		
		<script src="student/js/jquery-1.3.2.min.js"></script>
		<script src="jquery-1.3.2.min.js"></script>
			<script type = "text/javascript" >
			document.getElementById('logout').style.visibility = 'visible';
			
			</script>
			

	<script type="text/javascript">
		
		$(document).ready(function (){
         $('#computing_area_id').load('student/books/all_books.php');
		});
		
    </script>
	
	<script type="text/javascript">
		$(document).ready(function ()
        {	
            $("#all_students").click(function (e)
            { 
			location.reload();
			})
			});
		
    </script>
	
	<script type="text/javascript">
	
	 $(document).ready(function ()
        {	
            $("#search").click(function (e)
            {
		
			
			var search = $('#search_input').val();
			
			if( search == "")
			{
			}
			else{
			
			
			$('#computing_area_id').load("student/books/search_book.php?search="+search);
		
			}
			
			$('.search_box').attr("value", " ");
			})
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
	
	<div class = "icon_space" > <img src = "images/thenie.gif"/></div>
	
	<div class = "table_space" >	 
	  
	  <form class = "search_zone_container">
		<input type="text" class = "search_box" id="search_input" placeholder="qindra libra po presin per ju..."  />
	    <input id = "search" class="search_button" type="button" value = "" />
		
	  </form>
	    <button id="all_students" class = "all_students" value=""> Te Gjithe</button>
	 
	
	</div>

	<div id = "computing_area_id" class = "computing_area" > </div>

	<div id = "action_area" class = "actions" ><img  src = "images/actions.jpg" ></img></div>
	
	
	
	<script type="text/javascript" src="profile/js/nav.js" ></script> 
	

	</body>
</html>
