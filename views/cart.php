<?php

namespace Models;

include "models/index.php";
include "db/connectdb.php";
// $user = Customer::create($con, array(
//   "customer_name" => "Đông",
//   "customer_email" => "nguyenbadong01@gmail.com",
//   "customer_password" => "123456",
//   "customer_country" => "Việt Nam",
//   "customer_city" => "Hà Nam",
//   "customer_phone" => "0123456789",
//   "customer_address" => "Nguyên Xá Bắc Từ Liêm Hà Nội",
//   "customer_image" => "tuat.jpg"
// ));

session_start();
$_SESSION["user_id"] = 13;
$user_id = 13;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>