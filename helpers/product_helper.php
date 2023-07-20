<?php
function get_products(){
    global $product_img_dir;
    $products=SiteProduct::filter_by_category(1);
    $html="";
    foreach($products as $product){     
        $html.=<<<HTML
        <div class="col-md-4 col-sm-4 ">
                    <div class="service-feature-box" title="ERP - POS">
                        <div class="service-media">
                            <img src="$product_img_dir/$product->photo" alt="ERP - POS" />
                            <a href="./ERP-POS.html" class="read-more02">
                                <span> Read more <i class="fa fa-chevron-right"></i></span>
                            </a>
                        </div><!-- .service-media end -->

                        <div class="service-body">
                            <div class="custom-heading">
                                <h4> $product->name </h4>
                            </div><!-- .custom-heading end -->
                            <p>$product->description</p>
                        </div><!-- .service-body end -->
                    </div><!-- .service-feature-box-end -->
                </div><!-- .col-md-4 end -->
        HTML;
    }
 return $html;
}


function get_more_products(){
    $products=SiteProduct::filter_by_category(2);
    $html="";
    foreach($products as $product){
        $html.=<<<HTML
        <div class="col-lg-4 col-md-6 col-sm-6">
                      $product->photo
                    <h3>$product->name</h3>
                    <p>$product->description</p>                    
                </div><!-- .col-md-6 end -->
        HTML;
    }

    return $html;
}

?>