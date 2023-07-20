<?php
function main_blogs(){
    $blogs=SiteBlog::all();
    $html="";
    foreach($blogs as $blog){
        $html.=<<<HTML
         <div class="col-md-4">
                        <div class="recent_blog_item">
                            <div class="blog_img">
                                <img src="img/blog/recent-blog/$blog->image" alt="">
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_inner">
                                    <h6><a href="#">$blog->name</a></h6>
                                    <a href="blog-details.html"><h5>$blog->heading</h5></a>
                                    <p>$blog->description</p>
                                    <a href="#">$blog->date <span>/</span></a>
                                    <a href="#">$blog->comment</a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;
    }
    return $html;
}
?>