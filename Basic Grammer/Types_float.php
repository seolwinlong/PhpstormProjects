<?php
//浮点型（也叫浮点数 float，双精度数 double 或实数 real）可以用以下任一语法定义：
$a=1.234;
$b=1.2e3;
$c=7E-10;
$d=1_234.567;// 从 PHP 7.4.0 开始支持
//浮点数的精度有限。尽管取决于系统，PHP 通常使用 IEEE 754 双精度格式，则由于取整而导致的最大相对误差为 1.11e-16。
//非基本数学运算可能会给出更大误差，并且要考虑到进行复合运算时的误差传递。
//
//此外，以十进制能够精确表示的有理数如 0.1 或 0.7，无论有多少尾数都不能被内部所使用的二进制精确表示，因此不能在不丢失一点点精度的情况下转换为二进制的格式。
//这就会造成混乱的结果：例如，floor((0.1+0.7)*10) 通常会返回 7 而不是预期中的 8，因为该结果内部的表示其实是类似 7.9999999999999991118...。

//所以永远不要相信浮点数结果精确到了最后一位，也永远不要比较两个浮点数是否相等。
//如果确实需要更高的精度，应该使用任意精度数学函数或者 gmp 函数。

//要测试浮点数是否相等，要使用一个仅比该数值大一丁点的最小误差值。
//该值也被称为机器极小值（epsilon）或最小单元取整数，是计算中所能接受的最小的差别值。
$a=1.23456789;
$b=1.23456780;
$epsilon=0.00001;
//$a 和 $b 在小数点后五位精度内都是相等的。
if (abs($a+$b)>=$epsilon) {
    echo 'false';
}

//某些数学运算会产生一个由常量 NAN 所代表的结果。此结果代表着一个在浮点数运算中未定义或不可表述的值。
//任何拿此值与其它任何值（除了 true）进行的松散或严格比较的结果都是 false。
//由于 NAN 代表着任何不同值，不应拿 NAN 去和其它值进行比较，包括其自身，应该用 is_nan() 来检查。