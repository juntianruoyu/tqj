<?php 
echo xdebug_peak_memory_usage();//程序运行期间的内存峰值
echo PHP_EOL;
echo xdebug_time_index();//时间，比microtime方便,单位是秒
echo PHP_EOL;
function testOne(){
	echo 'one';
	echo PHP_EOL;
}
function testTwo(){
	echo 'two';
	echo PHP_EOL;
}

function testThree(){
	echo 'three';
	echo PHP_EOL;
}
echo memory_get_usage();//php自身提供的函数，运行至此占用的空间，单位byte
echo PHP_EOL;
echo xdebug_memory_usage();//xdebug提供的，运行至此占用的内存空间，单位是byte
echo PHP_EOL;
testOne();
testTwo();
testThree();
//上面哪一个函数运行中发生错误，错误显示会定位到

echo xdebug_peak_memory_usage();//程序运行期间的内存峰值，与其在脚本中的位置无关


?>