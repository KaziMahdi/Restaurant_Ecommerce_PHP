<?php
	echo main_sidebar_dropdown([
		"name"=>"Expenstion",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-expenstion","text"=>"Create Expenstion","icon"=>"far fa-circle nav-icon"],
			["route"=>"expenstions","text"=>"Manage Expenstion","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
