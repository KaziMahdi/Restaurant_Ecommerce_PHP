<?php
class Expenstion implements JsonSerializable{
	public $id;
	public $employee_id;
	public $booking_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$employee_id,$booking_id,$created_at,$updated_at){
		$this->id=$id;
		$this->employee_id=$employee_id;
		$this->booking_id=$booking_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}expenstions(employee_id,booking_id,created_at,updated_at)values('$this->employee_id','$this->booking_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}expenstions set employee_id='$this->employee_id',booking_id='$this->booking_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}expenstions where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,employee_id,booking_id,created_at,updated_at from {$tx}expenstions");
		$data=[];
		while($expenstion=$result->fetch_object()){
			$data[]=$expenstion;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,employee_id,booking_id,created_at,updated_at from {$tx}expenstions $criteria limit $top,$perpage");
		$data=[];
		while($expenstion=$result->fetch_object()){
			$data[]=$expenstion;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}expenstions $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,employee_id,booking_id,created_at,updated_at from {$tx}expenstions where id='$id'");
		$expenstion=$result->fetch_object();
			return $expenstion;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}expenstions");
		$expenstion =$result->fetch_object();
		return $expenstion->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Employee Id:$this->employee_id<br> 
		Booking Id:$this->booking_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbExpenstion"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}expenstions");
		while($expenstion=$result->fetch_object()){
			$html.="<option value ='$expenstion->id'>$expenstion->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}expenstions $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,employee_id,booking_id,created_at,updated_at from {$tx}expenstions $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-expenstion\">New Expenstion</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Employee Id</th><th>Booking Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Employee Id</th><th>Booking Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($expenstion=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-expenstion"]);
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-expenstion"]);
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"expenstions"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$expenstion->id</td><td>$expenstion->employee_id</td><td>$expenstion->booking_id</td><td>$expenstion->created_at</td><td>$expenstion->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,employee_id,booking_id,created_at,updated_at from {$tx}expenstions where id={$id}");
		$expenstion=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Expenstion Details</th></tr>";
		$html.="<tr><th>Id</th><td>$expenstion->id</td></tr>";
		$html.="<tr><th>Employee Id</th><td>$expenstion->employee_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$expenstion->booking_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$expenstion->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$expenstion->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
