<?php 
//
include('css/all_book.css');
//require_once('../../auth.php');
require_once('../../config.php');

$col_id_libri = 'id_libri';
$col_id_perdoruesi = 'id_perdoruesi';
$col_id_statusi = 'statusi';


$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}


  $query_status = "SELECT * FROM huazo WHERE statusi='m' OR statusi='r' LIMIT 0,10";
  $result_conf = mysqli_query($link, $query_status);
  if(!$result_conf){
  echo('Gabim ne te dhena: ' . $mysql_error());
  exit();}
  
  
  
?>

<html>
	 <head>
	 
	 <script src="../../plugin/lib/jquery-1.7.0.js"></script>
		<script src="../../plugin/jquery.confirmon.js"></script> 
	
        <link rel="stylesheet" type="text/css" href="../../plugin/jquery.confirmon.css"/>
		
		
	<script type="text/javascript">
		
	   $(document).ready(function ()
        {
            $(".btn_terhiq").click(function (e)
            {
				var libri_id = $(this).attr('id');	
				var perdoruesi_id = $(this).attr('xml:id');
				
				
				$.ajax({
										url: 'staf/students/actions/books_actions.php',
										type: 'POST',
									
										data: { "action" : "TERHIQ",
												"id_book":libri_id,
												"id_user":perdoruesi_id
										
										},

										success: function(response)
											{ 
											
											alert(response);
											location.reload(true);
							
											}
											});
									})
									}); 
									
	</script>
		
	<script type="text/javascript">
		
	   $(document).ready(function ()
        {
            $(".btn_kthe").click(function (e)
            {
				var libri_id = $(this).attr('id');	
				var perdoruesi_id = $(this).attr('xml:id');
				
				
				$.ajax({
										url: 'staf/students/actions/books_actions.php',
										type: 'POST',
									
										data: { "action" : "KTHE",
												"id_book":libri_id,
												"id_user":perdoruesi_id
										
										},

										success: function(response)
											{ 
											
											alert(response);
											location.reload(true);
							
											}
											});
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
			
			
			$('#computing_area_id').load("staf/students/search_student.php?search="+search);
		
			}
			
			$('.search_box1').attr("value", " ");
			})
			});
	
	</script>

	<script src="../../jquery-1.3.2.min.js"></script>
</head>
 <body>
	 <input type="text" class = "search_box1" id="search_input" placeholder="kerko per studentin..."  />
	 <input id = "search" class="search_button" type="button" value = "" />
 <?php 
	 while($row = mysqli_fetch_array($result_conf))
	 {
			
	 $id_libri = $row[$col_id_libri];
	 $id_perdoruesi =$row[$col_id_perdoruesi];
	 $statusi = $row[$col_id_statusi];
	 
	 if($statusi != 'k'){
	 
	 $query_student = "SELECT * FROM perdoruesi WHERE id = $id_perdoruesi ";
	 $result_student = mysqli_query($link, $query_student);
	 if(!$result_student)
		{echo('Gabim ne te dhena: ' . $mysql_error());
		exit();}
	  
	 $student = mysqli_fetch_array($result_student);
	
	 $full_name = $student['emri']." ".$student['mbiemri']." (".$student['email'].")";

	 $query_libri = "SELECT * FROM libri WHERE id = $id_libri ";
	 $result_libri = mysqli_query($link, $query_libri);
	 if(!$result_libri)
		{echo('Gabim ne te dhena: ' . $mysql_error());
			exit();
			}
	  
	  $libri = mysqli_fetch_array($result_libri);
	  $full_tittle = $libri['titulli'];
	  $autoret = $libri['autoret'];



	  echo "<div  class = 'box_area' >
				<table align = 'center'  class = 'table_style'>
					<tr> 
						<td colspan = '5' class = 'elements' >$full_name</td>
					</tr>
		
					<tr>
						<td colspan = '5' class = 'elements' >$full_tittle</td>
					</tr>
					
					<tr>
						<td colspan = '5' class = 'elements' >$autoret</td>
					</tr>

					<tr>
						<td  width = '60%' ></td>
						";
						if( $statusi == 'r')
						echo "

								<td > <input class = 'btn_terhiq' type = 'button' id ='$id_libri'  xml:id = '$id_perdoruesi'   value = 'Terhiq'/></td>
							";
						if( $statusi == 'm')
						echo "
							
							
								<td> <input class = 'btn_kthe' type = 'button' id ='$id_libri'  xml:id = '$id_perdoruesi' value = 'Kthe Liber'/></td>
							
						
						     ";
				echo	"</tr>
				</table>
			</div>";
			
		}	
		
	 }
	 
 
 
 ?>

	</body>
</html>