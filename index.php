<?php
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// 加载框架入口类
require 'ABCPHP/ABC.php';

// 开启应用
$app = new ABC();