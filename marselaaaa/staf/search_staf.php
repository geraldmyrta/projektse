<?php 
//
	$search = $_GET['search'];
?>

<?php 

include('css/all_staf.css');
//require_once('../../auth.php');
require_once('../../config.php');

$col_name = 'emri';
$col_mbiemri = 'mbiemri';
$col_email = 'email';
$col_id = 'id';

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}


	  $query = "SELECT * FROM perdoruesi WHERE niveli = 'staf' AND (emri LIKE '%$search%' OR mbiemri LIKE '%$search%')";
	  $result = mysqli_query($link,$query);
	  if(!$result){
		  echo('Gabim ne te dhena: ' . $mysql_error());
		  exit();
	  }
?>

<html>
	 <head>
		
				<script src="../../plugin/lib/jquery-1.7.0.js"></script>
		<script src="../../plugin/jquery.confirmon.js"></script> 
	
        <link rel="stylesheet" type="text/css" href="../../plugin/jquery.confirmon.css"/>
		
		<script language = "javascript">

function isKey(evt) {

var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode>31 && (charCode <48 || charCode> 57))
return false;

return true;

}

</script>

		<script type="text/javascript" >
		 $(function() {
			 $('.but_erase').click( function(e) {
                   
					var button_id = $(this).attr('id');	
					var r = confirm("Doni te fshini te gjitha te dhenat per kete punonjes?");
					if(r==true){	
					$.ajax({
										url: 'admin/staf/actions/staf_actions_get.php',
										type: 'POST',
										dataType: 'json',
										data: { "action": "DELETE",
												"id":button_id										
										
										},
 
										success: function(response)
											{  
												if(response == 1)
													alert("Fshirja u krye me sukses!");
													
												else
													alert("Fshirja nuk u krye. Pati probleme gjate fshirjes!!");
											}
									});
					}
					
					})
					
					
					
					
                });
			
		</script>
		
		<script type="text/javascript">

        $(document).ready(function ()
        {
	     $(".but_info").click(function (e)
            {
				var button_id = $(this).attr('id');	

				$.ajax({
										url: 'admin/staf/actions/staf_actions_get.php',
										type: 'POST',
										dataType: 'json',
										data: { "action": "SELECT",
												"id":button_id										
										
										},

										success: function(datas)
											{ 
											
											$.each(datas, function (idx, data){
											 
											$('#emri').val(data.emri);
											$('#mbiemri').val(data.mbiemri);
											$('#Email').val(data.email);
											$('#Vendlindja').val(data.vendlindja);
											$('#Nr_Tel').val(data.nrtel);
											$('#Adresa_1').val(data.adresa_1);
											$('#Adresa_2').val(data.adresa_2);
											$('#Datelindja').val(data.datelindja);
											$('#Data_Regjistrimit').val(data.data_regjistrimit);
											$('#Data_Skadimit').val(data.data_skadimit);
											
											}
											
											
											);
										
											
											}
									});

				
				
				
				
				
				ShowDialog(false);
                e.preventDefault();
            });
            $("#btnClose").click(function (e)
            {
                HideDialog();
                e.preventDefault();
            });

           
        });

        function ShowDialog(modal)
        {
            $("#overlay").show();
            $("#dialog").fadeIn(200);

            if (modal)
            {
                $("#overlay").unbind("click");
            }
            else
            {
                $("#overlay").click(function (e)
                {
                    HideDialog();
                });
            }
        }

        function HideDialog()
        {
			
            $("#overlay").hide();
            $("#dialog").fadeOut(300);
        } 
        
    </script>
	
				
	<script type="text/javascript">
		
		
		var button_id;
		
        $(document).ready(function ()
        {	
            $(".but_mod").click(function (e)
            {
				button_id = $(this).attr('id');	
					
				$.ajax({
										url: 'admin/staf/actions/staf_actions_get.php',
										type: 'POST',
										dataType: 'json',
										data: { "action": "SELECT",
												"id":button_id										
										
										},

										success: function(datas)
											{ 
											
											$.each(datas, function (idx, data){
											
											$('#name').val(data.emri);
											$('#lastname').val(data.mbiemri);
											$('#email').val(data.email);
											$('#birthplace').val(data.vendlindja);
											$('#tel').val(data.nrtel);
											$('#Addr_1').val(data.adresa_1);
											$('#Addr_2').val(data.adresa_2);
																						
											}
											
											
											);
										
											
											}
									});

				ShowDialogMod(false);
                e.preventDefault();
            });

           

            $("#close").click(function (e)
            {
                HideDialogMod();
                e.preventDefault();
            });

                    });
					
					
					
		 $(document).ready(function ()
        {	
            $(".modify").click(function (e)
            {
                    
						
						$.ajax({
										url: 'admin/staf/actions/staf_actions_get.php',
										type: 'POST',
										
										data: { "action": "UPDATE",
												"id":button_id,
												"emri": $("#name").val(),
												"mbiemri" : $("#lastname").val(),
												"Vendlindja" : $("#birthplace").val(),
												"Email" : $("#email").val(),
												"Adresa_1" : $("#Addr_1").val(),
												"Adresa_2" : $("#Addr_2").val(),
												"Nr_Tel" : $("#tel").val(),									
										
										},
 
										success: function(response)
											{  
											
												if(response == 1)
													alert("Modifikimi i te dhenave u krye me sukses!");
												else
													alert("Modifikimi nuk u krye. Pati probleme gjate modifikimit!!");
											}
									});
                });
				});

        function ShowDialogMod(modal)
        {
            $("#overlay").show();
            $("#modify_dialog").load().fadeIn(400);

            if (modal)
            {
                $("#overlay").unbind("click");
            }
            else
            {
                $("#overlay").click(function (e)
                {
                    HideDialogMod();
                });
            }
        }

        function HideDialogMod()
        {
            $("#overlay").hide();
            $("#modify_dialog").fadeOut(300);
        } 
        
    </script>
	
	<script src="../../jquery-1.3.2.min.js"></script>
	
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
			
			
			$('#computing_area_id').load("admin/staf/search_staf.php?search="+search);
		
			}
			
			$('.search_box1').attr("value", " ");
			})
			});
	
	</script>

	</head>


 <body>
 
	<input type="text" class = "search_box1" id="search_input" placeholder="kerko per staf..."  />
	<input id = "search" class="search_button" type="button" value = "" />
 
 
 <div id="overlay" class="web_dialog_overlay"></div>
    
    <div id="dialog" class="web_dialog">
        <table style="width: 100%; border: 0px;" cellpadding="3" cellspacing="0">
            <tr>
                <td class="web_dialog_title">Informacion</td>
                <td class="web_dialog_title align_right">
                    <a href="#" id="btnClose">X</a>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <table class = "table_style_popup">
			<tr>
				<td class = "label_field"> Emri</td>

				<td><input id="emri" name= "name" class = "profile_field" readonly= "readonly" type ="text" />

			</tr>
				<tr>
				<td class = "label_field"> Mbiemri</td>
				<td><input id="mbiemri" class = "profile_field" readonly= "readonly" type ="text"/> </td>
			</tr>

			
			<tr>
				<td class = "label_field"> Vendlindja</td>
				<td><input id="Vendlindja" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Email</td>
				<td><input id="Email" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Nr. Tel</td>
				<td><input id="Nr_Tel" class = "profile_field" onkeypress = "return isKey(Event)" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 1</td>
				<td><input id="Adresa_1" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 2</td>
				<td><input id="Adresa_2" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Datelindja</td>
				<td><input id="Datelindja" class = "profile_field" readonly= "readonly" type ="date" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Data e Regjistrimit </td>
				<td><input id="Data_Regjistrimit" class = "profile_field" readonly= "readonly" type ="date" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Data e Mbarimit </td>
				<td><input id="Data_Skadimit" class = "profile_field" readonly= "readonly" type ="date" /> </td>
			</tr>
			
		</table>
            </tr>
        </table>
    </div>
 
 
 <div id="modify_dialog" class="web_dialog">
	
        <table style="width: 100%; border: 0px;" cellpadding="3" cellspacing="0">
            <tr>
                <td class="web_dialog_title">Informacion</td>
                <td class="web_dialog_title align_right">
                    <a href="#" id="close">X</a>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <table class = "table_style_popup">
			<tr>
				<td class = "label_field"> Emri</td>

				<td><input id="name" name= "name" class = "profile_field" type ="text" />

			</tr>
				<tr>
				<td class = "label_field"> Mbiemri</td>
				<td><input id="lastname" class = "profile_field" type ="text"/> </td>
			</tr>

			
			<tr>
				<td class = "label_field"> Vendlindja</td>
				<td><input id="birthplace" class = "profile_field" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Email</td>
				<td><input id="email" class = "profile_field"  type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Nr. Tel</td>
				<td><input id="tel" class = "profile_field" onkeypress = "return isKey(Event)"  type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 1</td>
				<td><input id="Addr_1" class = "profile_field"  type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Adresa 2</td>
				<td><input id="Addr_2" class = "profile_field" type ="text" /> </td>
			</tr>
	   
			<tr>
				<td colspan="2"><input class="modify" type="button" value="Modifiko" /></td>
			</tr>
		
	   </table>
            
    </div>
	
	
 <?php 
	 while($row = mysqli_fetch_array($result))
	 {
	 
	 $full_name = $row[$col_name]." ".$row[$col_mbiemri];
	  echo "<div  class = 'box_area' >
				<table align = 'center'  class = 'table_style'>
					<tr> 
						<td colspan = '5' class = 'elements' >$full_name</td>
					</tr>
		
					<tr>
						<td colspan = '5' class = 'elements' >$row[$col_email]</td>
					</tr>
		
					<tr>
						<td  width = '40%' ></td>
						<td   > <input class = 'but_info' type = 'button' id ='$row[$col_id]' value = 'Me Shume'/></td>
						<td   ><input class = 'but_mod' type = 'button' id ='$row[$col_id]' value = 'Modifiko'/> </td>
						<td   > <input class = 'but_erase' type = 'button' id ='$row[$col_id]' value = 'Fshi'/></td>
						
					</tr>
				</table>
			</div>";
	 }
	 
 
 
 ?>

	</body>
</html>