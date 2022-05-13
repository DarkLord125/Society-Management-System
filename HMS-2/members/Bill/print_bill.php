<?php
include '../../Includes/config.php';
require 'assets/barcode/vendor/autoload.php';
extract($_POST);

$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$ids = implode(",",$ids);
$qry = $con->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name, concat(address,', ',street,', ',baranggay,', ',city,', ',state,', ',zip_code) as caddress FROM persons where id in ($ids) ");
while($row = $qry->fetch_array()){
	foreach($row as $k => $v){
			$$k = $v;
		}
?>
<div class="container-fluid" id="toPrint">
<style type="text/css">
	#bcode-field{
		width:calc(100%) ;
    	align-items: center;

	}
	#bcode{
		max-height: inherit;
		max-width: inherit;
		width:calc(100%) ;
		height: 10vh;
	}
	#bcode-label {
   font-weight: 700;
    font-size: 17px;
    text-align: justify;
    text-align-last: justify;
    text-justify: inter-word;
	}
	#dfield p{
		margin: unset
	}
	.text-center{
		text-align:center;
	}
</style>
	<div class="" id="bcode-field">
		<img id="bcode" src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($tracking_id, "C128")) ?>">
		<div id="bcode-label"><?php echo preg_replace('/([0-9])/s','$1 ', $tracking_id); ?></div>
	</div>
	<br>
	<div class="col-lg-12 text-center" id="dfield">
	<p><large><b><?php echo $name ?></b></large></p>
	<hr>
	<p><small><b><?php echo $caddress ?></b></small></p>
	</div>
</div>
<br>
<br>
<?php } ?>