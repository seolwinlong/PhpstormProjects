<?php
//数字字符串
//如果一个 PHP string 可以被解释为 int 或 float 类型，则它被视为数字字符串。
/*PHP 8.0.0 正式可用：

WHITESPACES      \s*
LNUM             [0-9]+
DNUM             ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
EXPONENT_DNUM    (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
INT_NUM_STRING   {WHITESPACES} [+-]? {LNUM} {WHITESPACES}
FLOAT_NUM_STRING {WHITESPACES} [+-]? ({DNUM} | {EXPONENT_DNUM}) {WHITESPACES}
NUM_STRING       ({INT_NUM_STRING} | {FLOAT_NUM_STRING})*/
//任何包含字母 E 周围是数字的字符串都将视为以科学计数法表示的数字。这会产生意想不到的效果。

var_dump("0D1" == "000"); // false, "0D1" 不是科学计数法
var_dump("0E1" == "000"); // true, "0E1" is 0 * (10 ^ 1), or 0
var_dump("2E1" == "020"); // true, "2E1" is 2 * (10 ^ 1), or 20

/*当一个 string 需要被当作一个数字计算时，（例如：算术运算， int 类型声明等)，则采取以下步骤来确定结果：

1、如果 string 是数字，当 string 是整数字符串并且符合 int 类型的范围限制（即是 PHP_INT_MAX 定义的值），则解析为 int ，否则解析为 float 。
2、如果上下文允许前导数字和一个 string，如果 string 的前导部分是整数数字字符串且符合 int 类型限制（由 PHP_INT_MAX 定义），则解析为 int ，否则解析为 float 。 此外，还会导致 E_WARNING 级别的错误。
3、如果 string 不是数字，则会抛出一个 TypeError 的异常。*/

$foo = 1 + "10.5";                // $foo 是 float (11.5)
$foo = 1 + "-1.3e3";              // $foo 是 float (-1299)
$foo = 1 + "bob-1.3e3";           // PHP 8.0.0 起产生 TypeError；在此之前 $foo 是 integer (1)
$foo = 1 + "bob3";                // PHP 8.0.0 起产生 TypeError；在此之前 $foo 是 integer (1)
$foo = 1 + "10 Small Pigs";       // PHP 8.0.0 起，$foo 是 integer (11)，并且产生 E_WARNING；在此之前产生 E_NOTICE
$foo = 4 + "10.2 Little Piggies"; // PHP 8.0.0 起，$foo 是 float (14.2)，并且产生 E_WARNING；在此之前产生 E_NOTICE
$foo = "10.0 pigs " + 1;          // PHP 8.0.0 起，$foo 是 float (11)，并且产生 E_WARNING；在此之前产生 E_NOTICE
$foo = "10.0 pigs " + 1.0;        // PHP 8.0.0 起，$foo 是 float (11)，并且产生 E_WARNING；在此之前产生 E_NOTICE
