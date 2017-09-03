$(document).ready(function() {

	$("#loginblock").fadeIn("slow");
	
	$("#register").click(function(){
		$("#loginblock").fadeOut("slow",function(){
			//$("#midrow").animate({height:'80%'},1000);
			$("#regblock").fadeIn("slow");
			//$("#minititle").animate({height:"10%"},1000);
		});
	});
});
