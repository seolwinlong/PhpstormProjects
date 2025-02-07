<?php
//一个字符串 string 就是由一系列的字符组成，其中每个字符等同于一个字节。
//这意味着 PHP 只能支持 256 的字符集，因此不支持 Unicode 。
//注意: 在 32 位版本中，string 最大可以达到 2GB（最多 2147483647 字节）。
//一个字符串可以有4种表达方式，单引号，双引号，heredoc结构，nowdoc结构
//定义一个字符串的最简单的方法是用单引号把它包围起来（字符 '）
//要表达一个单引号自身，需在它的前面加个反斜线（\）来转义。要表达一个反斜线自身，则用两个反斜线（\\）。
//其它任何方式的反斜线都会被当成反斜线本身：也就是说如果想使用其它转义序列例如 \r 或者 \n，并不代表任何特殊含义，就单纯是这两个字符本身。
//注意: 不像双引号和 heredoc 语法结构，在单引号字符串中的变量和特殊字符的转义序列将不会被替换。
/*echo 'this is a simple string';

//可以录入多行
echo  'You can also have embedded newlines 
in stings this way as it is 
okay to do
';

//输出：Arnold once said: "I'll be back"
echo 'Arnold once said :"I\'ll be back"';

//输出：you deleted C:\*.*?;
echo 'you deleted C:\\*.*?';

//输出：you deleted C:\*.*?
echo 'you deleted C:\*.*?';

//输出：this will not expand:\n a newline
echo 'this will not expand:\n a newline';

//输出：Variables do not $expand $either
echo 'Variables do not $expand $either';

//双引号
//如果字符串是包围在双引号（")）中， PHP 将对以下特殊的字符进行解析：
// \n换行，\r回车，\t 水平制表符，\v 垂直制表符，\e Escape，\f 换页，\\反斜线，\$美元标记，\"双引号，\[0-7]{1,3}八进制匹配正则表达式序列
// \x[0-9A-Fa-f]{1,2}十六进制匹配正则表达式
// \u{[0-9A-Fa-f]+}Unicode:匹配正则表达式[0-9A-Fa-f]+的字符序列是unicode码位
//和单引号字符串一样，转义任何其它字符都会导致反斜线被显示出来。
//用双引号定义的字符串最重要的特征是变量会被解析，详见变量插值。
