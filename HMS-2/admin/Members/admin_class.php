<?php
require_once("../../Includes/config.php"); 
require_once("../../Includes/session.php"); 
if ($logged==false) {
	 header("Location:../../login.php");
}
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include ("../../Includes/config.php"); 
    
    $this->db = $con;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	

	function save_user(){
		extract($_POST);
		$data = " email = '$email' ";
		$data .= ", username = '$username' ";
		if(!empty($password))
		$data .= ", password = '($password)' ";
		$chk = $this->db->query("Select * from member where username = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO member set ".$data);
		}else{
			$save = $this->db->query("UPDATE member set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM member where id = ".$id);
		if($delete)
			return 1;
	}									
}