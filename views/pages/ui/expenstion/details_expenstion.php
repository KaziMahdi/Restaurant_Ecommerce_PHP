<?php
if(isset($_POST["btnDetails"])){
	$expenstion=Expenstion::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstions">Manage Expenstion</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Expenstion Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$expenstion->id</td></tr>";
		$html.="<tr><th>Employee Id</th><td>$expenstion->employee_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$expenstion->booking_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$expenstion->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$expenstion->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
