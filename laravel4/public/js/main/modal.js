$(function() {
	var modalconfig = {
			inline:true,
			width:"1000px",
			scrolling: false
		};

	$(document).ready(function(){
		$(".oldmanager-edit").colorbox(modalconfig);
		$(".trade-edit").colorbox(modalconfig);
		$(".newdirect-edit").colorbox(modalconfig);
		$(".olddirect-edit").colorbox(modalconfig);
	});
});