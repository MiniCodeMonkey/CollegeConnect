@extends('layouts/subpage')

@section('content')
<div id="welcome-ambassador">
	<div class="page-header">
		<h1>Welcome Ambassador! <small>Go forth and inform!</small></h1>
	</div>

	<div id="ambassador-chat" class="row-fluid">

		<div class="span6 chat-box">
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
					<input type="text">
					<button type="submit" class="btn">Send</button>
				</form>
			</div>
		</div>

		<div class="span6 chat-box">
			<div class="chat-messages clearfix">
				<div class="other-bubble">
					<div class="face-bubble">
						<img class="img-circle" src="http://lorempixel.com/100/100">
					</div>
					<div class="chat-message">
						<p>Look at me i am stuff</p>
					</div>
				</div>
				<div class="my-bubble">
					<div class="face-bubble">
						<img class="img-circle" src="http://lorempixel.com/100/100">
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

	</div>
</div>
@stop