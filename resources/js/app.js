require('./bootstrap');

window.Vue = require('vue');

Pusher.logToConsole = true;

var pusher = new Pusher('02663ef16dad0be48721', {
  	cluster: 'ap2'
});

var channel = pusher.subscribe('my-channel');
	channel.bind('my-event', function(data) {
  	app.messages.push(JSON.stringify(data));
});


const app = new Vue({
	el: '#app',
    data: {
    	messages: [],
    },
});