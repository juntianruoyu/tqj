<?php 
/*
 * 方法一：利用SPL的目录类，这个很简单
 */
$obj = new DirectoryIterator('E:\wamp\bin\php\php5.3.3');
foreach ($obj as $file){
	echo $file->getFileName();
	echo "<br/>";
}


/*
 * 方法二：scandir函数，返回文件数组
 */
$files = scandir('E:\wamp\bin\php\php5.3.3');
foreach ($files as $file){
	if($file!='.'&&$file!='..'){//不输出 .(当前目录)  ..(上一级目录)文件
		echo $file;
		echo "<br/>";
	}
}

/*
 * 方法三：面向过程方法  opendir  readdir   closedir
 */

$fp = opendir('E:\wamp\bin\php\php5.3.3');
while (FALSE!==($file=readdir($fp))){
	echo $file;
	echo "<br/>";
}
closedir($fp);


/*
 * 方法四：面向对象的方法，利用PHP的dir类
 */

$obj = dir('E:\wamp\bin\php\php5.3.3');
while (false!==($file=$obj->read())){
	echo $file;
	echo "<br/>";
}
$obj->close();


?>