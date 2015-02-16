(function($){
	'use strict';
	console.info($('#select-date'));
	$('#select-date').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '+1d'
	});
})(jQuery);