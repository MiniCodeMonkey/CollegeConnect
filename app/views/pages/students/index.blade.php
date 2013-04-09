@extends('layouts/main')

@section('content')
<div id="welcome-search">
	<form class="form-horizontal" action="">
		<input type="text" class="input-medium search-query">
		<button type="submit" class="btn">Search</button>
	</form>
</div>
<div id="welcome">
    <div id="map-canvas"></div>
	<div id="welcome-msg">
		<h1>Choose Your College</h1>
		<h2>Find an Ambassador</h2>
		<p>Learn everything about your college. Which teachers are cruel? What type of major should I choose?</p>	
	</div>	
</div>
@stop
