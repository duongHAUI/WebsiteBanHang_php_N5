<?php

include_once __DIR__ . "/../vendor/phpdotenv/Dotenv.php";

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../.env');
$dotenv->load();