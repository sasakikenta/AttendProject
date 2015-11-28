$(function() {
	var MODAL_DIV_ID;

	var modalconfig = {
			inline:true,
			width:"1000px",
			scrolling: false,
			onOpen: function() {},
		};

	$(document).ready(function(){
		modalconfig.onOpen = function() {MODAL_DIV_ID = "#oldmanager-edit";};
		$(".oldmanager-edit").colorbox(modalconfig);
		modalconfig.onOpen = function() {MODAL_DIV_ID = "#trade-edit";};
		$(".trade-edit").colorbox(modalconfig);
		modalconfig.onOpen = function() {MODAL_DIV_ID = "#newdirect-edit";};
		$(".newdirect-edit").colorbox(modalconfig);
		modalconfig.onOpen = function() {MODAL_DIV_ID = "#olddirect-edit";};
		$(".olddirect-edit").colorbox(modalconfig);
	});

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
    	yearRange: "-100:+0",
  	});

	$(document).on('cbox_complete', function() {
		$(MODAL_DIV_ID).append($("#ui-datepicker-div"));
		$("#oldmanager-id").text("");
		$(".updatebuttons").hide();
	});
	$(document).on('cbox_closed', function() {
        $("body").append($("#ui-datepicker-div"));
        $("form").each(function() {
        	$(this).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
        });
        $("select").trigger("chosen:updated");
	});

	function cboxEvent(onState, place, closure) {
		if (place != MODAL_DIV_ID) {return;}
		$(document).on(onState, closure);
	}

	$(document).on('keypress', function(e) {
		if(e.keyCode == 13) {
			e.preventDefault();
		}
	});

});