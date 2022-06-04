showProductLatest();
function showProductLatest(check = false) {
  var index;
  if (check) {
    index =+document.getElementById("view-more-latest-product").getAttribute("index") + 1;
    document.getElementById("view-more-latest-product").setAttribute("index", index + "");
  }else{
    index = false;
  }
  console.log(index);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("latest-product").innerHTML = this.responseText;
    }
  };
  xmlhttp.open(
    "GET",
    "/WebsiteBanHang_php_N5/controllers/product/productLastest.php?latest-product=" + index,
    true
  );
  xmlhttp.send();
}
