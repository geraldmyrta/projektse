<?php 
//
include('css/staf.css');
require_once('../../auth.php');
require_once('../../config.php');
?>

<html>
<head>
	<script src="../../jquery-1.3.2.min.js"></script>
<script language = "javascript">

function isKey(evt) {

var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode>31 && (charCode <48 || charCode> 57))
return false;

return true;

}

</script>
<script >
	$(function(){
	$("#save").bind('click', function(){
	
		document.getElementById('save').style.background='#F26522';
		
		if(( $("#emri").val() == "") || ( $("#mbiemri").val() == "") || ( $("#Email").val() == "") || ( $("#Adresa_1").val() == "") ||
				( $("#perdoruesi").val() == "") || ( $("#password").val() == "") || ( $("#Data_Regjistrimit").val() == "") ||
				( $("#Data_Skadimit").val() == ""))
			{
				alert("Ju duhet te plotesoni te gjitha fushat me *.");				
				
			}
		else
			{
				$.ajax({
				url: 'admin/students/actions/student_actions.php',
				type: 'post',
				data: { "action": "CHECKUSERNAME",
						"username": $("#perdoruesi").val(),
				
				},
				success: function(response) { 

							if(response == 0)

							{
								alert ("Ekziston nje perdorues me kete username!!");
							} 
							
							else
							{

								$.ajax({
										url: 'admin/students/actions/student_actions.php',
										type: 'post',
										data: { "action": "INSERT",
												"emri": $("#emri").val(),
												"mbiemri" : $("#mbiemri").val(),
												"Vendlindja" : $("#Vendlindja").val(),
												"Email" : $("#Email").val(),
												"Adresa_1" : $("#Adresa_1").val(),
												"Adresa_2" : $("#Adresa_2").val(),
												"Datelindja" : $("#Datelindja").val(),
												"Nr_Tel" : $("#Nr_Tel").val(),
												"username": $("#perdoruesi").val(),
												"password": $("#password").val(),
												"level": "staf",
												"data_regj": $("#Data_Regjistrimit").val(),
												"data_skad": $("#Data_Skadimit").val()										
										
										},
										success: function(pergjigje)
											{ 

											if(pergjigje == 1)
												{
													alert ("Perdoruesi u shtua me sukses");
													$('.profile_field').attr("value", "");
												} 
											else
												{
													alert ("Kini problem ne shtimin e perdoruersit");
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

</head>

	<body>

		<div class="button_container" >
		<button id="save" class="buttons" >Shto Staf</button>

		</div> 

		<table class = "table_style">
			<tr>
				<td class = "label_field"> Emri *</td>

				<td><input id="emri" name= "name" class = "profile_field" type ="text" />

			</tr>
				<tr>
				<td class = "label_field"> Mbiemri *</td>
				<td><input id="mbiemri" class = "profile_field" type ="text"/> </td>
			</tr>

			<tr>
				<td class = "label_field"> Perdoruesi *</td>
				<td><input id="perdoruesi" class = "profile_field" type ="text" /> </td>
			</tr>

			<tr>
				<td class = "label_field"> Fjalekalimi *</td>
				<td><input id="password" class = "profile_field" type ="text" /> </td>
			</tr>

			<tr>
				<td class = "label_field"> Vendlindja</td>
				<td><input id="Vendlindja" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Email *</td>
				<td><input id="Email" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Nr. Tel</td>
				<td><input id="Nr_Tel" onkeypress = "return isKey(Event)" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 1*</td>
				<td><input id="Adresa_1" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 2</td>
				<td><input id="Adresa_2" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Datelindja</td>
				<td><input id="Datelindja" class = "profile_field" type ="date" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Data e Regjistrimit *</td>
				<td><input id="Data_Regjistrimit" class = "profile_field" type ="date" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Data e Mbarimit *</td>
				<td><input id="Data_Skadimit" class = "profile_field" type ="date" /> </td>
			</tr>
			
		</table>

		<span id = "result" > 
		</span>



	</body>
</html>