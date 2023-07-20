<?php
class SiteChef implements JsonSerializable{
	public $id;
	public $name;
	public $position;
	public $description;
	public $image;

	public function __construct(){
	}
	public function set($id,$name,$position,$description,$image){
		$this->id=$id;
		$this->name=$name;
		$this->position=$position;
		$this->description=$description;
		$this->image=$image;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_chefs(name,position,description,image)values('$this->name','$this->position','$this->description','$this->image')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_chefs set name='$this->name',position='$this->position',description='$this->description',image='$this->image' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_chefs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,position,description,image from {$tx}site_chefs");
		$data=[];
		while($sitechef=$result->fetch_object()){
			$data[]=$sitechef;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,position,description,image from {$tx}site_chefs $criteria limit $top,$perpage");
		$data=[];
		while($sitechef=$result->fetch_object()){
			$data[]=$sitechef;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_chefs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,position,description,image from {$tx}site_chefs where id='$id'");
		$sitechef=$result->fetch_object();
			return $sitechef;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_chefs");
		$sitechef =$result->fetch_object();
		return $sitechef->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Position:$this->position<br> 
		Description:$this->description<br> 
		Image:$this->image<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteChef"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_chefs");
		while($sitechef=$result->fetch_object()){
			$html.="<option value ='$sitechef->id'>$sitechef->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_chefs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,position,description,image from {$tx}site_chefs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitechef\">New SiteChef</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Position</th><th>Description</th><th>Image</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Position</th><th>Description</th><th>Image</th></tr>";
		}
		while($sitechef=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitechef->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitechef"]);
				$action_buttons.= action_button(["id"=>$sitechef->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitechef"]);
				$action_buttons.= action_button(["id"=>$sitechef->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_chefs"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitechef->id</td><td>$sitechef->name</td><td>$sitechef->position</td><td>$sitechef->description</td><td>$sitechef->image</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,position,description,image from {$tx}site_chefs where id={$id}");
		$sitechef=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteChef Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitechef->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitechef->name</td></tr>";
		$html.="<tr><th>Position</th><td>$sitechef->position</td></tr>";
		$html.="<tr><th>Description</th><td>$sitechef->description</td></tr>";
		$html.="<tr><th>Image</th><td>$sitechef->image</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
