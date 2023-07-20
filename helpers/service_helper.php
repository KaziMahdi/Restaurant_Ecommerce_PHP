<?php
function menu_services(){
    $services=SiteDescription::all();
    $html="";
   
foreach($services as $service){
    $html.=<<<HTML
    <div class="col-md-3 col-sm-6">
                        <div class="service_item">
                            <img src="img/service-icon/$service->image" alt="$service->name">
                            <h3>$service->name</h3>
                            <p>$service->description</p>
                            <a class="read_mor_btn" href="#">$service->sub_name</a>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="service_item">
                            <img src="img/service-icon/service-2.png" alt="">
                            <h3>Coffee</h3>
                            <p>Lorem ipsum dolor sit amet, cont tempor incididunt ut labore dolor adipiscing elit, sed do eiusmod et  magna aliquaquat officia.</p>
                            <a class="read_mor_btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="service_item">
                            <img src="img/service-icon/service-3.png" alt="">
                            <h3>Burgers</h3>
                            <p>Lorem ipsum dolor sit amet, cont tempor incididunt ut labore dolor adipiscing elit, sed do eiusmod et  magna aliquaquat officia.</p>
                            <a class="read_mor_btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="service_item">
                            <img src="img/service-icon/service-4.png" alt="">
                            <h3>Drinks</h3>
                            <p>Lorem ipsum dolor sit amet, cont tempor incididunt ut labore dolor adipiscing elit, sed do eiusmod et  magna aliquaquat officia.</p>
                            <a class="read_mor_btn" href="#">Read More</a>
                        </div>
                    </div> -->
HTML;
}
return $html;
}
?>