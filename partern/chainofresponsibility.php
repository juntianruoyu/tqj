<?php  
 
/** 
* ְ����ģʽ  
*  
* Ϊ�������ķ����ߺͽ�����֮������,��ʹ�ö�������û��ᴦ���������,����Щ��������һ����,���������������ݸ�����,ֱ����һ����������  
*
�������߽�ɫ:����һ����������Ľӿڣ���һ���������(��ѡ)

���崦���߽�ɫ:����������������󣬿��Է��ʺ���ߣ�������Դ��������������򽫸�����ת�����ĺ���ߡ�

�ͻ���:��һ�����ϵľ��崦����ConcreteHandler�����ύ����
*  
*/  

/*ְ����ģʽ�����˵�ǱȽ����ģ����������ó�ֱ�����ξ���
 * 
 * ���д�����������������������
 */

//�������߽�ɫ��һ�����������������������Ϊ�������ü�����
abstract class Handler{
	public $next_handler;
	
	public function setNextHandler($handler){
		$this->next_handler = $handler;
	}
	
	abstract public function executeRequest($request);
} 


//����Ĵ����ߣ�����ܴ����Լ��������ܴ���������һ��������
class Leader extends Handler{
	public function executeRequest($request){
		if($request->days>0&&$request->days<=1){
			echo '�Ŷ��쵼�Ѿ���׼';
		}else{
			$this->next_handler->executeRequest($request);
		}
		
	}
}

class Director extends Handler{
	public function executeRequest($request){
		if($request->days>1&&$request->days<=3){
			echo '�ܼ��Ѿ���׼';
		}else{
			$this->next_handler->executeRequest($request);
		}
	}
}

class Manager extends Handler{
	public function executeRequest($request){
		if($request->days>3){
			echo '�ܾ����Ѿ���׼';
		}else{
			$this->next_handler->executeRequest($request);
		}	
	}
}
//����
class Request{
	public $days;
	
	public function __construct($days){
		$this->days = $days;
	}
}

class Client{
	public static function main1(){
		//����һ���������������ɫ
		$request = new Request(2);
		$leadler = new Leader();
		$director = new Director();
		$manager = new Manager();
		
		//�����������
		$leadler->setNextHandler($director);
		$director->setNextHandler($manager);
		
		//��ͷ��������
		$leadler->executeRequest($request);
	}
	
	public function main2(){
		$request = new Request(2);
		$leadler = new Leader();
		$director = new Director();
		$manager = new Manager();
		
		//������һ���������ӣ�˭�������ǽ�����
		$leadler->setNextHandler($director);
		$director->setNextHandler($manager);
		$manager->setNextHandler($leadler);
		
		$manager->executeRequest($request);
	}
}

Client::main2();
?>
