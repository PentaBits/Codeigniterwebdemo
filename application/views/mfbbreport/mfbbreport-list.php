<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">MFBB Report</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> MFBB Report List
                    </li>
                </ol>
            </div>
        </div>
	</div>

	
	<?php 
		 /* echo "<pre>";
			print_r($bodycontent['memberDtl']);
		echo "</pre>"; */ 
	?>

	<div class="container-fluid">
		<div class="heading1_print">Medical Fitness Body Composition Blood Test (MFBB) Report </div>

		<div class="table-responsive"> 
			
				<table width="100%" class="table table-striped table-bordered">
					<tr>
						<td ><b>Name</b></td>
						<td ><?php echo ($bodycontent['memberDtl']['CUS_NAME']); ?></td>
						<td ><b>Height</b></td>
						<td >
							<?php 
							if($bodycontent['memberDtl']['HEIGHT']>0){
								echo $bodycontent['memberDtl']['HEIGHT'] ."cm";
								}else
								{
									echo "";
								}
							?>
						</td>
					</tr>
					<tr>
						<td><b>Membership ID</b></td>
						<td><?php echo($bodycontent['memberDtl']['MEMBERSHIP_NO']);?></td>
						<td><b>Weight</b></td>
						<td><?php 
							if($bodycontent['memberDtl']['WEIGHT']>0)
							{
								echo($bodycontent['memberDtl']['WEIGHT']) ."(In Kgs.)";
							}
							else
							{
								echo "";
							}
							
							?></td>
					</tr>
					<tr>
						<td><b>DOB&nbsp;&nbsp;/&nbsp;&nbsp;DOJ</b></td>
						<td><?php echo($bodycontent['memberDtl']['CUS_DOB']);?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo($bodycontent['memberDtl']['REGISTRATION_DT']);?></td>
						<td><b>Waist</b></td>
						<td>
							<?php 
								if($bodycontent['memberDtl']['WAIST']>0)
								{
									echo($bodycontent['memberDtl']['WAIST'])." Inch";
								}
								else
								{
									echo "";
								}	
							?>
						</td>
					</tr>
				</table>
				
				<div class="heading1_print">Dietary Assessment</div>
				<table width="100%" class="table table-striped table-bordered">
					<tr><td align="left">Meal</td></tr>
					<tr>
						<td>
							<?php echo($bodycontent['dietStr']);?>
						</td>
					</tr>
				</table> 
				
				<?php 
				if($bodycontent['rowBodyComp']){
				?>
				<div class="heading1_print">Body Composition Assessment</div>
				<table width="100%" class="table table-striped table-bordered">
					<tr>
						<td align="center" valign="middle" width=""><b>Date Of Collection</b></td>
						<td align="center" valign="middle" width=""><b>Weight</b></td>
						<td align="center" valign="middle" width=""><b>Waist</b></td>
						<td align="center" valign="middle" width=""><b>Hip</b></td>
						<td align="center" valign="middle" width=""><b>Waist-Hip Ratio</b></td>
						<td align="center" valign="middle" width=""><b>Fat %</b></td>
						<td align="center" valign="middle" width=""><b>Lean Body Mass</b></td>
					</tr>
					<?php
					
					foreach($bodycontent['rowBodyComp'] as $row_body)
					{
					?>
					
					<tr>
						<td><?php echo(date("d-m-Y",strtotime($row_body->date_of_collection)));?></td>
						<td align="center"><?php echo($row_body->weight);?></td>
						<td align="center"><?php echo($row_body->waist);?></td>
						<td align="center"><?php echo($row_body->hip);?></td>
						<td align="center"><?php echo($row_body->waist_hip_ratio);?></td>
						<td align="center"><?php echo($row_body->fat_per);?></td>
						<td align="center"><?php echo($row_body->lean_body_mass);?></td>
					</tr>
					<?php
					}?>
				</table>
				<?php } ?>
				
				<?php if($bodycontent['rowGenMed']){ ?>
				<div class="heading1_print">General Medical Assessment</div>
				<table width="100%" class="table table-striped table-bordered">
					<tr>
						<td align="center" valign="middle"><b>Date Of Collection</b></td>
						<td align="center" valign="middle"><b>Blood Pressure</b></td>
						<td align="center" valign="middle"><b>Pulse Rate</b></td>
						<td align="center" valign="middle"><b>Oxygen Saturation Level</b></td>
					</tr>
					<?php
					foreach($bodycontent['rowGenMed'] as $row_med)
					{
					?>
					<tr>
						<td><?php echo(date("d-m-Y",strtotime($row_med->date_of_col)));?></td>
						<td align="center"><?php echo(number_format($row_med->systolic_msr,2));?>/<?php echo(number_format($row_med->diastolic_msr,0));?></td>
						<td align="center"><?php echo(number_format($row_med->pulse_msr,0));?></td>
						<td align="center"><?php echo(number_format($row_med->oxy_sat_level,0));?></td>
					</tr>
					<?php
					}
					?>
				</table>
				<?php }?>
				
			<?php if($bodycontent['rowGenFit']){?>	
			<div class="heading1_print">General Fitness Assessment</div>
			<table width="100%" class="table table-striped table-bordered">
				<tr>
					<td align="center" valign="middle"><b>Date Of Collection</b></td>
					<td align="center" valign="middle"><b>Vo2 Max</b></td>
					<td align="center" valign="middle"><b>Push-up</b></td>
					<td align="center" valign="middle"><b>Sit-up</b></td>
					<td align="center" valign="middle"><b>1 Rm</b></td>
				</tr>
				
				<?php 
					
					foreach($bodycontent['rowGenFit'] as $rowgenfit)
					{
						$collection_dt = date('d-m-Y',strtotime($rowgenfit['date_of_collection']));
						$vo2 = "";
						$push = "";
						foreach($rowgenfit['getVO'] as $vo2max)
						{
							$vo2=$vo2max->vomax;
						}
						foreach($rowgenfit['getPush'] as $row_push)
						{
							$push="Repetitions :" . $row_push->repitions ." (". $row_push->rating . ")";
						}
						foreach($rowgenfit['getSit'] as $row_sit)
						{
							$sit="Repetitions :" . $row_sit->repitions ." (". $row_sit->rating . ")";
						}
						foreach($rowgenfit['getRM'] as $row_rm)
						{
							$rm="Repetitions :" . $row_rm->no_of_rptn ." (Wt. Lifted :". $row_rm->weight_lifted . ")";
						}
					 	
					?>	
					
					<tr>
						<td align="center"><?php echo $collection_dt ;?></td>
						<td align="center"><?php echo($vo2);?></td>
						<td align="center"><?php echo($push);?></td>
						<td align="center"><?php echo($sit);?></td>
						<td align="center"><?php echo($rm);?></td>
					</tr>
					
				<?php		
					}
				?>
				
				
			</table>
			<?php } ?>
				
			<?php if($bodycontent['bloodTest']){ ?>
			<div class="heading1_print">Blood Test</div>
			<table width="100%" class="table table-striped table-bordered">
				<tr>
					<td align="center" valign="middle" ><b>Date Of Collection</b></td>
					<td align="center" valign="middle" ><b>Test</b></td>
					<td align="center" valign="middle" ><b>Reading</b></td>
					<td align="center" valign="middle" ><b>Unit</b></td>
				</tr>
				<?php
				foreach($bodycontent['bloodTest'] as $row_bld)
				{
					
				?>
				<tr>
					<td align="center" valign="middle" ><?php echo(date("d-m-Y",strtotime($row_bld['date_of_collection'])));?></td>
					<td align="center" valign="middle" ><?php echo($row_bld['bloodtestData']['bloodtestname']);?></td>
					<td align="center" valign="middle" ><?php echo($row_bld['reading']);?></td>
					<td align="center" valign="middle"><?php echo($row_bld['bloodtestData']['unitname']);?></td>
					
				</tr>

				<?php
				}
				?>
			</table>
			<?php } ?>

				
				
		<!--
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
				
					
				</tbody>
			</table>-->
			
			
		</div>
	</div>
	

</div>




