<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Dietary Management List</h1>
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
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>dietary_management/addEditDiet" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Diet</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="table-responsive"> 
			<table id="dietry-managment-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Membership No</th>
						<th>Submit Date</th>
						<th>Meal 1</th>
						<th>Meal 2</th>
						<th>Meal 3</th>
						<th>Meal 4</th>
						<th>Meal 5</th>
						<th>Meal 6</th>
						<th>Meal 7</th>
						<th>Meal 8</th>
						<th>Weight</th>
						<th>Action</th>
					</tr>
				</thead>
       
				<tbody>
				
				<?php 
					if($bodycontent['dietarymanagmentlist']){
						$i = 1;
						foreach($bodycontent['dietarymanagmentlist'] as $dietarylist){ ?>
					
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $dietarylist['membership_no'];?></td>
						<td><?php echo $dietarylist['date_of_entry'];?></td>
						<td><?php echo $dietarylist['meal1'];?></td>
						<td><?php echo $dietarylist['meal2'];?></td>
						<td><?php echo $dietarylist['meal3'];?></td>
						<td><?php echo $dietarylist['meal4'];?></td>
						<td><?php echo $dietarylist['meal5'];?></td>
						<td><?php echo $dietarylist['meal6'];?></td>
						<td><?php echo $dietarylist['meal7'];?></td>
						<td><?php echo $dietarylist['meal8'];?></td>
						<td><?php echo $dietarylist['weight'];?></td>
						<td>
						<?php if($dietarylist['userid']==80){?>
						<a href="<?php base_url()?>dietary_management/addEditDiet/<?php echo $dietarylist['dietry_mamngment_id'];?>" style="text-decoration:none;"><h5><span class="label label-danger">Edit</span></h5></a>
						<!--
						<button class="btn btn-primary diet-chart-btn" data-toggle="modal" data-target="#dietChartModal" data-id="<?php echo $dietarylist['member_id'];?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>-->
						
						<?php }else{ echo "";} ?>
						</td>
					</tr>
					
					
					<?php
						}
						
					}
				?>
				  
				</tbody>
			</table>
		</div>
	</div>
	
	
	
	<!-- Diet Chart Model -->
	

	
</div>