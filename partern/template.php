<?php
/**
 * 模板模式
 *
 * 定义一个操作中的算法骨架,而将一些步骤延迟到子类中,使得子类可以不改变一个算法的结构可以定义该算法的某些特定步骤
 *
 */
abstract class TemplateBase
{
	public function Method1()
	{
		echo "abstract Method <br/>";
	}

	public function Method2()
	{
		echo "abstract Method2<br/>";
	}

	public function Method3()
	{
		echo "abstract Method3<br/>";
	}

	public function doSomeThing()//骨架，上面三个是步骤，可以在子类中延迟实现
	{
		$this->Method1();
		$this->Method2();
		$this->Method3();
	}
}

class TemplateObject extends TemplateBase
{
}

class TemplateObject1 extends TemplateBase
{
	public function Method3()
	{
		echo "TemplateObject1 Method3<br/>";
	}
}

class TemplateObject2 extends TemplateBase
{
	public function Method2()
	{
		echo "TemplateObject2 Method2<br/>";
	}
}

// 实例化
$objTemplate = new TemplateObject();
$objTemplate1 = new TemplateObject1();
$objTemplate2 = new TemplateObject2();

$objTemplate->doSomeThing();
echo '<br />';
$objTemplate1->doSomeThing();
echo '<br />';
$objTemplate2->doSomeThing();
?>
