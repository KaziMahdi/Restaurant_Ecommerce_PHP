<style>
    .header__cart-btn {
        background-color: transparent;
        border-radius: 50%;
        padding: 0.5;
        font-size: 0.8rem;

    }

    .header__cart-btn:hover {
        background: #A52A2A;

    }

    .minicart {
        padding: 5px;
        color: #333;
    }

    .mini-1 {
        padding: 20px;
        min-width: 280px;
        background: #ffffff;
        text-align: left;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #e5e5e5;
        /* padding: 10px 0; */
        overflow: hidden;
        box-sizing: border-box;

    }

    li .mini-1 a {
        color: black;
    }

    p.minicart-total {
        border: none;
        color: #555555;
        font-size: 14px;
        line-height: 30px;
        margin: 0 0 15px;
        padding: 0 10px;
        text-transform: uppercase;
        width: 100%;
        font-weight: bold;
        margin-top: 10px;
    }

    .price {
        float: right;
    }

    .minicart-button {
        display: block;
        margin-bottom: 10px;
        padding: 0.3em;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        background-color: transparent;
        color: #333;
        background-color: #555555;
        padding-right: 5px;


    }

    .minicart-button:hover {
        background: #fed700;
    }

    .minicart-button a span:hover {
        color: #333;
    }

    .minicart-button a span {
        color: #ffffff;

    }

    .minicart-product-image {
        display: inline-block;
        border: 1px solid #e5e5e5;
        position: relative;
        width: 50px;
        -webkit-box-flex: 0;
        flex: 0 0 50px;
        margin-right: 10px;
        height: 58px;
    }

    .minicart>ul>li>a>img {
        width: 100%;
    }

    .shopping {
        display: flex;
        justify-content: left;
        align-items: center;

    }
</style>


<div class="first_header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="header_contact_details">
                    <a href="#"><i class="fa fa-phone"></i>(+880)-01518389862</a>
                    <a href="#"><i class="fa fa-envelope-o"></i>(+880)-01880203494</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="event_btn_inner">
                    <a class="event_btn" href="table"><i class="fa fa-table" aria-hidden="true"></i>Book a Table</a>
                    <a class="event_btn" href="event"><i class="fa fa-calendar" aria-hidden="true"></i>Book an Event</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="header_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        
                        
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<header class="main_menu_area">
    <nav class="navbar navbar-default">

        <div class="container">
            <div class="shopping">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo-2.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    echo main_menus();
                    ?>

                    <!-- <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About US <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="about-us2.html">About Us2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="menu-grid.html">Menu Grid</a></li>
                                    <li><a href="menu-list.html">Menu List</a></li>
                                </ul>
                            </li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="event.html">Event</a></li>
                                    <li><a href="table.html">Table</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-gallery.html">Blog Gallery</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact US</a></li>
                            
                            </li>
                            </ul> -->

                </div><!-- /.navbar-collapse -->
                <div>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button class="header__cart-btn" id="toggle-cart-btn"><svg class="cart" width="25" height="25" fill="#fff" viewBox="0 0 24 24">
                                    <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path>
                                </svg></button></a>
                        <ul class="dropdown-menu">
                            <div class="minicart">
                                <?php
                                include("views/layouts/common/minicart.php");
                                ?>
                            </div>
                    </li>
                    
                </div>
                <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-user-plus" aria-hidden="true"></i><span style="padding-left:5px;"><?php echo isset($_SESSION["s_name"])? $_SESSION["s_name"]:""?></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="#">My Acount</a></li>
                            <li><a href="checkout">Checkout</a></li>
                            
                            <?php
                            if(isset($_SESSION["s_id"])){
                                ?>
                                <li><a href="logout">Sing Out </li>
                                <?php
                                }else{
                                    ?> 
                                    <li><a href="login">Sing in </a></li>
                                    <?php
                                }
                                ?>   
                        </ul>
                    </div>
                    

            </div>
        </div><!-- /.container-fluid -->
    </nav>
</header>