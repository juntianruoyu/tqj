<?php 
echo xdebug_peak_memory_usage();//���������ڼ���ڴ��ֵ
echo PHP_EOL;
echo xdebug_time_index();//ʱ�䣬��microtime����,��λ����
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
echo memory_get_usage();//php�����ṩ�ĺ�������������ռ�õĿռ䣬��λbyte
echo PHP_EOL;
echo xdebug_memory_usage();//xdebug�ṩ�ģ���������ռ�õ��ڴ�ռ䣬��λ��byte
echo PHP_EOL;
testOne();
testTwo();
testThree();
//������һ�����������з������󣬴�����ʾ�ᶨλ��

echo xdebug_peak_memory_usage();//���������ڼ���ڴ��ֵ�������ڽű��е�λ���޹�


?>