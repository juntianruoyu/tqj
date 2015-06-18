<?php 
/*
 * �н���ģʽ����һ���н��������װһϵ�еĶ��󽻻�,ʹ��������Ҫ��ʽ���໥���ôӶ�ʹ�������ɢ,���ҿ��Զ����ظı�����֮��Ľ���
 */

/*
 * ��һ��ͬѧqqȺΪ��˵����qq��Ϊ�н��ߣ�ͬѧ��Ϊ�໥�����Ķ���
 */

//�����н��ߣ������н鷢����Ϣ
abstract class Mediator{
	abstract function send($message,$user);
}

//����ͬ���࣬�����н鷢����Ϣ
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

//�����ͬ����a b c d e
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

//������н���
class QQ extends Mediator{
	public $users = array();
	
	public function setUsers($user){//�Ѷ�����ӽ���
		$this->users[] = $user;
	}
	
	public function send($message, $user){//������Ϣ
		for($i=0;$i<count($this->users);$i++){
			if($user == $this->users[$i]){
				$this->users[$i]->notify($message);
			}
		}
	}
}

class Client{
	public static function main(){
		//���̣��Ƚ����н���
		$qq = new QQ();
		//ʵ������������
		$stu_a = new StuA($qq);
		$stu_b = new StuB($qq);
		$stu_c = new StuC($qq);
		$stu_d = new StuD($qq);
		$stu_e = new StuE($qq);
		//�Ѷ�������н���
		$qq->setUsers($stu_b);
		$qq->setUsers($stu_a);
		$qq->setUsers($stu_c);
		$qq->setUsers($stu_d);
		$qq->setUsers($stu_e);
		
		//����
		$stu_a->send('����������𣬸�λ����');
		$stu_c->send('�ѵ���ûȥ');
		$stu_a->send('�ǰ�');
		$stu_b->send('��ϲ���н���');
		$stu_d->send('��ϲ���н���');
		$stu_e->send('��ϲ���н���');
		$stu_a->send('��ȥ');
	}
}

Client::main();
?>