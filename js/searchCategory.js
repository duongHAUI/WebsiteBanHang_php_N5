const checkbox = document.querySelectorAll(".category-search");

let newlist;

checkbox.forEach((item, index, arr)=>{
    item.onclick = (e)=>{
        let list = document.getElementById("list-category").getAttribute("category-list");
        newlist = check(list,item.value);
        document.getElementById("list-category").setAttribute("category-list",newlist);
    }
})
var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("products").innerHTML=this.responseText;
        }
    }
xmlhttp.open("POST","/WebsiteBanHang_php_N5/controllers/product/categoryPro.php?category-list="+newlist,true);
xmlhttp.send();








function check(list,value){
    var listArr = list.trim().split(" ").filter(item => item !== value);
    if(list.trim().split(" ").length == listArr.length){
        listArr.push(value);
    }
    return listArr.join(" ");
}