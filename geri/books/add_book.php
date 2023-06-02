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
  exit();}
  
  $query_pub = "SELECT * FROM publikuesi ";
  $result_pub = mysqli_query($link, $query_pub);
  if(!$result_pub){
  echo('Gabim ne te dhena: ' . $mysql_error());
  exit();
					}
	
	
	
	
	

?>

<html>
<head>
	<script src="../../jquery-1.3.2.min.js"></script>

<script >
	$(function(){
	$("#save").bind('click', function(){
	
		document.getElementById('save').style.background='#F26522';
		
		
		if(( $("#titulli").val() == "") || ( $("#cmimi").val() == "") || ( $("#botimi").val() == "") || ( $("#pershkrimi").val() == "") ||
				( $("#sasia_inventar").val() == "") || ( $("#isbn").val() == "") || ( $("#viti_publikimit").val() == "") ||
				( $("#autoret").val() == "")|| ( $("#shtepia_botuese").val() == "") || ( $("#kategoria").val() == "") )
			{
				alert("Ju duhet te plotesoni te gjitha fushat me *.");				
				
			}
		else
			{
				$.ajax({
				url: 'admin/books/actions/book_actions.php',
				type: 'post',
				data: { "action": "CHECKBOOK",
						"isbn": $("#isbn").val(),
				
				},
				success: function(response) { 
							
							if(response == 0)
			
							{
								alert ("Ekziston nje liber me kete isbn!!");
							} 
							
							else
							{

								$.ajax({
										url: 'admin/books/actions/book_actions.php',
										type: 'post',
										data: { "action": "INSERTBOOK",
												"titulli": $("#titulli").val(),
												"cmimi" : $("#cmimi").val(),
												"botimi" : $("#botimi").val(),
												"pershkrimi" : $("#pershkrimi").val(),
												"sasia_inventar" : $("#sasia_inventar").val(),
												"isbn" : $("#isbn").val(),
												"viti_publikimit" : $("#viti_publikimit").val(),
												"autoret" : $("#autoret").val(),
												"shtepia_botuese": $("#shtepia_botuese").val(),
												"kategoria": $("#kategoria").val()									
										
										},
										success: function(pergjigje)

											{ 
											if(pergjigje == 1)
												{
													alert ("Libri u shtua me sukses");
													$('.profile_field').attr("value", "");
												} 
											else
												{
													alert (pergjigje);
												}
											
											
											}
									});
							}

				}
				
				
				});
			
			
			
			}
		document.getElementById('save').style.background='#0083A9';

		})
		});

</script>

<script language = "javascript">

function isKey(evt) {

var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode>31 && (charCode <48 || charCode> 57))
return false;

return true;

}

</script>

</head>

	<body>

		<div class="button_container" >
		<button id="save" class="buttons" >Shto Liber</button>

		</div> 

		<table class = "table_style">
			<tr>
				<td class = "label_field"> Titulli *</td>

				<td><input id="titulli" name= "name" class = "profile_field" type ="text" />

			</tr>
			
			<tr>
				<td class = "label_field"> Autoret *</td>
				<td><input id="autoret" class = "profile_field" type ="text"/> </td>
			</tr>

			<tr>
				<td class = "label_field"> Kategoria *</td>
				<td>
					<select id="kategoria" class = "profile_field" type ="text" > 
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

			<tr>
				<td class = "label_field"> Botimi *</td>
				<td><input id="botimi" onkeypress = "return isKey(Event)"  class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Sasia Inventar *</td>
				<td><input id="sasia_inventar" onkeypress = "return isKey(Event)" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> ISBN *</td>
				<td><input id="isbn" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Viti Publikimit</td>
				<td><input id="viti_publikimit" onkeypress = "return isKey(Event)" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Cmimi *</td>
				<td><input id="cmimi" onkeypress = "return isKey(Event)"  class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Shtepia Botuese *</td>
				<td>
					<select id="shtepia_botuese" class = "profile_field" type ="text" > 
					  <?php	
					     $col_name = 'emri';
						 $col_id = 'id';
						 while($row = mysqli_fetch_array($result_pub))
							 {
								echo "<option value ='$row[$col_id]'> $row[$col_name] </option>";
							 }
					  ?>
					</select></td>
			</tr>
			
			<tr>
				<td  class = "label_field"> Pershkrimi *</td>
					<td><textarea  id="pershkrimi" class = "profile_field"  rows="4" cols="10"> 
				
					</textarea></td>
			</tr>
				
		</table>

		<span id = "result" > </span>



	</body>
</html>