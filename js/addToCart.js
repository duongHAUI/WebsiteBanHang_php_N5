let prev = document.querySelector("#prev");
console.log(prev);
let next = document.querySelector("#next");
let quantity = document.querySelector("#quantity");
let addCart = document.querySelector("#add-to-cart-prodetail");

prev.onclick = ()=>{
    if(+quantity.value  > 1){
        quantity.value = +quantity.value  -   1;
    }
}
next.onclick = ()=>{
    quantity.value = +quantity.value  +  1;
}

quantity.onchange = ()=>{
    if(+quantity.value <= 0){
        quantity.value = 1;
    }
}

addCart.onclick  =()=>{

    if(Number(quantity.value) > Number(addCart.getAttribute('quantity'))){
        $.notify('Số lượng không đủ!', 'error');
    }
    else{
        var pro_id = addCart.getAttribute("pro_id");
        window.location="./controllers/cart/addCart.php?quantity="+quantity.value+"&pro_id="+pro_id;
    }
    
}
