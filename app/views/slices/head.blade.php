<!-- meta stuffs -->
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Casa de Chef">

<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><!-- Force IE to use the latest rendering engine -->
<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Optimize mobile viewport -->
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">

<title>College Connect</title>

<!-- mobile icons and favicons stuffs -->
<link rel="shortcut icon" type="image/png" href="img/icons/favicon-16.png"><!-- default favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="img/icons/favicon-57.png"><!-- iPhone low-res and Android -->
<link rel="apple-touch-icon" sizes="72x72" href="img/icons/favicon-72.png"><!-- iPad -->
<link rel="apple-touch-icon" sizes="114x114" href="img/icons/favicon-114.png"><!-- iPhone 4 -->
<link rel="apple-touch-icon" sizes="144x144" href="img/icons/favicon-144.png"><!-- iPad hi-res -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/icons/favicon-57.png"><!-- Android -->

<!-- css -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="/css/bootstrap-responsive.min.css"> -->
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">

<link rel='stylesheet'  href='http://fonts.googleapis.com/css?family=Sintony:400,700'>

<!-- js -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

@if (count(Request::segments()) == 0)
	<script src="/js/core.js"></script>
@endif

@if (Request::segment(1) == 'college' || (Auth::check() && Auth::user()->user_type == 'AMBASSADOR'))
	<script src="http://{{ $_SERVER['SERVER_NAME'] }}:1337/socket.io/socket.io.js"></script>
	<script src="/js/chat.js"></script>
@endif