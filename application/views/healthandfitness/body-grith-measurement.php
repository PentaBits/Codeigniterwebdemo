<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> 
					Hexagonal Facilities <i class="fa fa-angle-right" aria-hidden="true"></i> Anthropometric Assessment
				</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Body Grith Measurement
                    </li>
                </ol>
				<p class="what-info-tag"><a href="javascript:;" data-toggle="modal" data-target="#anthroBodyGirthModal">Know about anthropometry assessment</a> <i class="fa fa-question-circle" aria-hidden="true" style="font-size:20px;"></i></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-spin fa-fw"></i>Anthropometry : Body Grith Measurement</h3>
                     </div>
					 
                    <div class="panel-body">
						<div class="col-lg-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Body Grith Measurement</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="bodygirthmeasurement" > 
										<thead>
											<tr>
												<th title="">Date</th>
												<th title="Neck">Neck</th>
												<th title="Chest">Chest</th>
												<th title="Chest Expansion">Chest Exp</th>
												<th title="Shoulder Length">Shoulder Length</th>
												<th title="Hip">Hip</th>
												<th title="Thigh">Thigh</th>
												<th title="Calf">Calf</th>
												<th title="Biceps - Flex">Bi Flex</th>
												<th title="Biceps - Extension">Bi Ext</th>
												<th title="Upper Abdomen">U Abd</th>
												<th title="Middle Abdomen">M Abd</th>
												<th title="Lower Abdomen">L Abd</th>
											</tr>
										</thead>
											<tbody>
												<?php if($bodycontent["bodygrithMeasurement"]) {
													foreach ($bodycontent["bodygrithMeasurement"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td title="Neck"><?php echo($content["neck"]); ?></td>
													<td title="Chest"><?php echo($content["chest"]); ?></td>
													<td title="Chest Expansion"><?php echo($content["chest_expansion"]); ?></td>
													<td title="Shoulder Length"><?php echo($content["shoulder_length"]); ?></td>
													<td title="Hip"><?php echo($content["hip"]); ?></td>
													<td title="Thigh"><?php echo($content["thigh"]); ?></td>
													<td title="Calf"><?php echo($content["calf"]); ?></td>
													<td title="Biceps - Flex"><?php echo($content["biceps_fles"]); ?></td>
													<td title="Biceps - Extension"><?php echo($content["biceps_extn"]); ?></td>
													<td title="Upper Abdomen"><?php echo($content["upper_abd"]); ?></td>
													<td title="Middle Abdomen"><?php echo($content["mid_abd"]); ?></td>
													<td title="Lower Abdomen"><?php echo($content["low_abd"]); ?></td>
												</tr>
												<?php 
												}
												}?>
											</tbody>
									</table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END of col-lg-12-->
					</div>
            </div>
        </div>
    </div>
</div>



<div id="anthroBodyGirthModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header" style="background:#fe7b34;color:#FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Anthropometry Assessment</h4>
      </div>
      <div class="modal-body custome-modal-popup-body">
       
			<div class="normal_text" style="">
				Our Body is composed of lean body mass (muscle and bone) and total body fat. Body Composition testing is the determination of the fat and lean mass compartments of the human body through various methods. In order to determined and accomplish fitness goals trainers and nutritionist need body composition information (Fat%, Lean Body Mass %, Hip &amp; Waist Ratio, BMI )  for preparation of ideal training and nutritional plan.
				<ul style="">
					<li style=""><b>Body Fat %:</b> Weight machine only measure over all weight consisting weight of muscles, fat and bones. It does not differentiate weight of muscle, fat and bones individually. With body fat % calculation we can able to know exactly how much extra fat we have in our body.</li>
					<li style=""><b>Waist Circumference:</b> Evaluating fat in the abdominal region is important in determining an individual’s health risk.  Fat in the abdominal region, known as visceral fat, is associated with greater risk of Type 2 diabetes, hypertension, cardiovascular disease and dyslipidemia. Standards are as follows: Men: no greater than 40 inches, Women: no greater than  34.6 inches. Post-menopause women: no greater than  43.3 inches.</li>
					<li style=""><b>Waist hip ratio:</b> It's not only the amount of body fat you have, but also where in your body the fat is stored that impacts on your health. Adults who store most of their body fat around their waists have an increased risk of high blood pressure, type 2 diabetes, heart disease and stroke compared with those who have the same amount of body fat stored around their hips and thighs. Measuring your waist-to-hip ratio is an easy way to see how much weight you are carrying around your abdomen as opposed to around your hips. <b>It is designed for people aged 18 years and older.</b> A healthy waist hip ratio for women is <b>0.8</b> or lower. A healthy ratio for men is <b>1.0</b> or lower. The National Institute of Diabetes, Digestive and Kidney Diseases (NIDDK) states that women with waist–hip ratios of more than 0.8, and men with more than 1.0, are at increased health risk because of their fat distribution.</li>
				</ul>
			</div>
	   
      </div>
     
    </div>

  </div>
</div>

