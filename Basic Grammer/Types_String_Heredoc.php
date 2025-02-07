<?php
//Heredoc结构
//第三种表达字符串的方法是用 heredoc 句法结构：<<<。在该运算符之后要提供一个标识符，然后换行。接下来是字符串 string 本身，最后要用前面定义的标识符作为结束标志。
//结束标识符可以使用空格或制表符（tab）缩进，此时文档字符串会删除所有缩进。 在 PHP 7.3.0 之前的版本中，结束时所引用的标识符必须在该行的第一列。
//而且，标识符的命名也要像其它标签一样遵守 PHP 的规则：只能包含字母、数字和下划线，并且必须以字母和下划线作为开头。
//示例#1 PHP7.3.0之后的基础Heredoc
/*echo <<<END
        a
      b
    c
\n
END;
echo <<<END
        a
       b
      c
      END;*/
//如果结束标识符的缩进超过内容的任何一行的缩进，则将抛出 ParseError 异常：
//示例#2 结束标识符的缩紧不能超过正文的任何一行
/*echo <<<END
        a
       b
      c
        END;*/
//否则会报错：Wrong indent: should be the same as closing tag indent
/*制表符也可以缩进结束标识符，但是，关于缩进结束标识符和内容， 制表符和空格不能混合使用。
在以上任何情况下， 将会抛出 ParseError 异常。 之所以包含这些空白限制，是因为混合制表符和空格来缩进不利于易读性。*/
/*$values=[<<<END
a
    b
        c
END,'d,e,f'
];
var_dump($values);*/
//示例#8 Heredoc结构的字符串示例
$str=<<<EOD
Example of string
spanning multiple lines
using Heredoc syntax.
EOD;
/*含有变量的更复杂示例*/
class foo{
    var string $foo;
    var array $bar;

    function __construct(){
        $this->foo='Foo';
        $this->bar=array('Bar1','Bar2','Bar3');
    }
}
$foo=new foo();
$name='MyName';
echo <<<EOT
My name is "$name".I am printing some $foo->foo.
Now,I am printing some {$foo->bar[1]}.
this should print a capital 'A': \x41
EOT;

//也可以把heredoc结构用在函数参数中来传递数据
var_dump(array(<<<EOD
foobar!
EOD));

//也可以用Heredoc结构来初始化静态变量和类的属性和常量
//示例：#10 使用Heredoc结构来初始化静态值
//静态变量
function foo(){
    static $bar=<<<LABLE
Nothing in here...
LABLE;
}

//类的常量、属性
class foo1{
    const BAR=<<<FOOBAR
Constant example
FOOBAR;
    public $baz=<<<FOOBAR
property example
FOOBAR;
}

// 还可以再Heredoc结构中用双引号来声明表示符
//示例：#11在heredoc结构中使用双引号
echo <<<"FOOBAR"
Hello World!
FOOBAR;
