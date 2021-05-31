const WebSocketServer = new require('ws');
const _Scheduler = require('redis-scheduler');


class Websocket {
     
	constructor(){
		// подключённые клиенты
		this.clients = {};

		 this.scheduler = new _Scheduler({ host: '127.0.0.1', port: 6379,password: "simple",db: 0 });

                this.ws = new WebSocketServer.Server({
 				 port: 8081
		});

		this.ws.on('request', function(req) {
					console.log(req);
				  req.reject()
				}
		)


		this.ws.on('connection', function(ws, req) {

		    let ip =  req.headers['x-forwarded-for'] || req.connection.remoteAddress;
		    this.clients[ip] = ws;
		    
 	 	  
  		    console.log("новое соединение " + ip );

 		    ws.on('message', function(message) {
    				console.log('получено сообщение ' + message);

   			 for (var key in clients) {
     				 this.clients[key].send(message);
   				 }
  		    });

  		ws.on('close', function() {
   				 console.log('соединение закрыто ' + ip);
   				 delete this.clients[ip];
  		});

	});



	  }




	
}

let test = new Websocket();

