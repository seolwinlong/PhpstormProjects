<p>This is going to be ignored by PHP and Displayed by the browser.</p>
<?php
/*凡是在一对开始和结束标记之外的内容都会被 PHP 解析器忽略，这使得 PHP 文件可以具备混合内容。
可以使 PHP 嵌入到 HTML 文档中去，如下例所示。*/
echo 'While this is going to be parsed.;'
?>
<p>This will also be ignored by PHP and Displayed by the browser</p>
