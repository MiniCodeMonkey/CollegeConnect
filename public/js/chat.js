var socket = io.connect('http://'+ window.location.hostname +':1337');
var userType;

$(function () {
	socket.on('connect', function (data) {
		console.log('connect', data);
	});

	socket.on('newmessage', function (data) {
		var p = $('<p>').html('<strong>' + data.from + '</strong> ' + data.message);
		$("#chatlog").append(p);

		console.log('newmessage', data);
	});

	socket.on('newstudent', function (data) {
		// New student connected
		var chatBox = $('.ambassador-chat-template').clone();
		chatBox.removeClass('ambassador-chat-template');
		chatBox.removeClass('hide');
		chatBox.attr('data-roomid', data.room_id);
		
		$("#welcome-ambassador").append(chatBox);
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
	userType = 'STUDENT';

	socket.emit('subscribe', {
		user_id: userId,
		room_id: roomId,
		college_id: collegeId
	});
	$("#chatform").show();
	$("#loading").hide();
}

function ambassadorReportingForDuty(userId, collegeId)
{
	userType = 'AMBASSADOR';
	
	socket.emit('newambassador', {
		user_id: userId,
		college_id: collegeId
	});
}

function createRoomId()
{
	'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
	    var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
	    return v.toString(16);
	});
}