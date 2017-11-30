<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Edit Blood Pressure</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Blood Pressure
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily/bloodpressurelist" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> Blood Pressure List</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid memberpanelFormContainer">
		<div class="bloodPressureFormContainer">
			<div class="row">
			
			<form class="editbloodPressureForm" id="editbloodPressureForm" method="post">
			<input type="hidden" name="dataFrom" id="dataFrom" value="<?php echo $bodycontent['editBloodPressData']['dataFrom']; ?>" />
			<input type="hidden" name="bpID" id="bpID" value="<?php echo $bodycontent['editBloodPressData']['bpTestID']; ?>" />
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-relatinship">Relationship</label>
							<?php if($bodycontent['editBloodPressData']['relation']==18){
								$atrribute ="disabled";
							}else{$atrribute ="";}?> 
						
							<select id="membr-relatinship" name="membr-relatinship" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true" <?php echo $atrribute;?>>
								<option value="0">Select</option>
								<?php foreach($bodycontent['relationshipList'] as $relationship) : ?>
									<option value="<?php echo $relationship['id'];?>" <?php if($bodycontent['editBloodPressData']['relation']==$relationship['id']){echo "selected";}else{echo "";}?>><?php echo $relationship['relation'];?></option>
								<?php endforeach;?>
							</select>
							<input type="hidden" id="relation_text" name="relation_text" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-family-name">Name</label>
						<div id="memFamilyName" class="memFamilyName">
						<?php if(isset($bodycontent['editBloodPressData']['relation'])){?>
							<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true" <?php echo $atrribute;?>>
								<option value="<?php echo $bodycontent['editBloodPressData']['nameid'];?>"><?php echo $bodycontent['editBloodPressData']['name'];?></option>
							</select>
						<?php }else{ ?>
						
							<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
							</select>
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="systolic">Systolic</label>
							<input type="text" class="form-control" id="systolic" name="systolic" placeholder="" autocomplete="off" value="<?php echo $bodycontent['editBloodPressData']['systolic'];?>" onKeyup="numericFilter(this);"//>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="diastolic">Diastolic</label>
							<input type="text" class="form-control" id="diastolic" name="diastolic" placeholder="" autocomplete="off" value="<?php echo $bodycontent['editBloodPressData']['diastolic'];?>" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pulserate">Pulse Rate</label>
							<input type="text" class="form-control" id="pulserate" name="pulserate" placeholder="" autocomplete="off" value="<?php echo $bodycontent['editBloodPressData']['pulse_rate'];?>" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pulserate">Collection Date</label>
							<input type="text" class="form-control" id="collectiondate" name="collectiondate" placeholder="" autocomplete="off" value="<?php echo date('d-m-Y',strtotime($bodycontent['editBloodPressData']['collection_date']));?>" readonly style="cursor:initial;"/>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="collectiontime">Collection Time <span class="clear-time label label-primary" id="reset-time">Clear Time</span></label>
						<div class="input-group bootstrap-timepicker timepicker">
							<input id="collectiontime" name="collectiontime" type="text" class="collectiontime form-control" value="<?php echo $bodycontent['editBloodPressData']['collection_time'];?>" style="cursor: pointer;">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Update</button>
				</div>
			</form>
				<!-- Error -->
				<div class="col-md-12">
					<div class="bldpressureupd-err" style="padding:1%;">
						<p id="bldpressureupd-err" class="error-style" style="color:#F95340;"></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

	<div id="memFamlyBPeditModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:0%;">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo base_url();?>memberfamily/bloodpressurelist'">x</button>
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="bpupdsuccessmsg"></span></h3>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo base_url();?>memberfamily/bloodpressurelist'">Close</button>
		  </div>
		</div>

	  </div>
	</div>