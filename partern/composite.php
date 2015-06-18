<?php
/**
 * ���ģʽ
 *
 * ��������ϳ����νṹ�Ա�ʾ"����-����"�Ĳ�νṹ,ʹ�ÿͻ��Ե�������͸��϶����ʹ�þ���һ����
 * 
 * 
 * 
1)       ���󹹼���ɫComponent����Ϊ����еĶ��������ӿڣ�Ҳ����Ϊ���нӿ�ʵ��ȱʡ��Ϊ��
2)       ��Ҷ������ɫLeaf��������б�ʾҶ�ڵ���󡪡�û���ӽڵ㣬ʵ�ֳ��󹹼���ɫ�����Ľӿڡ�
3)       ��֦������ɫComposite��������б�ʾ��֧�ڵ���󡪡����ӽڵ㣬ʵ�ֳ��󹹼���ɫ�����Ľӿڣ��洢�Ӳ�����
 */

/*
 * �Ե��͵�Ŀ¼����Ϊ��
 * ���뽨��һ��newfileĿ¼��������music��novel�����ļ��У�music�·��������ļ���novel�·���С˵txt
 * 
 */

//���󹹼���ɫ������ӿڣ�����ӽڵ㣬ɾ���ӽڵ�,չʾĿ¼�ṹ
class dir{
	public function add($component){}
	public function remove($component){}
	public function display(){}
}

//��Ҷ��������Ҷû���ӽڵ㣬������add��remove������ֻ��չʾ�Ű�
class leaf extends dir{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	
	public function display(){//��Ҷֻչʾ�������ּ���
		echo $this->name;
	}
}

//��֦����
class file extends dir{
	public $name;
	public $items=array();
	public function __construct($name){
		$this->name = $name;
	}
	
	public function add($component){//����ӽڵ�
		$this->items[] = $component;
	}
	public function remove($component){//ɾ���ӽڵ�
		$key = array_search($component,$this->items);
		if ($key!==false){
			unset($this->items[$key]);
		}
	}
	
	public function display(){//��֦�ڵ㲻ֹչʾ��������չʾ���ӽڵ�
		echo $this->name.'----';//����
		foreach ($this->items as $key=>$value){//�ӽڵ���������֦���ݹ���ã� �ӽڵ�������Ҷ��ֻչʾ����
			if (is_object($value)){
				$value->display();
			}else{
			echo $value->name.'--';
		}
		}
	}
}

//������̴ӵײ㿪ʼ
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