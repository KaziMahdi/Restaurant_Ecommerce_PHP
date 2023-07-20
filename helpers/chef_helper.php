<?php
function main_chefs(){
    $chefs=SiteChef::all();
    $html="";
    foreach($chefs as $chef ){
    $html.=<<<HTML
<div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/$chef->image" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>$chef->name</h4></a>
                                    <h5>$chef->position</h5>
                                    <p>$chef->description</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>$chef->name</h3>
                                    <h4>$chef->position</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
HTML;
}
return $html;
}
?>