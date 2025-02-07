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
//高级大括号语法
//高级语法允许使用任意访问器对变量进行插值
//任何标量变量、数组元素或对象属性（static 或非 static）都可以通过这种语法进行插值。
//表达式的写法和 在string之外的写法一样，然后用大括号{和 }包围。
//由于{不能被转义，所以这种语法只有在 紧跟在{后面的$才会被识别。要得到一个字面的 {$，需要用{\$。以下是一些例子：
const DATA_KEY='const-key';
$great='fantastic';
$arr=[
    '1',
    '2',
    '3',
    [41,42,43],
    'key'=>'indexed value',
    'const-key'=>'key with minus sign',
    'foo'=>['foo1','foo2','foo3']
];
//无效，输出 This is {fantastic}
echo "this is { $great}\n";
//有效，输出 this is fantastic
echo "this is {$great}\n";

class Square{
    public int $width;
    public function __construct($width){
        $this->width=$width;
    }
}
$square=new Square(5);

//有效
echo "This square is {$square->width}00 centimeters wide\n";

//有效，引用key仅使用花括号语法时有效
echo "This works:{$arr['key']}\n";

//有效
echo "This works:{$arr[3][2]}\n";
echo "This works:{$arr[DATA_KEY]}\n";

//使用多维数组时，在字符串哪不是，始终使用括号括住数组
echo "This works:{$arr['foo'][2]}\n";

//echo "This works:{$obj->values[3]->name}";
//
//echo "$obj->$staticProp";
//无效，输出C:\directory\{fantastic}.txt
echo "C:\directory\{$great}.txt\n";

//有效，输出C:\directory\fantastic.txt
echo "C:\\directory\\{$great}.txt\n";

//一些字符串示例
//取得字符串的第一个字符
$str='This is a test.';
$first=$str[0];
echo "$first\n";

//取得字符串的第三个字符
$third=$str[2];
echo "$third\n";

//取得字符串的最后一个字符
$str='this is still a test.';
$last=$str[-2];
echo "$last\n";

//修改最后一个字符
$str='look at the sea';
$str[-1]='e';
echo "$str\n";

//示例：#18 字符串无效下标的例子
$str='abc';

var_dump($str['1']);
var_dump(isset($str['1']));

var_dump($str['1.0']);
var_dump(isset($str['1.0']));

var_dump($str['x']);
var_dump(isset($str['x']));

var_dump($str['1x']);
var_dump(isset($str['1x']));

//有用的函数和运算符
//字符串可以用 '.'（点）运算符连接起来，注意 '+'（加号）运算符没有这个功能。
//一个值可以通过在其前面加上 (string) 或用 strval() 函数来转变成字符串。
//必须使用魔术方法 __toString 才能将 object 转换为 string。
//大部分的 PHP 值可以转变成 string 来永久保存，这被称作串行化，可以用函数 serialize() 来实现。