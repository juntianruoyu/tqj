<?php  
/** 
 * 访问者模式 
 * 封装某些作用于某种数据结构中各元素的操作，它可以在不改变数据结构的前提下定义作用于这些元素的新的操作。
 * 行为类模式  
 */ 


/**
抽象访问者：抽象类或者接口，声明访问者可以访问哪些元素，具体到程序中就是visit方法中的参数定义哪些对象是可以被访问的。
访问者：实现抽象访问者所声明的方法，它影响到访问者访问到一个类后该干什么，要做什么事情。
抽象元素类：接口或者抽象类，声明接受哪一类访问者访问，程序上是通过accept方法中的参数来定义的。抽象元素一般有两类方法，一部分是本身的业务逻辑，另外就是允许接收哪类访问者来访问。
元素类：实现抽象元素类所声明的accept方法，通常都是visitor.visit(this)，基本上已经形成一种定式了。
结构对象：一个元素的容器，一般包含一个容纳多个不同类、不同接口的容器，如List、Set、Map等，在项目中一般很少抽象出这个角色。
 */
  
interface Visitor {  
    public function visitConcreteElementA(ConcreteElementA $elementA);  
    public function visitConcreteElementB(concreteElementB $elementB);  
}  
  
interface Element {  
    public function accept(Visitor $visitor);  
}  
  
/** 
 * 具体的访问者1 
 */  
class ConcreteVisitor1 implements Visitor {  
    public function visitConcreteElementA(ConcreteElementA $elementA){  
        echo $elementA->getName(),' visitd by ConcerteVisitor1 <br />';  
    }  
  
    public function visitConcreteElementB(ConcreteElementB $elementB){  
        echo $elementB->getName().' visited by ConcerteVisitor1 <br />';  
    }  
  
}  
  
/** 
 * 具体的访问者2 
 */  
class ConcreteVisitor2 implements Visitor {  
    public function visitConcreteElementA(ConcreteElementA $elementA){  
        echo $elementA->getName(),   ' visitd by ConcerteVisitor2 <br />';  
    }  
  
    public function visitConcreteElementB(ConcreteElementB $elementB){  
        echo $elementB->getName(), ' visited by ConcerteVisitor2 <br />';  
    }  
  
}  
  
/** 
 * 具体元素A 
 */  
class ConcreteElementA implements Element {  
    private$_name;  
  
    public function __construct($name){  
        $this->_name =$name;  
    }  
  
    public function getName(){  
        return$this->_name;  
    }  
  
    /** 
     * 接受访问者调用它针对该元素的新方法 
     * @param Visitor $visitor 
     */  
    public function accept(Visitor $visitor){  
        $visitor->visitConcreteElementA($this);  
    }  
  
}  
  
/** 
 *  具体元素B 
 */  
class ConcreteElementB implements Element {  
    private$_name;  
  
    public function __construct($name){  
        $this->_name =$name;  
    }  
  
    public function getName(){  
        return$this->_name;  
    }  
  
    /** 
     * 接受访问者调用它针对该元素的新方法 
     * @param Visitor $visitor 
     */  
    public function accept(Visitor $visitor){  
        $visitor->visitConcreteElementB($this);  
    }  
  
}  
  
/** 
 * 对象结构 即元素的集合 
 */  
class ObjectStructure {  
    private $_collection;  
  
    public function __construct(){  
        $this->_collection =array();  
    }  
  
  
    public function attach(Element $element){  
        return array_push($this->_collection,$element);  
    }  
  
    public function detach(Element $element){  
        $index=array_search($element,$this->_collection);  
        if($index!== FALSE){  
            unset($this->_collection[$index]);  
        }  
  
        return $index;  
    }  
  
    //数据结构接受访问
    public function accept(Visitor $visitor){  
        foreach($this->_collection as $element){  
            $element->accept($visitor);  
        }  
    }  
}  
  
class Client {  
  
    /** 
     * Main program. 
     */  
    public static function main(){  
    	//实例化一组元素
        $elementA = new ConcreteElementA("ElementA");  
        $elementB = new ConcreteElementB("ElementB");  
        $elementA2 = new ConcreteElementB("ElementA2");  
        //实例化访问者
        $visitor1 = new ConcreteVisitor1();  
        $visitor2 = new ConcreteVisitor2();  
  
        //实例化数据结构，把这组元素加入数据结构
        //数据结构中定义了访问方法
        $os = new ObjectStructure();  
        $os->attach($elementA);  
        $os->attach($elementB);  
        $os->attach($elementA2);  
        $os->detach($elementA);  
        $os->accept($visitor1);  
        $os->accept($visitor2);  
    }  
  
}  
  
Client::main();  
?>  