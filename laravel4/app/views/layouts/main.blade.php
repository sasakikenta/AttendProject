<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>{{-- $metadata->page_title --}}</title>
    {{ HTML::style('css/main/def.css') }}
    {{ HTML::style('css/config/jquery-ui.min.css') }}
    {{ HTML::style('css/config/colorbox/colorbox.css') }}
    {{ HTML::style('plugins/chosen/chosen.min.css') }}

	{{ HTML::script('js/config/jquery-2.1.3.min.js') }}
	{{ HTML::script('js/config/jquery-ui.min.js') }}
	{{ HTML::script('js/config/datepicker.ja.js') }}
	{{ HTML::script('js/config/colorbox/jquery.colorbox-min.js') }}
	{{ HTML::script('plugins/chosen/chosen.customize.js') }}
	{{ HTML::script('js/config/ajaxsubmit.js') }}

	{{ HTML::script('js/main/config.js') }}

	@section('css-link')
	@show
</head>
<body>
<!-- ▼ヘッダー▼ -->
@section('header')
@include('headers.main')
@show
<!-- ▲ヘッダー▲ -->
	@yield('content')


<!-- ▼フッター▼ -->
@section('footer')
@show
<!-- ▲フッター▲ -->

@section('js-link')

@show

</body>
</html>