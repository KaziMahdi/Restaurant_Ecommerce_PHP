<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbEmployeeId"])){
		$errors["employee_id"]="Invalid employee_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbBookingId"])){
		$errors["booking_id"]="Invalid booking_id";
	}

*/
	if(count($errors)==0){
		$expenstion=new Expenstion();
		$expenstion->employee_id=$_POST["cmbEmployeeId"];
		$expenstion->booking_id=$_POST["cmbBookingId"];
		$expenstion->created_at=$now;
		$expenstion->updated_at=$now;

		$expenstion->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstions">Manage Expenstion</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-expenstion' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Employee","name"=>"cmbEmployeeId","table"=>"employees"]);
	$html.=select_field(["label"=>"Booking","name"=>"cmbBookingId","table"=>"bookings"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
