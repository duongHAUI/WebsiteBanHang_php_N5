<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","test2?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
<option value="3">Joseph Swanson</option>
<option value="4">Glenn Quagmire</option>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>

                                <?php
                                    $products = Product::find_all($con);
                                    foreach($products as $key => $value){
                                ?>
                                    <div class="col-4 col-md-6 col-sm-12">
                                        <div class="product-card">
                                            <a href="product-detail?pro_id=<?=$value->id?>">
                                                <div class="product-card-img">
                                                    <img src="images/<?=$value->get_images($con)[0]->link?>" alt="">
                                                    <img src="images/<?=$value->get_images($con)[1]->link?>" alt="">
                                                </div>
                                            </a>
                                            <div class="product-card-info">
                                                <div class="product-btn">
                                                    <a href="./product-detail.php" class="btn-flat btn-hover btn-shop-now">shop now</a>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?=$value->title?>
                                                </div>
                                                <div class="product-card-price">
                                                    <span><del><?=$value->price?></del></span>
                                                    <span class="curr-price"><?=$value->priceDiscount()?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>