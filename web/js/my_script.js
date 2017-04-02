$("div#submit").click( function() {
 
  if( $("#username").val() == "" || $("#password").val() == "" )
    $("div#ack").html("<div style='background-color: #f33022;line-height:35px;height:35px;text-align: center; color: white;text-transform: uppercase;''>Por favor, rellena la informaci&oacute;n para acceder a tu cuenta</div>");
  else
    $.post( $("#myForm").attr("action"),
	        $("#myForm :input").serializeArray(),
			function(data) {
			  $("div#ack").html(data);
			});
 
	$("#myForm").submit( function() {
	   return false;	
	});
 
});