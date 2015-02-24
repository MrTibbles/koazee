(function($){
	'use strict';	
	$('.datepicker').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '+1d',
	    autoClose: true
	});

	function copyToClipboard(text) {
		var link = $('.share-link').html();
	  window.prompt("Copy to clipboard: Ctrl+C, Enter", link);
	};

	function validateEmail(email) { 
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	} ;

	$('body').on('click', '.copy-clipboard', copyToClipboard);

	var email = $('#user-email'),
		form = $('form.main-contact');

	$('body').on('click', '#submit-form', function(e){
		e.preventDefault();
		if (!validateEmail(email.val()) || !form.find('input').val() || !form.find('.datepicker').val()) {

		}
	})
})(jQuery);