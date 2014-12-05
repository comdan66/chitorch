$(function(){
	
	$("#LEFTC h5").on("touchstart click", SHOWSHOW );
	
	function SHOWSHOW(){
		
		$("#LEFTC #warp").removeClass().addClass("OPEN");
		
		$("#LEFTC h5").off("touchstart click", SHOWSHOW );
		
		$("#LEFTC #warp h3").on("touchstart click", HIDEHIDE );
		
		event.preventDefault();
		
	}
	
	
	function HIDEHIDE(){
		
		$("#LEFTC #warp").removeClass().addClass("CLOSE");
		
		$("#LEFTC h5").on("touchstart click", SHOWSHOW );
		
		$("#LEFTC #warp h3").off("touchstart click", HIDEHIDE );
				
		event.preventDefault();
		
	}
	
});


