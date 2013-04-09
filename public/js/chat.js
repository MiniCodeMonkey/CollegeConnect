var socket;
var userType;

$(function () {
	$("#ambassadorbtn").hide();
	$("#studentbtn").hide();
	$("#chatform").hide();

	socket  = io.connect('http://'+ window.location.hostname +':1337');
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