$(document).ready( function(){
    
    var window_width = $(window).width();
    
    if (window_width <= 768){
        
        // Agregar el div sostenedor de la navegacion responsive
        $('body').append('<div id="responsive-nav" class="responsive-nav"></div>');
        
        // Mudar la navegacion desktop al responsive-nav
        $('#main-nav').appendTo('#responsive-nav');
        $('#main-nav ul').removeClass('list-inline');
        
        $('#responsive-nav').append('<div id="responsive-nav-bottom" class="responsive-nav-bottom"></div>');
        $('.footer-copyright').clone().appendTo('#responsive-nav-bottom');
        
        // Hizo clic en el boton mostar navegacion
        $('#responsive-nav-btn').click( 
            function(){
                $('#responsive-nav').toggleClass('in');
            }
        );
    }
    
    console.log('App started');
    
    $("header").sticky({topSpacing:0});
    
    $('body').niceScroll({
        cursorcolor: "#ec0b43", // change cursor color in hex
        cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
        cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
        cursorwidth: "10px", // cursor width in pixel (you can also write "5px")
        cursorborder: "1px solid rgba(20, 20, 20, 0.3)", // css definition for cursor border
        cursorborderradius: "10px", // border radius in pixel for cursor
        horizrailenabled:false
    });
    
    
    
})