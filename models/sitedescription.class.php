<?php
class SiteDescription implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $image;
	public $sub_name;

	public function __construct(){
	}
	public function set($id,$name,$description,$image,$sub_name){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->image=$image;
		$this->sub_name=$sub_name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_descriptions(name,description,image,sub_name)values('$this->name','$this->description','$this->image','$this->sub_name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_descriptions set name='$this->name',description='$this->description',image='$this->image',sub_name='$this->sub_name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_descriptions where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,image,sub_name from {$tx}site_descriptions");
		$data=[];
		while($sitedescription=$result->fetch_object()){
			$data[]=$sitedescription;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,image,sub_name from {$tx}site_descriptions $criteria limit $top,$perpage");
		$data=[];
		while($sitedescription=$result->fetch_object()){
			$data[]=$sitedescription;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_descriptions $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,image,sub_name from {$tx}site_descriptions where id='$id'");
		$sitedescription=$result->fetch_object();
			return $sitedescription;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_descriptions");
		$sitedescription =$result->fetch_object();
		return $sitedescription->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Image:$this->image<br> 
		Sub Name:$this->sub_name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteDescription"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_descriptions");
		while($sitedescription=$result->fetch_object()){
			$html.="<option value ='$sitedescription->id'>$sitedescription->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_descriptions $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,image,sub_name from {$tx}site_descriptions $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitedescription\">New SiteDescription</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Image</th><th>Sub Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Image</th><th>Sub Name</th></tr>";
		}
		while($sitedescription=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitedescription->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitedescription"]);
				$action_buttons.= action_button(["id"=>$sitedescription->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitedescription"]);
				$action_buttons.= action_button(["id"=>$sitedescription->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_descriptions"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitedescription->id</td><td>$sitedescription->name</td><td>$sitedescription->description</td><td>$sitedescription->image</td><td>$sitedescription->sub_name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,image,sub_name from {$tx}site_descriptions where id={$id}");
		$sitedescription=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteDescription Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitedescription->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitedescription->name</td></tr>";
		$html.="<tr><th>Description</th><td>$sitedescription->description</td></tr>";
		$html.="<tr><th>Image</th><td>$sitedescription->image</td></tr>";
		$html.="<tr><th>Sub Name</th><td>$sitedescription->sub_name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
