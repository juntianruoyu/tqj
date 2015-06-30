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
	 * ģ��ʵ�ֳ�ʼ��ĳ��ֵ�Ķ������������Ǹ�ֵ�����������ı�
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
			$this->con->unwatch();//watch��ص�keyֻ����execִ������ͷţ�����unwatchȡ�����
		}
		return $restult;
	}
	
	//ģ��ʵ��redis��incr����
	public function incr($key){
		$this->con->watch($key);
		$val = $this->con->get($key);
		$this->con->multi();
		$this->con->set($key,$val+1);
		$this->con->get($key);
		$res = $this->con->exec();
		if(empty($res)){
			$this->incr($key);//���execû��ִ�У������������ִͣ�У�֪��ִ��Ϊֹ���ڲ����ߵ�ϵͳ�У������������
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