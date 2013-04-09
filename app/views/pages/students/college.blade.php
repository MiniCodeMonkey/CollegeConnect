@extends('layouts/subpage')

@section('content')

<div class="page-header">
	<h2>Talk to an ambassador from {{ $college->name }}</h2>
</div>

<div id="loading" class="text-center clearfix">
	<i class="icon-spinner icon-spin"></i> Connecting with a college ambassador
</div>

<div class="row-fluid">
<div class="span6 chat-box">
	<div class="chat-header">
		<h3>Nicholas Cerminara</h3>
	</div>
	<div class="chat-messages clearfix">
		<!--<div class="chat-bubble other-bubble clearfix">
			<div class="face-bubble">
				<img class="img-circle" src="http://lorempixel.com/40/40">
			</div>
			<div class="chat-message">
				<p>Look at me i am stuff</p>
			</div>
		</div>
		<div class="chat-bubble my-bubble clearfix">
			<div class="face-bubble">
				<img class="img-circle" src="http://lorempixel.com/40/40">
			</div>
			<div class="chat-message">
				<p>Look at me i am stuff</p>
			</div>
		</div>-->
	</div>
	<div class="chat-compose">
		<form class="horizontal chatform" action="chat" method="post">
			<input type="text" class="input-large">
			<button type="submit" class="btn">Send</button>
		</form>
	</div>
</div>

<div class="span6 college-box">
	<div class="college-box-header">
		<img class="pull-left img-polaroid" src="http://placekitten.com/40/40">
	</div>
	<div class="page-header">
		<h4>{{ $college->name }}</h4>
	</div>
	<div id="college-pledge">
		<a class="btn btn-large btn-block btn-warning" href="#"><i class="icon-thumbs-up"></i> Pledge</a>
		<a class="btn btn-small btn-block btn-info" href="#"><i class="icon-share-alt"></i> Tell Your Friends</a>
	</div>
</div>

</div>

<script language="javascript">
var roomId = createRoomId();
initializeNewRoom(roomId, {{ $user->id }}, {{ $college->id}});
</script>

@stop