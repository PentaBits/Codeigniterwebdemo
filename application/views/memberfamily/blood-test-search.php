<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Blood Test List</h1>
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
					<a href="<?php echo base_url();?>memberfamily/addbloodtest/F" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Blood Test</a>
				</div>
			</div>
		</div>
	</div>
	
	
		<div class="container-fluid memberpanelFormContainer">
		<div class="bloodPressureFormContainer">
			<div class="row">
			<form class="bloodTestSearchForm" id="bloodTestSearchForm" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label for="fromDate">From Date</label>
							<input type="text" class="form-control datepicker" id="fromDate" name="fromDate" placeholder="" autocomplete="off" value="" readonly style="cursor:initial;"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="toDate">To Date</label>
							<input type="text" class="form-control datepicker" id="toDate" name="toDate" placeholder="" autocomplete="off" value="" readonly style="cursor:initial;"/>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-relatinship">Relationship</label>
							<select id="membr-relatinship" name="membr-relatinship" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								<?php foreach($bodycontent['relationshipList'] as $relationship) : ?>
									<option value="<?php echo $relationship['id'];?>" ><?php echo $relationship['relation'];?></option>
								<?php endforeach;?>
							</select>
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
						<label for="blood-test-id">Test</label>
							<select id="blood-test-id" name="blood-test-id" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								
								<?php foreach($bodycontent['bloodTestList'] as $bloodtest) : ?>
									<option value="<?php echo $bloodtest['blood_id'];?>" ><?php echo $bloodtest['test_desc'];?></option>
								<?php endforeach;?>
								
							</select>
					</div>
				</div>


				
				<div class="col-md-12">
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;"><span class="glyphicon glyphicon-search"></span> Search</button>
				</div>
			</form>
			
				
				
			</div>
		</div>
	</div>
	
	<!--Blood Pressure Report-->
	<div id="bldtestLoader" class="loader" style="display:none;">
		<img src="<?php echo base_url();?>application/assets/images/squares.gif"/>
		<p class="loading-text">Loading Please Wait ...</p>
	</div>
	
	<div id="bloodTestList"></div>
	
	
	
</div>