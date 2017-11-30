
<div id="page-wrapper">

     <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> 
					Hexagonal Facilities <i class="fa fa-angle-right" aria-hidden="true"></i> Biomechanical Assessment
				</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Biomechanical Screenings
                    </li>
                </ol>
				<p class="what-info-tag"><a href="javascript:;" data-toggle="modal" data-target="#biomechanichalScreeningModal">Know about Biomechanical Screenings</a> <i class="fa fa-question-circle" aria-hidden="true" style="font-size:20px;"></i></p>
            </div>
        </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-spin fa-fw"></i> Spine health test</h3>
                     </div>
                     <div class="panel-body">
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Cervical</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
									<table class="table table-bordered table-hover" id="cervical" > 
										<thead>
												<tr>
													<th>Date</th>
													<th>Flexion-</th>
													<th>Extension</th>
													<th>Right rotation</th>
													<th>Left rotation</th>
													<th>RLF </th>
													<th>LLF</th>
												</tr>
											</thead>
											<tbody>
												<?php if($bodycontent["cervical"]) {
													foreach ($bodycontent["cervical"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td><?php echo($content["crv_spine_flexion"]); ?></td>
													<td><?php echo($content["crv_spine_extension"]); ?></td>
													<td><?php echo($content["crv_spine_right_rotation"]); ?></td>
													<td><?php echo($content["crv_spine_left_rotation"]); ?></td>
													<td><?php echo($content["crv_spine_right_lat_flx"]); ?></td>
													<td><?php echo($content["crv_spine_left_lat_flx"]); ?></td>
												</tr>
												<?php 
												}
												}?>
												
											</tbody>
									</table>
									</div>
                                 </div>
                             </div>
                         </div><!-- VO2 Max  area-->
                        
                          <div class="col-lg-6"><!--push up test-->
                                 <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Dorsal</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dorsal">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extention</th>
                                        <th>RLF</th>
                                        <th>LLF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["dorsal"]){ 
     foreach ($bodycontent["dorsal"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["dor_spine_flexion"]); ?></td>
                                        <td><?php echo($content["dor_spine_extension"]); ?></td>
                                        <td><?php echo($content["dor_spine_right_lat_flx"]); ?></td>
                                        <td><?php echo($content["dor_spine_left_lat_flx"]); ?></td>
                                    </tr>
                                    <?php 
                                    }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                                 
                             </div><!--push up test-->
                             <div class="col-lg-6"><!--sit-up test-->
                                 <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Lumber</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="lumber">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extension</th>
                                        <th>RLF</th>
                                        <th>LLF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["lumber"]){ 
                                        foreach ($bodycontent["lumber"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["lmb_spine_flexion"]); ?></td>
                                        <td><?php echo($content["lmb_spine_extension"]); ?></td>
                                        <td><?php echo($content["lmb_spine_right_lat_flx"]); ?></td>
                                        <td><?php echo($content["lmb_spine_left_lat_flx"]); ?></td>
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                             </div>
                         
                         
                     </div>
                 </div>
             </div>
             
                            
            
         </div> <!--row 1 -->
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                
                         <a data-toggle="collapse" href="#collapse1" style="text-decoration: none;"><h3 class="panel-title"><i class="fa fa-hand-o-down fa-fw"></i> Shoulder flexibility</h3></a>
                     </div>
                     <div id="collapse1" class="panel-body collapse">
                          <div class="row">
                           <div class="col-lg-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i>Right Shoulder </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="rightshld">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Flexion</th>
                                                    <th>External Rotation</th>
                                                    <th>Internal Rotation</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($bodycontent["rShld"]){ 
                                                    foreach ($bodycontent["rShld"] as $content) {


                                                    ?>
                                                <tr>
                                                    <td><?php echo($content["date_of_collection"]); ?></td>
                                                    <td><?php echo($content["shoulder_rgt_flx"]); ?></td>
                                                    <td><?php echo($content["shoulder_rgt_ext"]); ?></td>
                                                    <td><?php echo($content["shoulder_rgt_int"]); ?></td>
                                                    
                                                </tr>
                                                <?php 
                                                }

                                                    } ?>
                                            </tbody>
                                        </table>
                        </div>
                                    </div>
                                </div>
                           </div>
                         
                           <div class="col-lg-6 text-center">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i>Scapular Dyskinesia </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="Scapularshld">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Left</th>
                                                    <th>Right</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($bodycontent["dysscapula"]){ 
                                                    foreach ($bodycontent["dysscapula"] as $content) {


                                                    ?>
                                                <tr>
                                                    <td><?php echo($content["date_of_collection"]); ?></td>
                                                    <td><?php echo($content["dys_lft_scp"]); ?></td>
                                                    <td><?php echo($content["dys_rgt_scp"]); ?></td>
                                                   
                                                    
                                                </tr>
                                                <?php 
                                                }

                                                    } ?>
                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                </div>
                            </div>
                         
                          </div> 
                         
                         <div class="row">
                           <div class="col-lg-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i>Left Shoulder </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="leftshld">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Flexion</th>
                                                    <th>External Rotation</th>
                                                    <th>Internal Rotation</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($bodycontent["lShld"]){ 
                                                    foreach ($bodycontent["lShld"] as $content) {


                                                    ?>
                                                <tr>
                                                    <td><?php echo($content["date_of_collection"]); ?></td>
                                                    <td><?php echo($content["shoulder_lft_flx"]); ?></td>
                                                    <td><?php echo($content["shoulder_lft_ext"]); ?></td>
                                                    <td><?php echo($content["shoulder_lft_int"]); ?></td>
                                                    
                                                </tr>
                                                <?php 
                                                }

                                                    } ?>
                                            </tbody>
                                        </table>
                        </div>
                                    </div>
                                </div>
                           </div>
                         
                           <div class="col-lg-6 text-center">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i>Core stability </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="corestablity">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Core stability</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($bodycontent["corestability"]){ 
                                                    foreach ($bodycontent["corestability"] as $content) {


                                                    ?>
                                                <tr>
                                                    <td><?php echo($content["date_of_collection"]); ?></td>
                                                    <td><?php echo($content["core_stability"]); ?></td>
                                                   
                                                    
                                                </tr>
                                                <?php 
                                                }

                                                    } ?>
                                            </tbody>
                                        </table>
                        </div>
                                    </div>
                                </div>
                            </div>
                         
                          </div> 
                         
                     </div>
                 </div>
             </div>
         </div>   
         
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <a data-toggle="collapse" href="#collapse2" style="text-decoration: none;">
                        <h3 class="panel-title"><i class="fa fa-hand-o-down fa-fw"></i> Hip examination</h3>
                        </a>
                                
                     </div>
                     <div id="collapse2" class="panel-body collapse">
                         <div class="col-lg-6">
                             <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Right hip</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="rhip">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extension</th>
                                        <th>External rotation</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["righthip"]){ 
                                        foreach ($bodycontent["righthip"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["hip_rgt_flx"]); ?></td>
                                        <td><?php echo($content["hip_rgt_extn"]); ?></td>
                                        <td><?php echo($content["hip_rgt_ext_rot"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                         </div>
                          <div class="col-lg-6"> 
                              
                              <div class="panel panel-green">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Left hip</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="lhip">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extension</th>
                                        <th>External rotation</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["lefthip"]){ 
                                        foreach ($bodycontent["lefthip"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["hip_lft_flx"]); ?></td>
                                        <td><?php echo($content["hip_lft_extn"]); ?></td>
                                        <td><?php echo($content["hip_lft_ext_rot"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                              
                              </div>
                     </div>
                     
                 </div>
             </div>
         </div>
         
         
          <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                               
                                
                                <a data-toggle="collapse" href="#collapse3" style="text-decoration: none;">
                                <h3 class="panel-title">
                                <i class="fa fa-hand-o-down fa-fw"></i> Ankle examination
                                </h3>
                                </a>
                     </div>
                     <div id="collapse3" class="panel-body collapse">
                         <div class="col-lg-6">
                             <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Right ankle</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="rankle">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Dorsi flexion</th>
                                        <th>Flat floor</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["rightankle"]){ 
                                        foreach ($bodycontent["rightankle"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["rgt_ank_dsr_flx"]); ?></td>
                                        <td><?php echo($content["rgt_ank_flat_foot"]); ?></td>
                                        
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                         </div>
                          <div class="col-lg-6"> 
                              
                              <div class="panel panel-green">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Left ankle</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="lankle">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Dorsi flexion</th>
                                        <th>Flat floor</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["leftankle"]){ 
                                        foreach ($bodycontent["leftankle"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["lft_ank_dsr_flx"]); ?></td>
                                        <td><?php echo($content["lft_ank_flat_foot"]); ?></td>
                                       
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                              
                              </div>
                     </div>
                     
                 </div>
             </div>
         </div>
         
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                              
                                
                                <a data-toggle="collapse" href="#collapse4" style="text-decoration: none;">
                                <h3 class="panel-title">
                                <i class="fa fa-hand-o-down fa-fw"></i> Knee examination
                                </h3>
                                </a>
                     </div>
                     <div id="collapse4" class="panel-body collapse">
                         <div class="col-lg-6">
                             <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Right knee</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="rknee">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extention</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["rightknee"]){ 
                                        foreach ($bodycontent["rightknee"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["rgt_knee_flx"]); ?></td>
                                        <td><?php echo($content["rgt_knee_extn"]); ?></td>
                                        
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                         </div>
                          <div class="col-lg-6"> 
                              
                              <div class="panel panel-green">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Left Knee</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="lknee">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Flexion</th>
                                        <th>Extention</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["leftknee"]){ 
                                        foreach ($bodycontent["leftknee"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                        <td><?php echo($content["lft_knee_flx"]); ?></td>
                                        <td><?php echo($content["lft_knee_extn"]); ?></td>
                                       
                                        
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                              
                              </div>
                     </div>
                     
                 </div>
             </div>
         </div>
         
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                
                                <a data-toggle="collapse" href="#collapse5" style="text-decoration: none;">
                                <h3 class="panel-title">
                                <i class="fa fa-hand-o-down fa-fw"></i> Muscles
                                </h3>
                                </a>
                     </div>
                     <div id="collapse5" class="panel-body collapse">
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Right</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
									<table class="table table-bordered table-hover" id="rmsl" > 
										<thead>
												<tr>
													<th>Date</th>
													<th>Latismuss Dorsi</th>
													<th>Iliopsoas</th>
													<th>ITB</th>
													<th>Pectorals</th>
													<th>Hamstring </th>
													<th>Rectus Pemoris</th>
												</tr>
											</thead>
											<tbody>
												<?php if($bodycontent["rightMuscles"]) {
													foreach ($bodycontent["rightMuscles"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td><?php echo($content["Latissimus_dorsi"]); ?></td>
													<td><?php echo($content["ilio_rgt"]); ?></td>
													<td><?php echo($content["itb_rgt"]); ?></td>
													<td><?php echo($content["pectorals"]); ?></td>
													<td><?php echo($content["hamstrings"]); ?></td>
													<td><?php echo($content["rectus_femoris"]); ?></td>
												</tr>
												<?php 
												}
												}?>
												
											</tbody>
									</table>
									</div>
                                 </div>
                             </div>
                         </div>
                        
                          <div class="col-lg-12">
                             <div class="panel panel-green">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Left</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
									<table class="table table-bordered table-hover" id="lmsl" > 
										<thead>
												<tr>
													<th>Date</th>
													<th>Latismuss Dorsi</th>
													<th>Iliopsoas</th>
													<th>ITB</th>
													<th>Pectorals</th>
													<th>Hamstring </th>
													<th>Rectus Pemoris</th>
												</tr>
											</thead>
											<tbody>
												<?php if($bodycontent["leftMuscles"]) {
													foreach ($bodycontent["leftMuscles"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td><?php echo($content["Latissimus_dorsi_lft"]); ?></td>
													<td><?php echo($content["ilio_lft"]); ?></td>
													<td><?php echo($content["itb_lft"]); ?></td>
													<td><?php echo($content["pectorals_lft"]); ?></td>
													<td><?php echo($content["hamstrings_lft"]); ?></td>
													<td><?php echo($content["rectus_femoris_lft"]); ?></td>
												</tr>
												<?php 
												}
												}?>
												
											</tbody>
									</table>
									</div>
                                 </div>
                             </div>
                         </div>
                             
                         
                         
                     </div>
                 </div>
             </div>
             
                            
            
         </div> 
         
         
     </div>
 </div>
 
 
 
 
 
 <!------------------------>
 
 

<div id="biomechanichalScreeningModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header" style="background:#fe7b34;color:#FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Biomechanichal Screening</h4>
      </div>
      <div class="modal-body custome-modal-popup-body" style="height:300px;">
       
		<div class="normal_text" style="">
			<p>
			Biomechanical Screening is a process through which an examination of the muscle and the joints are conducted in order to determine the body segments which needs to be trained. This can have a dramatic effect in improving your sports and fitness performance or a rehabilitation program by customizing your training schedule. The workout chart which would be generated from this Biomechanical Screening would enable you to accomplish your goals by preventing injury and optimizing sports and fitness performance. </p>
			
			<p>
			A lot of injuries occur in our life because of bad posture or due to over-enthusiastic activities at the gym and sports. This is because before starting off, no initial assessment is done by a proper medical person and therefore the training programme turns out to be an unplanned activity. Chances of injury are very high. If the person has some amount of spondylitis or arthritis in his/her spine/ knees etc, then there is every possibility of the pain and symptoms to increase. With faulty exercises the amount of arthritis is bound to increase too. </p>

		
		</div>
	   
      </div>
     
    </div>

  </div>
</div>
 
 
 
