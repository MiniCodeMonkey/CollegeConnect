@extends('layouts/main')

@section('content')

<h2>Talk to an ambassador from {{ $college->name }}</h2>

<div id="loading">
	<i class="icon-spinner icon-spin"></i> Connecting with a college ambassador
</div>

<form action="sendmessage" id="chatform" method="post" accept-charset="utf-8" style="display: none">
	<div id="chatlog"></div>
	<input type="text" id="chattext" />
	<input type="submit" value="Send" />
</form>

<script language="javascript">
var roomId = createRoomId();
initializeNewRoom(roomId, {{ $user->id }}, {{ $college->id}});
</script>

@stop