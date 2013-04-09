var app = require('http').createServer(handler)
    , io = require('socket.io').listen(app)
    , fs = require('fs')

app.listen(1337);

function handler (req, res) {
    res.writeHead(200);
    res.end(data);
}

io.sockets.on('connection', function (socket) {
    socket.on('subscribe', function(data) {
        socket.user_id = data.user_id;
        socket.join(data.room_id);
        socket.broadcast.to(data.room_id).emit('newmessage', {
            from: data.user_id,
            message: 'Connected'
        });

        socket.broadcast.to('college' + data.college_id).emit('newstudent', {
            user_id: data.user_id,
            room_id: data.room_id
        });
    });

    socket.on('unsubscribe', function(data) {
        socket.broadcast.to(data.room_id).emit('newmessage', {
            from: data.user_id,
            message: 'Disconnected'
        });

        socket.leave(data.room_id);
    });

    socket.on('sendmessage', function (data) {
        io.sockets.in(socket.room_id).emit('newmessage', {
            from: data.from,
            message: data.message
        });
    });

    socket.on('newambassador', function (data) {
        console.log('Got new ambassador!', data);

        socket.join('college' + data.college_id);
    });
});