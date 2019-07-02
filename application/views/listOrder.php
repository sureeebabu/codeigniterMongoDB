<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
<div class="page-header">
    <div class="row"> 

    </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">


                            <div class="widget-container-col" id="widget-container-col-2">
                                <div class="widget-box widget-color-blue" id="widget-box-2">
                                    <div class="widget-header">
                                        <h5 class="widget-title bigger lighter">
                                            <i class="ace-icon fa fa-newspaper-o"></i>
                                            List of Order
                                        </h5>
                                    <a class="btn btn-white btn-info btn-bold pull-right"
                                            href="<?php echo base_url('OrderCtrl/addOrderDetails/'.$this->uri->segment(3)); ?>"><i
                                                class="ace-icon fa fa-plus bigger-120 blue"></i> Add New Order Details</a>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <table id="dynamic-table"
                                                class="table table-striped table-bordered table-hover">
                                                <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th class="text-center">#</th>
														<th class="text-center">Order No</th>
                                                        <th class="text-center">Order Price</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

//echo base_url();

if(count($orderDetailsData)>0)
{
$i=1;
$j=0;
foreach($orderDetailsData as $row)
{
echo "<tr>";
echo "<td  class='text-center'>".$i++."</td>";
echo "<td>".$row["orderNo"]."</td>";
echo "<td>".$row["orderPrice"]."</td>";
echo "<td class='text-center'>";
foreach ($orderDetailsData[$j]["orderID"] as $key => $orderID) {
        //echo  $orderID . '<br>';        
    echo "<a title='Edit Order' href='".site_url('OrderCtrl/editOrder/'.$orderID.'/'.$this->uri->segment(3))."' class='tooltip-default' data-rel='tooltip' data-placement='top'>
        <i class='fa fa-pencil'></i>
        </a>&nbsp;&nbsp;";
    echo "<a title='Delete Order'  onClick='return doconfirm();' href='".site_url('OrderCtrl/deleteOrderDetails/'.$orderID.'/'.$this->uri->segment(3))."' class='tooltip-default' data-rel='tooltip' data-placement='top'>
        <i class='fa fa-trash'></i>
        </a> ";
    }
    $j++;
echo "</td>";
echo "</tr>"; 
}
}else
{
echo "<tr><td class='text-center text-danger' colspan='4'><b>No Record Found</b></td></tr>";
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.span -->
</div><!-- /.row -->



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
		function doconfirm()
		{
			var isDelete=confirm("Are you sure to delete permanently?");
			if(isDelete!=true)
			{
				return false;
			}
		}
	</script>


	<?php include ('footer.php'); ?>