//const _Redis = require("ioredis");
const _Redis = require("redis");

class Redis{
    
	constructor(){
		this.conf = {
                                          port: 6379, // Redis port
                                          host: "127.0.0.1", // Redis host
                                          family: 4, // 4 (IPv4) or 6 (IPv6)
                                          password: "simple",
                                          db: 0,
                                };
	
		this.expired_subKey = '__keyevent@'+this.conf.db+'__:expired'

                
		this.pub = _Redis.createClient(this.conf)
		this.sub = _Redis.createClient(this.conf)

		this.sub.subscribe(this.expired_subKey,()=>{
 			 console.log(' [i] Subscribed to "'+this.expired_subKey+'" event channel : ')
 			 this.sub.on('message',function (chan,msg){console.log('[expired]',msg)})
 				 
 		});


}


scan_list(callback){

	this.redis.keys('*', function (err, keys) {
          if (err) return console.log(err);
        callback(keys);
    });
     
}

    set_key(key,value){
        this.pub.set(key, value)
	this.pub.expire(key,2)
	

    }

	
}

let test = new Redis();

test.set_key('abc',1);
 

