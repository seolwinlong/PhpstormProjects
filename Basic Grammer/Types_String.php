<?php
//一个字符串 string 就是由一系列的字符组成，其中每个字符等同于一个字节。
//这意味着 PHP 只能支持 256 的字符集，因此不支持 Unicode 。
//注意: 在 32 位版本中，string 最大可以达到 2GB（最多 2147483647 字节）。
//一个字符串可以有4种表达方式，单引号，双引号，heredoc结构，nowdoc结构
//定义一个字符串的最简单的方法是用单引号把它包围起来（字符 '）
//要表达一个单引号自身，需在它的前面加个反斜线（\）来转义。要表达一个反斜线自身，则用两个反斜线（\\）。
//其它任何方式的反斜线都会被当成反斜线本身：也就是说如果想使用其它转义序列例如 \r 或者 \n，并不代表任何特殊含义，就单纯是这两个字符本身。
//注意: 不像双引号和 heredoc 语法结构，在单引号字符串中的变量和特殊字符的转义序列将不会被替换。
echo 'this is a simple string';

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
