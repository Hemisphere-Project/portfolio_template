var Title = {
	L:"WORKS",
	T:"GALLERY",
	I:"INFO",
	QM:"?HELP¿",
	currentIndex:0,
	titleLoop:null,
	period:250,
	start:function(who){
		this.currentIndex = 0;
		switch(who){
			case 'LBtn' : this.titleLoop = window.setInterval(this.loop,this.period,this.L,$("#LBtn")); 
						  break;
			case 'TBtn' : this.titleLoop = window.setInterval(this.loop,this.period,this.T,$("#TBtn"));  
						  break;
			case 'IBtn' : this.titleLoop = window.setInterval(this.loop,this.period,this.I,$("#IBtn")); 
						  break;
			case 'QMBtn' : this.titleLoop = window.setInterval(this.loop,this.period,this.QM,$("#QMBtn"));  
						  break;
			default : console.log("title.js :: unknown title");
						break;
		}
		
	},
	stop:function(){
		clearInterval(this.titleLoop);
		this.resetTitles();
	},
	loop:function(strng,elmnt){
		Title.currentIndex++;
		if(Title.currentIndex >= strng.length)
			Title.currentIndex = 0;
		elmnt.html(strng.charAt(Title.currentIndex));
	},
	resetTitles:function(){
		$("#LBtn").html('W');
		$("#TBtn").html('G');
		$("#IBtn").html('I');
		$("#QMBtn").html('?');
	}
}
