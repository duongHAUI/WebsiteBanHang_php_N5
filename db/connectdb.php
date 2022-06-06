<?php
  include_once __DIR__ . "/../vendor/phpdotenv/Dotenv.php";

  $dotenv = new Dotenv\Dotenv(__DIR__ . '/../.env');
  $dotenv->load();

  $servername = "{$_ENV['DB_HOST']}:{$_ENV['DB_PORT']}";
  $username = $_ENV['DB_USERNAME'];
  $password = $_ENV['DB_PASSWORD'];
  $dbname = $_ENV['DB_DATABASE'];
  $con = mysqli_connect($servername, $username, $password, $dbname);
?>