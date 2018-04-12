var more_product_section = $('.more-products-section');
var tillBottom = 120;
$(document).ready( function(){
    
    var window_width = $(window).width();
    
    console.log('App started');
    
    if (window_width >= 768){
        
        if (more_product_section.length > 0){
            tillBottom += more_product_section.height() + 270;
        }

        /*$(".stickThis").sticky(
            {
                topSpacing:180,
                bottomSpacing: tillBottom
            }
        );*/
        
    }
    
    var productAside = $('.product-aside').width();
    
    $('.product-aside').css({'width': productAside+'!important'});
    
    var niceScrollArgs = {
        cursorcolor: "#ec0b43", // change cursor color in hex
        cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
        cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
        cursorwidth: "10px", // cursor width in pixel (you can also write "5px")
        cursorborder: "1px solid rgba(20, 20, 20, 0.3)", // css definition for cursor border
        cursorborderradius: "10px", // border radius in pixel for cursor
        horizrailenabled:false
    }
    
    $('body').niceScroll(niceScrollArgs);
    
    
    if (window_width <= 1024){
        
        console.log('hola');
        
        // Agregar el div sostenedor de la navegacion responsive
        $('header').append('<div id="responsive-nav" class="responsive-nav"></div>');
        
        // Mudar la navegacion desktop al responsive-nav
        $('#main-nav').appendTo('#responsive-nav');
        $('#main-nav ul').removeClass('list-inline');
        
        $('#responsive-nav').append('<div id="responsive-nav-bottom" class="responsive-nav-bottom"></div>');
        $('.footer-copyright').clone().appendTo('#responsive-nav-bottom');
        
        // Hizo clic en el boton mostar navegacion
        $('#responsive-nav-btn').click( 
            function(){
                $('#responsive-nav').toggleClass('in');
                if ($('#responsive-nav').hasClass('in')){
                    $('html, body').css(
                        {
                            overflow: 'hidden', 
                            height: '100%'
                        }
                    );
                }else{
                    $('html, body').css(
                        {
                            overflow: 'auto', 
                            height: 'auto'
                        }
                    );
                }
            }
        );
    }
    
})