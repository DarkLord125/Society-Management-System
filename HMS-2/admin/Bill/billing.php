<?php 
  require_once("../../Includes/config.php"); 
?>
<body>

<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Billing List</b>
						<span class="">

							<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_billing">
					<i class="fa fa-plus"></i> New</button>
				</span>
					</div>
					<div class="card-body">
						<div class="row form-group">
							<div class="col-md-4 offset-md-3">
								<label for="" class="control-label">Month</label>
								<input type="month" class="form-control" name="month"  value="<?php echo isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) :date('Y-m'); ?>" required>
							</div>
							<div class="col-md-2">
								<label for="" class="control-label">&nbsp</label>
								<button class="btn btn-primary btn-block" id="filter" type="button">Filter</button>								
							</div>
						</div>
						<hr>
						<table class="table table-bordered table-condensed table-hover">
							<!-- <colgroup>
								<col width="2%">
								<col width="10%">
								<col width="10%">
								<col width="15%">
								<col width="20%">
								<col width="15%">
								<col width="10%">
							</colgroup> -->
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Date</th>
									<th class="">Members</th>
									<th class="">Total Amount</th>
									<th class="">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
								$billing = $con->query("SELECT b.*,m.username from billing b inner join member m on m.id = b.member_id where date_format(b.billing_date,'%Y-%m') = '$month' order by b.id asc");
									while($row=$billing->fetch_assoc()):
									$chk =  $con->query("SELECT b.*,m.username from billing b inner join member m on m.id = b.member_id where date(b.billing_date) > '".$month."-01' and b.id != '".$row['id']."' and b.member_id = '".$row['member_id']."' order by date(b.billing_date) asc")->num_rows;
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
									</td>
									<td class="">
										 <p> Member Name: <b><?php echo ucwords($row['username']) ?></b></p>
										
									</td>
									<td class="">
										 <p class="text-right"> <b><?php echo number_format($row['total_amount'],2) ?></b></p>
									</td>
									<td class="">
										<?php if($row['status'] == 1): ?>
										 <span class="badge badge-success">Paid</span>
										<?php else: ?>
										 <span class="badge badge-secondary">Unpaid</span>
										<?php endif; ?>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary view_billing" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
										<?php if($chk <= 0): ?> 
											<button class="btn btn-sm btn-outline-primary edit_billing" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_billing" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										<?php endif; ?>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: 150px;
	}
</style>
</body>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_billing').click(function(){
		uni_modal("New Member's Billing","manage_billing.php","large")
	})
	
	$('.edit_billing').click(function(){
		uni_modal("Edit Member's Billing","manage_billing.php?id="+$(this).attr('data-id'),"large")
		
	})
	$('.view_billing').click(function(){
		uni_modal("Member's Billing","view_bill.php?id="+$(this).attr('data-id'),"large")
		
	})
	$('.delete_billing').click(function(){
		_conf("Are you sure to delete this Member's Bill?","delete_billing",[$(this).attr('data-id')])
	})
	$('#check_all').click(function(){
		if($(this).prop('checked') == true)
			$('[name="checked[]"]').prop('checked',true)
		else
			$('[name="checked[]"]').prop('checked',false)
	})
	$('[name="checked[]"]').click(function(){
		var count = $('[name="checked[]"]').length
		var checked = $('[name="checked[]"]:checked').length
		if(count == checked)
			$('#check_all').prop('checked',true)
		else
			$('#check_all').prop('checked',false)
	})
	$('#print').click(function(){
		start_load()
		$.ajax({
			url:"print_billing.php",
			method:"POST",
			data:{month : "<?php echo $month ?>"},
			success:function(resp){
				if(resp){
					var nw = window.open("","_blank","height=600,width=900")
					nw.document.write(resp)
					nw.document.close()
					nw.print()
					setTimeout(function(){
						nw.close()
						end_load()
					},700)
				}
			}
		})
	})
	$('#filter').click(function(){
		location.replace("index.php?page=billing&month="+$('[name="month"]').val())
	})

	function delete_billing($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_billing',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

