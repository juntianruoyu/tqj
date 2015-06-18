<?php 
/*
 * 中介者模式：用一个中介对象来封装一系列的对象交互,使各对象不需要显式地相互引用从而使其耦合松散,而且可以独立地改变它们之间的交互
 */

/*
 * 以一个同学qq群为例说明，qq作为中介者，同学作为相互交互的对象
 */

//抽象中介者，利用中介发送消息
abstract class Mediator{
	abstract function send($message,$user);
}

//抽象同事类，利用中介发送消息
abstract class Colleague{
	private $mediator;
	
	public function __construct($mediator){
		$this->mediator = $mediator;
	}
	
	public function send($message){
		$this->mediator->send($message,$this);
	}
	
	abstract function notify($message);
}

//具体的同事类a b c d e
class StuA extends Colleague{
	public function notify($message){
		echo 'Stu A says: '.$message;
		echo "<br/>";
	}
}

class StuB extends Colleague{
	public function notify($message){
		echo 'Stu B says: '.$message;
		echo "<br/>";
	}
}

class StuC extends Colleague{
	public function notify($message){
		echo 'Stu C says: '.$message;
		echo "<br/>";
	}
}

class StuD extends Colleague{
	public function notify($message){
		echo 'Stu D says: '.$message;
		echo "<br/>";
	}
}

class StuE extends Colleague{
	public function notify($message){
		echo 'Stu E says: '.$message;
		echo "<br/>";
	}
}

//具体的中介者
class QQ extends Mediator{
	public $users = array();
	
	public function setUsers($user){//把对象添加进来
		$this->users[] = $user;
	}
	
	public function send($message, $user){//推送消息
		for($i=0;$i<count($this->users);$i++){
			if($user == $this->users[$i]){
				$this->users[$i]->notify($message);
			}
		}
	}
}

class Client{
	public static function main(){
		//流程：先建立中介者
		$qq = new QQ();
		//实例化交互对象
		$stu_a = new StuA($qq);
		$stu_b = new StuB($qq);
		$stu_c = new StuC($qq);
		$stu_d = new StuD($qq);
		$stu_e = new StuE($qq);
		//把对象加入中介者
		$qq->setUsers($stu_b);
		$qq->setUsers($stu_a);
		$qq->setUsers($stu_c);
		$qq->setUsers($stu_d);
		$qq->setUsers($stu_e);
		
		//交流
		$stu_a->send('昨天点名了吗，各位大神');
		$stu_c->send('难道你没去');
		$stu_a->send('是啊');
		$stu_b->send('恭喜你中奖了');
		$stu_d->send('恭喜你中奖了');
		$stu_e->send('恭喜你中奖了');
		$stu_a->send('我去');
	}
}

Client::main();
?>