$(document).ready(function() {

	$("#loginblock").fadeIn("slow");
	
	$("#register").click(function(){
		$("#loginblock").fadeOut("slow",function(){
			//$("#midrow").animate({height:'80%'},1000);
			$("#regblock").fadeIn("slow");
			//$("#minititle").animate({height:"10%"},1000);
		});
	});
	$("#enter").click(function(){
		if(!$("#user").val() || !$("#pwd").val()){
			alert("Campos faltantes.");
			return 0;
		}
		var usr = $("#user").val();
		var pwd = $("#pwd").val();
		$.ajax({
			type: 'POST',
			url: 'scripts/login.php',
			data: {mail:usr,pass:pwd,fun:'mail'},
			success: function(data) {
				if(data==="Success"){
					window.location.href = 'user.php';
				}
			}
		});
	});
});
