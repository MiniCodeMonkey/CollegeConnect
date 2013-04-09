<a id="logo" class="pull-left" href="/"><i class="icon-exchange"></i> College Ambassador</a>

<nav id="main-nav" class="pull-right" role="nav">
	<ul class="nav-pills">
		@if (!Auth::check())
		<li><a href="{{ URL::to('/register/student') }}" class="btn btn-primary btn-large"><i class="icon-facebook"></i> I am a Student</a></li>
		<li><a href="{{ URL::to('/register/ambassador') }}" class="btn btn-primary btn-large"><i class="icon-facebook"></i> I am an Ambassador</a></li>
		@else
		<li><a href="{{ URL::to('/logout') }}" class="btn btn-primary btn-large"><i class="icon-lock"></i> Logout</a></li>
		@endif
	</ul>
</nav>