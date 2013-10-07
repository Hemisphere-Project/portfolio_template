// sticky footer
$(window).bind("load", function() { 
       
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute",
                        bottom: "0"
                   //}).animate({
                    //    top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
});



$(document).ready(function() {
  $(".left-group-button").click(function() {
		console.log('left-group-button clicked  '+this.id);
		
		// put some ajax in these
		switch(this.id){
			case 'LBtn':
				//$('body').load('/index.php/projects/prjkts/');
				document.location.href="/index.php/projects/prjkts/projects_list"
			break;
			case 'TBtn':
				//$('body').load('/index.php/projects/prjkts/projects_thumb_list');
				document.location.href="/index.php/projects/prjkts/projects_thumb_list"
			break;
			case 'IBtn':
				//$('body').load('/index.php/about');
				document.location.href="/index.php/about"
			break;
			case 'QMBtn':
				//$('body').load('/index.php/help');
				document.location.href="/index.php/help"
			break;
			default : console.log('unknown button');
		}
  });
  
  $(".left-group-button").mouseenter(function(){
  		Title.stop();
  		Title.start(this.id);
  });
  $(".left-group-button").mouseleave(function(){
  		Title.stop();
  });
  
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





