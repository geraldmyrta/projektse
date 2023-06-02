$("#save").click()(function(){
var data = $("#myform : input").serializeArray();


$.post($("#myform").attr("action"), data, function(info){ $("#result").html(info);});


});

$(#"myform").submit(function(){
return false;


});
