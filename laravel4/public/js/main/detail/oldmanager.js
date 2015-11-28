$(function() {
	//初期処理
	editZoneInit();
	$(document).on("change", "[name='c_s'], [name='class']", function() {
		oldmanagerNoChange();
	});
	$(document).on("change", "[name='buy_money'], [name='deli_money']", function() {
		oldmanagerBuytotalChange();
	});
	$(document).on("change", "[name='buy_money'], [name='deli_money'], [name='sell_money']", function() {
		oldmanagerArari();
	});
	$(document).on("keypress", "[name='buy_money'], [name='deli_money']", function() {
		oldmanagerBuytotalChange();
		oldmanagerArari();
	});
	$(document).on("keypress", "[name='sell_money']", function() {
		oldmanagerArari();
	});

	$("[name='user']").chosen().change(function() {
		oldmanagerNoChange();
	});


	//関数まとめ
	function editZoneInit() {
		oldmanagerNoChange();
		oldmanagerBuytotalChange();
		oldmanagerArari();
	}

	function oldmanagerNoChange() {
		var cs = ($("[name='c_s']:checked").val() == 1) ? 'C' : 'S';
		var cls = ($("[name='class']:checked").val() == 1) ? 'A' : 'K';
		var user = ($("[name='user']").val() == "") ? '0' : $("[name='user']").val();
		$("#oldmanager-no").text(cs + cls + user + '---');
	}

	function oldmanagerBuytotalChange() {
		var buymoney = parseInt($("[name='buy_money']").val());
		buymoney = (!isNaN(buymoney)) ? buymoney : 0;
		var delimoney = parseInt($("[name='deli_money']").val());
		delimoney = (!isNaN(delimoney)) ? delimoney : 0;
		var total = buymoney + delimoney;
		total = total.toString().replace(/(\d)(?=(\d\d\d)+$)/g , '$1,')
		$("#oldmanager-buytotal").text("\\ " + total + " -");
	}

	function oldmanagerArari() {		
		var buymoney = parseInt($("[name='buy_money']").val());
		buymoney = (!isNaN(buymoney)) ? buymoney : 0;
		var delimoney = parseInt($("[name='deli_money']").val());
		delimoney = (!isNaN(delimoney)) ? delimoney : 0;
		var total = buymoney + delimoney;
		var sellmoney = parseInt($("[name='sell_money']").val());
		sellmoney = (!isNaN(sellmoney)) ? sellmoney : 0;

		total = sellmoney - total;

		total = total.toString().replace(/(\d)(?=(\d\d\d)+$)/g , '$1,')
		$("#oldmanager-arari").text("\\ " + total + " -");
	}

});