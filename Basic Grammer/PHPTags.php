1.<?php
//PHP 有一个 echo 标记简写 <?=， 它是更完整的 <?php echo 的简写形式。
//Phpstorm会自动生成闭合标签，所以不用手写，会报错
echo "if you want to serve PHP code in XHTML or XML documents,use these tag";
?>

2.you can use the short echo tag to <?= 'print this string'?>.
it is equivalent to <?php echo 'print this string' ?>.

3.<?php echo 'this code is within short tags, but will only work'.
'if short_open_tag is enable';
/*短标记 (第三个例子) 是被默认开启的，但是也可以通过 short_open_tag php.ini 来直接禁用。
如果 PHP 在被安装时使用了 --disable-short-tags 的配置，该功能则是被默认禁用的。*/
/*因为短标记可以被禁用，所以建议使用普通标记（<?php ?>和<?= ?>)*/
/*如果文件内容仅仅包含 PHP 代码，最好在文件末尾删除 PHP 结束标记。
这可以避免在 PHP 结束标记之后万一意外加入了空格或者换行符，会导致 PHP 开始输出这些空白，而脚本中此时并无输出的意图。*/