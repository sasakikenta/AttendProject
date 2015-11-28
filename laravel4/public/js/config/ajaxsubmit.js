;(function($) {
	$.fn.ajaxsubmit = function(options) {
		var defaults = {
			data : {},
			type : 'POST',
			url  : ( this.data('url') ) ? this.data('url') : '',
			success : function() { alert('成功しました'); },
			error : function() { alert('失敗しました'); },
			done: function(response) {},
		};
		//var form = this.parents('form');
		this.on('click', function(e) {
			e.preventDefault();
			var data = '{';
			//HTMLInputElement
			/*form.find('input').each(function() {
				var name = $(this).attr('name');
				alert($(this).attr('type'));
				switch($(this).attr('type')) {
					case 'radio':
						break;
					case 'checkbox':
						break;
					default :
						data = data + '"' + name + '" : "' + $(this).val() + '",';
				}
			});*/
			data = data + '}';

			defaults.data = JSON.parse(data);
		

			var setting = $.extend(defaults, options);
		
			$.ajax(setting);
		});
		return this;
	}
}) (jQuery);