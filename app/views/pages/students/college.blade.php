@extends('layouts/subpage')

@section('content')

<div class="page-header">
	<h2>Talk to an ambassador from {{ $college->name }}</h2>
</div>

<div id="loading" class="text-center clearfix">
	<i class="icon-spinner icon-spin"></i> Connecting with a college ambassador
</div>

<form action="sendmessage" id="chatform" class="clearfix" method="post" accept-charset="utf-8" style="display: none">
	<div id="chatlog"></div>
	<input type="text" id="chattext" />
	<input type="submit" value="Send" />
</form>
<div class="row-fluid">
<div class="span6 chat-box">
	<div class="chat-header">
		<h3>Nicholas Cerminara</h3>
	</div>
	<div class="chat-messages clearfix">
		<div class="chat-bubble other-bubble clearfix">
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
		</div>
	</div>
	<div class="chat-compose">
		<form class="horizontal">
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
		<h4>Stanford University</h4>
	</div>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>Established</td>
				<td>194 BC</td>
			</tr>
			<tr>
				<td>Location</td>
				<td>San Francisco, CA</td>
			</tr>
			<tr>
				<td>Population</td>
				<td>132432432</td>
			</tr>
		</tbody>
	</table>
</div>
</div>

<script language="javascript">
var roomId = createRoomId();
initializeNewRoom(roomId, {{ $user->id }}, {{ $college->id}});
</script>

@stop