<?php
include("views/layouts/checkout/checkout_header_library.php");
?>
<?php
include("views/layouts/common/site_menu.php");
?>

<style>
    .pay {
        color: black;
    }
</style>
<div style="height: 130px; width:100%">

</div>
<h3 style=" background-color:#F8F8FF; padding:30px; height:90px;"><a class="pay" href="checkout">Checkout</a><a class="pay" href="home"> / Home</a> </h3>
<div style="height: 50px; width:100%">

</div>

<div class="container">
    <div class="row p-5 m-5 " style="background:#DCDCDC;border-radius: 5px; padding:15px">
        <div class="col-md-8 order-md-1">
            <h3 class="mb-3">Billing address</h3>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name <span class="required">*</span></label></label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo isset($_SESSION["s_first_name"]) ? $_SESSION["s_first_name"] : "" ?>">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo isset($_SESSION["s_last_name"]) ? $_SESSION["s_last_name"] : "" ?>">

                    </div>
                </div>



                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo isset($_SESSION["s_email"]) ? $_SESSION["s_email"] : "" ?>">

                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?php echo isset($_SESSION["s_street_address"]) ? $_SESSION["s_street_address"] : "" ?>">
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="<?php echo isset($_SESSION["s_apartment"]) ? $_SESSION["s_apartment"] : "" ?>">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mobile">Mobile <span class="required">*</span></label></label>
                        <input type="text" class="form-control" id="mobile" placeholder="" value="<?php echo isset($_SESSION["s_mobile"]) ? $_SESSION["s_mobile"] : "" ?>">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Order Note</label>
                        <textarea class="form-control" id="txtordernote"></textarea>

                    </div>
                </div>

                <div class="row" style="padding-top: 5px;">
                    <div class="col-md-4 mb-3">
                        <label for="country">Country <span class="required">*</span></label></label>
                        <select class="custom-select d-block w-100" id="country">
                            <?php
                            $countries = Country::all();
                            foreach ($countries as $country) {
                                if ($country->id == $_SESSION["s_country_id"]) {
                                    echo "<option value='$country->id' selected>$country->name</option>";
                                } else {
                                    echo "<option value='$country->id'>$country->name</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state">
                            <option value="">Choose...</option>
                            <option>Dhaka</option>
                            <option>Narayongonj</option>
                        </select>

                    </div>
                    <div class="col-md-3 mb-3" style="display:flex; justify-content:center; align-items:center;">
                        <label for="zip" style="padding-right: 3px;">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" value="<?php echo isset($_SESSION["s_postcode"]) ? $_SESSION["s_postcode"] : "" ?>">
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3" style="display: flex; ">
                    <div class="custom-control custom-radio" style="padding-right: 5px;">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio" style="padding-right: 5px;">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>

                    </div>
                </div>
                <hr class="mb-4">

            </form>
        </div>
        <div class="col-md-4 order-md-2 mb-4" id="chak">
            <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">
                    <h3>Your cart</h3>
                </span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item  " style="display: flex;">
                    <div class="  ">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </div>
                    
                </li>
                
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" style="background-color:black; color:#DCDCDC; border-radius:3px; border:none; height:40px; width:100px;">Redeem</button>
                    </div>
                </div>
            </form> -->
        </div>
        <input class="btn btn-primary btn-lg btn-block" id="cheakout" type="submit" value="Continue to checkout">
    </div>
</div>
<div style="height: 20px; width:100%">

</div>


<?php
include("views/layouts/common/site_footer.php");
?>
<?php
include("views/layouts/checkout/checkout_footer_library.php");
?>