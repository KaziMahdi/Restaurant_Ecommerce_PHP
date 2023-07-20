<?php

function get_album($site_album_id){
    global $product_img_dir;
    $sliders=SiteAlbumDetail::filter($site_album_id);
    $html="";
  
    $html.=<<<HTML
    <div id="carousel-$site_album_id" class="carousel slide v-animation" data-ride="carousel" data-animation="fade-from-left" data-delay="250" style="margin: 20px 0">                   
        <div class="carousel-inner" role="listbox">
    HTML;

    $i=1;
    foreach($sliders as $slider){
        if($i==1){
            $class="item active";
        }else{
            $class="item";
        }
        $i++;
        $html.=<<<HTML
            <div class="$class">
                <img src="$product_img_dir/$slider->photo" alt="$slider->name" title="$slider->description">
            </div>                    
        HTML;
    }

    $html.=<<<HTML
        </div>                  
            <a href="#carousel-$site_album_id" class="left carousel-control" data-slide="prev">
                <span class="icon-prev fa-stack fa-lg">
                    <i class="fa fa-angle-left fa-stack-1x"></i>
                </span>
            </a>
            <a href="#carousel-$site_album_id" class="right carousel-control" data-slide="next">
                <span class="icon-next fa-stack fa-lg">
                    <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
            </a>                    
    </div> 
    HTML;
    //debug($html);
    return $html;
}

function get_screenshots(){
    global $product_img_dir;
    $screenshorts=SiteAlbumDetail::all();
    $html="";

    foreach($screenshorts as $screenshort){
        $html.=<<<HTML
            <div class="item">
                <figure class="lightbox animated-overlay overlay-alt clearfix">
                    <img src="$product_img_dir/$screenshort->photo" class="attachment-full">
                    <a class="view" href="$product_img_dir/$screenshort->photo"
                        rel="image-gallery"></a>
                    <figcaption>
                        <div class="thumb-info">
                            <h4>Click to preview.</h4>
                            <i class="fa fa-eye"></i>
                        </div>
                    </figcaption>
                </figure>
            </div>
        HTML;
    }
return $html;
}


?>