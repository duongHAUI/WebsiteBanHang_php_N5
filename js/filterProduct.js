






let form = document.querySelector('#form-request');
var data = new FormData(form);
let queryString = new URLSearchParams(data).toString();
request(queryString);
    



function request(queryString){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("products").innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product/filterProduct.php?"+queryString,true);
    xmlhttp.send();
}
//------------------Sort giá --------------
document.getElementById("sort-product").onchange = ()=>{
    document.getElementById("sortPrice").value = document.getElementById("sort-product").value;
    var data = new FormData(form);
    let queryString = new URLSearchParams(data).toString();
    request(queryString);
}
// --------------Khoảng giá--------------
let priceMin = document.getElementById("price-range-min");
let priceMax = document.getElementById("price-range-max");
let btnPriceRange = document.getElementById("price-range");
btnPriceRange.onclick = ()=>{
    if(priceMin.value >= priceMax.value){
        alert("Vui lòng nhập khoảng tiền chính xác để tìm kiếm");
    }else{
        document.getElementById("minPrice").value =  priceMin.value;
        document.getElementById("maxPrice").value =  priceMax.value;
        var data = new FormData(form);
        let queryString = new URLSearchParams(data).toString();
        request(queryString);
    }
}
document.getElementById("un-price-range").onclick = ()=>{
    document.getElementById("minPrice").value = "";
    document.getElementById("maxPrice").value = "";
    priceMin.value = "";
    priceMax.value = "";
    var data = new FormData(form);
    let queryString = new URLSearchParams(data).toString();
    request(queryString);
}
// --------------Check box categories--------------
const checkboxCategory = document.querySelectorAll(".category-search");
checkboxCategory.forEach((item)=>{
    item.onclick = (e)=>{
        listIdInput = check(document.getElementById("categories").value,item.value);
        document.getElementById("categories").value = listIdInput;
        var data = new FormData(form);
        let queryString = new URLSearchParams(data).toString();
        request(queryString);
    }
})
// --------------Check box brands--------------
const checkboxBrand = document.querySelectorAll(".brand-search");
checkboxBrand.forEach((item)=>{
    item.onclick = (e)=>{
        listIdInput = check(document.getElementById("brands").value,item.value);
        document.getElementById("brands").value = listIdInput;
        var data = new FormData(form);
        let queryString = new URLSearchParams(data).toString();
        request(queryString);
    }
})
function check(list,value){
    var listArr = list.trim().split(" ").filter(item => item !== value);
    if(list.trim().split(" ").length == listArr.length){
        listArr.push(value);
    }
    return listArr.join(" ");
}

