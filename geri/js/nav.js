$(document).ready(function(){
 $('#action_area').load($('.click:first').attr('action'));
 });
 
 
 $('.click').click(function(){
  var href=$(this).attr('action');
  $('#action_area').load(href).fadeIn('normal');
  
  
  return false; 
 });