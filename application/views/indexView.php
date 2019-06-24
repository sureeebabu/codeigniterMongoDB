<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="main-content">
<div class="main-content-inner">
<div class="page-content">

<div class="row">
<div class="col-xs-12">
<div class="row">
	<div class="col-xs-12">
	

<div class="widget-container-col" id="widget-container-col-2">
	<div class="widget-box widget-color-blue" id="widget-box-2">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-desktop"></i>
				List of News
			</h5>


<a class="btn btn-white btn-info btn-bold pull-right" href="#"><i class="ace-icon fa fa-plus bigger-120 blue"></i> Add New News</a>
			
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
				<th class="text-center">#</th>
                    <th class="text-center">News Title</th>
						</tr>
					</thead>

					<tbody>
						<?php
			if(count($data)>0)
			{
				$i=1;
				foreach($data as $row)
				{
					echo "<tr>";
					echo "<td  class='text-center'>".$i++."</td>";
					echo "<td>".$row["newsTitle"]."</td>";				 
					echo "</tr>"; 
				}
			}else
			{
				echo "<tr><td class='text-center text-danger' colspan='2'><b>No Record Found</b></td></tr>";
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

</body>

</html>