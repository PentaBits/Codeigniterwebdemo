<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Cash Back</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Apply Cash Back
                    </li>
                </ol>
            </div>
        </div>
	</div>

	
	
	<div class="container-fluid memberpanelFormContainer">
		
			<div class="row">
			<form class="cashbackForm" id="cashbackForm" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label for="membership-no">Membership</label>
							<input type="text" name="membership-no" id="membership-no" value="<?php echo $bodycontent['membershipNumber']; ?>" class="form-control" />
							<input type="hidden" name="member-id" id="member-id" value="<?php echo $bodycontent['memberid']; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="member-validity">Validity</label>
						<input type="text" name="member-validity" value="<?php echo $bodycontent['validityString']; ?>" class="form-control" id="member-validity"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="cashback-amount">Cash Back Amount</label>
							<input type="text" class="form-control" id="cashback-amount" name="cashback-amount" placeholder="" autocomplete="off" value="<?php echo $bodycontent['cashbackdata']['cash_back_amt'];?>" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="cashback-point">Cash Back Point</label>
							<input type="text" class="form-control" id="cashback-point" name="cashback-point" placeholder="" autocomplete="off" value="<?php echo $bodycontent['cashbackdata']['total_point'];?>" onKeyup="numericFilter(this);" />
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="casbck-terms-condition" style="display:none;">
						<ul>
							<li>1. I agree that I can only redeem the cash back offer during the renewal or conversion or purchase of new package.</li>
							<li>2. I agree that I will apply for cash back before 10 days from the date of expiry of my existing package.</li>
							<li>3. I agree that I will consume the cash back within 10 days from the date of approval of cash back application.</li>
							<li>4. I agree that cash back only be possible when new or renew package price is equal or greater than cash back price.</li>
							<li>
							<input type="checkbox" name="termsAgree" id="termsAgree" /> I agree with the above mentioned Terms & Conditions.</li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-12">
					<button type="submit" id="cash-back-apply-btn" class="btn custom-button" style="width:100%;margin-top: 2%;display:none;">Apply</button>
					<p style="display:none;" class="cashback-applied-msg" id="cashback-applied-msg"><span class="glyphicon glyphicon-ok"></span>  You have already applied for cashback. </p>
				</div>
			</form>
			
			<div class="cashbck-error" style="padding:1%;">
				<p id="cashbck-error" class="error-style" style="color:#F95340;font-size: 13px;text-indent:10px;"></p>
			</div>
			</div>
		
	</div>
</div>


<div id="cashbacksaveModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:0%;">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo base_url();?>memberdashboard'">×</button>
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="cashbacksuccessmsg"></span></h3>
			
			<!--		
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Message</h4>-->
		  </div>
		  <!--
		  <div class="modal-body">
			
		  </div> -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo base_url();?>memberdashboard'">Close</button>
		  </div>
		</div>

	  </div>
</div>

