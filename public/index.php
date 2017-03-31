<?php

header("Content-type: text/html; charset=utf-8");
define('ROOT_PATH', realpath(dirname(__FILE__)));
define("APP_PATH",  ROOT_PATH . '/..');

require APP_PATH . '/vendor/autoload.php';

use Framework\Application;

Application::app()->run();