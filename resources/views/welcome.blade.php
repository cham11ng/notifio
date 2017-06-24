<!DOCTYPE html>
<html>
<head>
    <title>Welcome | Node.js & Socket.io & Laravel</title>
</head>
<body>
<div id="channel">
    <h1>New Users</h1>

    <ul>
        <li v-for="user in users">@{{ user }}</li>
    </ul>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.js"></script>
<script type="text/javascript">
    var socket = io('http://localhost:3000');

    new Vue({
        el: '#channel',
        data: {
            users: []
        },

        mounted() {
            const vm = this;
            
            socket.on('cham11ng:App\\Events\\UserSignedUp', function(data) {
                vm.users.push(data.username);
            });
        }
    });
</script>
</body>
</html>