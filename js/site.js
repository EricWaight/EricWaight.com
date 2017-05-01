$(document).ready(function(){
	
	toggleNavigation() ;
	
    var $win = $(window);
    
    if ($(window).width() >= 800) {

		$('#home').each(function(){
		    var scroll_speed = 2;
		    var $this = $(this);
		    $(window).scroll(function() {
		        var bgScroll = -(($win.scrollTop() - $this.offset().top)/ scroll_speed);
		        var bgPosition = 'center '+ bgScroll + 'px';
		        $this.css({ backgroundPosition: bgPosition });
		    });
		});
    }
    
    //smoothscroll + highlight current link based on click
    $('a[href^="#"]').on('click', function (e) {
        $('header nav a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();

        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 60
        }, 800, 'linear', function () {
            window.location.hash = target;
        });
    });
});

function toggleNavigation() {
    $('#nav-icon').click(function (e) {
        e.preventDefault();

        if ($("nav").css('right') == '-250px') {
            $('nav').animate({ right: "0" });
            $(this).css('background-position', '-29px 0px');

            if ($("#header-right ul").css('right') == '0px') {
                $('#header-right ul').animate({ right: "-160px" });
            }
        }
        else {
            $('nav').animate({ right: "-250px" });
            $(this).css('background-position', '0px 0px');
        }
    });
}