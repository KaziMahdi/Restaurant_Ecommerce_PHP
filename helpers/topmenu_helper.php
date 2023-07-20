<?php
function top_menus(){
    $menus=SiteTopMenu::all();
    $html="";
    foreach($menus as $menu){
    $html.=<<<HTML
    <div class="item">
                        <div class="feature_item">
                            <div class="feature_item_inner">
                                <img src="img/feature/$menu->image" alt="">
                                <div class="icon_hover">
                                    <i class="fa fa-search"></i>
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="title_text">
                                <div class="feature_left"><a href="table.html"><span>$menu->name</span></a></div>
                                <div class="restaurant_feature_dots"></div>
                                <div class="feature_right">$menu->price</div>
                            </div>
                        </div>
                    </div>
HTML;
}
return $html;
}
?>