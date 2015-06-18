<?php  
/** 
 * ������ģʽ 
 * ��װĳЩ������ĳ�����ݽṹ�и�Ԫ�صĲ������������ڲ��ı����ݽṹ��ǰ���¶�����������ЩԪ�ص��µĲ�����
 * ��Ϊ��ģʽ  
 */ 


/**
��������ߣ���������߽ӿڣ����������߿��Է�����ЩԪ�أ����嵽�����о���visit�����еĲ���������Щ�����ǿ��Ա����ʵġ�
�����ߣ�ʵ�ֳ���������������ķ�������Ӱ�쵽�����߷��ʵ�һ�����ø�ʲô��Ҫ��ʲô���顣
����Ԫ���ࣺ�ӿڻ��߳����࣬����������һ������߷��ʣ���������ͨ��accept�����еĲ���������ġ�����Ԫ��һ�������෽����һ�����Ǳ����ҵ���߼�������������������������������ʡ�
Ԫ���ࣺʵ�ֳ���Ԫ������������accept������ͨ������visitor.visit(this)���������Ѿ��γ�һ�ֶ�ʽ�ˡ�
�ṹ����һ��Ԫ�ص�������һ�����һ�����ɶ����ͬ�ࡢ��ͬ�ӿڵ���������List��Set��Map�ȣ�����Ŀ��һ����ٳ���������ɫ��
 */
  
interface Visitor {  
    public function visitConcreteElementA(ConcreteElementA $elementA);  
    public function visitConcreteElementB(concreteElementB $elementB);  
}  
  
interface Element {  
    public function accept(Visitor $visitor);  
}  
  
/** 
 * ����ķ�����1 
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
 * ����ķ�����2 
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
 * ����Ԫ��A 
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
     * ���ܷ����ߵ�������Ը�Ԫ�ص��·��� 
     * @param Visitor $visitor 
     */  
    public function accept(Visitor $visitor){  
        $visitor->visitConcreteElementA($this);  
    }  
  
}  
  
/** 
 *  ����Ԫ��B 
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
     * ���ܷ����ߵ�������Ը�Ԫ�ص��·��� 
     * @param Visitor $visitor 
     */  
    public function accept(Visitor $visitor){  
        $visitor->visitConcreteElementB($this);  
    }  
  
}  
  
/** 
 * ����ṹ ��Ԫ�صļ��� 
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
  
    //���ݽṹ���ܷ���
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
    	//ʵ����һ��Ԫ��
        $elementA = new ConcreteElementA("ElementA");  
        $elementB = new ConcreteElementB("ElementB");  
        $elementA2 = new ConcreteElementB("ElementA2");  
        //ʵ����������
        $visitor1 = new ConcreteVisitor1();  
        $visitor2 = new ConcreteVisitor2();  
  
        //ʵ�������ݽṹ��������Ԫ�ؼ������ݽṹ
        //���ݽṹ�ж����˷��ʷ���
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