<?php
/**
 * 组合模式
 *
 * 将对象组合成树形结构以表示"部分-整体"的层次结构,使得客户对单个对象和复合对象的使用具有一致性
 * 
 * 
 * 
1)       抽象构件角色Component：它为组合中的对象声明接口，也可以为共有接口实现缺省行为。
2)       树叶构件角色Leaf：在组合中表示叶节点对象——没有子节点，实现抽象构件角色声明的接口。
3)       树枝构件角色Composite：在组合中表示分支节点对象——有子节点，实现抽象构件角色声明的接口；存储子部件。
 */

/*
 * 以典型的目录构造为例
 * 我想建造一个newfile目录，下面有music和novel两个文件夹，music下放置音乐文件，novel下放置小说txt
 * 
 */

//抽象构件角色：对象接口，添加子节点，删除子节点,展示目录结构
class dir{
	public function add($component){}
	public function remove($component){}
	public function display(){}
}

//树叶构件：树叶没有子节点，不存在add，remove方法，只有展示放啊
class leaf extends dir{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	
	public function display(){//树叶只展示自身名字即可
		echo $this->name;
	}
}

//树枝构件
class file extends dir{
	public $name;
	public $items=array();
	public function __construct($name){
		$this->name = $name;
	}
	
	public function add($component){//添加子节点
		$this->items[] = $component;
	}
	public function remove($component){//删除子节点
		$key = array_search($component,$this->items);
		if ($key!==false){
			unset($this->items[$key]);
		}
	}
	
	public function display(){//树枝节点不止展示本身，而且展示其子节点
		echo $this->name.'----';//本身
		foreach ($this->items as $key=>$value){//子节点若还是树枝，递归调用； 子节点若是树叶，只展示本身
			if (is_object($value)){
				$value->display();
			}else{
			echo $value->name.'--';
		}
		}
	}
}

//构造过程从底层开始
$leaf1 = new leaf('a.mp4');
$leaf2 = new leaf('b.mp4');
$file1 = new file('music');
$file1->add($leaf1);
$file1->add($leaf2);
$file1->remove($leaf1);
//$file1->display();
$leaf3 = new leaf('a.txt');
$leaf4 = new leaf('b.txt');
$leaf5 = new leaf('c.txt');
$file2 = new file('novel');
$file2->add($leaf3);
$file2->add($leaf4);
$file2->add($leaf5);
//$file2->display();
$dir = new file('newfile');
$dir->add($file1);
$dir->add($file2);
$dir->display();
?>