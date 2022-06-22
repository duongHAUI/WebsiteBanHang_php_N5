<?php
    namespace Models;
    include "../../db/connectdb.php";
    include "../../models/index.php";
    session_start();
    if(!isset($_SESSION['c_user'])){
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }else{
        $cus_id = $_SESSION['c_user']['id'];
        $pro_id = $_GET['pro_id'];
        $quantity = (int)$_GET['quantity'];
        $cart = Cart::find_one($con,array("where"=>"cus_id='$cus_id' and pro_id = '$pro_id'"));
        if( $cart !=null){
            $update_qty = $quantity + $cart->qty;
            $product = product::find_one($con,array("where"=>"product_id = '$pro_id'"));
            $qty = ($update_qty <= (int)$product->quantity) ? $update_qty : $product->quantity;
            $update = Cart::update_by_pk($con,$cart->id,array("cart_qty"=>$qty));
        }else{
            $rs = Cart::create($con,array('cart_qty'=>$quantity,'cus_id'=>$cus_id,'pro_id'=>$pro_id));
        }
        if(!isset($_GET['noNavigate'])){
            header("Location: ../../cart");
        }
        $count = 0;
            $carts = Cart::find_all($con, array("where" => "cus_id = $cus_id"));
            foreach ($carts as $key => $value) {
            $count += 1;
        }
        echo $count;
    }

?>
