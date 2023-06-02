<?php 
	$search =  $_GET['search'];
?>

<?php 
//
include('css/all_book.css');
require_once('../../auth.php');
require_once('../../config.php');

$col_title = 'titulli';
$col_authors = 'autoret';
$col_amount= 'sasia_aktuale';
$col_id = 'id';

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Nuk mund te lidhet me serverin: ' . mysql_error());
	}
	
	
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Nuk mund te aksesohet databaza" . mysql_error());
	}


	  $query = "SELECT * FROM libri WHERE titulli LIKE '%$search%' OR autoret LIKE '%$search%' OR pershkrimi LIKE '%$search%' ORDER BY viti_publikimit desc";
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
		
		
	   <script type="text/javascript">
		$(document).ready(function ()
        {
            $(".but_info").click(function (e)
            {
				var button_id = $(this).attr('id');	
				
				$.ajax({
										url: 'admin/books/actions/book_actions_get.php',
										type: 'POST',
										dataType: 'json',
										data: { "action": "SELECT",
												"id":button_id									
										
										},

										success: function(datas)
											{ 
											
											$.each(datas, function (idx, data){
											 
											$('#titulli').val(data.titulli);
											$('#autoret').val(data.autoret);
											$('#cmimi').val(data.cmimi);
											$('#botimi').val(data.botimi);
											$('#pershkrimi').val(data.pershkrimi);
											$('#sasia_inventar').val(data.sasia_inventar);
											$('#sasia_aktuale').val(data.sasia_aktuale);
											$('#isbn').val(data.isbn);
											$('#viti_publikimit').val(data.viti_publikimit);
											$('#shtepia_botuese').val(data.shtepia_botuese);
											$('#kategoria').val(data.kategoria);
											}
											
											
											);
										
											
											}
									});

				ShowDialog(false);
                e.preventDefault();
            });

            $("#btnShowModal").click(function (e)
            {
                ShowDialog(true);
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
            $("#dialog").load().fadeIn(400);

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
		
	   $(document).ready(function ()
        {
            $(".but_huazo").click(function (e)
            {
				var button_id = $(this).attr('id');	
				
				$.ajax({
										url: 'student/actions/huazo.php',
										type: 'POST',
									
										data: { "action" : "HUAZO",
												"id_book":button_id									
										
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
            $(".but_prenoto").click(function (e)
            {
				var button_id = $(this).attr('id');	
				
				$.ajax({
										url: 'student/actions/prenoto.php',
										type: 'POST',
										data: { "action" : "PRENOTO",
												"id_book":button_id									
										
										},

										success: function(response)
											{ 
										
											alert(response);
											location.reload(true);
											}});
									})
									});
									
	</script>
	
	<script src="../../jquery-1.3.2.min.js"></script>
</head>


 <body>
 
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
				<td class = "label_field"> Titulli</td>

				<td><input id="titulli" name= "name" class = "profile_field" readonly= "readonly" type ="text" />

			</tr>
				<tr>
				<td class = "label_field"> Autoret</td>
				<td><input id="autoret" class = "profile_field" readonly= "readonly" type ="text"/> </td>
			</tr>

			
			<tr>
				<td class = "label_field"> Cmimi</td>
				<td><input id="cmimi" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Botimi</td>
				<td><input id="botimi" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Pershkrimi</td>
				<td><input id="pershkrimi" class = "profile_field"  readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Sasia Inventar</td>
				<td><input id="sasia_inventar" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Sasia Aktuale</td>
				<td><input id="sasia_aktuale" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> ISBN</td>
				<td><input id="isbn" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Viti Publikimit </td>
				<td><input id="viti_publikimit" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Kategoria</td>
				<td><input id="kategoria" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
			<tr>
				<td class = "label_field"> Shtepia Botuese</td>
				<td><input id="shtepia_botuese" class = "profile_field" readonly= "readonly" type ="text" /> </td>
			</tr>
			
		</table>
            </tr>
        </table>
    </div>
 
 


 <?php 
	 while($row = mysqli_fetch_array($result))
	 {
	 
	 $titulli = $row[$col_title];
	 $autoret=$row[$col_authors];
	 $sasia=$row[$col_amount];
	  echo "<div  class = 'box_area' >
				<table align = 'center'  class = 'table_style'>
					<tr> 
						<td colspan = '5' class = 'elements' >$titulli</td>
					</tr>
		
					<tr>
						<td colspan = '5' class = 'elements' >$autoret</td>
					</tr>
					
					<tr>
						<td colspan = '5' class = 'elements' >Sasia Aktuale: $sasia kopje</td>
					</tr>
		
					<tr>
						<td  width = '40%' ></td>
						<td> <input class = 'but_info' type = 'button' id ='$row[$col_id]' value = 'Me Shume'/></td>
						";
						if( (int)$sasia > 0)
						echo "
							
								
								<td > <input class = 'but_huazo' type = 'button' id ='$row[$col_id]' value = 'Huazo Liber'/></td>
							";
						else
						echo "
							
							
								<td> <input class = 'but_prenoto' type = 'button' id ='$row[$col_id]' value = 'Prenoto Liber'/></td>
							
						
						     ";
				echo	"</tr>
				</table>
			</div>";
	 }
	 
 
 
 ?>

	</body>
</html>




