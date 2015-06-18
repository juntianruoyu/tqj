<?php 
/**
 * �۲���ģʽ�����ڶ�����һ��һ�Զ��������ϵ����һ���������ı�ʱ�������������Ķ����յ�֪ͨ���Զ����¡�
 */

//���ӣ����ַ��ɵ�ͨѶ¼����ɨ��ɮ�ĺ��뷢���仯ʱ��ֻ����߷��ɣ����ɿ�֪ͨ�Լ�ͨѶ¼�����������
interface Contacts{
	public function addTel($tel);
	public function delTel($tel);
	public function notify();
	public function action($action);
}

class StuContact implements Contacts{
	public $contact;
	public $action;
	public function addTel($tel){
		$this->contact[] = $tel;
	}
	
	public function delTel($tel){
		$key = array_search($tel, $this->contact);
		if($key !== FALSE){
			unset($this->contact[$key]);
		}else{
			echo 'ͨѶ¼���޴���';
		}
	}
	
	public function notify(){
		echo $this->action;
		echo "<br/>";
		foreach ($this->contact as $tel){
			$tel->update();
			echo "<br/>";
		}
	}
	
	public function action($action){
		$this->action = $action;
	}
}

interface Tel{
	public function update();
}

class StuTel implements Tel{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	
	public function update(){
		echo $this->name.'�յ���Ϣ���Ѿ�����';
	}
}

class Client{
	public static function main(){
		$tel1 = new StuTel('����');
		$tel2 = new StuTel('�Ƿ�');
		$tel3 = new StuTel('����');
		
		$contacts = new StuContact();
		$contacts->addTel($tel1);
		$contacts->addTel($tel2);
		$contacts->addTel($tel3);
		
		$contacts->action('ɨ��ɮ�ĺ�������ˣ���11111');
		$contacts->notify();
	}
}

Client::main();
?>