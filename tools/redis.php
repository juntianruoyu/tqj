<?php 
class RedisTest{
	private $redis_host = '192.168.211.129';
	private $redis_port = '6379';
	private $redis_timeout = '5';
	private $redis_auth = 'foobared';
	
	private  $con;

	public function __construct(){
		$this->con = new Redis();
		$this->con->connect($this->redis_host,$this->redis_port,$this->redis_port);
		$this->con->auth($this->redis_auth);
	}
	
	/*
	 * 模拟实现初始化某个值的动作。不存在是赋值，存在则不做改变
	 */
	public function setXX($key,$val){
		$this->con->watch($key);
		$res = $this->con->get($key);
		if($res === false){
			$this->con->multi();
			$this->con->set($key,$val);
			$this->con->get($key);
			$restult = $this->con->exec();
		}else{
			$restult = $res;
			$this->con->unwatch();//watch监控的key只有在exec执行完才释放，所以unwatch取消监控
		}
		return $restult;
	}
	
	//模拟实现redis的incr操作
	public function incr($key){
		$this->con->watch($key);
		$val = $this->con->get($key);
		$this->con->multi();
		$this->con->set($key,$val+1);
		$this->con->get($key);
		$res = $this->con->exec();
		if(empty($res)){
			$this->incr($key);//如果exec没有执行，则这个动作不停执行，知道执行为止。在并发高的系统中，这个并不合适
		}
		return $res;
	}
	public function __destruct(){
		$this->con->close();
	}


}

class Client{
	public function main(){
		$obj = new RedisTest();
		$res = $obj->setXX('a', 10);
		$res = $obj->incr('a');
		var_dump($res);
	}
	
}

$obj = new Client();
$obj->main();