var TimedSlide = {
	
	SLIDE_TIME:3500,
	SLID:false,
	loopId:null,
	init:function(){
		TimedSlide.startTimer();
		$(document).mousemove(function(event){
				
			TimedSlide.startTimer();
			if(TimedSlide.SLID)
				TimedSlide.unslide();
			
		});
		
	},
	startTimer:function(){
		TimedSlide.stopTimer();
		TimedSlide.loopId = window.setTimeout(TimedSlide.slide,TimedSlide.SLIDE_TIME);
	},
	stopTimer:function(){
		window.clearTimeout(TimedSlide.loopId);
	},
	slide:function(){
		$('#left-column').animate({
				 "left":"-=213px"
		}, 1000,'easeOutExpo',function() {});
		TimedSlide.SLID = true;
	},
	unslide:function(){
		$('#left-column').animate({
				 "left":"+=213px"
		}, 1000,'easeOutExpo',function() {});
		TimedSlide.SLID = false;
	}
}

