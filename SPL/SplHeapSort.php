<?php 
function splHeapSort($arr){
	$heap = new SplMinHeap();
	
	//初始化小顶堆
	foreach ($arr as $v){
		$heap->insert($v);
	}
	
	while(!$heap->isEmpty()){
		$res[] = $heap->extract();//提取堆顶元素,并且进行重构
	}
	
	return $res;
}

$arr = array(2,5,9,1,4,7,3,4,6,0,1,2,4,6,8,9,2,3);
$arr = splHeapSort($arr);
print_r($arr);

?>