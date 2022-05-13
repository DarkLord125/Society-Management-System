<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "save_billing"){
	$save = $crud->save_billing();
	if($save)
		echo $save;
}
if($action == "delete_billing"){
	$save = $crud->delete_billing();
	if($save)
		echo $save;
}
if($action == "save_payment"){
	$save = $crud->save_payment();
	if($save)
		echo $save;
}