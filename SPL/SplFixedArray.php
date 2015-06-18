<?php
/*
 * SplFixedArray():用于创建固定长度的数组，只允许整型数作为索引，比普通php数组更快，性能更好
 * 它本身实现了Iterator  ArrayAccess  Countable这几个接口
 * 实现了ArrayAccess，那么可以使用foreach遍历
 * 实现了Countable，那么可以使用count计算长度
 * 实现了Iterator，那么可以向链表一样操作
 */
$arr = new SplFixedArray(5);//创建时指定长度

$arr->setSize(4);//setSize()动态设置数组长度
$arr[0] = 'a';
$arr[1] = 'b';
$arr[2] = 'c';
$arr[3] = 'd';

//遍历，遍历完后指针指向末尾空
foreach ($arr as $v){
	echo $v;
	echo PHP_EOL;
}
echo "<br/>";
var_dump($arr->valid());//已经移出数组外

//getSize() count()都是获取数组长度
$a = $arr->getSize();
echo $a;//4
echo "<br/>";

echo $arr->count();//实现了Countable接口的方法,4
echo "<br/>";

$a = count($arr);//数组实现了Countable，php数组提供的count方法也可用
echo $a;//4
echo "<br/>";

//实现Iterator中的方法

/*
 *        移动指针方法：          rewind()，next()，都只移动指针，无返回值，是一个动作 
 *        取键值的方法：          key(),current() 返回当前指针指向的index 和element
 *        检查指针方法：          valid() 检查当前指针是否超出数组范围,返回bool值
 * 
 */

$arr->rewind();//重置指针，指向开头处，无返回值
$a = $arr->current();//返回当前指针指向的值
var_dump($a);
echo PHP_EOL;
$arr->next();//移动指针，将指针指向下一位，无返回值
$a = $arr->valid();//检测当前指针是否有效，也就是说当前指针是否超出数组范围
var_dump($a);
$a = $arr->current();//返回当前指针指向的值
var_dump($a);
echo PHP_EOL;
echo $arr->key();//返回当前指针指向的key
$arr->next();
$arr->next();
$arr->next();//移出了数组范围，
var_dump($arr->valid());//检测返回false

/*======================================
 * 
 * offsetget(index) = $arr[$index]//获取索引对应的元素值
 * offserget(index,element) = ($arr[$index]=$element)//修改index对应的element
 * offsetUnset(index) = unset($arr[$index])//释放index对应的element
 * offsetExists(index) = isset($arr[$index])//判断index是否存在
 * 
 *=======================================*/
$a = $arr->offsetGet(3); // 相当于 $arr[3]
var_dump($a);//d
echo $arr[3];//d
echo PHP_EOL;

$arr->offsetSet(3,'e');//相当于$arr[3] = 'e';
echo $arr[3];
$arr[3] = 'd';
echo PHP_EOL;
echo $arr[3];

$arr->offsetUnset(3);//相当于unset($arr[3]);
var_dump($arr[3]);//null

$m = $arr->offsetExists(3);//相当于isset($arr[3])
var_dump($m);








/*=======SplFixedArray()与PHP数组的转化函数======  

       方法 fromAaary() : 将一个PHP普通数组转化成SPL数组，静态方法SplFixedArray::fromArray(),
      方法       toArray() ：将一个SPL数组转化成PHP普通数组 ,无参数，返回PHP普通数组

=============================================*/

$arr = $arr->toArray();
var_dump($arr);//返回普通php数组

$arr = array(1=>3,0=>1,4=>2);//普通PHP数组
$arr = SplFixedArray::fromArray($arr);//第二个参数是默认true，表示保持原来的索引关系。false表示舍弃原来的索引
var_dump($arr);//返回SPL数组

$arr = array(1=>3,0=>1,4=>2);//普通PHP数组
$arr = SplFixedArray::fromArray($arr,false);//舍弃原来的索引关系
var_dump($arr);//返回SPL数组


?>


