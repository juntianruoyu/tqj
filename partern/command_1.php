<?php
/**
 * ����ģʽ
 *
 * ��һ�������װΪһ������Ӷ�ʹ����ò�ͬ������Կͻ����в�����,������������¼������־,�Լ�֧�ֿ�ȡ���Ĳ���
 */

// ����ӿ�
interface Command
{
	public function execute();
}

//������ߣ���¼������־��ɾ������.����ִ������
class Invoker
{
	private $_command = array();
	public function setCommand($command) {
		$this->_command[] = $command;
	}
	public function executeCommand()//����ִ������
	{
		foreach($this->_command as $command)
		{
			$command->execute();
		}
	}
	public function removeCommand($command)
	{
		$key = array_search($command, $this->_command);
		if($key !== false)
		{
			unset($this->_command[$key]);
		}
	}
}

// ���������
class Receiver
{
	private $_name = null;

	public function __construct($name) {
		$this->_name = $name;
	}

	public function action()
	{
		echo $this->_name." ִ�й������action��<br />";
	}

	public function action1()
	{
		echo $this->_name." ִ�з������action1��<br/>";
	}
}

// ���������,���������ߣ������������
class ConcreteCommand implements Command
{
	private $_receiver;
	public function __construct($receiver)
	{
		$this->_receiver = $receiver;
	}

	public function execute()
	{
		$this->_receiver->action();
	}
}

// ��������1
class ConcreteCommand1 implements Command
{
	private $_receiver;
	public function __construct($receiver)
	{
		$this->_receiver = $receiver;
	}

	public function execute()
	{
		$this->_receiver->action1();
	}
}

// ��������2
class ConcreteCommand2 implements Command
{
	private $_receiver;
	public function __construct($receiver)
	{
		$this->_receiver = $receiver;
	}

	public function execute()
	{
		$this->_receiver->action();
		$this->_receiver->action1();
	}
}


$objRecevier = new Receiver("С��");
$objRecevier1 = new Receiver("����");
$objRecevier2 = new Receiver("����");

$objCommand = new ConcreteCommand($objRecevier);
$objCommand1 = new ConcreteCommand1($objRecevier);
$objCommand2 = new ConcreteCommand($objRecevier1);
$objCommand3 = new ConcreteCommand1($objRecevier1);
$objCommand4 = new ConcreteCommand2($objRecevier2); // ʹ�� Recevier����������

$objInvoker = new Invoker();
$objInvoker->setCommand($objCommand);
$objInvoker->setCommand($objCommand1);
$objInvoker->executeCommand();
$objInvoker->removeCommand($objCommand1);
$objInvoker->executeCommand();

$objInvoker->setCommand($objCommand2);
$objInvoker->setCommand($objCommand3);
$objInvoker->setCommand($objCommand4);
	$objInvoker->executeCommand();
?>
