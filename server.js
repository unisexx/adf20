var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', (req, res)=>{
    res.end("testtttttt");
});

io.on('connection', (socket)=>{
    // console.log('client connected');

    // Listen
    socket.on('chatMessage', (data)=>{
        console.log('message : ' + data.msg);
        console.log('imgur : '+ data.imgur);

        // Reply ข้อความกลับไปที่ client
        io.emit('chatMessage', data);
    });
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});