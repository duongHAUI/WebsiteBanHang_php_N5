
let quantity = document.querySelector("#quantity");
let addCart = document.querySelector("#add-to-cart-prodetail");
function addToCart(id,quantity){
    if(quantity == 0){
        $.notify('Sản phẩm đã hết!', 'error');
    }else{
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                $.notify('Sản phẩm đã thêm vào giỏ hàng!', 'success');
                document.getElementById("countCart").innerText=this.responseText;
            }
            else if(this.status == 401){
                window.location="http://localhost/WebsiteBanHang_php_N5/login";
            }
        }
        
        xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/cart/addCart.php?noNavigate=true&quantity=1&pro_id="+id,true);
        xmlhttp.send();
    }
       
        
}





