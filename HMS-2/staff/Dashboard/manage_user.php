<?php 
include("../../Includes/config.php"); 
session_start();
if(isset($_GET['id'])){
$registry = $con->query("SELECT * FROM registry where id =".$_GET['id']);
foreach($registry->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-user">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="person_name">Person Name</label>
			<input type="text" name="person_name" id="person_name" class="form-control" value="<?php echo isset($meta['person_name']) ? $meta['person_name']: '' ?>" required  autocomplete="off">
		</div>
	</form>
</div>
<script>
	$('.select2').select2({
		placeholder:"Please select here",
		width:"100%"
	})
	
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
				// else{
				// 	$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
				// 	end_load()
				// }
			}
		})
	})	
</script>