$(document).ready(function(){
    setTimeout(function(){
        $('#headerLogo').css({
            'transform': 'scale(1)'
        });
        setTimeout(function(){
            $('html, body').animate({
                scrollTop: $('nav').offset().top
            }, 1000);
            
        },3000);
    },20000);
    setInterval(function(){
        $('#discAnimate').animate({ 'padding-bottom': '10px' },300);
        $('#discAnimate').animate({ 'padding-bottom': '0px' },100);
        $('#discAnimate').animate({ 'padding-bottom': '10px' },300);
        $('#discAnimate').animate({ 'padding-bottom': '0px' },100);
    },2000);
    var altura = $('nav').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('nav').addClass('sticky');
		} else {
			$('nav').removeClass('sticky');
		}
    });
    $('#toggleMenu').on('click',function(){
        $('#menu').slideToggle();
    });
});