<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Member Diet Chart List</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Dietary Management
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="table-responsive"> 
				<table id="member-dietchart-list" class="table table-striped table-bordered" >
					<thead>
						<th>Membership No</th>
						<th>Diet Date</th>
						<th>View Chart</th>
					</thead>
					<tbody>
					<?php if($bodycontent['dietchartList']):
						  foreach($bodycontent['dietchartList'] as $dietChart):
						?>
						<tr>
							<td><?php echo $dietChart['membership_no']; ?></td>
							<td><?php echo date('d-m-Y',strtotime($dietChart['diet_date'])); ?></td>
							<td>
								<button class="btn btn-success diet-chart-btn" data-toggle="modal" data-target="#dietChartModal" data-backdrop="static" data-keyboard="false" data-id="<?php echo $dietChart['dietchartid'];?>">View Chart</button>
							</td>
						</tr>
					<?php 
					endforeach;
					endif;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	
	
		
	
</div>

<!-- Modal -->
	<div id="dietChartModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		 <div id="dietChartResult"></div>
		  <div class="modal-footer ">
			<button type="button" class="btn btn-mantra" data-dismiss="modal" style="font-weight:normal;">Close</button>
		  </div>
		</div>

	  </div>
	</div>