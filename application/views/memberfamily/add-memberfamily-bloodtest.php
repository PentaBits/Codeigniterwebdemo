<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Add Blood Test</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Blood Test
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily/bloodtestlist" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> Blood Test List</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid memberpanelFormContainer">
		<div class="bloodPressureFormContainer">
			<div class="row">
			
			<form class="bloodTestForm" id="bloodTestForm" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-relatinship">Relationship</label>
							<select id="membr-relatinship" name="membr-relatinship" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								<?php if($bodycontent['entry_from']=="S")
								{
									foreach($bodycontent['relationshipList'] as $relationship) :
									if($relationship['relation']=="Self"){
								?>
									<option value="<?php echo $relationship['id'];?>" selected><?php echo $relationship['relation'];?></option>	
								
								<?php 
									}
									else{echo "";}
									endforeach;
								}
								else{ ?>
									
								<?php foreach($bodycontent['relationshipList'] as $relationship) : ?>
								<option value="<?php echo $relationship['id'];?>" ><?php echo $relationship['relation'];?></option>	
								<?php 
								endforeach;
								}?>
							</select>
							<input type="hidden" id="relation_text" name="relation_text" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-family-name">Name</label>
						<div id="memFamilyName" class="memFamilyName">
							<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="blood-test">Test</label>
							<select id="blood-test" name="blood-test" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								
								<?php foreach($bodycontent['bloodTestList'] as $bloodtest) : ?>
									<option value="<?php echo $bloodtest['blood_id'];?>" ><?php echo $bloodtest['test_desc'];?></option>
								<?php endforeach;?>
								
							</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="blood-test-unit">Unit</label>
						<div id="bloodTestUnit" class="bloodTestUnit">
							<select id="blood-test-unit" name="blood-test-unit" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true" style="cursor:not-allowed;">
								<option value="0">Select</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="reading">Reading</label>
							<input type="text" class="form-control" id="reading" name="reading" placeholder="" autocomplete="off" value="" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="bld-test-col-date">Collection Date</label>
							<input type="text" class="form-control datepicker" id="bld-test-col-date" name="bld-test-col-date" placeholder="" autocomplete="off" value="<?php echo date("d-m-Y");?>" />
					</div>
				</div>
				
				<div class="col-md-12">
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Save</button>
				</div>
			</form>
				<!-- Error -->
				<div class="col-md-12">
					<div class="bldtest-err" style="padding:1%;">
						<p id="bldtest-err" class="error-style" style="color:#F95340;"></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php 
	$redirect_path = "";
	if($bodycontent['entry_from']=="S")
	{
		$redirect_path = base_url()."healthandfitness/bloodtest";
	}
	else
	{
		$redirect_path = base_url()."memberfamily/bloodtestlist";
	}
?>

	<div id="memFamlyBloodTestsaveModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:0%;">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo $redirect_path;?>'">×</button>
			
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="bldtestsavesuccessmsg"></span></h3>
			
			<!--		
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Message</h4>-->
		  </div>
		  <!--
		  <div class="modal-body">
			
		  </div> -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo $redirect_path; ?>'">Close</button>
		  </div>
		</div>

	  </div>
	</div>