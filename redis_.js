const _Scheduler = require('redis-scheduler');


class Redis{
    
	constructor(){

                this.scheduler = new Scheduler({ host: '127.0.0.1', port: 6379,password: "simple",db: 0 });

		this.expirationTime = 1000;

		this.scheduler.schedule({ key: 'test-key', expire: expirationTime, handler: (err,key)=>{
					if (err) return console.log(err);
					console.log(key);
}}, function (err) {
		
			  console.log("// Schedule set");
		});

    }

scan_list(callback){

	this.redis.keys('*', function (err, keys) {
          if (err) return console.log(err);
        callback(keys);
    });
     
}

    set_key(key,value,options={ex:"ex", seconds:"10"}){
        this.redis.set(key, value, options.ex,options.seconds)
    }

	
}

let test = new Redis();
test.scan_list((keys)=>{
	console.log(keys);
});
 

