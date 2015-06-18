<?php
/*
 * 策略模式：定义一系列算法，并且把每一个算法封装起来，并且使它们可以相互替换
 * 策略模式使得算法可以独立于使用它的客户而变化
 */
 
 
//抽象策略接口，完成某件事情
interface category{
    public function dosomething();
}
 
//具体算法类，实现具体的事情
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
//配置类，使用抽象策略接口来配置
class context{
    public $cg;
     
    public function __construct($a){//构造函数实现了工厂方法
        switch ($a){
        	case 'a': $this->cg = new category_a();break;
        	case 'b': $this->cg = new category_b();break;
        	case 'c': $this->cg = new category_c();break;
        	default: $this->cg = new handel_error();break;
        }
    }
     
    public function dodo(){
        return $this->cg->dosomething();//同一方法作用于不同类的对象，产生不同的结果，这在php中就是多态
    }
}
 
//客户端调用，由客户自己决定使用哪种策略，即客户自行实例化算法类。区别于简单工厂模式
//简单工厂模式是对象的创建模式，客户端不创建对象，只给出参数，由工厂方法来决定创建哪一个实例
//也就是说，简单工厂模式客户端只传参数，策略模式客户端传算法实例
$m = new context('b');
$m->dodo();
?>