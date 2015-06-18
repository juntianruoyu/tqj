<?php
/*
 * 享元模式：以共享的方式高效的支持大量的细粒度对象
 */
class FlyweightBook {
	private $author;
	private $title;
	function __construct($author_in, $title_in) {
		$this->author = $author_in;
		$this->title  = $title_in;
	}
	function getAuthor() {
		return $this->author;
	}
	function getTitle() {
		return $this->title;
	}
}

class FlyweightFactory {
	private $books = array();
	function __construct() {
		$this->books[1] = NULL;
		$this->books[2] = NULL;
		$this->books[3] = NULL;
	}
	function getBook($bookKey) {
		if (NULL == $this->books[$bookKey]) {
			$makeFunction = 'makeBook'.$bookKey;
			$this->books[$bookKey] = $this->$makeFunction();
		}
		return $this->books[$bookKey];
	}
	 
	function makeBook1() {
		$book = new FlyweightBook('JK罗琳','哈利波特与魔法石');
		return $book;
	}
	function makeBook2() {
		$book = new FlyweightBook('JK罗琳','哈利波特与混血王子');
		return $book;
	}
	function makeBook3() {
		$book = new FlyweightBook('JK罗琳','哈利波特与阿兹卡班的囚徒');
		return $book;
	}
}

class FlyweightBookShelf {
	private $books = array();
	function addBook($book) {
		$this->books[] = $book;
	}
	function showBooks() {
		$return_string = NULL;
		foreach ($this->books as $book) {
			$return_string .= '作者: '.$book->getAuthor().'  标题: '.$book->getTitle();
		};
		return $return_string;
	}
}

writeln('开始测试享元模式');

$flyweightFactory = new FlyweightFactory();
$flyweightBookShelf1 =  new FlyweightBookShelf();// 制作一个新书架1
$flyweightBook1 = $flyweightFactory->getBook(1); // 从工厂创建书1
$flyweightBookShelf1->addBook($flyweightBook1);  // 把书1放到书架1
$flyweightBook2 = $flyweightFactory->getBook(1); // 从工厂获取书1
$flyweightBookShelf1->addBook($flyweightBook2);  // 把书2（其实就是书1）放到书架1， 这时候书架1上有两本书1

writeln('测试 1 - 两本书是否是同一本书');
if ($flyweightBook1 === $flyweightBook2) {
	writeln('1 和 2 是一样的');
} else {
	writeln('1 和 2 是不一样的');
}
writeln('');

writeln('测试 2 - 一本书在同一个书架上出现两次');
writeln($flyweightBookShelf1->showBooks());
writeln('');

$flyweightBookShelf2 =  new FlyweightBookShelf();// 制作一个新书架2
$flyweightBook1 = $flyweightFactory->getBook(2); // 从工厂创建书2
$flyweightBookShelf2->addBook($flyweightBook1);  // 把书2放到书架2
$flyweightBookShelf1->addBook($flyweightBook1);  // 把书2放到书架1

writeln('测试 3 - 书架1');
writeln($flyweightBookShelf1->showBooks()); // 打印出了书架1上的两本书，书1
writeln('');

writeln('测试 3 - 书架2');
writeln($flyweightBookShelf2->showBooks()); // 打印出了书架2上的一本书，书2
writeln('');

writeln('结束测试享元模式');

function writeln($line_in) {
	//echo $line_in.PHP_EOL;
    echo $line_in."<br/>";
}
?>