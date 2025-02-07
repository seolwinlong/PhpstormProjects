<?php
//一个 nowdoc 结构也用和 heredoc 结构一样的标记 <<<， 但是跟在后面的标识符要用单引号括起来，即 <<<'EOT'。
//Heredoc 结构的所有规则也同样适用于 nowdoc 结构，尤其是结束标识符的规则。
//# 12 Nowdoc结构字符串示例
echo <<<'EOD'
Example of string spanning multiple lines
using nowdoc syntax. Backslashes are always treated literally,
e.g. \\ and \'.
EOD;

//#13含变量引用的Nowdoc字符串示例
class foo2{
    public String $foo;
    public array $bar;
    function __construct(){
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}
$foo = new Foo2();
$name='MyName';
echo <<<'EOD'
My name is {$name}.I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
this should not print a capital 'A':\x41
EOD;
