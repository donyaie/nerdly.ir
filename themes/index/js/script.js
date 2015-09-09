$(document).ready(function() {



    function resizing() {
     //   -$('#menu_header h1').height()/2
        var winsize = wndsize();
        var $height=winsize.height-$('#menu_header h1').height()/2 ;

      //  $('#menu_team').height(winsize.height-$('#menu_header h1').height()/2);

      //  $('#menu_services').(winsize.height);

        $('#menu_header').height(winsize.height-$('#menu_header h1').height()/2);

        $('#menu_header').css("padding-top", function(index) {
            var winHeight = winsize.height;
            var fonth = $('#menu_header h1').height();
            return ((winHeight / 2) - (fonth));
        });

        $('#menu_services').css("min-height", function(index) {
            return winsize.height;
        });

        $('#menu_services').css("padding-top", function(index) {
            var winHeight = winsize.height;
            var fonth = $('#services').height();
            var res=((winHeight /2) - (fonth/2))
            return res-30;
        });
        $('#menu_services').css("padding-bottom", function(index) {
            var winHeight = winsize.height;
            var fonth = $('#services').height();
            var res=((winHeight /2) - (fonth/2))
            return res;
        });

        $('#menu_team').css("min-height", function(index) {
            return winsize.height;
        });

        $('#menu_team').css("padding-top", function(index) {
            var winHeight = winsize.height;
            var fonth = $('#team').height();
            var res=((winHeight /2) - (fonth/2))
            return res-30;
        });
        $('#menu_team').css("padding-bottom", function(index) {
            var winHeight = winsize.height;
            var fonth = $('#team').height();
            var res=((winHeight /2) - (fonth/2))
            return res;
        });


    }

    function wndsize() {
        var w = 0;
        var h = 0;
//IE
        if (!window.innerWidth) {
            if (!(document.documentElement.clientWidth == 0)) {
                //strict mode
                w = document.documentElement.clientWidth;
                h = document.documentElement.clientHeight;
            } else {
                //quirks mode
                w = document.body.clientWidth;
                h = document.body.clientHeight;
            }
        } else {
            //w3c
            w = window.innerWidth;
            h = window.innerHeight;
        }
        return {width: w, height: h};
    }

    function wndcent() {
        var hWnd = (arguments[0] != null) ? arguments[0] : {width: 0, height: 0};
        var _x = 0;
        var _y = 0;
        var offsetX = 0;
        var offsetY = 0;
//IE
        if (!window.pageYOffset) {
//strict mode
            if (!(document.documentElement.scrollTop == 0)) {
                offsetY = document.documentElement.scrollTop;
                offsetX = document.documentElement.scrollLeft;
            }
//quirks mode
            else {
                offsetY = document.body.scrollTop;
                offsetX = document.body.scrollLeft;
            }
        }
//w3c
        else {
            offsetX = window.pageXOffset;
            offsetY = window.pageYOffset;
        }
        _x = ((wndsize().width - hWnd.width) / 2) + offsetX;
        _y = ((wndsize().height - hWnd.height) / 2) + offsetY;
        return{x: _x, y: _y};
    }

    function randomColor(opticaly) {

        var colors = [
            '153,180,51',
            '0,163,0',
            '30,113,69',
            '255,0,151',
            '159,0,167',
            '126,56,120',
            '96,60,186',
            '0,171,169',
            '239,244,255',
            '45,137,239',
            '43,87,151',
            '255,196,13',
            '227,162,26',
            '218,83,44',
            '238,17,17',
            '185,29,71'
        ];

        return  "rgba(" + colors[Math.floor(Math.random() * colors.length)] + "," + opticaly + ")";
    }

    function selectSubNavItems() {


 //       var $tool = $('#menu_tool').offset().top - $(window).scrollTop() - 50;
        var $header= $('#menu_header').offset().top - $(window).scrollTop() +50;
        var $training = $('#menu_training').offset().top - $(window).scrollTop() +50;
        var $service 	= $('#menu_services').offset().top - $(window).scrollTop() + 50;
        var $team = $('#menu_team').offset().top - $(window).scrollTop() + 50;
        var x = $("p").offset();
        var $active = '#none';

    //    if ($tool < 100)
    //        $active = '#menu_tool';
        $("#top-nav .logo").css("color","#fff");
        if ($header < 100 )
            $active = '#menu_header';
        if ($service < 100 )
            $active = '#menu_services';
        if (($training < 100)) {
            $active = '#menu_training';

            $("#top-nav .logo").css("color","#000");
        }
        //if($service < 100) $active = '#menu_service';
        if ($team < 100 ) {
            $active = '#menu_team';
            $("#top-nav .logo").css("color","#fff");
        }

        $("#top-nav .logo").css("background-color",  $($active).css("background-color"))


        $('#navbar li').removeClass('active_menu');
        $('#navbar a[href=' + $active + ']').parent().addClass('active_menu');

    }

    $('a[href^="#menu_"]').on('click', function(e) {
        e.preventDefault();

        var target = this.hash;
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': ($target.offset().top) - 50
        }, 1800, 'swing', function() {
            window.location.hash = target - 30;
        });
    });

    var nav = $('#popupMenu');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 600) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
    
    
    selectSubNavItems();

    $(window).scroll(function() {
        selectSubNavItems();
    });

    resizing();
    $(window).resize(function() {
        resizing();
    });

    $("#menu_training ul").children().each(function() {
        //   $(this).find("h2").css("background-color", randomColor(0.4));
    });
/*
    map = new GMaps({
        el: '#map',
        lat: 36.648889,
        lng: 51.496111,
        zoom: 16,
        zoomControl: false
    });

    map.addMarker({
        lat: 36.650240,
        lng: 51.504853,
        title: 'مکان ما',
        infoWindow: {
            content: '<p class="map_mark">مکان ما</p>'
        }
    });
*/

});


