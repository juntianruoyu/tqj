<?php
/* ���󹤳�ģʽ���ṩһ������һϵͳ��ػ��໥��������Ľӿڣ�������ָ�����Ǿ������
 * ������ģʽ
 */

//����С�׹�����������С��һ��С�׶�
abstract class mifactory{
	abstract public function createmione();
	abstract public function createmitwo();
}
//���幤����������ɫ��С��
class white extends mifactory{
	public function createmione(){
		return new whiteone();
	}
	public function createmitwo(){
		return new whitetwo();
	}
}
//���幤����������ɫ��С��
class black extends mifactory{
	public function createmione(){
		return new blackone();
	}
	public function createmitwo(){
		return new blacktwo();
	}
}
//��Ʒ�ӿ�
interface product{
	public function colorvoice();
}

//��ɫС��һ
class whiteone implements product{
	public function colorvoice(){
		echo 'white one';
	}
}
//��ɫС�׶�
class whitetwo implements product{
	public function colorvoice(){
		echo 'white two';
	}
}
//��ɫС��һ
class blackone implements product{
	public function colorvoice(){
		echo 'black one';
	}
}
//��ɫС�׶�
class blacktwo implements product{
	public function colorvoice(){
		echo 'black two';
	}
}
//���ڿ������ⴴ����Ʒ��
$m = new black();
$n = $m->createmitwo();
$n->colorvoice();
?>