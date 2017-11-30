<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Renew Package</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>
					<li class="active">
                        <i class="fa fa-edit"></i> Renew Package
                    </li>
                </ol>
            </div>
        </div>
	</div>
	

	
	
	
	<!------- Renewal Form ------>

		
	<div class="container-fluid memberpanelFormContainer">
		<div class="row renewalForm">
		
			<form  method="post" action="<?php echo base_url();?>memberdashboard/processrenewal" name="frmTransaction" id="frmTransaction" > 
			
			<h2><span class="glyphicon glyphicon-chevron-right"></span> Personal Info</h2>
			
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-name">Membership</label>
						<input type="text" name="memberhip-no" id="memberhip-no" class="form-control" value="<?php echo $bodycontent['membershipno'];?>" readonly />
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $bodycontent['customer_id'];?>" />
						<input type="hidden" name="branch_code" id="branch_code" value="<?php echo $bodycontent['branchcode'];?>" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-name">Name</label>
						<input type="text" name="member-name" id="member-name" class="form-control" value="<?php echo $bodycontent['member_name']; ?>"readonly />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="member-validity-pd">Validity</label>
						<input type="text" name="member-validity" id="member-validity" class="form-control" value="<?php echo $bodycontent['validity_pd']; ?>" readonly />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="next-validity-pd">Next validity start from</label>
							<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['nextstartdate']; ?>" readonly />
					</div>
				</div>
				
				<h2><span class="glyphicon glyphicon-chevron-right"></span> Payment Info</h2>
			
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="subscription">Subscription</label>
							<input type="text" class="form-control" id="subscription" name="subscription" value="<?php echo $bodycontent['subscription']; ?>" readonly />
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="payment_date">Payment Date</label>
							<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['paymentdate']; ?>" readonly />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="cashback-amt">Cash Back</label>
							<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['cashbackamount']; ?>" readonly  />
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="renewal-amt">Renewal Amount</label>
						<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['renewalamount']; ?>" readonly  />
					</div>
				</div>
				
				<!--
				<div class="col-md-6">
					<div class="form-group">
						<label for="tax-percentage">Service Tax %</label>
						<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['taxpercentage']; ?>" readonly  />
					</div>
				</div>-->
				
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<label for="cgst-rate">CGST % Rate</label>
							<select class="form-control" id="cgst-rate" name="cgst-rate" readonly>
								<?php foreach($bodycontent['cgstRateOpt'] as $cgstRateOpt):?>
								<option value="<?php echo $cgstRateOpt['gstID'] ?>" <?php if($cgstRateOpt['gstID']==1){echo "selected";}else{echo "";} ?>><?php echo $cgstRateOpt['rate']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
								<label for="cgst-amount">CGST Amount</label>
								<input type="text" class="form-control" id="cgst-amount" name="cgst-amount" value="<?php echo $bodycontent['cgstAmt'];?>" readonly />
						</div>
					</div>
				</div>
				

				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<label for="sgst-rate">SGST % Rate</label>
								<select class="form-control" id="sgst-rate" name="sgst-rate"  readonly>
									<?php foreach($bodycontent['sgstRateOpt'] as $sgstRateOpt):?>
									<option value="<?php echo $sgstRateOpt['gstID'] ?>" <?php if($sgstRateOpt['gstID']==2){echo "selected";}else{echo "";} ?>><?php echo $sgstRateOpt['rate']; ?></option>
									<?php endforeach; ?>
								</select>
								
								
						</div>
						<div class="col-md-6">
							<label for="sgst-amount">SGST Amount</label>
							<input type="text" class="form-control" id="sgst-amount" name="sgst-amount" value="<?php echo $bodycontent['sgstAmt'];?>" readonly />
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="tax-percentage">Total Taxable</label>
						<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['totalTaxableAmt']; ?>" readonly  />
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="tax-percentage">Net Payable</label>
						<input type="text" class="form-control" id="" name="" value="<?php echo $bodycontent['netpayable']; ?>" readonly  />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input name="channel" type="hidden" value="10" />
						<input name="account_id" type="hidden" value="19354" />
						<input name="secretkey" type="hidden" value="9198beab24537d04cb37bb7b2fc44f91" size="35"/>
						<input name="reference_no"  type="hidden" value="<?php echo time();?> " />
						<input name="amount"  type="hidden" value="<?php echo $bodycontent['netpayable']; ?>" />
						
						<input name="mode"  type="hidden" value="LIVE" />
						<input name="currency"  type="hidden" value="INR" />
						<input name="description"  type="hidden" value="Developer Test" />
						<!--<input name="return_url"  type="hidden" value="http://mantrahealthzone.co.in/response.php" />-->
						<input name="return_url"  type="hidden" value="<?php echo base_url();?>memberdashboard/paymentresponse" />
						<input name="name"  type="hidden" value="<?php echo $bodycontent['customer_id']; ?>" />
						<input name="address" type="hidden" value="Test Address" />
						<input name="city" type="hidden" value="Kolkata" />
						<input name="state" type="hidden" value="West Bengal" />
						<input name="country" type="hidden" value="IND" />
						<input name="postal_code" type="hidden" value="700001" />
						<input name="phone" type="hidden" value="<?php echo $bodycontent['membermobileno']; ?>" /> 
						<input name="email" type="hidden" value="<?php echo $bodycontent['memberemail']; ?>" />
					</div>
				</div>
				
				
				<div class="col-md-12">
				<!--
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;" name="submitted">Proceed</button>
					
				-->
				<input name="submitted" class="form-control" value="Proceed" type="submit" style="background:#F0562D;color:#FFF;font-weight:700;"/>
				</div>
			</form>
			
			<!-- <p class="payment-warning">* Please follow all steps to get your receipt print.</p>-->
			
			
		</div>
	</div>
	
	
	

</div>




