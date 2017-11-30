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
                        <i class="fa fa-edit"></i> Body Fat %
                    </li>
                </ol>
				<p class="what-info-tag"><a href="javascript:;" data-toggle="modal" data-target="#anthroBodyfatModal">Know about anthropometry assessment</a> <i class="fa fa-question-circle" aria-hidden="true" style="font-size:20px;"></i></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-spin fa-fw"></i>Anthropometry : Body fat percentage</h3>
                    </div>
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
							<div id="fatPerTransformation">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
								  <!-- Indicators 
								  <ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								  </ol>-->

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner">
								  
								  <?php 
								  
									$dirname = "http://mantrahealthzone.co.in/admin/mem_gal/";
								  
								  $i = 0;
								  if($bodycontent["bodyfatpercentage"])
									{
										foreach($bodycontent["bodyfatpercentage"] as $content){
										$i++;	
										
										if($i==1)
										{
											$class = "active";
										}
										else
										{
											$class="";
										}
									?>
									<div class="item <?php echo $class;?>">
										<div class="fPTransformatoin">
												<div class="fpImageView">
													
													<?php if($content['entry_from']=="slf"){
														$uploaded_by ="Self";
															if($content['image_name']==""){ ?>
																<img src="<?php echo base_url();?>application/assets/images/portfolioimages/no-image-available.jpg" />
													<?php	}
															else{ ?>
																<img src="<?php echo base_url();?>application/assets/images/portfolioimages/<?php echo $content['image_name']; ?>" />
													<?php		}
													?>
														
													<?php }
														else{
															$uploaded_by ="Admin";
															if($content['image_name']==""){ 
														?>
															<img src="<?php echo $dirname ;?>no-image-available.jpg" />
														
														<?php }else{ ?>
															<img src="<?php echo $dirname;?><?php echo $content['image_name']; ?>" />
														<?php } } ?>
												
													
												</div>
												<div class="fpDataView">
											
													<table style="padding:20px;">
														<tr class="even">
															<td>Date</td>
															<td><?php echo date('d-m-Y',strtotime($content['date_of_collection'])); ?></td>
														</tr>
														<tr class="odd">
															<td>Weight</td>
															<td><?php echo $content['weight']; ?></td>
														</tr>
														<tr class="even">
															<td>Lean Body Mass</td>
															<td><?php echo $content['lean_body_mass']; ?></td>
														</tr>
														<tr class="odd">
															<td>Fat%</td>
															<td><?php echo $content['fat_per']; ?></td>
														</tr>
													</table>
													<p id="uploaded_by">Uploaded by <?php echo $uploaded_by; ?><p>
												</div>
											</div>
									</div>
									<?php } } ?>

									
								   
								  </div>

								  <!-- Left and right controls -->
								  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
							</div>
																	
									
									
									
                               
                        </div><!-- END of col-lg-12-->
					</div>
            </div>
        </div>
    </div>
	
	
	
	<!-----
	
	<div class="col-lg-12">
		<div class="slider1">
		
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text view</div>
			</div>
		</div>
		  
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
			
		</div>
	</div>
	-->
	
</div>




<div id="anthroBodyfatModal" class="modal fade" role="dialog">
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

