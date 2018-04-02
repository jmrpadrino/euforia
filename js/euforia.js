$(document).ready( function(){
    console.log('App started');
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