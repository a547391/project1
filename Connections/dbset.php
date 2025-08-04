<?php
// PDO SQL資料庫連線程式
$dsn = "mysql:host=localhost;dbname=expstore;charset=utf8";
$user = "sales";
$password = "123456";
$link = new PDO($dsn, $user, $password);
// PHP 5.3.6 以前版本需要下列語法
$link->exec("set names utf8");
?>