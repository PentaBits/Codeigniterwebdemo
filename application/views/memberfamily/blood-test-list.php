<div class="container-fluid">
	<div class="table-responsive"> 
			<table id="bloodTestData" class="table table-striped listingtable" cellspacing="0" width="100%">
				<thead class="tableHead">
					<tr>
						<th>#</th>
						<th>Relation</th>
						<th>Test</th>
						<th>Name</th>
						<th>Collection Date</th>
						<th>Reading</th>
					</tr>
				</thead>
       
				<tbody>
				
				<?php 
					if($bloodtestReport):
						$i = 1;
						$blood_test = "";
					foreach($bloodtestReport as $blood_test_report): 
						if($i%2==0){$trClass = "tablerowEven";}
						else{ $trClass = "tablerowOdd";}
						?>
						<tr class="<?php echo $trClass; ?>">
								<td><?php echo $i++;?></td>
								<td><?php echo $blood_test_report['relation'];?></td>
								<td><?php echo $blood_test_report['test_desc'];?></td>
								<td><?php echo $blood_test_report['name'];?></td>
								<td><?php echo date('d-m-Y',strtotime($blood_test_report['collection_date']));?></td>
								<td><?php echo $blood_test_report['reading'];?></td>
								
						</tr>
					<?php 
						endforeach;
						
					endif;
				?>
				  
				</tbody>
			</table>
	</div>
</div>