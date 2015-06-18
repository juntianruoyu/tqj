<?php
/** ״̬ģʽ������һ�����������ڲ�״̬�ı�ʱ�ı�������Ϊ�����������ƺ��޸��������ࡣ����Ϊģʽ��
 * 
 * �ںܶ�����£�һ���������Ϊȡ����һ��������̬�仯�����ԣ����������Խ���״̬��
 * �����Ķ��������״̬��(stateful)���������Ķ���״̬�Ǵ����ȶ���õ�һϵ��ֵ��ȡ���ġ�
 * ��һ�������Ķ������ⲿ�¼���������ʱ�����ڲ�״̬�ͻ�ı䣬�Ӷ�ʹ��ϵͳ����ΪҲ��֮�����仯��
 * 
 * 
 * ��Ҫ�أ�1 ����״̬�ӿڣ����о���״̬ʵ�ִ˽ӿڡ�
 * 2: ����״̬���м���״̬���м����࣬�ֱ����ͬ��״̬
 * 3 �����࣬���Ǿ������������еĵ�ơ��������һ��״̬ʵ��
 * 
 */


/*
 * �Ե��Ϊ������ƶ�����������״̬����/�أ� һ����Ϊ�����¿��ء�
 * ����Ƶ�״̬Ϊ��ʱ�����¿��أ�����Ϊ�صƣ�����Ƶ�״̬Ϊ��ʱ�����¿��أ�����Ϊ���ƣ����͵�״̬�ı�ʱ���ı��˿��ص���Ϊ
 * 
 */

//����״̬�ӿ�
interface state{
	public function show();//չʾ��ǰ״̬
	public function handle($light);//��ǰ״̬�ı�ʱ�����õ�Ƶ���һ��״̬������������
}

//��Ƶ���������״̬
class onstate implements state{
	public function show(){
		echo '�ǿ���״̬';
	}
	public function handle($light){
		$light->set(new offstate());
	}
}

class offstate implements state{
	public function show(){
		echo '�ǹص�״̬';
	}
	
	public function handle($light){
		$light->set(new onstate());
	}
}

//�����࣬��ơ�״̬state   ��Ϊputon
class light{
	public $state;
	public function set(state $state){//���õ�Ƶ�״̬
		$this->state = $state;
	}
	public function puton(){//��Ϊ
		echo '��Ƴ�ʼ״̬:';
		$this->state->show();
		$this->state->handle($this);
		echo "<br/>";
		echo '���¿���֮��:';
		$this->state->show();
	}
}

//ʵ����һ����ƣ����ó�ʼ״̬Ϊ��
$m = new light();
$m->set(new onstate());

//���¿���
$m->puton();
echo "<br/>";
echo '--------------------------------';
echo "<br/>";
$m->puton();
?>
