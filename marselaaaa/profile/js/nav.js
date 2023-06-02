 $('.profile').click(function(){
  var href=$(this).attr('href');
  $('#computing_area_id').load(href).fadeIn('normal');
  
  
  
  return false; 
 });