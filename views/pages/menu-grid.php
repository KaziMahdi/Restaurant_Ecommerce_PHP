<?php
include("views/layouts/home/header_library.php");
?>
<?php
include("views/layouts/common/site_menu.php");
?>
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Menu Grid</h4>
                    <a href="#">Home</a>
                    <a class="active" href="menu-list.html">Menu</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================End Our feature Area =================-->
        <section class="most_popular_item_area menu_list_page">
            <div class="container">
                <div class="popular_filter">
                    <ul>
                        <li class="active" data-filter="*"><a href="">All</a></li>
                        <li data-filter=".break"><a href="">Breakfast</a></li>
                        <li data-filter=".lunch"><a href="">Lunch</a></li>
                        <li data-filter=".dinner"><a href="">Dinner</a></li>
                        <li data-filter=".snacks"><a href="">Snacks</a></li>
                        <li data-filter=".coffe"><a href="">Coffee</a></li>
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row p_recype_item_active">
                        <?php
                        echo grid_menu();
                        ?>
                        <!-- <div class="col-md-4 col-sm-6 break snacks">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-1.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Lasagne Pasta</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$16</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 break coffee">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-2.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Barbecue Chicken</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$25</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 lunch snacks">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-3.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Hamburger</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$50</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 lunch dinner">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-4.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Meal</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$65</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 break snacks">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-5.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Soup Recipes</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$36</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 break coffee">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-6.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Sea Food</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$75</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 lunch snacks">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-7.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Green Tea</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$15</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 lunch dinner">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-8.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Breakfast Rool</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$17</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 lunch dinner">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <img src="img/menu-grid/Menu_Grid-9.jpg" alt="">
                                    <div class="icon_hover">
                                        <i class="fa fa-search"></i>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span>Hamburger</span></a></div>
                                    <div class="restaurant_feature_dots"></div>
                                    <div class="feature_right">$25</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our feature Area =================-->
        
        <!--================End Recent Blog Area =================-->
        <?php
        include("views/layouts/common/site_footer.php");
        ?>
        <?php
        include("views/layouts/home/footer_library.php");
        ?>