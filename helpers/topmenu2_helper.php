<?php
function grid_menu(){
    $gmenus=SiteTopMenu::all();
    $html="";
    foreach($gmenus as $gmenu){
$html.=<<<HTML
<div class="col-md-4 col-sm-6 ">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/feature/$gmenu->image" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>$gmenu->name</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$gmenu->price</div>
                                </div>
                            </div>
                        </div>
HTML;
    }
    return $html;
}
?>