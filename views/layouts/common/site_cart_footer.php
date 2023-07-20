<script src="admin/js/cart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    $(function(){

        let cart= new Cart("rest_order");
        // console.log(cart);
        cart_load();

                
        $(".read_mor_btn").on("click",function(){
           
            let id=$(this).data("id");
            $.ajax({
            type:'POST',
            url:"Admin/api/MenuApi/find",
            data: {
                "id":id
            },
            success: function(res){
                let data= JSON.parse(res);
                let item= {
                    item_id:id,
                    qty:1,
                    price:data.menu.regular_price,
                    name:data.menu.name,
                    discount:0,
                    photo: data.menu.photo
                };
                cart.save(item);

                cart_load();
                toastr.success('Added to cart');
            }
           }); 

        });

        $("body").on("click",".delete",function(){
            let id=$(this).parent().data("id");

            cart.delItem(id);
            cart_load();
        });

        $("body").on("click",".btn-add", function(){
            let id=$(this).parent().parent().parent().data("id");

            cart.QtyUp(id,1);
            cart_load();
        });
        $("body").on("click",".btn-sub", function(){
            let id=$(this).parent().parent().parent().data("id");

            cart.QtyUp(id,-1);
            cart_load();
        });

        $("body").on("click",".clear-cart",function(){
            cart.clearCart();
            cart_load();
        });


        function cart_load(){
            $("#minicart-product-list").html(get_html_cart());
            $(".price").html(getCartTOtal() + " BDT");

        }
        function get_html_cart(){
            let menus= cart.getCart();
            // console.log(menus);
            let html="";
            if(menus !=null){
                
                let total=0;

                menus.forEach(function(v){
                html+=`<li class=mini-1 data-id=${v.item_id}>`;
                html+="<a href='#' class='minicart-product-image'>";
                html+=`<img src='Admin/img/${v.photo}' alt='cart products'>`;
                html+="</a>";
            
                html+="<div class='minicart-product-details'>";
                html+=`<h6><a href='#'>${v.name}</a></h6>`;
                html+=`<span>${v.price} x ${v.qty} = ${v.qty*v.price} BDT </span>`;
                html+=`<div><button class='btn-add'>+</button><button class='btn-sub'>-</button></div>`;
                html+="</div>";

                html+="<button class='close delete'>";
                html+="<i class='fa fa-close'></i>";
                html+="</button>";

                 html+="</li>";
                });

            }
            
            return html;
        }

        function getCartTOtal(){
            let menus= cart.getCart();
            let total=0;
            if(menus !=null){

                menus.forEach(function(v){
                    total += parseFloat(v.qty) * parseFloat(v.price);
                });
            }
            return total;
        }

    });
</script>