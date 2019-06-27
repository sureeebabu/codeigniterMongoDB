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
                                            List of Country
                                        </h5>


                                        <a class="btn btn-white btn-info btn-bold pull-right"
                                            href="<?php echo base_url('CustCtrl/addOrderDetails'); ?>"><i
                                                class="ace-icon fa fa-plus bigger-120 blue"></i> Add New Order Details</a>

                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <table id="dynamic-table"
                                                class="table table-striped table-bordered table-hover">
                                                <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th class="text-center">#</th>
														<th class="text-center">Customer Name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

//echo base_url();

if(count($data)>0)
{
$i=1;
foreach($data as $row)
{
echo "<tr>";
echo "<td  class='text-center'>".$i++."</td>";
echo "<td>".$row["customerName"]."</td>";
echo "<td class='text-center'>				 

<a title='Add Order' href='".site_url('CustCtrl/getOrderDetails/'.$row["_id"])."' class='tooltip-default' data-rel='tooltip' data-placement='top'>
<i class='fa fa-user'></i>
</a> 
</td>";

// echo "<td>".$row["stateList"][0]."</td>";
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