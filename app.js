const WebSocketServer = new require('ws');


class App {


    add_connection(connection) {

        let id = new Date().getTime();
        this.connections[id] = connection;




        let timerId = setTimeout(() => {

            let connection = this.connections[id];

            connection.close();
            delete this.connections[id];

        }, 30000, id);



    }

    constructor() {

        this.connections = {};

        this.ws = new WebSocketServer.Server({
            port: 8081
        });


        this.ws.on('connection', (ws, req) => {

            let active_clients = Object.keys(this.connections).length;

            ws.send(JSON.stringify({active_clients: active_clients}));

            if (active_clients > 5) {
                ws.close();
                return;
            }

            this.add_connection(ws);

        });


    }


}

let test = new App();