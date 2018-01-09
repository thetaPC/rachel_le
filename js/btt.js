// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});

$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

if($(window).width() <= 683) {
    $('#scrollup').remove();
    $('#return-to-top').append("<img src='../img/up.png' />");
} 

$(window).resize(function() {
    if($(window).width() <= 683) {
        $('#scrollup').remove()
        $('#return-to-top').append("<img id='scrollup' src='../img/up.png' />");
    }  else {
        $('#scrollup').remove();
        $('#return-to-top').append("<i id='scrollup' class='fa fa-chevron-up' aria-hidden='true'></i>");
    }
});