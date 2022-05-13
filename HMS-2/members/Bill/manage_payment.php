<?php 
  require_once("../../Includes/config.php"); 
  require_once("../../Includes/session.php"); 
  if ($logged==false) {
       header("Location:../../login.php");
  }
if(isset($_GET['id'])){
$qry = $con->query("SELECT b.*,m.username from billing b inner join member m on m.id = b.member_id  where b.id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<div class="containe-fluid">
    <form action="" id="maage-payment">
    <input type="hidden" name="id" value='<?php echo $id ?>'>
        <div class="form-group">
            <label for="">Amount Due</label>
            <input type="number" id="amount_due" class="form-control text-right" step="any" disabled value="<?php echo $total_amount ?>">
        </div>
        <div class="form-group">
            <label for="">Amount Payed</label>
            <input type="number" id="amount_payed" class="form-control text-right" step="any" value="0">
        </div>
    </form>
</div>