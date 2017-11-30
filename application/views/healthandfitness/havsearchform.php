<div id="page-wrapper">
    <div class="container-fluid hav-report-container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Health Asset Value (HAV)</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Health Asset Value
                    </li>
                </ol>
            </div>
        </div>
		
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                             <i class="fa fa-info-circle fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo(round($bodycontent["havdata"]["hav_total_score"])." / ".$bodycontent["havdata"]["hav_total_max"]) ?></div>
                            <div>HAV score for <?php echo($bodycontent["havdata"]["month"]." , ".$bodycontent["havdata"]["year"]);?>.</div>
                        </div>
                     </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left"></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-info-circle fa-2x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo($bodycontent["havdata"]["total_attendence"]) ?></div>
                                        <div>Attendance for <?php echo($bodycontent["havdata"]["month"]." , ".$bodycontent["havdata"]["year"]);?>.</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left"><a href="<?php echo base_url();?>memberdashboard/attendancedetail">Get your attendance list.</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- report section -->
		
		
		<div class="row">
		
			<!--- Blood Pressure Report--->
			<?php if($bodycontent["bloodprs"]["bp_col_date"]){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
				<h4>Blood Pressure</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading1">
								<td>Date</td>
								<td>Systolic</td>
								<td>Diastolic</td>
								<td>Score</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result1">
                                <td><?php echo($bodycontent["bloodprs"]["bp_col_date"])?></td>
                                <td><?php echo($bodycontent["bloodprs"]["bp_systolic"])?></td>
                                <td><?php echo($bodycontent["bloodprs"]["bp_diastolic"])?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["bloodprs"]["bp_score"])?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["bloodprs"]["bp_remarks"])?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";}?>
			<!-- End Blood Pressure Report Data -->
			
			<!-- Oxygen Saturation Level --> 
			<?php if($bodycontent["oxysatlevel"]["oxyDt"]){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Oxygen Saturation Level</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Saturation level</td>
								<td>Score</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["oxysatlevel"]["oxyDt"])?></td>
                                <td><?php echo($bodycontent["oxysatlevel"]["oxy_sat_level"])?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["oxysatlevel"]["oxy_score"])?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["oxysatlevel"]["oxy_remarks"])?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";}?>
			<!-- END Oxygen Saturation Level --> 
			
			<!-- Strength --> 
			<?php if($bodycontent["strength"]["rmDate"]){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Strength</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading1">
								<td>Date</td>
								<td>Exercise</td>
								<td>Weight Lifted %</td>
								<td>1 RM</td>
								<td>Points</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result1">
                                <td><?php echo($bodycontent["strength"]["rmDate"]); ?></td>
                                <td><?php echo($bodycontent["strength"]["rm_exc_desc"]); ?></td>
                                <td><?php echo($bodycontent["strength"]["rm_weight_lftd"]); ?></td>
                                <td><?php echo($bodycontent["strength"]["rm_result"]); ?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["strength"]["rm_score"]);?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["strength"]["rm_remarks"]);?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";} ?>
			<!-- END Strength --> 
			
			<!--  Treadmill Rock Part (Vo2) --> 
			<?php if($bodycontent["Vo2Max"]["vo2max_date"]){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4> Treadmill Rock Part (Vo2)</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Heart Rate</td>
								<td>Duration</td>
								<td>Vo2 max</td>
								<td>METS</td>
								<td>Points</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["Vo2Max"]["vo2max_date"]); ?></td>
                                <td><?php echo($bodycontent["Vo2Max"]["vo2max_heart_rate"]);?></td>
                                <td><?php echo($bodycontent["Vo2Max"]["vo2max_duration"]);?></td>
                                <td><?php echo($bodycontent["Vo2Max"]["vo2max_vomax"]);?></td>
                                <td><?php echo($bodycontent["Vo2Max"]["vo2max_mets"])?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["Vo2Max"]["vo2max_score"]);?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["Vo2Max"]["vo2max_rmks"]);?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";} ?>
			<!-- END  Treadmill Rock Part (Vo2) --> 
			
			<!-- Sit up Test --> 
			<?php if($bodycontent["situptest"]["siteUpDt"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Sit up Test</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading1">
								<td>Date</td>
								<td>Repetition</td>
								<td>Points</td>
								<td>Rating</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result1">
                                <td><?php echo($bodycontent["situptest"]["siteUpDt"]); ?></td>
                                <td><?php echo($bodycontent["situptest"]["site_up_repetation"]); ?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["situptest"]["site_up_score"]); ?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["situptest"]["site_up_rmks"]); ?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";} ?>
			<!-- END Sit up Test --> 
			
			<!-- Push-up Test --> 
			<?php if($bodycontent["pushup"]["pushUpDt"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Push-up Test</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Repetition</td>
								<td>Points</td>
								<td>Rating</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["pushup"]["pushUpDt"]); ?></td>
                                <td><?php echo($bodycontent["pushup"]["push_up_repetation"]); ?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["pushup"]["push_up_score"]); ?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["pushup"]["push_up_rmks"]); ?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";} ?>
			<!-- END Push-up Test -->  
			
			
			<!-- Flexibility Test (Sit & Reach) -->
			<?php if($bodycontent["sitandreach"]["sitandreachDt"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Flexibility Test (Sit & Reach)</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Distance</td>
								<td>Pop.Avg.</td>
								<td>Score</td>
								<td>Rating</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["sitandreach"]["sitandreachDt"]); ?></td>
                                <td><?php echo($bodycontent["sitandreach"]["sit_nd_reach_distance"]); ?></td>
                                <td><?php echo($bodycontent["sitandreach"]["sit_nd_reach_avg_pop"]); ?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["sitandreach"]["sit_nd_reach_score"]); ?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["sitandreach"]["sit_nd_reach_rating"]); ?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";}?>
			<!-- END Flexibility Test (Sit & Reach) -->  
			
			<!-- Harvard Step Test -->
			<?php if($bodycontent["harvardtest"]["harvardColDt"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Harvard Step Test</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Duration</td>
								<td>Pulse Rate</td>
								<td>Score</td>
								<td>Rating</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["harvardtest"]["harvardColDt"]); ?></td>
                                <td><?php echo($bodycontent["harvardtest"]["duration"]); ?></td>
                                <td><?php echo($bodycontent["harvardtest"]["pulse_rate"]); ?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["harvardtest"]["harvard_score"]); ?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["harvardtest"]["harvard_rating"]); ?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo ""; }?>
			<!-- END Harvard Step Test -->  
			
			<!-- Upper Body Joint Mobility --> 
			<?php if($bodycontent["bodyjointmobility"]["OrthoDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Upper Body Joint Mobility</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading1">
								<td>Date</td>
								<td>Cervical Score</td>
								<td>Dorsal Score</td>
								<td>Lumber Score</td>
								<td>Left Shoulder</td>
								<td>Right Shoulder</td>
								<td>Core</td>
								<td>Total</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result1">
                                <td><?php echo($bodycontent["bodyjointmobility"]["OrthoDate"])?></td>
                                <td><?php echo($bodycontent["bodyjointmobility"]["cervical_score"]."/".$bodycontent["bodyjointmobility"]["cervical_total"])?></td>
                                <td><?php echo($bodycontent["bodyjointmobility"]["dorsal_score"]."/".$bodycontent["bodyjointmobility"]["dorsal_total"])?></td>
                                <td><?php echo($bodycontent["bodyjointmobility"]["lumber_score"]."/".$bodycontent["bodyjointmobility"]["lumber_total"])?></td>
								<td><?php echo($bodycontent["bodyjointmobility"]["shldr_lft_score"]."/".$bodycontent["bodyjointmobility"]["shldr_lft_total"])?></td>
								<td><?php echo($bodycontent["bodyjointmobility"]["shldr_rght_score"]."/".$bodycontent["bodyjointmobility"]["shldr_rght_total"])?></td>
								<td><?php echo($bodycontent["bodyjointmobility"]["core_score"]."/".$bodycontent["bodyjointmobility"]["core_total"])?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["bodyjointmobility"]["uprortho_score_total"]."/".$bodycontent["bodyjointmobility"]["uprortho_max_total"])?></span></td>
                           </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";} ?>
			<!-- END Upper Body Joint Mobility -->  
			
			<!-- Lower Body Joint Mobility --> 
			<?php if($bodycontent["lowerjointmobility"]["OrthoDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Lower Body Joint Mobility </h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Hip Right</td>
								<td>Hip Left</td>
								<td>Ankle right</td>
								<td>Ankle left</td>
								<td>Knee right</td>
								<td>Knee left</td>
								<td>Total</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["lowerjointmobility"]["OrthoDate"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["hip_right_score"]."/".$bodycontent["lowerjointmobility"]["hip_right_total"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["hip_left_score"]."/".$bodycontent["lowerjointmobility"]["hip_left_score"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["ankel_rght_score"]."/".$bodycontent["lowerjointmobility"]["ankel_rght_total"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["ankel_lft_score"]."/".$bodycontent["lowerjointmobility"]["ankel_lft_score"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["knee_rght_score"]."/".$bodycontent["lowerjointmobility"]["knee_rght_total"]); ?></td>
                                <td><?php echo($bodycontent["lowerjointmobility"]["knee_lft_score"]."/".$bodycontent["lowerjointmobility"]["knee_lft_total"]); ?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["lowerjointmobility"]["lwr_score_total"]."/".$bodycontent["lowerjointmobility"]["lwr_max_total"]); ?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php }else{echo ""; } ?>
			<!-- END Lower Body Joint Mobility --> 
			
			<!-- Muscle Flexibility --> 
			<?php if($bodycontent["muscleflexibility"]["OrthoDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Muscle Flexibility</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Right Side</td>
								<td>Left Side</td>
								<td>Total</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["muscleflexibility"]["OrthoDate"])?></td>
                                <td><?php echo($bodycontent["muscleflexibility"]["rght_sd_msl_score"]."/".$bodycontent["muscleflexibility"]["rght_sd_msl_total"])?></td>
                                <td><?php echo($bodycontent["muscleflexibility"]["lft_sd_msl_score"]."/".$bodycontent["muscleflexibility"]["lft_sd_msl_total"])?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["muscleflexibility"]["muscle_score_total"]."/".$bodycontent["muscleflexibility"]["muscle_max_score_total"])?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php }else{echo "";} ?>
			<!-- END Muscle Flexibility -->  
			
			<!-- Body Fat % --> 
			<?php if($bodycontent["bodycompassmnt"]["BodyCmpDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Body Fat (%)</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Body Weight</td>
								<td>Fat(%)</td>
								<td>Lean body mass</td>
								<td>Points</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["bodycompassmnt"]["BodyCmpDate"])?></td>
                                <td><?php echo($bodycontent["bodycompassmnt"]["body_weight"])?></td>
                                <td><?php echo($bodycontent["bodycompassmnt"]["body_fat_per"])?></td>
                                <td><?php echo($bodycontent["bodycompassmnt"]["body_lean_mass"])?></td>
								<td><span class="label label-primary"><?php echo($bodycontent["bodycompassmnt"]["body_score"])?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["bodycompassmnt"]["body_remarks"])?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php }else {echo "";}?>
			<!-- END Body Fat % --> 
			
			<!-- Waist Circumference --> 
			<?php if($bodycontent["waistCircumfrence"]["BodyCmpDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Waist Circumference </h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Waist</td>
								<td>Score</td>
								<td>Points</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["waistCircumfrence"]["BodyCmpDate"])?></td>
                                <td><?php echo($bodycontent["waistCircumfrence"]["body_waist"])?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["waistCircumfrence"]["body_waist_score"])?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["waistCircumfrence"]["body_waist_remrk"])?></span></td>
                            </tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php }else {echo "";}?>
			<!-- END Waist Circumfrences --> 
			
			<!-- Waist Hip ratio's  --> 
			<?php if($bodycontent["WaistHipRatio"]["BodyCmpDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Waist Hip ratio</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Waist</td>
								<td>Score</td>
								<td>Remarks</td>
								<td>Waist : Hip</td>
								<td>Score</td>
								<td>Remarks</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["WaistHipRatio"]["BodyCmpDate"]); ?></td>
                                <td><?php echo($bodycontent["WaistHipRatio"]["body_waist"]); ?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["WaistHipRatio"]["body_waist_score"]); ?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["WaistHipRatio"]["body_waist_remrk"]); ?></span></td>
								<td><?php echo($bodycontent["WaistHipRatio"]["body_waist_hip_ratio"])?></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["WaistHipRatio"]["bdy_wst_hip_score"])?></span></td>
                                <td><span class="label label-primary"><?php echo($bodycontent["WaistHipRatio"]["bdy_wst_hip_rmk"])?></span></td>
							</tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php }else{echo "";}?>
			<!-- END Waist Hip ratio --> 
			
			<!-- Body Girth Measurement --> 
			<?php if($bodycontent["bodygirth"]["BodyGrthDate"]){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Body Girth Measurement</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Neck</td>
								<td>Chest Normal</td>
								<td>Chest expanded</td>
								<td>Shoulder</td>
								<td>Biceps Flex</td>
								<td>Biceps Extention</td>
								<td>Upper Abdomen</td>
								<td>Mid Abdomen</td>
								<td>Lower Abdomen</td>
								<td>Thai</td>
								<td>Calf</td>
							</tr>
						</thead>
						<tbody>
                            <tr class="row_result2">
                                <td><?php echo($bodycontent["bodygirth"]["BodyGrthDate"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_neck"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_chst"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_chst_expnd"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_shldr"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_bicps_flx"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_bdy_bicp_extnt"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["upr_abodmen"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["mid_abdomen"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["lwr_abdomen"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["lwr_bdy_thigh"]); ?></td>
                                <td><?php echo($bodycontent["bodygirth"]["lwr_bdy_calf"]); ?></td>
							</tr>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";}?>
			<!-- END Body Girth Measurement -->
			
			<!-- Blood Report-->
			<?php if($bodycontent['bloodtest']){?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hav-row-container">
				<div class="table-responsive">
				<h4>Blood Report</h4>
					<table class="table hav_table">
						<thead>
							<tr class="row_heading2">
								<td>Date</td>
								<td>Test</td>
								<td>Reading</td>
								<td>Remarks</td>
								<td>Score</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach($bodycontent['bloodtest'] as $blood_test){?>
                            <tr class="row_result2">
								<td><?php echo $blood_test['bldTestDt'];?></td>
								<td><?php echo $blood_test['test_desc'];?></td>
								<td><?php echo $blood_test['reading'];?></td>
								<td><?php echo $blood_test['remarks'];?></td>
								<td><?php echo $blood_test['score'];?></td>
                            </tr>
						<?php } ?>
                        </tbody>
					</table>
					
				</div>
			</div>
			<?php } else{echo "";}?>
			
			<!-- END Blood Report -->
			
			
			
			
			
		</div> <!-- END HAV REPORT ROW-->
	</div>
</div>