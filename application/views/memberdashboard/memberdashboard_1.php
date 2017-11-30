 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="profile-pic">
							<div style="">
								<?php 
									if($bodycontent['profile_img']['profile_image']==""){
									if($bodycontent['profile_img']['gender']=="M"){
									?>
										<img src="<?php echo base_url();?>application/assets/images/Profilepicture/male_icon.png" />
									<?php }if($bodycontent['profile_img']['gender']=="F"){?>
										<img src="<?php echo base_url();?>application/assets/images/Profilepicture/femaleicon.png" />
									<?php }} else{ ?>
										<img src="<?php echo base_url();?>application/assets/images/Profilepicture/<?php echo $bodycontent['profile_img']['profile_image']; ?>" />
								<?php } ?>
								
							</div>
						</div>
						<h1 class="page-header" style="margin: 10px;font-size:24px;color:#E95B2E;">
                            Welcome <?php echo  $CUS_NAME; ?>
                        </h1>
						
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
								<!--
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div> -->
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format($bodycontent["cashbackdata"]["cash_back_amt"],2); ?></div>
                                        <div>Cashback Amount !</div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:;">
                                <div class="panel-footer dashboard-cashback-block-footer">
									<?php if($bodycontent["cashbackdata"]["cash_back_amt"]>0){?>
									
                                    <span class="pull-left"><a href="<?php echo base_url();?>memberdashboard/applycashback">Apply Cash Back</a></span>
									
									<?php }else{echo '<span class="pull-left">Cash Back</span>';}?>
									
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-clock-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo($bodycontent["remain"]); ?></div>
                                        <div><?php echo($bodycontent['packagExpirystatus']);?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:;">
                                <div class="panel-footer dashboard-renewal-block-footer">
									<span class="pull-left"><a href="<?php echo base_url();?>memberdashboard/renewpackage"><blink>Renewal</blink></a>&nbsp; <?php //echo($bodycontent["validupto"]);?></span>
                                    <span class="pull-right"><i class="fa fa-clock-o right"></i></span>
                                    <div class="clearfix"></div>
								</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo($bodycontent["attpercentage"])?></div>
                                        <div>Attendance (%)!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer dashboard-attendance-block-footer">
                                    <span class="pull-left"><a href="<?php echo base_url();?>memberdashboard/attendancedetail">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary dashboard-due-block">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-star fa-5x"></i> 
                                    </div>
                                    <div class="col-xs-9 text-right">
										<?php if($bodycontent["havdata"]){?>
											 <div class="huge">
												<?php echo($bodycontent["havdata"]["hav_total_percent"]); ?>
											 </div>
											<div>HAV (<?php echo($bodycontent["havdata"]["month"]); ?> - <?php echo($bodycontent["havdata"]["year"]); ?> )</div>
										<?php }else{?>
											<div class="huge">-</div>
											<div>HAV</div>
										<?php } ?>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:;">
                                <div class="panel-footer dashboard-due-block-footer">
                                    <span class="pull-left"><a href="<?php base_url();?>healthassetvaluereport"> View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   <!-- <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <!-- /.row -->

				<!--
                <div class="row">
         
                     <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-history fa-fw"></i> Package history</h3>
                            </div>
                            <div class="panel-body">
							
							<h3>Current Package</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background:#2BB161;color:#FFF;">
                                            <tr>
											    <!--
                                                <th>Membership No.</th>
                                                <th>Package</th>
                                                <th>Start Date</th>
                                                <th>Valid upto</th>
                                                <th>Amount(Inr)</th>--
												<th>Membership No</th>
												<th>Name</th>
												<th>Validity</th>
												<th>Package</th>
												<th>Package Rate</th>
												<th>Due</th>
												<th>Info</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<!-- closed on 21.04.2017
                                        <?php if($bodycontent["packagehistory"]) {
                                         foreach ($bodycontent["packagehistory"] as $content) {
                                        ?>
                                           
                                            <tr <?php echo($content["active"]==1?"class=success":""); ?>>
                                                <td><?php echo($content["MEMBERSHIP_NO"]); ?></td>
                                                <td><?php echo($content["CARD_DESC"]) ;?></td>
                                                <td><?php echo($content["FROM_DT"]); ?></td>
                                                <td><?php echo($content["VALID_UPTO"]); ?></td>
                                                <td>
                                                    <?php echo($content["SUBSCRIPTION"]); ?>
                                                    <?php if($content["active"]==1) { ?>
                                                    <i class="fa fa-fw fa-calendar"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php 
                                            }
                                         }
                                         ?> 
										 --
										 
										 <?php // $count_size = ($bodycontent["activePackages"]['paymentInfo']); 
												foreach($bodycontent["activePackages"] as $packageActive)
												{
													 $count = sizeof($packageActive['paymentInfo']);
												     if($count>0)
													 { 
												      $validity = base64_encode($packageActive['paymentInfo']['validity_string']);
												    ?>
												<tr style="background:#BDDDB9;font-weight:700;">
													<td><?php echo $packageActive['membership_no']; ?></td>
													<td><?php echo $packageActive['cus_name']; ?></td>
													<td><?php echo date('d-m-Y',strtotime($packageActive['paymentInfo']['from_dt']))." To ". date('d-m-Y',strtotime($packageActive['paymentInfo']['validupto_dt'])) ; ?></td>
													<td><?php echo $packageActive['card_desc']; ?></td>
													<td align="right"><?php echo $packageActive['paymentInfo']['subscription']; ?></td>
													<td align="right"><?php echo number_format($packageActive['paymentInfo']['due_amount'],2); ?></td>
													<td>
													<a href="javascript:void(0);" data-toggle="modal" data-membership="<?php echo base64_encode($packageActive['membership_no']);?>" data-validity="<?php echo $validity; ?>" data-target="#paymentInfo" class="paymentInfo"> <span class="glyphicon glyphicon-info-sign" style="font-size: 16px;"></span></a> 
													
													</td>
													<td><span style="color:#068D46;font-weight:700;">ACTIVE</span></td>
												</tr>		 
														 
														 
										<?php		 }
												}
										 ?>

										 
                                        </tbody>
                                    </table>
                                </div>
								
								<h3>Advanced Booked Package</h3>
								<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background:#2BB161;color:#FFF;">
                                            <tr>
												<th>Membership No</th>
												<th>Name</th>
												<th>Validity</th>
												<th>Package</th>
												<th>Package Rate</th>
												<th>Due</th>
												<th>Info</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									
										<?php foreach($bodycontent['advancePackage'] as $advancePack){
											   $validity = base64_encode($advancePack['validity_string']);
										?>
											<tr>
												<td><?php echo $advancePack['membership_no']; ?></td>
												<td><?php echo $advancePack['cus_name']; ?></td>
												<td><?php echo $advancePack['validity_string']; ?></td>
												<td><?php echo $advancePack['card_desc']; ?></td>
												<td><?php echo $advancePack['subscription']; ?></td>
												<td><?php echo $advancePack['due_amount']; ?></td>
												<td>
													<a href="javascript:void(0);" data-toggle="modal" data-membership="<?php echo base64_encode($advancePack['membership_no']);?>" data-validity="<?php echo $validity; ?>" data-target="#paymentInfo" class="paymentInfo"> <span class="glyphicon glyphicon-info-sign" style="font-size: 16px;"></span></a> 
													
												</td>
												<td>BOOKED</td>
											</tr>
										<?php }?>

										 
                                        </tbody>
                                    </table>
                                </div>
								
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!--transaction table-
                     </div>
                </div>
                 /.row -->
					
					
				<!---- Package History ---->
				
				<div class="package-history">
					<h3 class="pack-hist-title"><i class="fa fa-history fa-fw"></i> Package History</h3>
					<div class="current-package">
						<h4>Current Package</h4>
						 <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background:#2BB161;color:#FFF;">
                                            <tr>
											   
												<th>Membership No</th>
												<th>Name</th>
												<th>Validity</th>
												<th>Package</th>
												<th>Package Rate</th>
												<th>Due</th>
												<th>Info</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php // $count_size = ($bodycontent["activePackages"]['paymentInfo']); 
												foreach($bodycontent["activePackages"] as $packageActive)
												{
													 $count = sizeof($packageActive['paymentInfo']);
												     if($count>0)
													 { 
												      $validity = base64_encode($packageActive['paymentInfo']['validity_string']);
												    ?>
												<tr style="background:#BDDDB9;font-weight:700;">
													<td><?php echo $packageActive['membership_no']; ?></td>
													<td><?php echo $packageActive['cus_name']; ?></td>
													<td><?php echo date('d-m-Y',strtotime($packageActive['paymentInfo']['from_dt']))." To ". date('d-m-Y',strtotime($packageActive['paymentInfo']['validupto_dt'])) ; ?></td>
													<td><?php echo $packageActive['card_desc']; ?></td>
													<td align="right"><?php echo $packageActive['paymentInfo']['subscription']; ?></td>
													<td align="right"><?php echo number_format($packageActive['paymentInfo']['due_amount'],2); ?></td>
													<td>
													<a href="javascript:void(0);" data-toggle="modal" data-membership="<?php echo base64_encode($packageActive['membership_no']);?>" data-validity="<?php echo $validity; ?>" data-target="#paymentInfo" class="paymentInfo"> <span class="glyphicon glyphicon-info-sign" style="font-size: 16px;"></span></a> 
													
													</td>
													<td><span style="color:#068D46;font-weight:700;">ACTIVE</span></td>
												</tr>		 
														 
														 
										<?php		 }
												}
										 ?>

										 
                                        </tbody>
                                    </table>
                                </div>
					</div><!----- Current Package-->
					<?php
						
					if($bodycontent['advancePackage']){?>
					<div class="advance-package">
						<h4>Advance Booked Package</h4>
						<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background:#2BB161;color:#FFF;">
                                            <tr>
												<th>Membership No</th>
												<th>Name</th>
												<th>Validity</th>
												<th>Package</th>
												<th>Package Rate</th>
												<th>Due</th>
												<th>Info</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									
										<?php foreach($bodycontent['advancePackage'] as $advancePack){
											   $validity = base64_encode($advancePack['validity_string']);
										?>
											<tr>
												<td><?php echo $advancePack['membership_no']; ?></td>
												<td><?php echo $advancePack['cus_name']; ?></td>
												<td><?php echo $advancePack['validity_string']; ?></td>
												<td><?php echo $advancePack['card_desc']; ?></td>
												<td align="right"><?php echo $advancePack['subscription']; ?></td>
												<td align="right"><?php echo number_format($advancePack['due_amount'],2); ?></td>
												<td>
													<a href="javascript:void(0);" data-toggle="modal" data-membership="<?php echo base64_encode($advancePack['membership_no']);?>" data-validity="<?php echo $validity; ?>" data-target="#paymentInfo" class="paymentInfo"> <span class="glyphicon glyphicon-info-sign" style="font-size: 16px;"></span></a> 
													
												</td>
												<td>BOOKED</td>
											</tr>
										<?php }?>

										 
                                        </tbody>
                                    </table>
                                </div>
					</div>
					<?php } else{echo "";}?>
					
					
				</div>
					
					
					
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		
		<!----- payment Info Modal -->

	
<!---- FRESH COUNT DETAIL ----->
<div id="paymentInfo" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content" class="">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" >&times;</button>
					<h4 class="modal-title" style="font-family: verdana;font-size: 17px;text-align: center;color: #747474;"></h4>
					<h3 style="text-align:center;"> <span class="label label-warning">Payment Detail(s)</span></h3>
				  </div>
				  <div class="modal-body" id="payment_info_detail" style="height:400px;max-height:400px;overflow-y:scroll;">
					
				  </div>
				  <div class="modal-footer" >
					<button type="button" class="btn btn-success" data-dismiss="modal" style="font-family:verdana;font-size:12px;" >Close</button>
				  </div>
		</div>
	</div>
</div>

		
		