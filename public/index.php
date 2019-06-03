<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Ethereal\Foundation\Application(__DIR__ . '/..');

$app->register();

echo '<pre>', var_dump($app);