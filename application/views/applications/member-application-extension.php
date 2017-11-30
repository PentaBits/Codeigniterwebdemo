<div id="page-wrapper">

	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Apply for extension days</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Extension Days Application
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="appExtFormContainer">
					<form id="applicationExtForm" name="applicationExtForm">
						<div class="form-group">
							<label for="membershipno">Application for Membership No</label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" id="enq-name" name="enq-name" value="<?php echo $bodycontent["membershipno"]; ?>" readonly="true" />
								</div>
						</div>
						<div class="form-group">
							<label for="request_from_date">Request From (Date) <span style="font-size:18px;font-weight:700;">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<input type="text" class="form-control" id="request-from-date" name="request-from-date" placeholder="ex: 10-02-2017" onKeyup="numericFilter(this);" autocomplete="off"/>
								</div>
						</div>
						<div class="form-group">
							<label for="request_to_date">Request To (Date) <span style="font-size:18px;font-weight:700;">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<input type="text" class="form-control" id="request-to-date" name="request-to-date" placeholder="ex: 09-03-2017" onKeyup="numericFilter(this);" autocomplete="off">
								</div>
						</div>
						
						<div class="form-group">
							<label for="career-resume">Supporting Document </label>
							<div style="position:relative;">
								<a class='btn btn-default' href='javascript:;'>
									Choose File...
									<input type="file" class="file" name="supporting-document" id="supporting-document"   >
								</a>
								&nbsp;<br><br>
								<span class='label supporting-file-info' id="supporting-file-info"></span>
							</div>
							
							<br>
							<span class='label label-default' style="padding:1% 2%;background:none;color: #CF3106;">Supported files : .doc, .docx, .pdf, .jpg, .png</span>
						</div>
						
						
							<button type="submit" class="btn custom-button" style="width:100%;">Apply</button>
						
						
					</form>
					
					<div class="apllication-ext-error" style="padding:1%;">
						<p id="apllication-ext-error" class="error-style" style="color:#F95340;font-size: 13px;"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</div>