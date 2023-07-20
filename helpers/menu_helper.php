<?php
function main_menus(){
    $menus=SiteMenu::all();
    $html="";
    $html.=<<<HTML
     <ul class="nav navbar-nav navbar-right">
HTML;
foreach($menus as $menu){
    if($menu->has_child==0){
    $html.=<<<HTML
    <li class=""><a href="$menu->link">$menu->name</a></li>
HTML;
}else{
$html.=<<<HTML
<li class="dropdown submenu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">$menu->name <i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu">
HTML; 
$submenus=SiteMenuSub::filter($menu->id);
foreach($submenus as $submenu){
    $html.=<<<HTML
    <li><a href="$submenu->link">$submenu->name</a></li>
HTML;    
}
$html.=<<<HTML
</li>
</ul>
HTML;
}
}
return $html;
}
?>