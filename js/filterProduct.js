

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
    console.log(12321);
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
//----------------Phân trang--------------------
let pages = document.querySelectorAll(".page-pro");
function requestPage() {
    document.getElementById("offset").value = document.querySelector(".page-pro.active").textContent;
    var data = new FormData(form);
    let queryString = new URLSearchParams(data).toString();
    request(queryString);
}
pages.forEach(item=>{
    item.onclick = ()=>{
        document.querySelector(".page-pro.active").classList.remove("active");
        item.classList.add("active");
        requestPage();
    }
})
document.querySelector(".page-pro-left").onclick = ()=>{
    if(+document.querySelector(".page-pro.active").textContent % 3 == 1 && +document.querySelector(".page-pro.active").textContent !=1 ){
        nextPages(-1);
        document.querySelector(".page-pro.active").classList.remove("active");
        pages[2].classList.add("active");
        requestPage();
    }
    else if(+document.querySelector(".page-pro.active").textContent !=1){
        var index = +document.querySelector(".page-pro.active").textContent % 3;
        document.querySelector(".page-pro.active").classList.remove("active");
        ( index== 0 ? pages[1].classList.add("active"): pages[0].classList.add("active"))
        requestPage();
    }
}
document.querySelector(".page-pro-right").onclick = ()=>{
    if(+document.querySelector(".page-pro.active").textContent % 3 == 0 ){
        nextPages(1);
        document.querySelector(".page-pro.active").classList.remove("active");
        pages[0].classList.add("active");
        requestPage();
        
    }else{
        var index = +document.querySelector(".page-pro.active").textContent % 3;
        document.querySelector(".page-pro.active").classList.remove("active");
        ( index== 1 ? pages[1].classList.add("active"): pages[2].classList.add("active"))
        requestPage();
    }
}
function nextPages(index){
    pages.forEach(item=>{
        var i = 3*index;
        item.textContent = +item.textContent + i;
        i = index > 0 ? i--:i++ ;
    })
}