var socket = io.connect('http://'+ window.location.hostname +':1337');
var inSession = false;
var userType;
var myId;

$(function () {
	socket.on('connect', function (data) {
		console.log('connect', data);
	});

	socket.on('newmessage', function (data) {
		if (!inSession) {
			inSession = true;

			$("#loading").hide();

			// New student connected
			$('#ambassador-chat').removeClass('hide');
			$('#ambassador-chat').attr('data-roomid', data.room_id);
		}

		var remote = (userType == 'AMBASSADOR') ? 'Student' : 'College Ambassador';
		var name = (data.user_id == myId) ? 'Me' : remote;
		var p = $('<p>').html('<strong>'+ name +'</strong> ');
		p.append(data.message);
		$(".chat-messages").append(p);

		console.log('newmessage', data);
	});

	socket.on('newstudent', function (data) {
		if (!inSession) {
			inSession = true;
			
			$("#loading").hide();

			// New student connected
			$('#ambassador-chat').removeClass('hide');
			$('#ambassador-chat').attr('data-roomid', data.room_id);
		}
	});

	$(".chatform").submit(function () {
		socket.emit('sendmessage', {
			message: $(this).find('input').val()
		});
		$(this).find('input').val('');

		return false;
	});
});

function initializeNewRoom(roomId, userId, collegeId)
{
	myId = userId;

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
	myId = userId;

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