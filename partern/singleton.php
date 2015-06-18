<?php
/*单例模式：作为对象的创建模式，单例模式确保某一个类只有一个实例，而且自行实例化并向整个系统全局地提供这个实例。（创建型模式）
 * 
 * 
 */
class singleton{
	
	private static $instance;//私有静态成员变量，保存唯一实例
	
	private function __construct(){//私有构造方法，确保不可被实例化
		
	}
	private function __clone(){//私有克隆方法，实例不可被复制
		
	}
	
	public static function getinstance(){//公共静态方法，完成自身实例化，全局提供这个实例
		if(!self::$instance instanceof self){
			self::$instance = new singleton();//self::$instance = new self();也行
		}
		return self::$instance;
	}
	
	public function hello(){
		echo '我是单例类的方法产生的hello';
	}
}

$a = singleton::getinstance();
$a->hello();
?>