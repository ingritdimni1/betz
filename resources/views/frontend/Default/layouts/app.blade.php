<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('page-title') - {{ settings('app_name') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="@yield('page-title') - {{ settings('app_name') }}">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="/frontend/Default/img/favicon.png">
	<meta property="og:image" content="/frontend/Default/img/vladA.png">

	<link rel="stylesheet" href="/frontend/Default/css/slick.css">
	<link rel="stylesheet" href="/frontend/Default/css/simplebar.css">
	<link rel="stylesheet" href="/frontend/Default/css/styles.min.css">

</head>

<body class="@yield('add-body-class')">

<script type="text/javascript">
	var is_games_page =@if(isset($is_game_page)) true @else false @endif;
	var terms_and_conditions = @if(Auth::check() && auth()->user()->shop && auth()->user()->shop->rules_terms_and_conditions && !auth()->user()->agreed) true @else false @endif;
</script>

<!-- MAIN -->
<main class="main @yield('add-main-class')">
    @yield('content')
</main>
<!-- /.MAIN -->

@yield('footer')

<!-- SCRIPTS -->

<div class="preloader">
    <div class="preloader__img">
        <img src="/frontend/Default/img/_src/preloader_img.png" alt="preloader image">
    </div>
    <div class="preloader__progress">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<script src="/frontend/Default/js/jquery-3.4.1.min.js"></script>
<script src="/frontend/Default/js/jquery.inputmask.bundle.min.js"></script>
<script src="/frontend/Default/js/simplebar.min.js"></script>
<script src="/frontend/Default/js/slick.min.js"></script>
<script src="/back/bower_components/moment/min/moment.min.js"></script>
<script src="/back/bower_components/moment/min/moment-timezone-with-data-1970-2030.min.js"></script>
<script src="/frontend/Default/js/countdown.min.js"></script>
<script src="/frontend/Default/js/moment-countdown.min.js"></script>
<script src="/frontend/Default/js/lazyload.min.js"></script>

<script type="text/javascript">
	$(function() {
		moment.tz.setDefault("{{ config('app.timezone') }}");
	});
</script>

<script type="text/javascript">
	$(function() {
		setInterval(function(){
			$.get('/refresh-csrf').done(function(data){
				$('[name="csrf-token"]').attr('content', data);
				$('[name="_token"]').val(data);
			});
		}, 5000);

	});
	var lazyLoadInstance = new LazyLoad({
		// Your custom settings go here
	});
</script>

<script src="/frontend/Default/js/custom.js"></script>

@yield('scripts')

</body>
</html>
