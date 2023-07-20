<?php
class SiteTopMenu implements JsonSerializable{
	public $id;
	public $name;
	public $price;
	public $image;

	public function __construct(){
	}
	public function set($id,$name,$price,$image){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;
		$this->image=$image;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_top_menus(name,price,image)values('$this->name','$this->price','$this->image')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_top_menus set name='$this->name',price='$this->price',image='$this->image' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_top_menus where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,price,image from {$tx}site_top_menus");
		$data=[];
		while($sitetopmenu=$result->fetch_object()){
			$data[]=$sitetopmenu;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,price,image from {$tx}site_top_menus $criteria limit $top,$perpage");
		$data=[];
		while($sitetopmenu=$result->fetch_object()){
			$data[]=$sitetopmenu;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_top_menus $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,price,image from {$tx}site_top_menus where id='$id'");
		$sitetopmenu=$result->fetch_object();
			return $sitetopmenu;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_top_menus");
		$sitetopmenu =$result->fetch_object();
		return $sitetopmenu->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Price:$this->price<br> 
		Image:$this->image<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteTopMenu"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_top_menus");
		while($sitetopmenu=$result->fetch_object()){
			$html.="<option value ='$sitetopmenu->id'>$sitetopmenu->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_top_menus $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,price,image from {$tx}site_top_menus $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitetopmenu\">New SiteTopMenu</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Image</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Image</th></tr>";
		}
		while($sitetopmenu=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitetopmenu->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitetopmenu"]);
				$action_buttons.= action_button(["id"=>$sitetopmenu->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitetopmenu"]);
				$action_buttons.= action_button(["id"=>$sitetopmenu->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_top_menus"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitetopmenu->id</td><td>$sitetopmenu->name</td><td>$sitetopmenu->price</td><td>$sitetopmenu->image</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,price,image from {$tx}site_top_menus where id={$id}");
		$sitetopmenu=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteTopMenu Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitetopmenu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitetopmenu->name</td></tr>";
		$html.="<tr><th>Price</th><td>$sitetopmenu->price</td></tr>";
		$html.="<tr><th>Image</th><td>$sitetopmenu->image</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
