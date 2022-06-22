
let quantity = document.querySelector("#quantity");
let addCart = document.querySelector("#add-to-cart-prodetail");
function addToCart(id,quantity){
        var xmlhttp=new XMLHttpRequest();
        
        xmlhttp.onreadystatechange=function() {
            
            if(this.status == 403){
                alert("Sản phẩm đã hết hàng!");
            }
            else if (this.readyState==4 && this.status==200) {
                alert("Sản phẩm đã thêm vào giỏ hàng!");
                document.getElementById("countCart").innerText=this.responseText;
            }
            else if(this.status == 401){
                console.log("401");
                window.location="http://localhost/WebsiteBanHang_php_N5/login";
            }
        }
        
        xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/cart/addCart.php?noNavigate=true&quantity=1&pro_id="+id,true);
        xmlhttp.send();
        
}





