var Clock = {
	
	clockLoop:null,
	period:1,
	start:function(){
		this.clockLoop = window.setInterval(this.loop,this.period);
	},
	stop:function(){
		clearInterval(this.clockLoop);
	},
	loop:function(){
		var ts = new Date().getTime().toString(36);
		$("#clock").html(ts);
	}
}

