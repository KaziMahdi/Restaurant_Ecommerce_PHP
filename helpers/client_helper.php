<?php
function get_clients(){
    $clients=SiteClient::all();
    $html="";

    foreach($clients as $client){
        global $product_img_dir;
        $html.=<<<HTML
            <div class="owl-item">
                <img src="$product_img_dir/$client->photo" alt="$client->name" />
            </div>
        HTML;

    }

    return $html;
    
}

?>