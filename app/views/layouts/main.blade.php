<!doctype html>
<html>
	@include('slices.head')
</html>
<body>
	<header>
		<div class="container-fluid">
		@include('slices.header')
		</div>
	</header>

	<div id="main" role="main">
		@yield('content')
	</div>	

	<footer>
		<div class="container-fluid">
		@include('slices.footer')
		</div>
	</footer>
</body>
</html>