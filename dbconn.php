<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())
    ->withProjectId('data.json')
    ->withDatabaseUri('https://php-firebase-crud-f3d30-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
