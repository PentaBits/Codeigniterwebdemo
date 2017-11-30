
<div id="page-wrapper">

     <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">
					Hexagonal Facilities <i class="fa fa-angle-right" aria-hidden="true"></i> General Fitness Assessment
				</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> General fitness assesment
                    </li>
                </ol>
				<p class="what-info-tag"><a href="javascript:;" data-toggle="modal" data-target="#fitnessassessmentendurance">Know about general fitness assesment</a> <i class="fa fa-question-circle" aria-hidden="true" style="font-size:20px;"></i></p>
            </div>
        </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Endurance Test</h3>
                     </div>
                     <div class="panel-body">
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Vo2 Max</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
									<table class="table table-bordered table-hover" id="vo2max" > 
										<thead>
												<tr>
													<th>Date</th>
													<th>Heart rate</th>
													<th>Duration</th>
													<th>METs</th>
													<th>Vo2max</th>
													<th>Rating</th>
													<th>Score</th>
												</tr>
											</thead>
											<tbody>
												<?php if($bodycontent["Vo2Max"]) {
													foreach ($bodycontent["Vo2Max"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_entry"]); ?></td>
													<td><?php echo($content["heart_rate"]); ?></td>
													<td><?php echo($content["duration"]); ?></td>
													<td><?php echo($content["mets"]); ?></td>
													<td><?php echo($content["vomax"]); ?></td>
													<td><?php echo($content["rating"]); ?></td>
													<td><?php echo($content["score"]); ?></td>
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
                                         <h3 class="panel-title"><i class="fa fa-info fa-fw"></i> Push-up test</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="pushup">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Repition</th>
                                        <th>Population(μ)</th>
                                        <th>Rating</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["pushuptest"]){ 
     foreach ($bodycontent["pushuptest"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                        <td><?php echo($content["repitions"]); ?></td>
                                        <td><?php echo($content["population_avg"]); ?></td>
                                        <td><?php echo($content["rating"]); ?></td>
                                        <td><?php echo($content["score"]); ?></td>
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
                                         <h3 class="panel-title"><i class="fa fa-heart fa-fw"></i> Sit-up test</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="situptest">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Repition</th>
                                        <th>Population(μ)</th>
                                        <th>Rating</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["situptest"]){ 
                                        foreach ($bodycontent["situptest"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                        <td><?php echo($content["repitions"]); ?></td>
                                        <td><?php echo($content["population_avg"]); ?></td>
                                        <td><?php echo($content["rating"]); ?></td>
                                        <td><?php echo($content["score"]); ?></td>
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
          
         
     </div>
 </div>
 
 
 
 <!------------>
 
<div id="fitnessassessmentendurance" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header" style="background:#fe7b34;color:#FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">General Fitness Assessment</h4>
      </div>
      <div class="modal-body custome-modal-popup-body">
       
				<div class="normal_text" style="">
					Strength, Endurance and Feasibility are the three main pliers of our physical fitness. Through   general Fitness Assessment we assess your Strength Endurance and flexibilities and rate your fitness level accordingly.  There are:<br /><br />
					<b>A. Endurance Test:</b><br /><br />
					<span style="margin-left: 5px;"><b>1. General Endurance Test:</b></span>
					<ul style="">
						<li style="margin-bottom: 8px;"><b>Vo2 max:</b> Vo2max is considered to be the gold standard by which one can measure his or her cardio respiratory fitness level. A person who is fit, in the cardio respiratory sense of the word “fit” , would have a higher VO2MAX than someone who is less fit. What is means is that you body is more able to absorb and use oxygen to generate energy for your muscle, and this will certainly give you an edge.</li>
					</ul>
					<span style="margin-left: 5px;"><b>2. Muscular Endurance Test:</b></span>
					<ul style="">
						<li style=""><b>Push up Test:</b> Push is test is used for upper body muscular endurance.</li>
						<li style=""><b>Sit up Test:</b> Sit up test evaluates abdominal and hip flexor muscular endurance.</li>
					</ul>
					<br />
					<b>B. Strength Test:</b><br /><br />
					<ul style="">
						<li style="margin-bottom: 8px;"><b>Minimum Muscular Strength Test:</b> It is commonly known as the <b>Kraus-Weber Test.</b>  This test, measure the level of strength and flexibility of certain key muscle groups below which the functioning of the whole body as a healthy individual seems to be endangered.</li>
						<li style="margin-bottom: 8px;"><b>One Repetition Maximum Test:</b> (1RM) is generally considered to be the best method of measuring strength. 1RM refers to the amount of weight you can lift one time and one time only. 1RM testing is a very important procedure as it helps to determine specific load settings for any given training routine. It also enables one to determine the efficiency of their training program and assess the progress they have made.</li>
					</ul>
					<br />
					<b>C. Flexibility Test:</b><br /><br />
					<ul style="">
						<li style="margin-bottom: 8px;"><b>Sit and Reach Test:</b> Evaluate hamstrings and lower back flexibility for adults.</li>
						<li style="margin-bottom: 8px;"><b>Zipper Stretch Test:</b> Measures shoulder flexibility.</li>
					</ul>
				</div>
	   
      </div>
     
    </div>

  </div>
</div>
 
 