$(function() {

	var data = {
			id: $("oldmanager-id").text(),
			c_s: $('[name="c_s"]:checked').val(),
			class: $('[name="class"]:checked').val(),
			day: $('[name="day"]').val(),
			storage_day: $('[name="storage_day"]').val(),
			user: $('[name="user"]').val(),
			bill_no: $('[name="bill_no"]').val(),
			serial_slot: $('[name="serial_slot"]').val(),
			serial_case: $('[name="serial_case"]').val(),
			serial_basea: $('[name="serial_basea"]').val(),
			machine: $('[name="machine"]').val(),
			note: $('[name="note"]').val(),
			buy_legal: $('[name="buy_legal"]').val(),
			buy_hall: $('[name="buy_hall"]').val(),
			buy_money: $('[name="buy_money"]').val(),
			deli_money: $('[name="deli_money"]').val(),
			pay_day: $('[name="pay_day"]').val(),
			settle: $('[name="settle"]:checked').val(),
			sell_legal: $('[name="sell_legal"]').val(),
			sell_money: $('[name="sell_money"]').val(),
			deli_oneday: $('[name="deli_oneday"]').val(),
			deli_day: $('[name="deli_day"]').val(),
			delivery: $('[name="delivery"]:checked').val(),
		};
	$('#submit-oldmanager')
		.ajaxsubmit({
			data: data,
			success: function(response) {
				$(".createbuttons").hide();
				$(".updatebuttons").show();
				alert('登録しました');
				$("#oldmanager-id").text(response.id);
				$("#oldmanager-no").text(response.no);
			}
		});

});