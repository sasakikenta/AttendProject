$(function() {
	
	$("select").chosen({
		allow_single_deselect: true,
		search_contains:true,
		width: "300px",
	});
	$(".datepicker").datepicker({
    	dateFormat: 'yy-mm-dd',
		search_contains: true,
		allow_single_deselect: true,
	    changeMonth: true,
	    changeYear: true,
	    showButtonPanel: true,
    	yearRange: "-50:+10",
  	});

	$(document).on("keypress", "input:not(.allow_submit)", function(event) {
		return event.which !== 13;
	});

});