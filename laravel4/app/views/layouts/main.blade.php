<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>{{-- $metadata->page_title --}}</title>
	<link href="/css/main/def.css" rel="stylesheet">
	<link href="/css/config/jquery-ui.min.css" rel="stylesheet">
	<link href="/css/config/colorbox/colorbox.css" rel="stylesheet">
	<link href="/plugins/chosen/chosen.min.css" rel="stylesheet">

	<script src="/js/config/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="/js/config/jquery-ui.min.js" type="text/javascript"></script>
	<script src="/js/config/datepicker.ja.js" type="text/javascript"></script>
	<script src="/js/config/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
	<script src="/plugins/chosen/chosen.customize.js" type="text/javascript"></script>

	<script src="/js/main/modal.js" type="text/javascript"></script>
	<script src="/js/main/config.js" type="text/javascript"></script>
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