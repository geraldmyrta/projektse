  $(document).ready(function(){
 $('#computing_area_id').load($('.click:first').attr('href'));
 });
 
 $('.student_button').click(function(){
  var href=$(this).attr('href');
  $('#computing_area_id').load(href).fadeIn('normal');
  
  return false; 
 });