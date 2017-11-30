
<?php
/*
echo "<pre>";
print_r($bpReport);
echo "</pre>";*/
?>

<div class="container-fluid">
		<div class="table-responsive"> 
			<table id="bloodPressureData" class="table table-striped listingtable" cellspacing="0" width="100%">
				<thead class="tableHead">
					<tr>
						<th>#</th>
						<th>Relation</th>
						<th>Name</th>
						<th>Collection Date</th>
						<th>Collection Time</th>
						<th>Systolic</th>
						<th>Diastolic</th>
						<th>Pulse Rate</th>
						<th>Action</th>
					</tr>
				</thead>
       
				<tbody>
				
				<?php 
					if($bpReport):
						$i = 1;
					foreach($bpReport as $bp_report): 
						if($i%2==0){$trClass = "tablerowEven";}
						else{ $trClass = "tablerowOdd";}
						
						?>
						
						<tr class="<?php echo $trClass; ?>">
								<td><?php echo $i++;?></td>
								<td><?php echo $bp_report['relation'];?></td>
								<td><?php echo $bp_report['name'];?></td>
								<td><?php echo date('d-m-Y',strtotime($bp_report['collection_date']));?></td>
								<td align="center"><?php echo $bp_report['collection_time'];?></td>
								<td><?php echo $bp_report['systolic'];?></td>
								<td><?php echo $bp_report['diastolic'];?></td>
								<td><?php echo $bp_report['pulse_rate'];?></td>
								<td>
								<?php if($bp_report['userid']==80 OR $bp_report['userid']==0){ ?>
									<a href="<?php echo base_url()?>memberfamily/editbloodpressure/<?php echo $bp_report['bpTestID'];?>/<?php echo $bp_report['dataFrom']; ?>" style="text-decoration:none;"><span class="label label-danger">Edit</span></a>
								<?php }else{echo "";}?>
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