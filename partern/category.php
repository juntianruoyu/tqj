<?php
/*
 * ����ģʽ������һϵ���㷨�����Ұ�ÿһ���㷨��װ����������ʹ���ǿ����໥�滻
 * ����ģʽʹ���㷨���Զ�����ʹ�����Ŀͻ����仯
 */
 
 
//������Խӿڣ����ĳ������
interface category{
    public function dosomething();
}
 
//�����㷨�࣬ʵ�־��������
class category_a implements category{
    public function dosomething(){
        echo 'do A';
    }
}
 
class category_b implements category{
    public function dosomething(){
        echo 'do B';
    }
}
 
class category_c implements category{
    public function dosomething(){
        echo 'do C';
    }
}

class handel_error implements category{
	public function dosomething(){
		echo 'wrong param';
	}
}
//�����࣬ʹ�ó�����Խӿ�������
class context{
    public $cg;
     
    public function __construct($a){//���캯��ʵ���˹�������
        switch ($a){
        	case 'a': $this->cg = new category_a();break;
        	case 'b': $this->cg = new category_b();break;
        	case 'c': $this->cg = new category_c();break;
        	default: $this->cg = new handel_error();break;
        }
    }
     
    public function dodo(){
        return $this->cg->dosomething();//ͬһ���������ڲ�ͬ��Ķ��󣬲�����ͬ�Ľ��������php�о��Ƕ�̬
    }
}
 
//�ͻ��˵��ã��ɿͻ��Լ�����ʹ�����ֲ��ԣ����ͻ�����ʵ�����㷨�ࡣ�����ڼ򵥹���ģʽ
//�򵥹���ģʽ�Ƕ���Ĵ���ģʽ���ͻ��˲���������ֻ�����������ɹ�������������������һ��ʵ��
//Ҳ����˵���򵥹���ģʽ�ͻ���ֻ������������ģʽ�ͻ��˴��㷨ʵ��
$m = new context('b');
$m->dodo();
?>