function addToCart(id){
    alert('Sản phẩm đã được thêm vào giỏ hàng!');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("countCart").innerText=this.responseText;
        }
    }
    xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/cart/addCart.php?noNavigate=true&quantity=1&pro_id="+id,true);
    xmlhttp.send();
    
}
