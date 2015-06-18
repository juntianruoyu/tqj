<?php 
/*
 * ����ģʽ������Ϊģʽ����һ�������װ��һ�����������װ�ɶ��󣩣��Ӷ�����ʹ�ò�ͬ������Կͻ�������(�ͻ��Ĳ�ͬ���󣬵���ͬ�ķ�װ����)��
 * ���������򣬻��߼�¼������־���Լ�֧�ֿ�ȡ���Ĳ���
 * 
 1 ����ӿڣ�����ִ�з���
 2 ������ �� ��¼������������������ִ��
 3 ������ �� ����ľ���ʵ�ֽ�ɫ��
 4 ������� ���������ߣ����ý�����ִ�С�
 */


//����������Ľ�ɫ��������
class Receiver{
	public $name;
	
	public function __construct($name){
		$this->name = $name;
		
	}
	
	public function action(){
		echo $this->name.'����';
	}
	
	public function action1(){
		echo $this->name.'����';
	}
	
	public function action2(){
		echo $this->name.'����';
	}
}


//����ӿ�
interface Command{
	public function execute();
}

//����������������һ�������ߣ����ý�����ȥ��
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

//�������,��¼,ɾ������,����ִ������
class Invoker{
	public $command = array();
	
	public function setCommand($command){
		$this->command[] = $command;
	}
	
	public function executeCommand(){//����ִ��
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
 * �������̣���ʵ���������ߣ��������µĽ�ɫ����Ȼ��ʵ�������
 * ����ʵ����һ�������ߣ�������ע���������ִ������
 */
$role1 = new Receiver('����');
$role2 = new Receiver('����');

$command1 = new Command1($role2);
$command2 = new Command2($role1);

$invoker = new Invoker();
$invoker->setCommand($command1);
$invoker->setCommand($command2);

$invoker->executeCommand();
?>