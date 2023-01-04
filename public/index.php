<?php

use Spike\core\Application;
use Spike\models\Register;

require_once __DIR__ . '/../vendor/autoload.php';

// $app = new Application(dirname(__DIR__));

// $app->run();

$register = new Register();

echo '<pre>';
var_dump($register);
echo '</pre>';
exit;