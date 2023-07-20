<?php
class SiteSliderDetail implements JsonSerializable{
	public $id;
	public $site_album_id;
	public $photo;
	public $name;
	public $description;
	public $inactive;
	public $sub_name;
	public $table_name;

	public function __construct(){
	}
	public function set($id,$site_album_id,$photo,$name,$description,$inactive,$sub_name,$table_name){
		$this->id=$id;
		$this->site_album_id=$site_album_id;
		$this->photo=$photo;
		$this->name=$name;
		$this->description=$description;
		$this->inactive=$inactive;
		$this->sub_name=$sub_name;
		$this->table_name=$table_name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_slider_details(site_album_id,photo,name,description,inactive,sub_name,table_name)values('$this->site_album_id','$this->photo','$this->name','$this->description','$this->inactive','$this->sub_name','$this->table_name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_slider_details set site_album_id='$this->site_album_id',photo='$this->photo',name='$this->name',description='$this->description',inactive='$this->inactive',sub_name='$this->sub_name',table_name='$this->table_name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_slider_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details");
		$data=[];
		while($sitesliderdetail=$result->fetch_object()){
			$data[]=$sitesliderdetail;
		}
			return $data;
	}
	public static function filter(){
		global $db,$tx;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details");
		$data=[];
		while($sitesliderdetail=$result->fetch_object()){
			$data[]=$sitesliderdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details $criteria limit $top,$perpage");
		$data=[];
		while($sitesliderdetail=$result->fetch_object()){
			$data[]=$sitesliderdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_slider_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details where id='$id'");
		$sitesliderdetail=$result->fetch_object();
			return $sitesliderdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_slider_details");
		$sitesliderdetail =$result->fetch_object();
		return $sitesliderdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Site Album Id:$this->site_album_id<br> 
		Photo:$this->photo<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Inactive:$this->inactive<br> 
		Sub Name:$this->sub_name<br> 
		Table Name:$this->table_name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteSliderDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_slider_details");
		while($sitesliderdetail=$result->fetch_object()){
			$html.="<option value ='$sitesliderdetail->id'>$sitesliderdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_slider_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitesliderdetail\">New SiteSliderDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Site Album Id</th><th>Photo</th><th>Name</th><th>Description</th><th>Inactive</th><th>Sub Name</th><th>Table Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Site Album Id</th><th>Photo</th><th>Name</th><th>Description</th><th>Inactive</th><th>Sub Name</th><th>Table Name</th></tr>";
		}
		while($sitesliderdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitesliderdetail->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitesliderdetail"]);
				$action_buttons.= action_button(["id"=>$sitesliderdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitesliderdetail"]);
				$action_buttons.= action_button(["id"=>$sitesliderdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_slider_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitesliderdetail->id</td><td>$sitesliderdetail->site_album_id</td><td><img src=\"img/$sitesliderdetail->photo\" width=\"100\" /></td><td>$sitesliderdetail->name</td><td>$sitesliderdetail->description</td><td>$sitesliderdetail->inactive</td><td>$sitesliderdetail->sub_name</td><td>$sitesliderdetail->table_name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,site_album_id,photo,name,description,inactive,sub_name,table_name from {$tx}site_slider_details where id={$id}");
		$sitesliderdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteSliderDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitesliderdetail->id</td></tr>";
		$html.="<tr><th>Site Album Id</th><td>$sitesliderdetail->site_album_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitesliderdetail->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Name</th><td>$sitesliderdetail->name</td></tr>";
		$html.="<tr><th>Description</th><td>$sitesliderdetail->description</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitesliderdetail->inactive</td></tr>";
		$html.="<tr><th>Sub Name</th><td>$sitesliderdetail->sub_name</td></tr>";
		$html.="<tr><th>Table Name</th><td>$sitesliderdetail->table_name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
