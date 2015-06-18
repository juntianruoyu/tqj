<?php 

/* 
 * 
 * ��������ģʽ,������ģʽ
        ����һ�����ڴ�������Ĺ����ӿڣ����������ʵ������һ���ࡣFactory Methodʹһ�����ʵ�����ӳٵ�������
 * 
 * �ĸ���ɫ��
 * �����ӿڡ������ӿ��ǹ�������ģʽ�ĺ��ģ��������ֱ�ӽ��������ṩ��Ʒ����ʵ�ʱ���У���ʱ��Ҳ��ʹ��һ������������Ϊ������߽����Ľӿڣ��䱾������һ���ġ�
����ʵ�֡��ڱ���У�����ʵ�־������ʵ������Ʒ����ʵ����չ��;������Ҫ�ж����ֲ�Ʒ������Ҫ�ж��ٸ�����Ĺ���ʵ�֡�
��Ʒ�ӿڡ���Ʒ�ӿڵ���ҪĿ���Ƕ����Ʒ�Ĺ淶�����еĲ�Ʒʵ�ֶ�������ѭ��Ʒ�ӿڶ���Ĺ淶����Ʒ�ӿ��ǵ�������Ϊ���ĵģ���Ʒ�ӿڶ��������ֱ�Ӿ����˵����ߴ�����ȶ��ԡ�ͬ������Ʒ�ӿ�Ҳ�����ó����������棬��Ҫע����ò�ҪΥ�������滻ԭ��
��Ʒʵ�֡�ʵ�ֲ�Ʒ�ӿڵľ����࣬�����˲�Ʒ�ڿͻ����еľ�����Ϊ��
 */

interface part{
	public function work();
}

class hr implements part{
	public function work(){
		echo 'application';
	}
}
class programer implements part{
	public function work(){
		echo 'create a web';
	}
}

interface workerFactory{
	public function createobj();
}

class createhr implements workerFactory{
	public function createobj(){
		return new hr();
	}
}
class createprogramer implements workerFactory{
	public function createobj(){
		return new programer();
	}
}

$hr = new createhr();
$m = $hr->createobj();
$m->work();
?>