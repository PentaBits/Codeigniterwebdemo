<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Archive Report</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Archive Report List
                    </li>
                </ol>
            </div>
        </div>
	</div>

	
	<?php 
		/* echo "<pre>";
			print_r($bodycontent['archiveReport']);
		echo "</pre>"; */
	?>

	<div class="container-fluid">
		<div class="table-responsive"> 
			<table id="dietry-managment-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Membership</th>
						<th>Therapy</th>
						<th>Download</th>
					</tr>
				</thead>
       
				<tbody>
				<?php 
				
					if($bodycontent['archiveReport']){
							$i = 1;
						foreach($bodycontent['archiveReport'] as $archive_report){
						
							if($archive_report['scanned_report']){
								
								foreach($archive_report['scanned_report'] as $scanned_report){
									
							?>
							
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo date('d-m-Y',strtotime($scanned_report['date_of_report'])); ?></td>
							<td><?php echo $scanned_report['membership_no']; ?></td>
							<td><?php echo $scanned_report['therapy_name']; ?></td>
							<td><?php //echo site_url();?>
								<a href="http://mantrahealthzone.co.in/admin/scanned/<?php echo $scanned_report['report_path']; ?>" class="download-btn"> Download</a>
							</td>
						</tr>
					
					
						
				<?php  
						//$i++;
					}
						}	
						   else{echo "";}
						   
						}
					}
				?>
				
					<tr>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	

</div>




