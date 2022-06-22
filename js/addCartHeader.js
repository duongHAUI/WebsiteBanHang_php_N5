let quantity = document.querySelector("#quantity");
let addCart = document.querySelector("#add-to-cart-prodetail");
function addToCart(id,quantity){
    if(quantity == 0){
        alert("Sản phẩm đã hết hàng!");
    }else{
        alert("Sản phẩm đã được thêm vào giỏ hàng!");
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("countCart").innerText=this.responseText;
            }
        }
        xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/cart/addCart.php?noNavigate=true&quantity=1&pro_id="+id,true);
        xmlhttp.send();
    }
    
}
