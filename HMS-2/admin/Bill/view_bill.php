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
<div class="container-fluid" id="vbill">
	<style>
	#vbill .form-group{
		display: none
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display{
		display: block;
	}
		#pheader { display: none }

	@media print{
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr{
			border-top:1px solid gray;
			border-bottom:1px solid gray;
		}
		.row {
		    display: flex;
		}
		.col-lg-5 {
		    width: 40%;
		    padding-right: 15px;
		}
		.col-lg-7 {
		    padding-left: 15px;
		    width: 55%;
		}
		.float-right {
		    float: right!important;
		}
		.text-right {
		    text-align: right!important;
		}
		.text-center {
		    text-align: center!important;
		}
		.container-fluid{
		    width: 100%;
		    
		}
		#pheader { display: block }
		p{ margin:unset; }
	}
</style>
	<form action="" id="manage-billing">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
		<div class="row form-group">
			<div class="col-md-6">
					<label for="" class="control-label">Member</label>
					<select name="member_id" id="" class="custom-select select2">
						<option value=""></option>
				<?php 
					$member = $con->query("SELECT * FROM member order by username asc");
					while($row= $member->fetch_assoc()):
				?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($member_id) && $row['id'] == $member_id ? 'selected' : '' ?> <?php echo isset($id) && $member_id != $row['id'] ? "disabled" :'' ?>><?php echo ucwords($row['username']) ?></option>
				<?php endwhile; ?>
					</select>
			</div>
			<div class="col-md-6">
					<label for="" class="control-label">Billing Date</label>
					<input type="month" value="<?php echo isset($billing_date) ? date('Y-m',strtotime($billing_date)) : date("Y-m") ?>" class="form-control" name="billing_date" <?php echo isset($id) ? "readonly" :'' ?> >
			</div>
		</div>
			<div id="pheader">
				<p class="text-center"><b>Member Bill</b></p>
				<hr>
			</div>
			<div class="col-lg-12">
				<p><b>Member: <?php echo ucwords($username) ?></b></p>
				<p><b>Billing Month: <?php echo isset($billing_date) ? date('M, Y',strtotime($billing_date)) : date("M, Y") ?></b></p>
			</div>
		<hr>
		<div class="row" id="prev_details">
			
		</div>
		
	</form>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-secondary float-right" type="button" data-dismiss="modal">Close</button>
			<button class="btn btn-success float-right mr-3" type="button" id="print" onclick="printBill()"><i class="fa fa-print"></i> Print</button>
			<?php if($status == 0): ?>
			<button class="btn btn-primary float-right mr-3" type="button" id="pay"><i class="fa fa-money-bill-wave"></i> Pay</button>
			<?php else: ?>
			<span class="badge badge-success float-right mr-3">Paid</span>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	$(".select2").select2({
		placeholder:"Please select here",
		width:'100%'
	})
	$("[name='member_id'],[name='billing_date']").change(function(){
		if($("[name='member_id']").val() == '' || $("[name='billing_date']").val() == '')
			return false;
		get_det()
	})
	function get_det(){
		start_load()
			$.ajax({
			url:'get_prev_details.php',
			method:"POST",
			data:{id:$("[name='member_id']").val(),date:$("[name='billing_date']").val(),bid:'<?php echo isset($id) ? $id : '' ?>'},
			success:function(resp){
				if(resp){
					$('#prev_details').html(resp)
					end_load()
				}
			}
		})
	}
	$('#manage-billing').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_billing',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				resp=JSON.parse(resp)
				if(resp.status==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				
			}
		})
	})
	$('#pay').click(function(){
		$(this).hide()
		$('.payment').show()
	})
	function printBill(){
		var nw = window.open("","_blank",'width=800,height=600')
		var data = $('#vbill').clone()
		var div = $('<div><div id="vbill" class="container-fluid"></div></div>')
		div.find('#vbill').html(data)
		nw.document.write(div.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
		},700)
	}
	$(document).ready(function(){
		if('<?php echo isset($id) ?>' == 1)
			get_det()


		
	})
</script>