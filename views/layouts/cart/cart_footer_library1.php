
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
<script>
    $(function(){
        cart=new Cart("rest_order");
        let menus=cart.getCart();
        let html="";

        menus.forEach(function(menu){

    html+="<tr>";
         html+=`<td><figure class="itemside align-items-center>`
         html+=`<div class="aside"><img src="Admin/img/${menu.photo}" class="img-sm"></div>`
         html+=`<figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">${menu.name}</a>`
          
        html+=`</figcaption>`;
         html+=`</figure>`;
         html+=`</td>`;
         html+=`<td> <select class="form-control" value="${menu.qty}">`
         html+= `<option>1</option>`
         html+= `<option>2</option>`
         html+= `<option>3</option>`
         html+= `<option>4</option>`
         html+=`</select> </td>`;
         html+=`<td><div class="price-wrap"> <var class="price">${menu.qty*menu.price} BDT</var> </div></td>`;
         html+=`<td class="text-right d-none d-md-block"> <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip" data-abc="true"> <i class="fa fa-heart"></i></a> <a href="" class="btn btn-light" data-abc="true"> Remove</a></td>`;
         
    html+="</tr>";
        });
        $("#cart").html(html);
    });
</script>
</body>

</html>