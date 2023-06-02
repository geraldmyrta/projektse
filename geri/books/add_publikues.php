<?php 
//
include('css/general_style.css');
require_once('../../auth.php');
require_once('../../config.php');
?>

<html>
<head>
	<script src="../../jquery-1.3.2.min.js"></script>

<script >
	$(function(){
	$("#save").bind('click', function(){
	
		document.getElementById('save').style.background='#F26522';
		
		var emri = document.getElementById('emri').value;
		
		if( emri == "") 
		{
			alert("Plotesoni emrin!!");
		}
		
		else
			{
			$.ajax({
				url: 'admin/books/actions/publikues_actions.php',
				type: 'post',
				data: { "action": "CHECKPUBLIKUESI",
						"emri":emri
				
				},
				success: function(response) { 
						if(response ==0 )
						{
							alert("Ekziston nje publikues me kete emer!!");
						}
						else
						{
							$.ajax({
							url: 'admin/books/actions/publikues_actions.php',
							type: 'post',
							data: { "action": "ADDPUBLIKUESI",
									"emri":emri
								},
								success: function(response) { 
										if(response == 1 )
										{
											alert("Publikuesi u shtua me sukses!");
											$('.profile_field').attr("value", "");
											document.getElementById('save').style.background='#0083A9';
										}
										else
										{
											alert("Kini problem ne shtimin e publikuesit!");
										}											
								}						
							});
						}							
				}			
			});
			}
			
			
		})
		});

</script>

</head>

	<body>

	
	
	<body>

		<div class="button_container" >
		<button id="save" class="buttons" >Shto Publikues</button>

		</div> 

		<table class = "table_publikuesi_style">
			<tr>
				<td class = "label_field"> Emri </td>

				<td><input id="emri" name= "name" class = "profile_field" type ="text" />

			</tr>

			
		</tr>
					
		</table>
		

		<span id = "result" > 
		</span>



	</body>
</html>