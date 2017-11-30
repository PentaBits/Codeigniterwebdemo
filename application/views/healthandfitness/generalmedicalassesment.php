 <div id="page-wrapper">

     <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> Hexagonal Facilities <i class="fa fa-angle-right" aria-hidden="true"></i>
 General Medical Assessment</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> General medical assesment
                    </li>
					
                </ol>
				<p class="what-info-tag"><a href="javascript:;" data-toggle="modal" data-target="#medicalAssesmentModal">Know about medical assesment</a> <i class="fa fa-question-circle" aria-hidden="true" style="font-size:20px;"></i></p>
				
            </div>
			
        </div>
		
		<div class="header-panel-info">
			<a href="<?php echo base_url();?>memberfamily/addbloodpressure/S" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Blood Pressure</a>
		</div>
						
						
         <div class="row" style="margin-top:44px;">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> medical assesment</h3>
								
                     </div>
                     <div class="panel-body">
						
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood pressure</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="bldpressure">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Systolic</th>
                                        <th>Diastolic</th>
                                        <th>Pulse</th>
                                        <th>Level</th>
                                        <th>Remarks</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]) {
                                        foreach ($bodycontent["medicalassesment"] as $content) {
    
                                                if($content["blood_prs_date"]!='01-01-1970'){
                                        ?>
                                    <tr>
                                        <td><?php echo($content["blood_prs_date"]); ?></td>
                                        <td><?php echo($content["systolic_msr"]); ?></td>
                                        <td><?php echo($content["diastolic_msr"]); ?></td>
                                        <td>
                                            <?php echo($content["pulse_msr"]); ?>
                                            
                                        </td>
                                        <td>
                                            <?php if($content["pulse_msr"]>= 60 && $content["pulse_msr"]<=100 ) {?>
                                            <span class="label label-success">Normal</span>
                                            <?php 
                                            
                                            }else{
                                            ?>
                                            <span class="label label-danger">Risk</span>
                                            <?php }?>
                                        </td>
                                        <td><?php echo($content["prs_remarj"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                                }
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
                                         <h3 class="panel-title"><i class="fa fa-plus-square fa-fw"></i> Oxygen saturation level</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="oxysatlvl">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>OSL</th>
                                        <th>Remarks</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]){ 
                                        foreach ($bodycontent["medicalassesment"] as $content) {
                                            if($content["oxy_date"]!='01-01-1970'){
                                    ?>
                                    <tr>
                                        <td><?php echo($content["oxy_date"]); ?></td>
                                        <td><?php echo($content["oxy_sat_level"]); ?></td>
                                        <td><?php echo($content["oxy_note"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                            }
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
                                         <h3 class="panel-title"><i class="fa fa-eyedropper fa-fw"></i> Visual acuity</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="visualactivity">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Right eye</th>
                                        <th>Left eye</th>
                                        <th>Note</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]){ 
                                        foreach ($bodycontent["medicalassesment"] as $content) {
                                                if($content["visual_date"]!='01-01-1970'){

                                        ?>
                                    <tr>
                                        <td><?php echo($content["visual_date"]); ?></td>
                                        <td><?php echo($content["right_eye"]); ?></td>
                                        <td><?php echo($content["left_eye"]); ?></td>
                                        <td><?php echo($content["visual_remark"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                                }
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
          
         
     </div>
 </div>
 
 
 
 

<div id="medicalAssesmentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header" style="background:#fe7b34;color:#FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Assessment</h4>
      </div>
      <div class="modal-body custome-modal-popup-body">
       
		<div class="normal_text" style="">
			Through general medical assessment periodically we would like to keep some medical information like Blood pressure, Pulse Rate, oxygen Saturation level, Visual Acuity. This information will help you and your trainers to moderate your activity level as well as it will help you to give an ideal about your general medical condition, which will be helpful for your doctor for your further treatment. There are four health assessment tests through which we can assess your General Medical Condition.
			<ul style="">
				<li style="margin-bottom: 8px;"><b>Blood pressure: Blood pressure (BP)</b>, sometimes referred to as <b>arterial blood pressure</b>, is the pressure exerted by circulating blood upon the walls of blood vessels, and is one of the principal vital signs through which we can  assess the most basic body functions.</li>
				<li style="margin-bottom: 8px;"><b>Resting Pulse Rate or Heart Rate:</b> When you sit quietly, your heart slips into the slower, steady pace known as your resting heart rate. An increase in this rate over time may be a signal of heart trouble ahead. The usual range for resting heart rate is anywhere between 60 and 90 beats per minute. Above 90 is considered high.</li>
				<li style="margin-bottom: 8px;">
					<b>Visual Acuity:</b> Vision is the appreciation of differences in the outside world. Visual Acuity is the measurement of the vision obtained. It is the clarity or sharpness of vision. The measurement of visual acuity gives a clue towards the ocular pathology. Good visual acuity is very important when driving, because it helps people recognize landmarks, avoid obstacles, and read road signs.
					<table width="100%" border="1" bordercolor="#999999" cellpadding="2" cellspacing="0" style="border-collapse: collapse; margin-top: 8px;">
						<tr>
							<td width="50%"><b>Normal Visual Acuity</b></td>
							<td width="50%"><b>Further evaluation required</b></td>
						</tr>
						<tr>
							<td>6/6 and 6/9</td>
							<td>6/12, 6/18, 6/24, 6/36,6/60 &amp; &lt;6/60</td>
						</tr>
					</table>
				</li>
				<li><b>Oxygen Saturation level:</b> your body needs a certain level of oxygen circulating in the blood to cells and tissues. When this level of oxygen falls below a certain amount, hypoxemia occurs and you may experience shortness of breath. Though the pulse oximeter we measures the saturation of oxygen in your blood, the results are often used as an estimate of blood oxygen levels. Normal pulse oximeter readings range from 95 to 100 percent, under most circumstances. Values under 90 percent are considered low..</li>
			</ul>
		</div>
	   
      </div>
     
    </div>

  </div>
</div>