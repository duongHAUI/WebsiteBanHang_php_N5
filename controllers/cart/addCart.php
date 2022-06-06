<?php
    namespace Models;

    include "../../db/connectdb.php";
    include "../../models/index.php";
    
    session_start();
    if(!isset($_SESSION['c_user'])){
        header("Location: ../../login");
    }else{
        $cus_id = $_SESSION['c_user']['id'];
        $pro_id = $_GET['pro_id'];
        $quantity = $_GET['quantity'];
        $cart = Cart::find_one($con,array("where"=>"cus_id='$cus_id' and pro_id = '$pro_id'"));
        if( $cart !=null){
            $update_qty = $quantity + $cart->qty;
            $update = Cart::update_by_pk($con,$cart->id,array("cart_qty"=>$update_qty));
            echo "update";
        }else{
            $rs = Cart::create($con,array('cart_qty'=>$quantity,'cus_id'=>$cus_id,'pro_id'=>$pro_id));
            echo "create";
        }
        header("Location: ../../cart");
    }
?>
