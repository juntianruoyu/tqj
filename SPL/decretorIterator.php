<?php 
/*
 * ����һ������SPL��Ŀ¼�࣬����ܼ�
 */
$obj = new DirectoryIterator('E:\wamp\bin\php\php5.3.3');
foreach ($obj as $file){
	echo $file->getFileName();
	echo "<br/>";
}


/*
 * ��������scandir�����������ļ�����
 */
$files = scandir('E:\wamp\bin\php\php5.3.3');
foreach ($files as $file){
	if($file!='.'&&$file!='..'){//����� .(��ǰĿ¼)  ..(��һ��Ŀ¼)�ļ�
		echo $file;
		echo "<br/>";
	}
}

/*
 * ��������������̷���  opendir  readdir   closedir
 */

$fp = opendir('E:\wamp\bin\php\php5.3.3');
while (FALSE!==($file=readdir($fp))){
	echo $file;
	echo "<br/>";
}
closedir($fp);


/*
 * �����ģ��������ķ���������PHP��dir��
 */

$obj = dir('E:\wamp\bin\php\php5.3.3');
while (false!==($file=$obj->read())){
	echo $file;
	echo "<br/>";
}
$obj->close();


?>