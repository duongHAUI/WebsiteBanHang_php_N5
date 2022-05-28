<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/checkout.css">
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="checkout container">
        <h1>Checkout</h1>
        <form action="#">
            <div class="row">
                <div class="col-7 col-sm-12">
                    <p class="checkout-title">billing details</p>
                    <div class="checkout-content">
                        <div class="field-item">
                            <label for="">Name <span class="star-red">*</span></label>
                            <input type="text" require placeholder="Fullname" name="fullname">
                        </div>
                        <div class="field-item">
                            <label for="">Country</label>
                            <select id="country" data-live-search='true' name="conutry">
                                <option value="">Country</option>
                            </select>
                        </div>
                        <div class="field-item">
                            <label for="">Region</label>
                            <select id="region" data-live-search='true' name="region">
                                <option value="">Region</option>
                            </select>
                        </div>
                        <div class="field-item">
                            <label for="">City</label>
                            <select id="city" data-live-search='true' name="city">
                                <option value="">City</option>
                            </select>
                        </div>
                        <div class="field-item">
                            <label for="">Address Detail<span class="star-red">*</span></label>
                            <input type="text" placeholder="Address" name="address">
                        </div>
                        <div class="field-item">
                            <label for="">Phone<span class="star-red">*</span></label>
                            <input type="text" require placeholder="Phone" name="phone">
                        </div>
                        <div class="field-item">
                            <label for="">Email<span class="star-red">*</span></label>
                            <input type="email" require placeholder="Email" name="email">
                        </div>
                        <div class="field-item">
                            <label for="">Order notes (optional)</label>
                            <textarea rows="2" placeholder="Note..." name="note"></textarea>
                        </div>
                    </div>
                    <div class="checkout-btn">
                        <button class="back-to-cart checkout-btn-item">Back to Cart</button>
                        <button class="place-order checkout-btn-item">Place order</button>
                    </div>
                </div>
                <div class="col-5 col-sm-12">
                    <p class="checkout-title">your order</p>
                    <div class="order-total">
                        <div class="order-list">
                            <div class="order-item">
                                <p class="order-item__name">Test test</p>
                                <p class="count">x 5</p>
                                <p class="order-price">$430</p>
                            </div>
                            <div class="order-item">
                                <p class="order-item__name">T-shirt Polo</p>
                                <p class="count">x 10</p>
                                <p class="order-price">$430</p>
                            </div>
                            <div class="order-item">
                                <p class="order-item__name">t-shirt mina polo women</p>
                                <p class="count">x 10</p>
                                <p class="order-price">$430</p>
                            </div>
                        </div>
                        <div class="line">
                            <p class="order-total__title">subtotal</p>
                            <p class="price">$430</p>
                        </div>
                        <div class="line">
                            <p class="order-total__title">shipping</p>
                            <div class="group-checkbox">
                                <input type="checkbox" id="shipping" checked>
                                <label for="shipping">
                                    Free Shipping
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                        <div class="total-detail line">
                            <p class="order-total__title">total</p>
                            <p class="total-money">$430</p>
                        </div>
                        <div class="cash">
                            <div class="group-checkbox">
                                <input type="checkbox" id="cash" name="cashOnDelivert" checked>
                                <label for="cash">
                                    Cash on delivery
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
        include("footer.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    //-------------------------------SELECT CASCADING-------------------------//
    var selectedCountry = (selectedRegion = selectedCity = "");
    // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
    var BATTUTA_KEY = "aefc663259804b9e59083ae65f383a1e";
    // Populate country select box from battuta API
    url =
        "https://battuta.medunes.net/api/country/all/?key=" +
        BATTUTA_KEY +
        "&callback=?";

    // EXTRACT JSON DATA.
    $.getJSON(url, function(data) {
        console.log(data);
        $.each(data, function(index, value) {
        // APPEND OR INSERT DATA TO SELECT ELEMENT.
        $("#country").append(
            '<option value="' + value.code + '">' + value.name + "</option>"
        );
        });
    });
    // Country selected --> update region list .
    $("#country").change(function() {
        selectedCountry = this.options[this.selectedIndex].text;
        countryCode = $("#country").val();
        // Populate country select box from battuta API
        url =
        "https://battuta.medunes.net/api/region/" +
        countryCode +
        "/all/?key=" +
        BATTUTA_KEY +
        "&callback=?";
        $.getJSON(url, function(data) {
        $("#region option").remove();
        $('#region').append('<option value="">Please select your region</option>');
        $.each(data, function(index, value) {
            // APPEND OR INSERT DATA TO SELECT ELEMENT.
            $("#region").append(
            '<option value="' + value.region + '">' + value.region + "</option>"
            );
        });
        });
    });
    // Region selected --> updated city list
    $("#region").on("change", function() {
        selectedRegion = this.options[this.selectedIndex].text;
        // Populate country select box from battuta API
        countryCode = $("#country").val();
        region = $("#region").val();
        url =
        "https://battuta.medunes.net/api/city/" +
        countryCode +
        "/search/?region=" +
        region +
        "&key=" +
        BATTUTA_KEY +
        "&callback=?";
        $.getJSON(url, function(data) {
        console.log(data);
        $("#city option").remove();
        $('#city').append('<option value="">Please select your city</option>');
        $.each(data, function(index, value) {
            // APPEND OR INSERT DATA TO SELECT ELEMENT.
            $("#city").append(
            '<option value="' + value.city + '">' + value.city + "</option>"
            );
        });
        });
    });
    // city selected --> update location string
    $("#city").on("change", function() {
        selectedCity = this.options[this.selectedIndex].text;
        // $("#location").html(
        // "Locatation: Country: " +
        //     selectedCountry +
        //     ", Region: " +
        //     selectedRegion +
        //     ", City: " +
        //     selectedCity
        // );
    });
    });
    </script>
</body>
</html>