$(document).ready(function() {
		
/***************************** nav bar interactions **************************/
		
  $(".left-group-button").bind("click",function() {
		switch(this.id){
			case 'LBtn':
			break;
			case 'TBtn':
			break;
			case 'IBtn':
			break;
			case 'QMBtn':
			break;
			default : console.log('unknown button');
		}
  });
  
  $(".left-group-button").bind("mouseenter",function(){
  });
  $(".left-group-button").bind("mouseleave",function(){
  });
  
  $(".right-group-button").bind("click",function() {
		switch(this.id){
			case 'LBtn':
			break;
			case 'TBtn':
			break;
			case 'IBtn':
			break;
			case 'QMBtn':
			break;
			default : console.log('unknown button');
		}
  });
  
  $(".right-group-button").bind("mouseenter",function(){
  });
  $(".right-group-button").bind("mouseleave",function(){
  });
  
/*****************************************************************************/  


  $("#addfile").click(function(){
  	count = $('input:file').length - 1;
  	$("form").append('<label for="media'+count+'">media'+count+'</label><br/><input type="file" name="media'+count+'" /><br/><br/>');	  
  		  
  });
  
  var $container = $('#thumb_container');

  $container.imagesLoaded( function(){
	  $container.masonry({
		itemSelector : '.thumb',
		//gutterWidth : 10
	  });
	});
  
});

function onListRowClick(link){
	console.log('list row click  '+link);	
	document.location = link;
}





