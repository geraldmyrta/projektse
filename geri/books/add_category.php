<?php 
//
include('css/general_style.css');
require_once('../../auth.php');
require_once('../../config.php');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}

	
  $query = "SELECT * FROM kategoria ";
  $result = mysqli_query($link, $query);
  if(!$result){
  echo('Gabim ne te dhena: ' . $mysql_error());
  exit();
}
  
  // $row = mysql_fetch_array($result);	




?>

<html>
<head>
	<script src="../../jquery-1.3.2.min.js"></script>

<script >
	$(function(){
	$("#save").bind('click', function()
		{
			
			document.getElementById('save').style.background = '#F26522';	
	
			var name = document.getElementById('emri').value;			
			var parent_id = document.getElementById('category').value;
			
			if( name == "") 
				{
				alert("Vendosni nje emer per kategorine");
				}
			else{
					$.ajax({
					url: 'admin/books/actions/category_actions.php',
					type: 'post',
					data: { "action": "ADDCATEGORY",
							"emri": name,
							"parent_id": parent_id
					
					},
					success: function(response) { 
						if(response == 1)
							{
								alert ("Kategoria u shtua me sukses");
								$('.profile_field').attr("value", "");
							} 
						else
							{
								alert ("Kini problem ne shtimin e Kategorise");
							}		
								
								
					}	
					
					});
				
				}
			document.getElementById('save').style.background='#0083A9';	
		}
	

		)
		});

</script>

</head>

	<body>

	
	
	<body>

		<div class="button_container" >
		<button id="save" class="buttons" >Shto Kategori</button>

		</div> 

		<table class = "table_category_style">
			<tr>
				<td class = "label_field"> Emri </td>

				<td><input id="emri"  class = "profile_field" type ="text" />

			</tr>
			
			<tr>
				<td class = "label_field"> Kategoria Prind</td>
				<td>
					<select id = "category" class = "profile_field"  name="book" >
						<option value = "TOP_CATEGORY" select = "selected"> </option>
						<?php 
						 $col_name = 'emri';
						 $col_id = 'id';
						 while($row = mysqli_fetch_array($result))
							 {
								echo "<option value ='$row[$col_id]'> $row[$col_name] </option>";
							 }
						
						
						?>
					</select>
				</td>
			</tr>
		 </select>
			
		</tr>
					
		</table>
		

		<span id = "result" > 
		</span>



	</body>
</html>