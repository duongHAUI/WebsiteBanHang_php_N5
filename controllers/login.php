<?php
    namespace Models;
?>

<?php
    include_once("../models/index.php");
    include_once("../db/connectdb.php");

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $accounts = Customer::find_one($con,array("where" => "customer_email = '$email'"));
        
    }else{
        header("Location: ../");
    }
?>