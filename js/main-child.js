jQuery(document).ready(function ($) {
    
    'use strict';
    
    // Pop over à l'ouverture du searchform
    $(".search-form-btn").click(function () {
        $(".overlay.search-form").addClass("open");
        $("body").addClass("overlay-expanded");
    });
    $(".overlay .close").click(function () {
        $(".overlay.search-form").removeClass("open");
        $("body").removeClass("overlay-expanded");

    });   
    
    //Convert address tags to google map links - Copyright Michael Jasper 2011
    $('address').each(function () {
        var link = "<a href='http://maps.google.com/maps?q=" + encodeURIComponent( $(this).text() ) + "' target='_blank'>" + $(this).text() + "</a>";
        $(this).html(link);
    });
    
    $('#trigger').click(function(){
        $('.menu-trigger').toggleClass("active");
    });

});

var userScroll = jQuery(document).scrollTop();

jQuery(window).on('scroll', function() {
   var newScroll = jQuery(document).scrollTop();
   if(userScroll - newScroll > 20 || newScroll - userScroll > 20){
      jQuery('.site-header').addClass('small');
   } else {
      jQuery('.site-header').removeClass('small');
   }
});

