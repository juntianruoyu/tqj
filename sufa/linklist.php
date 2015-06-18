<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Node
{
    private $Data;//节点数据
    private $Next;//下一节点
	
    public function setData($value){
        $this->Data=$value;
    }
	
    public function setNext($value){
         $this->Next=$value;
    }    
	
    public function getData(){
        return $this->Data;
    }
	
    public function getNext(){
        return $this->Next;
    }
	
    public function __construct($data,$next){
        $this->setData($data);
        $this->setNext($next);
    }
}
class LinkList
{
    private $header;//头节点
    private $size;//长度
    public function getSize()
	{
        $i=0;
        $node=$this->header;
        while($node->getNext()!=null)
        {   
			$i++;
            $node=$node->getNext();
        }
      	return $i;
    }
	
    public function setHeader($value){//设置头结点
        $this->header=$value;
    }
	
    public function getHeader(){//取得头结点
        return $this->header;
    }
	
    public function __construct(){//构造函数，构造空链表
      	header("content-type:text/html; charset=utf-8");
        $this->setHeader(new Node(null,null));
    }
    /**
    *@param  $data--要添加节点的数据
    * 
    */
    public function add($data)//添加数据
    {
        $node=$this->header;
        while($node->getNext()!=null)
        {
            $node=$node->getNext();
        }
        $node->setNext(new Node($data,null));
    }
     /**
    *@param  $data--要移除节点的数据
    * 
    */
    public function removeAt($data)
    {
        $node=$this->header;
        while($node->getData()!=$data)
        {
            $node=$node->getNext();
        }
        $node->setNext($node->getNext());
        $node->setData($node->getNext()->getData());
    }
     /**
    *@param  遍历
    * 
    */
    public function get()
    {
        $node=$this->header;
        if($node->getNext()==null){
            print("数据集为空!");
            return;
        }
        while($node->getNext()!=null)
        {
            print('['.$node->getNext()->getData().'] -> ');
            if($node->getNext()->getNext()==null){break;}
            $node=$node->getNext();
        }
    }
     /**
    *@param  $data--要访问的节点的数据
    * @param 此方法只是演示不具有实际意义
    * 
    */
    public function getAt($data)
    {
        $node=$this->header->getNext();
 		if($node->getNext()==null){
            print("数据集为空!");
            return;
        }
        while($node->getData()!=$data)
        {
            if($node->getNext()==null){break;}
            $node=$node->getNext();
        }
        return $node->getData();        
    }
     /**
    *@param  $value--需要更新的节点的原数据  --$initial---更新后的数据
    * 
    */
    public function update($initial,$value)
    {
         $node=$this->header->getNext();
		if($node->getNext()==null){
       		print("数据集为空!");
            return;
        }
        while($node->getData()!=$data)
        {
            if($node->getNext()==null){break;}
            $node=$node->getNext();
        }
		$node->setData($initial);     
    }
}
$lists = new LinkList();
$lists -> add(1);
$lists -> add(2);
$lists -> get();
echo '<pre>';
print_r($lists);
echo '</pre>';

?>
