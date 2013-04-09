@extends('layouts/main')

@section('content')
<div id="welcome-ambassador">
	<div class="page-header">
		<h1>Welcome Ambassador! <small>Go forth and inform!</small></h1>
	</div>

	<h2>Your Chats</h2>
	<div id="ambassador-chat" class="row-fluid">
		<h2>Your chat sessions are incoming soon!</h2>
		<i id="ambassador-loading" class="icon-spinner icon-spin"></i>

		<div class="span4 chat-box">
			<div class="chat-messages">
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
					<input type="text">
					<button type="submit" class="btn">Send</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop