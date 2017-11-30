
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
			<?php if($bodycontent['mode']=="Edit"){?>
                <h1 class="page-header page-label">Your Family - Edit</h1>
			<?php }else{?>
				<h1 class="page-header page-label">Your Family - Add</h1>
			<?php } ?>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i>Your Family
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> View Your Family List</a>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Add Edit Members Family -->
	<?php 
		if($bodycontent['mode']=="Edit" AND $bodycontent['memberFamilyID']!=0){
			$memFamilyid = $bodycontent['memberFamilyID'];
			$mode = $bodycontent['mode'];
			$relationship_id = $bodycontent['memberFamilyData']['relationship_id'];
			$name = $bodycontent['memberFamilyData']['name'];
			$gender = $bodycontent['memberFamilyData']['gender'];
			$age = $bodycontent['memberFamilyData']['age'];
			$bloodgrpID = $bodycontent['memberFamilyData']['blood_group_id'];
		}
		else{
			$memFamilyid = $bodycontent['memberFamilyID'];
			$mode = $bodycontent['mode'];
			$relationship_id = 0;
			$name = "";
			$age = "";
			$gender = "";
			$bloodgrpID = 0;
		}
	?>
	
	
	<div class="container-fluid">
		<div class="memberFamilyFormContainer">
			<div class="row">
			
			<form class="memberfamilyForm" id="memberfamilyForm" method="post">
					<!---->
						<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>" />
						<input type="hidden" name="memberFamilyID" id="memberFamilyID" value="<?php echo $memFamilyid; ?>" />
					<!---->
				<div class="col-md-6">
					<div class="form-group">
						<label for="relationship">Relationship*</label>
							<select id="relationship" name="relationship" class="relationship form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								<?php foreach($bodycontent['relationshipList'] as $relationship) : ?>
									<option value="<?php echo $relationship['id'];?>" <?php if($relationship_id==$relationship['id']){
										echo "selected";}else{echo "";}?>><?php echo $relationship['relation'];?></option>
								<?php endforeach;?>
							</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="memfamilyname">Name*</label>
							<input type="text" class="form-control" id="memfamilyname" name="memfamilyname" placeholder="" autocomplete="off" value="<?php echo $name; ?>" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="memfamilygender">Gender</label>
							<select id="memfamilygender" name="memfamilygender" class="form-control">
								<option value="M" <?php if($gender=="M"){echo "selected";}else{echo "";}?>>Male</option>
								<option value="F" <?php if($gender=="F"){echo "selected";}else{echo "";}?>>Female</option>
							</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="memfamilyage">Age*</label>
						<input type="text" name="memfamilyage" id="memfamilyage" class="form-control" value="<?php echo $age; ?>" onKeyUp="numericFilter(this);"/>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="memfamilybldgrp">Blood Group</label>
						
							<select id="memfamilybldgrp" name="memfamilybldgrp" class="form-control">
								<option value="0">Select</option>
								<?php foreach($bodycontent['bloodgroup'] as $bloodgroup) : ?>
									<option value="<?php echo $bloodgroup['id'];?>" <?php if($bloodgrpID==$bloodgroup['id']){echo "selected";}else{echo "";}?>><?php echo $bloodgroup['bld_group_code'];?></option>
								<?php endforeach;?>
							</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<?php if($mode=="Edit"){?>
						<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Update</button>
					<?php }else{?>
						<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Save</button>
					<?php } ?>
				</div>
			</form>
				<!-- Error -->
				<div class="col-md-12">
					<div class="save-memberfamily-err" style="padding:1%;">
						<p id="save-memberfamily-err" class="error-style" style="color:#F95340;"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div><!-- end page wrapper-->



	<div id="membersfamilySuccessModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:0%;">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo base_url();?>memberfamily'">×</button>
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="membfamlysuccess"></span></h3>
			
			<!--		
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Message</h4>-->
		  </div>
		  <!--
		  <div class="modal-body">
			
		  </div> -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo base_url();?>memberfamily'">Close</button>
		  </div>
		</div>

	  </div>
	</div>

