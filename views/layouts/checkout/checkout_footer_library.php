
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
<?php
require_once("Admin/configs/app_config.php");
?>
<script>
    
    $(function(){
        cart=new Cart("rest_order");
        let menus=cart.getCart();
        // console.log(menus);
        let html="";
        $('#cheakout').on("click",function(){
            
            $.ajax({
                url:'Admin/api/CustomerApi/get_id',
                type:'get',
                success:function(res){
                    
                    var customer =JSON.parse(res);
                    customer=customer.customer;
                    if(customer!=null){
                    var customer_id=customer.id;
                    var f_name=$('#firstName').val();
                    var l_name=$('#lastName').val();
                    var name=f_name +" "+l_name;
                    var email=$('#email').val();
                    var address=$('#address').val();
                    var apartment=$('#address2').val();
                    var country=$('#country').val();
                    var state =$('#state').val();
                    var zip_code=$('#zip').val();
                    var mobile=$('#mobile').val();
                    
                    var remark=$('#txtordernote').val();
                    console.log(remark);
                    shipping_address=`
                    ${name}\n
                    ${apartment}\n
                    ${address}\n
                    Postcode:${zip_code}\n
                    Country:${country}\n
                    Mobile:${mobile}
                    `;
                    // console.log(shipping_address);
                    var discount = 0;
                    var vat = 0;
                    var booking_id=5;
                    // console.log(booking_id);

                    const date=new Date();
					let day = date.getDate();
					let month = date.getMonth() + 1;
					let year = date.getFullYear();
					let order_date = `${year}-${month}-${day}`;
                    // console.log(order_date);
					let delivery_date = `${year}-${month}-${day}`;


                    // console.log(shipping_address);


                    let menus=cart.getCart();
                    let order_total=getCartTotal();
                    console.log(order_total);

                        $.ajax({
                            url:'Admin/api/OrderApi/save',
                            type:'post',
                            data:{
                                "customer_id":customer_id,
                                "order_date":order_date,
                                "delivery_date":delivery_date,
                                "shipping_address":shipping_address,
                                "order_total":order_total,
                                "discount":0,
                                "vat":0,
                                "remark":remark,
                                "booking_id":booking_id,
                                "menus":menus
                            },
                            success:function(res){
                                toastr.success('order have been success');
                            }

                        });
                    

                    }else{
                        window.location="login"
                    }
                    
                }
            });

        });

        function getCartTotal(){
            let menus =cart.getCart();
            let total= 0;
            if(menus !=null){
                menus.forEach(function(v){
                    total +=parseFloat(v.qty) * parseFloat(v.price);

                });
            }
            return total;
        }
        

        
        
            
        html+=`
        <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">
                    <h3>Your cart</h3>
                </span>
            </h4>`
            let total=0;
                html+=`  
            <ul class="list-group mb-3">`
            
            menus.forEach(function(menu){
                html+=`  
            <li class="list-group-item  " style="display: flex;">
                    <div class="">
                        <div>
                            <h6 class="my-0">Product Name</h6>
                            <small class="text-muted">${menu.name}</small>
                        </div>
                        <span class="text-muted">${menu.price}*${menu.qty}=${menu.price*menu.qty}Tk</span>
                    </div>
                    
                </li>`
                total+=menu.price*menu.qty
               
                
            });
            
            html+=`
            <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>${total}</strong>
                </li>
            </ul>`
html+=`
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" style="background-color:black; color:#DCDCDC; border-radius:3px; border:none; height:40px; width:100px;">Redeem</button>
                    </div>
                </div>
            </form>` 
            
       

        $("#chak").html(html);
    });

</script>
</body>

</html>