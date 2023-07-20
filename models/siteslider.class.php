<?php
class SiteSlider implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $photo;
	public $sub_name;
	public $table_name;

	public function __construct(){
	}
	public function set($id,$name,$description,$photo,$sub_name,$table_name){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->photo=$photo;
		$this->sub_name=$sub_name;
		$this->table_name=$table_name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_slider(name,description,photo,sub_name,table_name)values('$this->name','$this->description','$this->photo','$this->sub_name','$this->table_name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_slider set name='$this->name',description='$this->description',photo='$this->photo',sub_name='$this->sub_name',table_name='$this->table_name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_slider where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,photo,sub_name,table_name from {$tx}site_slider");
		$data=[];
		while($siteslider=$result->fetch_object()){
			$data[]=$siteslider;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,photo,sub_name,table_name from {$tx}site_slider $criteria limit $top,$perpage");
		$data=[];
		while($siteslider=$result->fetch_object()){
			$data[]=$siteslider;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_slider $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,photo,sub_name,table_name from {$tx}site_slider where id='$id'");
		$siteslider=$result->fetch_object();
			return $siteslider;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_slider");
		$siteslider =$result->fetch_object();
		return $siteslider->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Sub Name:$this->sub_name<br> 
		Table Name:$this->table_name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteSlider"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_slider");
		while($siteslider=$result->fetch_object()){
			$html.="<option value ='$siteslider->id'>$siteslider->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_slider $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,photo,sub_name,table_name from {$tx}site_slider $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteslider\">New SiteSlider</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Photo</th><th>Sub Name</th><th>Table Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Photo</th><th>Sub Name</th><th>Table Name</th></tr>";
		}
		while($siteslider=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteslider->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteslider"]);
				$action_buttons.= action_button(["id"=>$siteslider->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteslider"]);
				$action_buttons.= action_button(["id"=>$siteslider->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_slider"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteslider->id</td><td>$siteslider->name</td><td>$siteslider->description</td><td><img src=\"img/$siteslider->photo\" width=\"100\" /></td><td>$siteslider->sub_name</td><td>$siteslider->table_name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,photo,sub_name,table_name from {$tx}site_slider where id={$id}");
		$siteslider=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteSlider Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteslider->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteslider->name</td></tr>";
		$html.="<tr><th>Description</th><td>$siteslider->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$siteslider->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Sub Name</th><td>$siteslider->sub_name</td></tr>";
		$html.="<tr><th>Table Name</th><td>$siteslider->table_name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
