<?php
if (str_contains($_SERVER['HTTP_USER_AGENT'],"Chrome")) {
    ?>
    <h3>str_contains() require true</h3>
    <p>you are using Chrome</p>
<?php
}else{
    ?>
    <h3>str_contains() return false</h3>
    <p>you are not using Chrome</p>
<?php
}
?>