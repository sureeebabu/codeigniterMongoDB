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
				<h4 class="widget-title"><?php echo $mode?> News</h4>
				<a href="<?php echo base_url('IndexCtrl'); ?>" class="btn btn-primary pull-right" >List Of News</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insNewsData";
	}elseif($mode =="Edit"){
		$dataMode = "updateNewsData/".$newsID;
	}
	//echo $dataMode;
?>

		<form id="addEditNewsForm" action=" <?php echo site_url('IndexCtrl/'.$dataMode); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
				 
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">News Title<span class="required">*</span></label>

						<div class="col-sm-9">
<input type="text" name="txtNewsTitle" required="required"  id="txtNewsTitle" class="form-control" placeholder="Enter News Title"   

					value="<?php if($mode == "Edit") { echo $newsData["newsTitle"] ? $newsData["newsTitle"] : "" ;}?>"		 

					 />
					</div>&nbsp;

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">News Category<span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text" name="txtNewsCategory"  required="required" class='form-control' id="txtNewsCategory"   placeholder="Enter News Category" class="col-xs-10 col-sm-5"
							value="<?php if($mode == "Edit") { echo $newsData["newsCategory"] ? $newsData["newsCategory"] : "" ;}?>"		  
							/>
					</div>&nbsp;

					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" name="btnAddEditNews" class="btn btn-primary pull-right" >
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