<?php
/*����ģʽ����Ϊ����Ĵ���ģʽ������ģʽȷ��ĳһ����ֻ��һ��ʵ������������ʵ������������ϵͳȫ�ֵ��ṩ���ʵ������������ģʽ��
 * 
 * 
 */
class singleton{
	
	private static $instance;//˽�о�̬��Ա����������Ψһʵ��
	
	private function __construct(){//˽�й��췽����ȷ�����ɱ�ʵ����
		
	}
	private function __clone(){//˽�п�¡������ʵ�����ɱ�����
		
	}
	
	public static function getinstance(){//������̬�������������ʵ������ȫ���ṩ���ʵ��
		if(!self::$instance instanceof self){
			self::$instance = new singleton();//self::$instance = new self();Ҳ��
		}
		return self::$instance;
	}
	
	public function hello(){
		echo '���ǵ�����ķ���������hello';
	}
}

$a = singleton::getinstance();
$a->hello();
?>