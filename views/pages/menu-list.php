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
                    <h4>Menu List</h4>
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
                        <li data-filter=".coffee"><a href="">Coffee</a></li>
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row p_recype_item_active">
                    <?php
                        echo erp_menus();
                        ?>
                        <!-- <div class="col-md-6 break snacks">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 break coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 lunch snacks">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 lunch dinner">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 break coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-5.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 break coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-6.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 lunch coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-7.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner snacks">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-8.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 lunch coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-7.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner snacks">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-8.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-9.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-10.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-9.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
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
                        <div class="col-md-6 dinner coffee">
                            <div class="media">
                                <div class="media-left">
                                    <img src="img/recype/recype-10.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>Vegetable Flavour</h3></a>
                                    <h4>$32</h4>
                                    <p>Lorem ipsum dolor sit amets, consectetur adipiscing </p>
                                    <a class="read_mor_btn" href="#">Add To Cart</a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                    </ul>
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