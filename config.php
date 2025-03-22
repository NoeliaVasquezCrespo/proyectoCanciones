<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'database' => [
        'type'      => $_ENV['DB_TYPE'],
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_NAME'],
        'user'      => $_ENV['DB_USER'],
        'password'  => $_ENV['DB_PASSWORD'],
    ],
    'error' => true
];
