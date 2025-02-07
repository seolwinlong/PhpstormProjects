<?php
/*当字符串用双引号或heredoc结构定义时，其中的变量可以进行替换
这里共有两种语法规则：一种基本规则，一种高级规则。基本的语法规则是最常用和最方便的，
它可以用最少的代码在一个 string 中嵌入一个变量，一个 array 的值，或一个 object 的属性。
基本语法
如果遇到一个美元符号（$），后面的字符会被解释为变量名，然后替换为变量的值。*/
$juice="apple";
echo "He drank some $juice juice.";
//${ expression } 语法从 PHP 8.2.0 开始被弃用，因为它可能被解释为 可变变量。
const foo='bar';
$foo='foo';
$bar='bar';
var_dump("${foo}");
var_dump("${bar}");
//注意：如果无法形成有效的变量名，美元符号会保持原样。
echo "No interpolation $  has happened\n";
echo "No interpolation $\n has happened\n";
echo "No interpolation $2 has happened\n";

//# 15 插值数组或属性的第一个维度值
$juice=array("apple","banana","string_key"=>"purple");

echo "He drank some $juice[0] juice.";
echo PHP_EOL;
echo "He drank some $juice[1] juice.";
echo PHP_EOL;
echo "He drank some $juice[string_key] juice.";
echo PHP_EOL;

class A{
    public String $s="string";
}
$o=new A();
echo "Object value:$o->s\n";
//数组键必须是无引号的，因此不能用基本语法将常量作为键来引用。使用高级语法来代替
//从PHP7.1.0起，还支持负数字索引
$string='string';
echo "The character at index -2 is $string[-2].",PHP_EOL;
$string[-3]='o';
echo "Changing the character at index -3 is $string.",PHP_EOL;