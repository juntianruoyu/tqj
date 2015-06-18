<?php 
/*
 * 命令模式：（行为模式）将一个请求封装成一个对象（命令封装成对象），从而可以使用不同的请求对客户参数化(客户的不同请求，调不同的封装对象)，
 * 对请求排序，或者记录请求日志，以及支持可取消的操作
 * 
 1 命令接口：声明执行方法
 2 发起者 ： 记录、撤销请求，请求命令执行
 3 接受者 ： 命令的具体实现角色。
 4 具体命令： 包含接受者，调用接受者执行。
 */


//具体做事情的角色，接受者
class Receiver{
	public $name;
	
	public function __construct($name){
		$this->name = $name;
		
	}
	
	public function action(){
		echo $this->name.'跳大';
	}
	
	public function action1(){
		echo $this->name.'防御';
	}
	
	public function action2(){
		echo $this->name.'治疗';
	}
}


//命令接口
interface Command{
	public function execute();
}

//具体的三个命令，包含一个接受者，调用接受者去做
class Command1 implements Command{
	public $receiver;
	
	public function __construct($receiver){
		$this->receiver = $receiver;
	}
	
	public function execute(){
		$this->receiver->action();
	}
}


class Command2 implements Command{
	public $receiver;
	
	public function __construct($receiver){
		$this->receiver = $receiver;
	}
	
	public function execute(){
		$this->receiver->action1();
	}
}

class Command3 implements Command{
	public $receiver;
	
	public function __construct($receiver){
		$this->receiver = $receiver;
	}
	
	public function execute(){
		$this->receiver->action2();
	}
}

//命令发起者,记录,删除命令,请求执行命令
class Invoker{
	public $command = array();
	
	public function setCommand($command){
		$this->command[] = $command;
	}
	
	public function executeCommand(){//请求执行
		foreach ($this->command as $key=>$value){
			$value->execute();
			echo "<br/>";
		}
	}
	public function removeCommand($command){
		$key = array_search($command, $this->command);
		if($key!==false){
			unset($this->command[$key]);
		}
	}
}




/*
 * 请求流程：先实例化接受者（具体做事的角色），然后实例化命令。
 * 接着实例化一个请求者，请求者注册命令，请求执行命令
 */
$role1 = new Receiver('盖伦');
$role2 = new Receiver('皇子');

$command1 = new Command1($role2);
$command2 = new Command2($role1);

$invoker = new Invoker();
$invoker->setCommand($command1);
$invoker->setCommand($command2);

$invoker->executeCommand();
?>