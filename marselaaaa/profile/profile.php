<?php 
//
include('css/profile.css');
require_once('../auth.php');
require_once('../config.php');
?>

<?php
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}
	
	$id = $_SESSION['SESS_MEMBER_ID'];
	
  $query = "SELECT * FROM perdoruesi WHERE id='$id'";
  $result = mysqli_query($link,$query);
  if(!$result){
  echo('Gabim ne te dhena: ' . $mysql_error());
  exit();
}
   $row = mysqli_fetch_array($result);	



?>
<html>
<head>
<script type="text/javascript">

function changeText(){
document.getElementById('save').style.background='#0083A9';
document.getElementById('modifiko').style.background='#F26522';

var emri=document.getElementById('emri');
var mbiemri=document.getElementById('mbiemri');
var Vendlindja=document.getElementById('Vendlindja');
var Nr_Tel=document.getElementById('Nr_Tel');
var Adresa_1=document.getElementById('Adresa_1');
var Adresa_2=document.getElementById('Adresa_2');
var Datelindja=document.getElementById('Datelindja');
var Email=document.getElementById('Email');

emri.removeAttribute('readonly');
mbiemri.removeAttribute('readonly');
Vendlindja.removeAttribute('readonly');
Email.removeAttribute('readonly');
Nr_Tel.removeAttribute('readonly');
Adresa_1.removeAttribute('readonly');
Adresa_2.removeAttribute('readonly');
Datelindja.removeAttribute('readonly');
}


</script>

<script language = "javascript">

function isKey(evt) {

var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode>31 && (charCode <48 || charCode> 57))
return false;

return true;

}

</script>


<script src="../jquery-1.3.2.min.js"></script>

<script  >
$(function(){
  $("#save").bind('click', function(){
		document.getElementById('save').style.background='#F26522';
		document.getElementById('modifiko').style.background='#0083A9';
		
	
	$.ajax({
		url: 'profile/actions/save_button.php',
		type: 'post',
		data: { "action" : "UPDATE",
				"emri": $("#emri").val(),
				"mbiemri" : $("#mbiemri").val(),
				"Vendlindja" : $("#Vendlindja").val(),
				"Email" : $("#Email").val(),
				"Adresa_1" : $("#Adresa_1").val(),
				"Adresa_2" : $("#Adresa_2").val(),
				"Datelindja" : $("#Datelindja").val(),
				"Nr_Tel" : $("#Nr_Tel").val()
		
		},
		success: function(response) { 
	
		$('.profile_field').attr("readonly", "readonly");
		
		
		document.getElementById('save').style.background='#0083A9';
					alert(response);	
											}
});
  })
});

</script>

</head>

<body>

 <div class="button_container" >
  <input id="modifiko" type="button" class="buttons" value="Modifiko" onclick="changeText();" />
  <button id="save" class="buttons" >Ruaj</button>
  
 </div> 

<table class = "table_style">
<tr>
	<td class = "label_field"> Emri</td>
	
	<td><input id="emri" name= "name" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['emri']); ?>" />
	
</tr>
<tr>
	<td class = "label_field"> Mbiemri</td>
	<td><input id="mbiemri" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['mbiemri']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Vendlindja</td>
	<td><input id="Vendlindja" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['vendlindja']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Email</td>
	<td><input id="Email" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['email']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Nr. Tel</td>
	<td><input id="Nr_Tel" onkeypress = "return isKey(Event)"  class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['nrtel']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Adresa 1</td>
	<td><input id="Adresa_1" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['adresa_1']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Adresa 2</td>
	<td><input id="Adresa_2" class = "profile_field" type ="text" readonly= "readonly" value="<?php echo htmlentities($row['adresa_2']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Datelindja</td>
	<td><input id="Datelindja" class = "profile_field" type ="date" readonly= "readonly" value="<?php echo htmlentities($row['datelindja']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Data e Regjistrimit</td>
	<td><input id="Data_Regjistrimit" class = "profile_field" type ="date" readonly= "readonly" value="<?php echo htmlentities($row['data_regjistrimit']); ?>"/> </td>
</tr>
<tr>
	<td class = "label_field"> Data e Mbarimit</td>
	<td><input id="Data_Skadimit" class = "profile_field" type ="date" readonly= "readonly" value="<?php echo htmlentities($row['data_skadimit']); ?>"/> </td>
</tr>
</table>



<span id = "result" > </span>



</body>
</html>