$(document).ready(function(){
	$('.parallax').parallax();
	/* INITIALIZE TOOLTIP */
	$(function () {
		$("[rel='tooltip']").tooltip();
	});

	/* PRODUCTS SIDEBAR COFIG */
	$('.product-categories').wrap('<div class="panel-group" id="accordion"></div>"');
	$('.panel-group').wrap('<div class="collapse in sidebar-bottom" id="sidebar-bottom"></div>')
	$('.cat-item').each(function () {
		if(!$(this).parent().hasClass('children')){
			$(this).wrap('<div class="panel"></div>');
			if($(this).hasClass('cat-parent')){
				$(this).find('a').first().addClass('glyphicon');
				$(this).find('a').first().append('<span class="glyphicon glyphicon glyphicon-menu-right pull-right coll-control"></span>');
			}
		};
	});		
	$('.cat-parent').each(function () {
		var $href = $(this).find('a:first').text();
		$(this).find('span:first').attr({role:"button", 'data-toggle':"collapse", 'data-parent':"#accordion", href:"#"+$href, 'aria-expanded':"false"});
		$(this).find('ul').wrap('<div id='+$href+' class="panel-collapse collapse" role="tabpanel"><div class="panel-body no-padding"></div></div>');
	});

	$('#col-fix').find('.col-md-3').removeClass('col-md-3').addClass('col-md-4');
	$('.collapse').on('show.bs.collapse', function () {		
		if ($(this).prev().find('span').hasClass('glyphicon-menu-right')) {
			$(this).prev().find('span').removeClass('glyphicon-menu-right').addClass('glyphicon-menu-down');
		}
	})

	$('.collapse').on('hide.bs.collapse', function (e) {
		if ($(this).prev().find('span').hasClass('glyphicon-menu-down')) {
			$(this).prev().find('span').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-right');
		}
	})
	
	if($('#carousel').length > 0 ) {
		$('.front-page-hide').replaceWith('<p id="more">...<p>');
		$('#more').prev().append();
	}
});

$(window).resize(function() {
	$('.open').trigger('hide.bs.dropdown');
	$('.open').removeClass('open');
	if($(window).width() > 975 && $('.menu').width != '130px' ) {
		$('.menu').css('width', 130);
	} else if ($(window).width() > 750 && $('.menu').width != '130px' ) {
		$('.menu').css('width', 100);
	} else if ($(window).width() < 750 && $('.menu').width != '130px' ) {
		$('.menu').css('width', 130);
	}
});

// Collapse accordion every time dropdown is shown
$('.dropdown-accordion').on('show.bs.dropdown', function (event) {
	var accordion = $(this).find($(this).data('accordion'));
	accordion.find('.panel-collapse.in').collapse('hide');
	console.log($('.dropdown-menu').css('width'));
	if($(window).width() > 975){
		close($(this),243);
		$(this).find('.dropdown-menu').animate({width: 244}, 500);		
	} else if($(window).width() > 750) {
		close($(this),202);		
		$(this).find('.dropdown-menu').animate({width: 203}, 500);
	} else {
		$(this).find('.dropdown-menu').stop(true, true).slideDown();
	}
});

$('.dropdown-accordion').on('hide.bs.dropdown', function (event) {
	if($(window).width() > 975){
		open($(this),130);
	} else if($(window).width() > 750) {
		open($(this),100);
	}
	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	$(this).find('.dropdown-menu').stop(true, true).slideUp();
});

function open (element, width) {
	element.find('span').addClass('hidden');
	element.find('.menu').delay(500).animate({width: width}, 500);
}

function close (element, width) {
	element.find('span').removeClass('hidden');
	element.find('.menu').animate({width: width}, 500);
	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	element.find('.dropdown-menu').stop(true, true).delay(500).slideDown();
}

// Prevent dropdown to be closed when we click on an accordion link
$('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function (event) {
	event.preventDefault();
	event.stopPropagation();
	$($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
	$($(this).attr('href')).collapse('show');
});

//Ajax contact form
$(function() {

	// Get the form.
	var form = $('#contact-form');
	// Get the messages div.
	var formMessages = $('#form-output');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
        $("#form-submit").text("Enviando...");

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('alert alert-danger');
			$(formMessages).addClass('alert alert-success');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#name').val('');
			$('#patient').val('');
            $('#phone').val('');
			$('#email').val('');
			$('#info').val('');
            $("#form-submit").text("Enviar");
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('alert alert-success');
			$(formMessages).addClass('alert alert-danger');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
                $("#form-submit").text("Enviar");
			} else {
				$(formMessages).text('Oops! Ocurrió un error no se pudo enviar la forma.');
                $("#form-submit").text("Enviar");
			}
		});

	});

});