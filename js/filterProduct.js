






let form = document.querySelector('#form-request');
var data = new FormData(form);
let queryString = new URLSearchParams(data).toString();
request(queryString);
    







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