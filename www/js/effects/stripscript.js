var TRIGGER = 128; // fraction of the screen which triggers the page slide

var MOUSE_DOWN = false;
var dX = 0,dY = 0,lpX = 0,lpY = 0;
var windowWidth, windowHeight, marginRight, marginLeft;
var previousPos = {top:0,left:0};

var SCROLLING = false;
var scrollTimeout;

$(document).ready(function(){
    
    /*$('body').bind('mousewheel', function(event, delta, deltaX, deltaY) {
        //console.log(delta, deltaX, deltaY);
        
        if(!SCROLLING)
            previousPos = $('#strip_container').offset();
        
        SCROLLING = true;
        var currentPos = $('#strip_container').offset();
        $('#strip_container').offset({top:currentPos.top ,left:currentPos.left - deltaX});
        clearTimeout(scrollTimeout);
        scrollTimeout = window.setTimeout(scrollEnd,200);
    });*/
    $('body').bind('mousedown',function(event){
        MOUSE_DOWN = true;
        previousPos = $('#strip_container').offset();
        flattenDecimals(previousPos);
    });
    $('body').bind('mouseup mouseleave',function(event){
        if(MOUSE_DOWN){
            MOUSE_DOWN = false;
            var currentPos = $('#strip_container').offset();
            if(currentPos.left !== previousPos.left || currentPos.top !== previousPos.top){
                snapPosition();
            }
        }
    }); 
    $('body').bind('mousemove',function(event){
        dX = event.pageX - lpX;
        dY = event.pageY - lpY;
        lpX = event.pageX;
        lpY = event.pageY;
        
        if(MOUSE_DOWN){
            var currentPos = $('#strip_container').offset();
            //boundaries
            rightBound = -(COUNT-4)*windowWidth;

            if(currentPos.left + dX > 0){
                $('#strip_container').offset({top:currentPos.top ,left:0});
            }else if(currentPos.left + dX < rightBound){
                $('#strip_container').offset({top:currentPos.top ,left:rightBound});
            }else{
                $('#strip_container').offset({top:currentPos.top ,left:currentPos.left + dX});
            }
        }
        
    });
    
    $('#left-arrow').bind('click',function(event){
        moveElement($('#strip_container'), {top:previousPos.top ,left:previousPos.left + windowWidth});
    });
    
    $('#right-arrow').bind('click',function(event){
        moveElement($('#strip_container'), {top:previousPos.top ,left:previousPos.left - windowWidth});
    });
    
    adaptToWindow();
});

/*function scrollEnd(){
    console.log('scroll end');
    clearTimeout(scrollTimeout);
    snapScrolledPosition();
    SCROLLING = false;
}*/

function snapPosition(){
    var currentPos = $('#strip_container').offset();
    //console.log(Math.floor(Math.abs(currentPos.left - previousPos.left)/(windowWidth/4)));
    
    var diff = (currentPos.left - previousPos.left)/(windowWidth/TRIGGER);
    
    if(diff >=1 && dX >0){
        // avance droite
        //$('#strip_container').offset({top:previousPos.top ,left:previousPos.left + windowWidth});
        moveElement($('#strip_container'), {top:previousPos.top ,left:previousPos.left + windowWidth});
    }else if(diff >=1 && dX<=0){
        // reviens 
        //$('#strip_container').offset(previousPos);
        moveElement($('#strip_container'), previousPos);
    }else if(diff <=-1 && dX <0){
        //avance gauche
       // $('#strip_container').offset({top:previousPos.top ,left:previousPos.left - windowWidth});
        moveElement($('#strip_container'), {top:previousPos.top ,left:previousPos.left - windowWidth});
    }else if(diff <=-1 && dX>=0){
        //reviens
        //$('#strip_container').offset(previousPos);
        moveElement($('#strip_container'), previousPos);
    }else if(diff<1 && diff>0){
        //reviens
        //$('#strip_container').offset(previousPos);        
        moveElement($('#strip_container'), previousPos);
    }else if(diff<=0 && diff >-1){
        //reviens
        //$('#strip_container').offset(previousPos);        
        moveElement($('#strip_container'), previousPos);
    }
    
}

/*function snapScrolledPosition(){
    var currentPos = $('#strip_container').offset();
    var diff = (currentPos.left - previousPos.left)/windowWidth;
    
    if(diff >=0.5){
        // avance droite
        moveElement($('#strip_container'), {top:previousPos.top ,left:windowWidth*Math.floor(currentPos.left/windowWidth)});
    }else if(diff <=-0.5){
        //avance gauche
        moveElement($('#strip_container'), {top:previousPos.top ,left:windowWidth*Math.floor(currentPos.left/windowWidth)});
    }else if(diff<0.5 && diff>0){
        //reviens
        moveElement($('#strip_container'), previousPos);
    }else if(diff<=0 && diff >-0.5){
        //reviens
        moveElement($('#strip_container'), previousPos);
    }
}
*/
function moveElement(element,pos){

    hideArrowsIfNecessary(pos);
    
    if(!element.is(':animated')){
        element.animate({
            top:pos.top,
            left:pos.left

        },600,"easeOutExpo",function(){//easeOutExpo 600
            // on animation complete
        });
    }else{
        element.finish();
        //element.offset(pos);
    }
}

$(window).resize(adaptToWindow);


function adaptToWindow(){
    marginLeft = $('.strip_element').css('margin-left').replace(/[^-\d\.]/g, '');
    marginRight = $('.strip_element').css('margin-right').replace(/[^-\d\.]/g, '');
    paddingLeft = $('.strip_element').css('padding-left').replace(/[^-\d\.]/g, '');
    paddingRight = $('.strip_element').css('padding-right').replace(/[^-\d\.]/g, '');
    
    
    windowWidth = $(window).width();
    windowHeight = $(window).height();
    $('.strip_element').width(windowWidth - marginLeft - marginRight - paddingLeft - paddingRight);
    $('#strip_container').width(COUNT*$('.strip_element').width());
    $('.strip_element').css("line-height",$('.strip_element').height()+"px");
   // adaptImages();
    //console.log($('.strip_element').width()+"  "+$('#strip_container').width())
    
    hideArrowsIfNecessary($('#strip_container').offset());
}

function hideArrowsIfNecessary(targetPos){
    if(targetPos.left >= 0){
        if($("#left-arrow").is(':visible'))
           $("#left-arrow").hide(100); 
    }else if(targetPos.left <= -(COUNT-4)*windowWidth){
        if($("#right-arrow").is(':visible'))
           $("#right-arrow").hide(100);         
    }else{
        if(!$("#left-arrow").is(':visible'))
           $("#left-arrow").show(100);
        if(!$("#right-arrow").is(':visible'))
           $("#right-arrow").show(100);
            
    }
}

function flattenDecimals(pos){
    if(pos.left%windowWidth!==0)
        pos.left = windowWidth*Math.round(pos.left/windowWidth);
}

//function adaptImages(){//peut mieux faire
//    var imgPadding = $('.strip_img').css('padding').replace(/[^-\d\.]/g, '');
//    var imageWidth = $('.strip_img').width();
//    var imageHeight = $('.strip_img').height();
//    //var aspectRatio = imageWidth/imageHeight;
//    
//    console.log(imageWidth+'  '+imageHeight);
//    if(imageWidth != 0 && imageHeight != 0){
//        $('.strip_img').css( 'max-height', $('.strip_element').height()-imgPadding*2);
//        $('.strip_img').css( 'max-width', $('.strip_element').width()-imgPadding*2);
//        //$('.strip_img').width($('.strip_img').height()*aspectRatio);
//    }
//}
