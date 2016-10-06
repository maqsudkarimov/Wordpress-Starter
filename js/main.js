$(function() {

    //pageAccelerator();

    $('[data-mixItUp="true"]').each(function() {
        $(this).mixItUp({
            animation: {
                effects: 'fade '
            }
        });
    })

    /*if ($.support.pjax) {
        $(document).pjax('a', '.pjax-container', {
            timeout: 300
        });
        
       /* $('.pjax-container').on('pjax:beforeSend', function() {
            $(".preloader").addClass("run-animation");
        });
        
        $('.pjax-container').on('pjax:success', function() {
            setTimeout(function() {
                $.setnav();
                $(".preloader").removeClass("run-animation");
                $("img[data-src]").lazyload({
                    data_attribute  : "src",
                    threshold : 200
                });
            }, 100);
        });*/
    //}
})


$(document).ready(function() {


    $(".slider").owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        navText: ['', ''],
        lazyLoad: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 4,
            },
            1000: {
                items: 5,
            },
        }
    });

    $('#image_slider').everslider({
        mode: 'carousel',                   // carousel mode - 'normal', 'circular' or 'carousel'  
        effect: 'slide',                    // animation effect - 'slide' or 'fade'  
        useCSS: true,                       // set false to disable CSS3 transitions  
        itemWidth: false,                   // slide width, px (or false for css value)  
        itemHeight: false,                  // slide height, px (or false for css value)  
        itemMargin: false,                  // slide margin, px (or false for css value)  
        itemKeepRatio: false,               // during resize always retain side ratio of a slide  
        maxWidth: '100%',                   // max container width, px or %  
        maxVisible: 1,                      // show only N slides (overrides maxWidth, 0 to ignore)  
        moveSlides: 1,                      // number of slides to move or 'auto' to move all visible  
        slideDelay: 0,                      // slide effect initial delay, ms  
        slideDuration: 500,                 // slide effect duration, ms  
        slideEasing: 'easeOutCubic',        // slide effect easing  
        fadeDelay: 200,                     // fade effect delay, ms  
        fadeDuration: 500,                  // fade effect duration, ms  
        fadeEasing: 'swing',                // fade effect easing  
        fadeDirection: 1,                   // 1 is default, set -1 to start fade from opposite side  
        fitDelay: 300,                      // slides fit (carousel resize) delay, ms  
        fitDuration: 200,                   // slides fit (carousel resize) duration, ms  
        fitEasing: 'swing',                 // slides fit (carousel resize) easing  
        syncHeight: true,                  // sync carousel height with largest visible slide  
        syncHeightDuration: 200,            // carousel height sync duration, ms  
        syncHeightEasing: 'swing',          // carousel height sync easing  
        navigation: true,                   // enable prev/next navigation  
        nextNav: '<span class="alt-arrow">Next</span>',
        prevNav: '<span class="alt-arrow">Prev</span>',
        pagination: true,                   // enable pagination (only 'normal' or 'circular' mode)  
        touchSwipe: true,                   // enable touchSwipe  
        swipeThreshold: 50,                 // pixels to exceed to start slide transition  
        swipePage: true,                   // allow touchswipe to scroll page also  
        mouseWheel: true,                  // enable mousewheel (requires jquery-mousewheel plugin)  
        keyboard: true,                    // enable keyboard left/right key navigation  
        ticker: true,                      // enable ticker ('circular' or 'carousel' mode)  
        tickerTimeout: 4000,                // ticker timeout, ms  
        tickerAutoStart: true,              // start ticker when plugin loads  
        tickerPlay: '<span>Play</span>',    // ticker play control, text/html  
        tickerPause: '<span>Pause</span>',  // ticker pause control, text/html  
        tickerHover: true,                 // pause ticker on mousehover  
        tickerHoverDelay: 300,              // delay before ticker will pause on mousehover  
        slidesReady: function(){},          // slider ready callback  
        beforeSlide: function(){},          // before slide callback  
        afterSlide: function(){} 
    });

});
$(document).ready( function() {
    $( '#submit' ).on( 'click', function() {
        $( "#CommentForm" ).validate( {
            rules: {
                comment:         "required",
                comment_post_ID: "required"
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {},
            success: function ( label, element ) {},
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-error" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).removeClass( "has-error" );
            },
            submitHandler: function ( form ) {
                $.ajax({
                    type: 'POST',
                    url: '/wp-comments-post.php',
                    data: $( form ).serialize(),
                    success: function( data ) {
                        window.location.reload();
                        $( form ).trigger( 'reset' );
                    }
                });
            }
        });
    });
});
