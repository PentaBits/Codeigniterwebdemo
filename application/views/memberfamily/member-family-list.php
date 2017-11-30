<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Your Family List</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Your Family
                    </li>
                </ol>
            </div>
        </div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily/addeditmemberfamily" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Your Family</a>
				</div>
			</div>
		</div>
	</div>
	
		
	<div class="container-fluid">
		<div class="table-responsive"> 
			<table id="memberFamilyList" class="table table-striped listingtable" cellspacing="0" width="100%">
				<thead class="tableHead">
					<tr>
						<th>#</th>
						<th>Relation</th>
						<th>Name</th>
						<th>Age</th>
						<th>Blood Group</th>
						<th>Action</th>
					</tr>
				</thead>
       
				<tbody>
				
				<?php 
					if($bodycontent['memberFamilyList']):
						$i = 1;
						
						foreach($bodycontent['memberFamilyList'] as $memberFamily): 
						if($i%2==0){ ?>
							<tr class="tablerowEven">
								<td><?php echo $i++;?></td>
								<td><?php echo $memberFamily['relation'];?></td>
								<td><?php echo $memberFamily['name'];?></td>
								<td align=""><?php echo $memberFamily['age']." yrs.";?></td>
								<td><?php echo $memberFamily['bld_group_code'];?></td>
								<td>
								
								<a href="<?php base_url()?>memberfamily/addeditmemberfamily/<?php echo $memberFamily['memberFamilyID'];?>" style="text-decoration:none;"><span class="label label-danger">Edit</span></a>
								
								</td>
							</tr>
						<?php }
						else{ ?>
							<tr class="tablerowOdd">
								<td><?php echo $i++;?></td>
								<td><?php echo $memberFamily['relation'];?></td>
								<td><?php echo $memberFamily['name'];?></td>
								<td align=""><?php echo $memberFamily['age']." yrs.";?></td>
								<td><?php echo $memberFamily['bld_group_code'];?></td>
								<td>
								
								<a href="<?php base_url()?>memberfamily/addeditmemberfamily/<?php echo $memberFamily['memberFamilyID'];?>" style="text-decoration:none;"><span class="label label-danger">Edit</span></a>
								
								</td>
							</tr>
					<?php	}
						?>
						
					
					
					
					<?php
						endforeach;
						
					endif;
				?>
				  
				</tbody>
			</table>
		</div>
	</div>
	
	
	
</div>