<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-7">

		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<!-- <h4 class="widget-title"><?php echo $mode?> News</h4> -->
				<a href="<?php echo base_url('CustCtrl'); ?>" class="btn btn-primary pull-right" >List Of Customer</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insCustDetails";
	}elseif($mode =="Edit"){
		$dataMode = "updateCustDetails/".$customerID;
	}
	//echo $dataMode;
?>

		<form id="addEditCustForm" action=" <?php echo site_url('CustCtrl/'.$dataMode); ?> " method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
				 
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Customer Name<span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text"  class="form-control" id="txtCustomerName" name="txtCustomerName" placeholder="Enter Customer Name" 
								value="<?php 
										if($mode == "Edit") {
											if (empty($orderDetailsData["customerName"])) {
												echo "";
											}
											else {
												echo $orderDetailsData["customerName"];
											}											
										}
										?>"
							 />
						</div>&nbsp;

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Customer Address<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text"  class="form-control" id="txtCustomerAddress" name="txtCustomerAddress" placeholder="Enter Customer Address" 
						value="<?php 
									if($mode == "Edit") { 
										if (empty($orderDetailsData["customerAddress"])) {
												echo "";
											}
											else {
												echo $orderDetailsData["customerAddress"];
										}
									}
									?>"
						 />
					</div>&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Customer MobileNo<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text"  class="form-control" id="txtCustomerMobileNo" name="txtCustomerMobileNo" placeholder="Enter Customer MobileNo" 
						value="<?php 
									if($mode == "Edit") {
										if (empty($orderDetailsData["customerMobileNo"])) {
												echo "";
											}
											else {
												echo $orderDetailsData["customerMobileNo"];
										}
									}?>"
						 />
					</div>&nbsp;
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" value="Submit" class="btn btn-primary pull-right"  />
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
		</div>
	</div><!-- /.col -->
	<div class="col-xs-3">&nbsp;</div>
</div>

</div>


</div>
</div>

<?php
include ('footer.php');
?>