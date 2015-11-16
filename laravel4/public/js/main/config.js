$(function() {
	$("select").chosen({
		search_contains:true,
		width: "300px",
	});
	$(".datepicker").datepicker({
		search_contains: true,
		allow_single_deselect: true
  	});

});