    let sortProduct = document.getElementById("sort-product");
    sortProduct.onchange = ()=>{
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("products").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product/sortPricePro.php?sort-price="+sortProduct.value,true);
        xmlhttp.send();
    }

