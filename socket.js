var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('cham11ng');

redis.on('message', function(channel, message) {
	message = JSON.parse(message);
	io.emit(channel + ':' + message.event, message.data); // cham11ng:UserSignedUp	
});

server.listen(3000, function() {
	console.log('Server listening at http://localhost:3000');
});
