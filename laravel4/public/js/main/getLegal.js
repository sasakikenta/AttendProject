$(function() {

	getLegal($("[name='hall'] > option:selected").val());

	$("[name='hall']").chosen().change(function() {
		getLegal($(this).val());
	});

	function getLegal(id) {
		var url = $("#legal").data("url");
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				hallid: id,
			},
			success: function(data) {
				$("#legal").text(data.name);
			},
			error: function() {
				alert('error');
			}
		});
	}

});