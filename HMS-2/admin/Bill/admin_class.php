<?php 
  require_once("../../Includes/config.php"); 
  require_once("../../Includes/session.php"); 
  if ($logged==false) {
       header("Location:../../login.php");
  }
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../../Includes/config.php';
    
    $this->db = $con;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}


	function save_billing(){
		extract($_POST);
		$data = " member_id = $member_id ";
		$billing_date = $billing_date.'-01';
		$data .= ", billing_date = '$billing_date' ";
		$data .= ", total_amount = '$o_amount' ";
		

		if(empty($id)){
			$save = $this->db->query("INSERT INTO billing set ".$data);
			
			if($save){
				$id = $this->db->insert_id;
				foreach($amount as $k => $v){
					$data=" billing_id = $id ";
					$data.=", type = '$k' ";
					$data.=", amount = '$v' ";
					$data.=", rate = '$rate[$k]' ";
					if(isset($consumption[$k]))
					$data.=", consumption = '$consumption[$k]' ";
					if(isset($reading[$k]))
					$data.=", reading = '$reading[$k]' ";
					if(isset($previous_amount[$k]))
					$data.=", previous_amount = '$previous_amount[$k]' ";
					if(isset($previous_consumption[$k]))
					$data.=", previous_consumption = '$previous_consumption[$k]' ";
					if(isset($previous_reading[$k]))
					$data.=", previous_reading = '$previous_reading[$k]' ";
					$ins[] = $this->db->query("INSERT INTO bills set ".$data);
				}
				return json_encode(array("status"=>1,"id"=>$id));
			}
		}else{
			$save = $this->db->query("UPDATE billing set ".$data." where id=".$id);
			if($save){
				foreach($amount as $k => $v){
					$data =" amount = '$v' ";
					$data.=", rate = '$rate[$k]' ";
					if(isset($consumption[$k]))
					$data.=", consumption = '$consumption[$k]' ";
					if(isset($reading[$k]))
					$data.=", reading = '$reading[$k]' ";
					if(isset($previous_amount[$k]))
					$data.=", previous_amount = '$previous_amount[$k]' ";
					if(isset($previous_consumption[$k]))
					$data.=", previous_consumption = '$previous_consumption[$k]' ";
					if(isset($previous_reading[$k]))
					$data.=", previous_reading = '$previous_reading[$k]' ";
					$ins[] = $this->db->query("UPDATE bills set ".$data." where type='$k' and billing_id = '$id' ");
				}
				return json_encode(array("status"=>1,"id"=>$id));
			}
		}
	}
	function delete_billing(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM billing where id = ".$id);
		$delete2 = $this->db->query("DELETE FROM bills where billing_id = ".$id);
		if($delete && $delete2){
				return 1;
			}
	}
	function save_payment(){
		extract($_POST);
		$data = " amount_payed = '$amount_payed' ";
		$data .= ", amount_change = '$amount_change' ";
		$data .= ", status = 1 ";
		$save = $this->db->query("UPDATE billing set $data where id = $id ");
		if($save)
		return 1;
	}
}