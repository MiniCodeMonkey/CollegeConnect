@extends('layouts/main')

@section('content')
<div id="welcome">
    <div id="map-canvas"></div>
	<div id="welcome-msg">
		<h1>Connect with College Ambassadors</h1>
		<h2>Your school. Your ambassadors.</h2>
		<p>Find your college and get familiar by talking to its ambassadors.</p>	
		<p>They'll help with your college planning, questions, and greatest fears.</p>
		
		<a class="btn btn-large btn-primary" href="{{ URL::to('/register/student') }}">Start Talking to an Ambassador</a>
		<a id="welcome-ambassador-link" href="{{ URL::to('/register/ambassador') }}">Be an Ambassador</a>
	</div>	
</div>
@stop
