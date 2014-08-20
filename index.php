<?php
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load Application class
require 'ABCPHP/ABC.php';
                                                
// start the Application
$app = new ABC();
