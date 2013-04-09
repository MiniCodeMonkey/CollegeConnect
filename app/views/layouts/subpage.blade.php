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
		<div id="content" class="container-fluid">
		@yield('content')
		</div>
	</div>	

	<footer>
		<div class="container-fluid">
		@include('slices.footer')
		</div>
	</footer>
</body>
</html>