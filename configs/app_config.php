<?php
  date_default_timezone_set("Asia/Dhaka");
  $now=date("Y-m-d H:i:s");  
  $base_url="http://mahdi.intels.co/projects/restaurant-25-02-23/";

  // $base_url="http://localhost/restaurant-14-01-2023";
  
  define("ROOT_DIR",$base_url); 
  $root_dir=ROOT_DIR;

  define("ASSET_DIR",$base_url."/assets");
  $asset_dir=ASSET_DIR;
  
  define("ERP_ROOT_DIR",$base_url."/admin");
  $erp_root_dir=ERP_ROOT_DIR;

  define("PRODUCT_IMG_DIR",$base_url."/admin/img");  
  $product_img_dir=PRODUCT_IMG_DIR;

  define("ALBUM_IMG_DIR",$base_url."/admin/img");  
  $album_img_dir=ALBUM_IMG_DIR;
?>