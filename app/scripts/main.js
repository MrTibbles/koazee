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
	}

	$('.copy-clipboard').on('click', copyToClipboard);
})(jQuery);