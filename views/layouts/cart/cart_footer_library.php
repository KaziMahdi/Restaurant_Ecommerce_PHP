
<!--================End Recent Blog Area =================-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<!-- Extra plugin js -->
<script src="vendors/bootstrap-selector/bootstrap-select.js"></script>
<script src="vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/countdown/jquery.countdown.js"></script>
<script src="vendors/js-calender/zabuto_calendar.min.js"></script>
<!--gmaps Js-->
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>-->
<!--        <script src="js/gmaps.min.js"></script>-->


<!--        <script src="js/video_player.js"></script>-->

<script src="js/theme.js"></script>
<?php
include("views/layouts/common/site_cart_footer.php");
?>
  <style>
    #qun{
        width: 50px;
    }
  </style>  
<script>
    $(function(){
        cart=new Cart("rest_order");
        let menus=cart.getCart();
        let html="";

        

            html+=`<div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead style="height: 30px;"><h3 style="text-align: center; padding-top:5px;">Shopping Cart</h3></thead>
                            <thead class="text-muted"> 
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                `
                                var total=0;
                                menus.forEach(function(menu){
                                    html+=`<tr><td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="Admin/img/${menu.photo}" class="img-sm"></div>
                                            <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">${menu.name}</a>
                                            
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> <span class="pe-3" > <input class="ps-2" type="number" value="${menu.qty}" id=qun></span> </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price">${subtotal=menu.qty*menu.price} BDT</var></div>
                                    </td>
                                    <td class="text-right d-none d-md-block"> <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip" data-abc="true"> <i class="fa fa-heart"></i></a> <a href="" class="btn btn-light" data-abc="true"> Remove</a> </td>
                                    </tr>`
                                    total+=subtotal;
                                    
                                });
                                    html+=
                                ` 
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form >
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" >
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">${total}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">- 0</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>${total}</strong></dd>
                        </dl>
                        <hr> 
                    </div>
                    <a href="checkout" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Checkout  </a> <a href="home" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                </div>
            </aside>
        </div>`
        
        $(".container-fluid").html(html);
    });
</script>
</body>

</html>