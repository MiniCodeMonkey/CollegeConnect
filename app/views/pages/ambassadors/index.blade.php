@extends('layouts/subpage')

@section('content')
<div id="welcome-ambassador">
	<div class="page-header">
		<h1>Welcome Ambassador! <small>Go forth and inform!</small></h1>
	</div>

	<div id="ambassador-chat" class="row-fluid hide">
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
				</div>
				-->
			</div>
			<div class="chat-compose">
				<form class="horizontal chatform" action="chat" method="post">
					<input type="text" class="input-large">
					<button type="submit" class="btn">Send</button>
				</form>
			</div>
		</div>

	</div>
</div>

<script language="javascript">
ambassadorReportingForDuty({{ $user->id }}, {{ $user->college_id }});
</script>

@stop