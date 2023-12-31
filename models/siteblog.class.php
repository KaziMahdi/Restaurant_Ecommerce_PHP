<?php
class SiteBlog implements JsonSerializable{
	public $id;
	public $name;
	public $heading;
	public $description;
	public $date;
	public $comment;
	public $image;

	public function __construct(){
	}
	public function set($id,$name,$heading,$description,$date,$comment,$image){
		$this->id=$id;
		$this->name=$name;
		$this->heading=$heading;
		$this->description=$description;
		$this->date=$date;
		$this->comment=$comment;
		$this->image=$image;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_blogs(name,heading,description,date,comment,image)values('$this->name','$this->heading','$this->description','$this->date','$this->comment','$this->image')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_blogs set name='$this->name',heading='$this->heading',description='$this->description',date='$this->date',comment='$this->comment',image='$this->image' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_blogs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,heading,description,date,comment,image from {$tx}site_blogs");
		$data=[];
		while($siteblog=$result->fetch_object()){
			$data[]=$siteblog;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,heading,description,date,comment,image from {$tx}site_blogs $criteria limit $top,$perpage");
		$data=[];
		while($siteblog=$result->fetch_object()){
			$data[]=$siteblog;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_blogs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,heading,description,date,comment,image from {$tx}site_blogs where id='$id'");
		$siteblog=$result->fetch_object();
			return $siteblog;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_blogs");
		$siteblog =$result->fetch_object();
		return $siteblog->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Heading:$this->heading<br> 
		Description:$this->description<br> 
		Date:$this->date<br> 
		Comment:$this->comment<br> 
		Image:$this->image<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteBlog"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_blogs");
		while($siteblog=$result->fetch_object()){
			$html.="<option value ='$siteblog->id'>$siteblog->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_blogs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,heading,description,date,comment,image from {$tx}site_blogs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteblog\">New SiteBlog</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Heading</th><th>Description</th><th>Date</th><th>Comment</th><th>Image</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Heading</th><th>Description</th><th>Date</th><th>Comment</th><th>Image</th></tr>";
		}
		while($siteblog=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteblog->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteblog"]);
				$action_buttons.= action_button(["id"=>$siteblog->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteblog"]);
				$action_buttons.= action_button(["id"=>$siteblog->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_blogs"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteblog->id</td><td>$siteblog->name</td><td>$siteblog->heading</td><td>$siteblog->description</td><td>$siteblog->date</td><td>$siteblog->comment</td><td>$siteblog->image</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,heading,description,date,comment,image from {$tx}site_blogs where id={$id}");
		$siteblog=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteBlog Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteblog->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteblog->name</td></tr>";
		$html.="<tr><th>Heading</th><td>$siteblog->heading</td></tr>";
		$html.="<tr><th>Description</th><td>$siteblog->description</td></tr>";
		$html.="<tr><th>Date</th><td>$siteblog->date</td></tr>";
		$html.="<tr><th>Comment</th><td>$siteblog->comment</td></tr>";
		$html.="<tr><th>Image</th><td>$siteblog->image</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
