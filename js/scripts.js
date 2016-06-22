jQuery(document).ready(function($) {
	function searchResults() {
		if ($(window).width() > 768) {
			groupSearchResults(3);  //3 services in the banner for medium displays
		} else {
			$(".single-search-result").wrap("<div class='item'></div>");  //single services in the banner for small displays
			$("#search-results-carousel .carousel-inner div:first").addClass("active");    //activate the carousel
		}
	}

	function groupSearchResults(split) {
		var $singleService = $('.single-search-result');
		var servicesLength = $singleService.length;
		for (var i = 0;i < servicesLength;i+=split){
			$singleService.filter(':eq('+i+'),:lt('+(i+split)+'):gt('+i+')').wrapAll("<div class='item'></div>");  //add item wrappers
		}
		$("#search-results-carousel .carousel-inner div:first").addClass("active");  //activate the carousel
	}

	searchResults();
	$('.datepicker-input').datepicker();
	$('.timepicker-input').timepicker({ 'step': 30 });

	//Ajax contact form
	$(function() {
		var form = $('#ContactForm');
		var formMessages = $('#form-messages');

		$(form).submit(function(event) {
			event.preventDefault();
			var formData = $(form).serialize();

			$.ajax({  
				type: "POST",
				data: formData,
				url: templateUrl + '/php/contactForm.php'				
			}).done(function(response) {
		    // Set the message text.
		    $(formMessages).text(response);

		    // Clear the form.
		    $('#name').val('');
		    $('#email').val('');
		    $('#message').val('');
			}).fail(function(data) {
		    // Set the message text.
		    if (data.responseText !== '') {
	        $(formMessages).text(data.responseText);
		    } else {
	        $(formMessages).text('Oops! An error occured and your message could not be sent.');
		    }
			})
		});
	})

	//Ajax Booking form
	$(function() {
		var form = $('#BookYourWeddingForm');
		var formMessages = $('#form-messages');

		$(form).submit(function(event) {
			event.preventDefault();
			var formData = $(form).serialize();

			$.ajax({  
				type: "POST",
				data: formData,
				url: templateUrl + '/php/bookingForm.php'				
			}).done(function(response) {
		    // Set the message text.
		    $(formMessages).text(response);
			}).fail(function(data) {
		    // Set the message text.
		    if (data.responseText !== '') {
	        $(formMessages).text(data.responseText);
		    } else {
	        $(formMessages).text('Oops! An error occured and your message could not be sent.');
		    }
			})
		});
	})

	// Mailto Anti Spam logic
	// Use case: <a class="mailto" data-domain="whistlerweddingpastor.com" data-prefix="jeremy" ></a>
  $('.mailto').each(function() {
      prefix = $(this).data('prefix');
      domain = $(this).data('domain');
      $(this).attr('href', 'mailto:'+prefix+'@'+domain).append(prefix+'@'+domain);
  });
});

$('.link-slide').click(function(event){
	link = $(this).data("href");
	if ($(link).length) {
		event.preventDefault();
		$('body,html').animate({scrollTop: $(link).position().top+40}, 800);
	}
})