$(window).resize(function() {
	var headerHeight = $('header').height(),
		logoHeight = $('.logo').height(),
		topCalc = (headerHeight / 2) - (logoHeight / 2);

	$('.logo').css('top', topCalc+'px');
});

$(function(){
	var headerHeight = $('header').height(),
		logoHeight = $('.logo').height(),
		topCalc = (headerHeight / 2) - (logoHeight / 2);
	$('.logo').css('top', topCalc+'px');

	var hash = '#' + window.location.hash.substr(1).replace('/','');
	// console.log(hash);
	if(hash.length > 1){
		$("html, body").animate({ scrollTop: $(hash).offset().top - 50 }, headerHeight);
	}

	$('nav').on('click', '.mobile-hamburger', function(event) {
		var $this = $(this);
		if($this.hasClass('active')){
			$this.removeClass('active');
			$('.mobile').slideUp();
		}else{
			$this.addClass('active');
			$('.mobile').slideDown();
		}

		event.preventDefault();
		
	}).on('click', 'ul.desktop a', function(event) {
		event.preventDefault();
		var $this = $(this);
		var target = $this.attr('href');
		window.location.hash = target;
		$("html, body").animate({ 'scrollTop': $($this.attr('href').replace('/','')).offset().top - 50},function () {});

	}).on('click', 'ul.mobile a', function(event) {
		event.preventDefault();
		$('.mobile-hamburger').removeClass('active');
		$('.mobile').slideUp();
		var $this = $(this);
		var target = $this.attr('href');
		window.location.hash = target;
		$("html, body").animate({ 'scrollTop': $($this.attr('href').replace('/','')).offset().top - 50},function () {});
	});

})
$(window).scroll(function() {
	var headerHeight = $('header').height();
	if( $(this).scrollTop() >= headerHeight ) {
		$('nav').addClass('nav-stuck');
		$('header').css('margin-bottom', 50);
	} else {
		$('nav').removeClass('nav-stuck');
		$('header').css('margin-bottom', 0);
	}
});