<?php
//
require_once('../../css/style.css');

extract($_POST);



?>
<html>

 <head> 
	<title>Paneli i Librave</title>
 </head>
 
 
 
 <body >
 
   	  <p class="student_button"> <a href = "admin/books/add_category.php" class="student_button"> Shto Kategori </a> </p>
	  <p class="student_button"> <a href = "admin/books/add_publikues.php" class="student_button"> Shto Publikues </a> </p>
	  <p class="student_button"> <a href = "admin/books/add_book.php" class="student_button"> Shto Liber</a> </p>
	  <p class="student_button"> <a href = "admin/books/all_books.php" class="student_button"> Te gjithe Librat </a> </p>

	<script src="../../jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="admin/books/js/nav.js"></script> 

 </body>
 </html>