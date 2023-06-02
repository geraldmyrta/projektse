 $(document).ready(function(){
$('#computing_area_id').load("admin/students/all_students.php");
 });
 
 
 $('.student_button').click(function(){
  var href=$(this).attr('href');
  $('#computing_area_id').load(href).fadeIn('normal');
  
  return false; 
 });