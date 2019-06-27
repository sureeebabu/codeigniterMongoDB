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
		$dataMode = "insOrderDetails";
	}elseif($mode =="Edit"){
		$dataMode = "updateOrderDetails/".$customerID;
	}
	//echo $dataMode;
?>

		<form id="addEditOrderForm" action=" <?php echo site_url('CustCtrl/'.$dataMode); ?> " method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
				 
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Order ID<span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text"  class="form-control" id="txtOrderID" name="txtOrderID" placeholder="Enter Order ID" 
								value="<?php if($mode == "Edit") { echo $orderDetailsData["orderID"] ? $orderDetailsData["orderID"] : "" ;}?>"
							 />
						</div>&nbsp;

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Order No<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text"  class="form-control" id="txtOrderNo" name="txtOrderNo" placeholder="Enter Order No" 
						value="<?php if($mode == "Edit") { echo $orderDetailsData["orderNo"] ? $orderDetailsData["orderNo"] : "" ;}?>"
						 />
					</div>&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Order Price<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text"  class="form-control" id="txtOrderPrice" name="txtOrderPrice" placeholder="Enter Order Price" 
						value="<?php if($mode == "Edit") { echo $orderDetailsData["orderPrice"] ? $orderDetailsData["orderPrice"] : "" ;}?>"
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