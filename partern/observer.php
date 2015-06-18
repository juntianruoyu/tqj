<?php
/*
 * �۲���ģʽ�����������һ��һ�Զ��������ϵ����һ�������״̬�����ı�ʱ���������������Ķ��󶼵õ�֪ͨ�����Զ����¡�
 * ���ͣ���Ϊ��ģʽ
 *  
 * 
 */

//���������ɫ
interface Subject
{
	public function Attach($Observer); //��ӹ۲���
	public function Detach($Observer); //�߳��۲���
	public function Notify(); //��������ʱ֪ͨ�۲���
	public function SubjectState($Subject); //�۲�����
}

//���������ɫ
class Boss Implements Subject
{
	public $_action;
	private $_Observer;
	public function Attach($Observer)
	{
		$this->_Observer[] = $Observer;
	}
	public function Detach($Observer)
	{
		$ObserverKey = array_search($Observer, $this->_Observer);
		if($ObserverKey !== false)
		{
			unset($this->_Observer[$ObserverKey]);
		}
	}
	public function Notify()
	{
		foreach($this->_Observer as $value )
		{
			$value->Update();
		}
	}
	public function SubjectState($Subject)
	{
		$this->_action = $Subject;
	}
}

//����۲��߽�ɫ
abstract class Observer
{
	protected $_UserName;
	protected $_Sub;
	public function __construct($Name,$Sub)
	{
		$this->_UserName = $Name;
		$this->_Sub = $Sub;
	}
	public abstract function Update(); //����ͨ������
}
//����۲��߽�ɫ
class StockObserver extends Observer
{
	public function __construct($name,$sub)
	{
		parent::__construct($name,$sub);
	}
	public function Update()
	{
		echo $this->_Sub->_action.$this->_UserName." ��Ͽ���...";
	}
}
$huhansan = new Boss(); //���۲���
$gongshil = new StockObserver("��ë",$huhansan); //��ʼ���۲���
$huhansan->Attach($gongshil); //���һ���۲���
$huhansan->Attach($gongshil); //���һ����ͬ�Ĺ۲���
//$huhansan->Detach($gongshil); //�߳�����һ���۲���
$huhansan->SubjectState("��������"); //�ﵽ���������
$huhansan->Notify(); //ͨ��������Ч�Ĺ۲���
?>