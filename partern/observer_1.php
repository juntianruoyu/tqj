<?php 
/**
 * 观察者模式：定于对象间的一种一对多的依赖关系，当一个对象发生改变时，所有依赖它的对象都收到通知并自动更新。
 */

//例子：少林方丈的通讯录，当扫地僧的号码发生变化时，只需告诉方丈，方丈可通知自己通讯录里面的所有人
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
			echo '通讯录中无此人';
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
		echo $this->name.'收到消息，已经更新';
	}
}

class Client{
	public static function main(){
		$tel1 = new StuTel('虚竹');
		$tel2 = new StuTel('乔峰');
		$tel3 = new StuTel('段誉');
		
		$contacts = new StuContact();
		$contacts->addTel($tel1);
		$contacts->addTel($tel2);
		$contacts->addTel($tel3);
		
		$contacts->action('扫地僧的号码更新了，是11111');
		$contacts->notify();
	}
}

Client::main();
?>