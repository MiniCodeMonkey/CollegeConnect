var socket = io.connect('http://'+ window.location.hostname +':1337');
var userType;

$(function () {
	socket.on('connect', function (data) {
		$("#ambassadorbtn").show();
		$("#studentbtn").show();

		console.log('connect', data);
	});

	socket.on('newmessage', function (data) {
		var p = $('<p>').html('<strong>' + data.from + '</strong> ' + data.message);
		$("#chatlog").append(p);

		console.log('newmessage', data);
	});

	$("#ambassadorbtn").click(function () {
		userType = 'ambassador';
		socket.emit('subscribe', {
			user_id: 1,
			room_id: 'abcdefhijklmnopq'
		});
		$("#chatform").show();
	});

	$("#studentbtn").click(function () {
		userType = 'student';
		socket.emit('subscribe', {
			user_id: 2,
			room_id: 'abcdefhijklmnopq'
		});
		$("#chatform").show();
	});

	$("#chatform").submit(function () {
		socket.emit('sendmessage', {
			message: $('#chattext').val()
		});
		$('#chattext').val('');

		return false;
	});
});

function initializeNewRoom(roomId, userId, collegeId)
{
	socket.emit('subscribe', {
		user_id: userId,
		room_id: roomId,
		school_id: collegeId
	});
	$("#chatform").show();
	$("#loading").hide();
}

function createRoomId()
{
	'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
	    var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
	    return v.toString(16);
	});
}