$(document).ready(function(){
    
    $("#contactform01").validate();
    $("#contactform02").validate(); 
    $("#contactform22").validate();
    $('#modal').modal();
    
    (function() {
        var triggerBttn = document.getElementById( 'trigger-overlay' ),
            overlay = document.querySelector( 'div.overlay' ),
            closeBttn = overlay.querySelector( 'button.overlay-close' );
            transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            support = { transitions : Modernizr.csstransitions };
        function toggleOverlay() {
            if( classie.has( overlay, 'open' ) ) {
                classie.remove( overlay, 'open' );
                classie.add( overlay, 'close' );
                var onEndTransitionFn = function( ev ) {
                    if( support.transitions ) {
                        if( ev.propertyName !== 'visibility' ) return;
                        this.removeEventListener( transEndEventName, onEndTransitionFn );
                    }
                    classie.remove( overlay, 'close' );
                };
                if( support.transitions ) { overlay.addEventListener( transEndEventName, onEndTransitionFn );}
                else { onEndTransitionFn();}
            }
            else if( !classie.has( overlay, 'close' ) ) { classie.add( overlay, 'open' );}
        }
        triggerBttn.addEventListener( 'click', toggleOverlay );
        closeBttn.addEventListener( 'click', toggleOverlay );
    })();

    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) { $('.nav-bt-top').fadeIn();}
        else { $('.nav-bt-top').fadeOut();}
    }); 
    $('.nav-bt-top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    
        $('.infr-block,.serv-block').slick({
        dots: true,
        infinite: false,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint:1400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                /*infinite: true,*/
                /*dots: true*/
            }
        }, {
            breakpoint:800,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    
    
    $("#anchscroll01,#anchscroll02,#anchscroll03,#anchscroll04,#anchscroll05").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
        top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
        $('.navbar-collapse')
        .removeClass('in');       
    });

    
    if(document.documentElement.clientWidth < 600) {
        $('.srv-page-box').readmore({
            maxHeight: 160,
            moreLink: '<a href="#">Подробнее</a>',
            lessLink: '<a href="#">Свернуть текст</a>'
        });
    };

});