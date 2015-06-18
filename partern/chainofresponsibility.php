<?php  
 
/** 
* 职责链模式  
*  
* 为解除请求的发送者和接收者之间的耦合,而使用多个对象都用机会处理这个请求,将这些对象连成一条链,并沿着这条链传递该请求,直到有一个对象处理它  
*
抽象处理者角色:定义一个处理请求的接口，和一个后继连接(可选)

具体处理者角色:处理它所负责的请求，可以访问后继者，如果可以处理请求则处理，否则将该请求转给他的后继者。

客户类:向一个链上的具体处理者ConcreteHandler对象提交请求。
*  
*/  

/*职责链模式相对来说是比较灵活的，链可以设置成直，环形均可
 * 
 * 还有纯的责任链，不纯的责任链
 */

//抽象处理者角色，一般包含两个方法：处理请求，为请求设置继任者
abstract class Handler{
	public $next_handler;
	
	public function setNextHandler($handler){
		$this->next_handler = $handler;
	}
	
	abstract public function executeRequest($request);
} 


//具体的处理者，如果能处理，自己处理，不能处理，留给下一个继任者
class Leader extends Handler{
	public function executeRequest($request){
		if($request->days>0&&$request->days<=1){
			echo '团队领导已经批准';
		}else{
			$this->next_handler->executeRequest($request);
		}
		
	}
}

class Director extends Handler{
	public function executeRequest($request){
		if($request->days>1&&$request->days<=3){
			echo '总监已经批准';
		}else{
			$this->next_handler->executeRequest($request);
		}
	}
}

class Manager extends Handler{
	public function executeRequest($request){
		if($request->days>3){
			echo '总经理已经批准';
		}else{
			$this->next_handler->executeRequest($request);
		}	
	}
}
//请求
class Request{
	public $days;
	
	public function __construct($days){
		$this->days = $days;
	}
}

class Client{
	public static function main1(){
		//构造一个请求，三个处理角色
		$request = new Request(2);
		$leadler = new Leader();
		$director = new Director();
		$manager = new Manager();
		
		//把三者组成链
		$leadler->setNextHandler($director);
		$director->setNextHandler($manager);
		
		//链头发出请求
		$leadler->executeRequest($request);
	}
	
	public function main2(){
		$request = new Request(2);
		$leadler = new Leader();
		$director = new Director();
		$manager = new Manager();
		
		//构成了一个环形链子，谁都可以是接受者
		$leadler->setNextHandler($director);
		$director->setNextHandler($manager);
		$manager->setNextHandler($leadler);
		
		$manager->executeRequest($request);
	}
}

Client::main2();
?>
