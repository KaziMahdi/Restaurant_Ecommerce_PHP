<?php
function erp_menus()
{
   $menus = Menu::all();
    $html = "";
    foreach ($menus as $menu) {
        $html .= <<<HTML
<div class="col-md-6">
                   <div class="media">
                       <div class="media-left">
                           <img src="Admin/img/$menu->photo" alt="">
                       </div>
                       <div class="media-body">
                           <a href="#"><h3>$menu->name</h3></a>
                           <h4>$menu->regular_price</h4>
                           <p>$menu->description </p>
                           <a class="read_mor_btn" data-id="$menu->id" href="javascript:void(0)">Add To Cart</a>
                           <ul>
                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                               <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                           </ul>
  </div>
     </div>
    </div>
HTML;

    }
    return $html;
}

?>
