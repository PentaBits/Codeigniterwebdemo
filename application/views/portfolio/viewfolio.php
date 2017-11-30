<div id="page-wrapper">

    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> Portfolio</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> View folio
                    </li>
                </ol>
            </div>
        </div>

       <!-- /.row -->
<?php if($bodycontent["bodycomp"]){
    $i=2;
     foreach ($bodycontent["bodycomp"] as $content) {
         
     
    
    ?>
          <?php if($i%2==0){?>
                    <div class="row portfolio-view-container">
              <?php } ?>
                    
                    <?php if($i%2==0){?>
                    <div class="col-md-6 text-center">
						<div class="port-folio-block">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <button style="float:left;margin-top:-7px;" id="<?php echo($content["tran_id"]); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="confirmation" data-btn-ok-label="Yes" data-btn-ok-class="btn-success" data-btn-cancel-label="No" data-btn-cancel-class="btn-danger" data-title="" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                <h1 class="panel-title"><?php echo($content["date_of_entry"]); ?></h1>
							</div>
                            <div class="panel-body">
                                <?php 
                                    $images_data ="";
									$port_folio_img_cls ="";
                                    if($content["image_name"]!=""){
                                        $images_data = $content["image_name"]; 
                                    }else{
                                        $images_data = "No_Image_Available.png";
                                    }
									
									$image_width = $content['image_width'];
									$image_height = $content['image_height'];
									
									if($image_width>$image_height){
										$port_folio_img_cls = 'folio-block-img-width' ;
									}
									elseif($image_height>$image_width){
										$port_folio_img_cls = 'folio-block-img-height' ;
									}
									else{
										$port_folio_img_cls ="folio-block-img-eq";
									}
								
                              
                                ?>
                                
                                <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/<?php echo($images_data); ?>" class="img-rounded <?php echo $port_folio_img_cls;?>" id="imgpreview" alt="Cinque Terre" >
								
                            </div>
                            <div class="panel-footer">
							<!--
                                Weight&nbsp;<span class="label label-warning"><?php echo($content["weight"]); ?></span>
                                Waist&nbsp;<span class="label label-warning"><?php echo($content["waist"]); ?></span>
                                Hip&nbsp;<span class="label label-warning"><?php echo($content["hip"]); ?></span>
                                <br>
                                BF%&nbsp;<span class="label label-warning"><?php echo($content["fat_per"]); ?></span>
                                BFM&nbsp;<span class="label label-warning"><?php echo($content["fat_mass"]); ?></span>
                                BLM&nbsp;<span class="label label-warning"><?php echo($content["lean_body_mass"]); ?></span>
                                WCF&nbsp;<span class="label label-warning"><?php echo($content["waist_remarks"]); ?></span>
                                WHR&nbsp;<span class="label label-warning"><?php echo($content["waist_hip_remarks"]); ?></span> -->
							
							 <ul class="nav nav-pills">
									
								<li><a href="javascript:void(0);" class="btn btn-primary">Weight <span class="badge"><?php echo($content["weight"]); ?></span></a></li>
								<li><a href="javascript:void(0);" class="btn btn-primary">Waist <span class="badge"><?php echo($content["waist"]); ?></span></a></li>
								<li><a href="javascript:void(0);" class="btn btn-primary">Hip <span class="badge"><?php echo($content["hip"]); ?></span></a></li>
								<li><a href="javascript:void(0);" class="btn btn-primary">Result <span class="badge"><span class="glyphicon glyphicon-hand-down"></span></a></li>
								
							</ul>
							<ul class="nav result-data nav-pills">
									<li><a href="javascript:void(0);" class="">BF% <span class="badge"><?php echo($content["fat_per"]); ?></span></a></li>
									<li><a href="javascript:void(0);" class="">BFM <span class="badge"><?php echo($content["fat_mass"]); ?></span></a></li>
									<li><a href="javascript:void(0);" class="">LBM <span class="badge"><?php echo($content["lean_body_mass"]); ?></span></a></li>
									<li><a href="javascript:void(0);" class="">WC <span class="badge"><?php echo($content["waist_remarks"]); ?></span></a></li>
									<li><a href="javascript:void(0);" class="">WHR <span class="badge"><?php echo($content["waist_hip_remarks"]); ?></span></a></li>
									<li>
										<div class="btn-group dropup">
										  <button class="btn btn-custom btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Abbreviation <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">
											<li class=""><a href="javascript:void(0);">BF% :Body Fat %</a></li>
											<li class=""><a href="javascript:void(0);">BFM : Body Fat Mass</a></li>
											<li class=""><a href="javascript:void(0);">LBM : Lean Body Mass</a></li>
											<li class=""><a href="javascript:void(0);">WC  : Waist Circumference</a></li>
											<li class=""><a href="javascript:void(0);">WHR : Waist Hip Ratio</a></li>
										  </ul>
										</div>
									</li>
							</ul>
								
							</div>
                        </div>
					  </div>
                    </div>
                    <?php }else {?>
                    
                    <div class="col-md-6  text-center">
                       <div class="panel panel-info">
                            <div class="panel-heading">
                                <button style="float:left;margin-top:-7px;" id="<?php echo($content["tran_id"]); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="confirmation" data-btn-ok-label="Yes" data-btn-ok-class="btn-success" data-btn-cancel-label="No" data-btn-cancel-class="btn-danger" data-title="" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                <h1 class="panel-title"><?php echo($content["date_of_entry"]); ?></h1>
                            </div>
                            <div class="panel-body">
                               <?php 
                                    $images_data ="";
									$port_folio_img_cls ="";
                                    if($content["image_name"]!=""){
                                        $images_data = $content["image_name"]; 
                                    }else{
                                        $images_data = "No_Image_Available.png";
                                    }
									
									$image_width = $content['image_width'];
									$image_height = $content['image_height'];
									
									if($image_width>$image_height){
										$port_folio_img_cls = 'folio-block-img-width' ;
									}
									elseif($image_height>$image_width){
										$port_folio_img_cls = 'folio-block-img-height' ;
									}
									else{
										$port_folio_img_cls ="folio-block-img-eq";
									}
								
                                ?>
                               
                                <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/<?php echo($images_data); ?>" class="img-rounded <?php echo $port_folio_img_cls;?>" id="imgpreview" alt="Cinque Terre" >
                            </div>
                             <div class="panel-footer">
							 
							<!-- 
                                Weight&nbsp;<span class="label label-warning"><?php echo($content["weight"]); ?></span>
                                Waist&nbsp;<span class="label label-warning"><?php echo($content["waist"]); ?></span>
                                Hip&nbsp;<span class="label label-warning"><?php echo($content["hip"]); ?></span>
								<br>
                                BF% &nbsp;<span class="label label-warning"><?php echo($content["fat_per"]); ?></span>
                                BFM &nbsp;<span class="label label-warning"><?php echo($content["fat_mass"]); ?></span>
                                BLM &nbsp;<span class="label label-warning"><?php echo($content["lean_body_mass"]); ?></span>
                                WCF &nbsp;<span class="label label-warning"><?php echo($content["waist_remarks"]); ?></span>
                                WHR &nbsp;<span class="label label-warning"><?php echo($content["waist_hip_remarks"]); ?></span> -->
								
								
							 <ul class="nav nav-pills">
								<li><a href="#" class="btn btn-primary">Weight <span class="badge"><?php echo($content["weight"]); ?></span></a></li>
								<li><a href="#" class="btn btn-primary">Waist <span class="badge"><?php echo($content["waist"]); ?></span></a></li>
								<li><a href="#" class="btn btn-primary">Hip <span class="badge"><?php echo($content["hip"]); ?></span></a></li>
								<li><a href="#" class="btn btn-primary">Result <span class="badge"><span class="glyphicon glyphicon-hand-down"></span></a></li>
								
							</ul>
								 <ul class="nav result-data nav-pills">
									<li><a href="#" class="">BF% <span class="badge"><?php echo($content["fat_per"]); ?></span></a></li>
									<li><a href="#" class="">BFM <span class="badge"><?php echo($content["fat_mass"]); ?></span></a></li>
									<li><a href="#" class="">LBM <span class="badge"><?php echo($content["lean_body_mass"]); ?></span></a></li>
									<li><a href="#" class="">WC <span class="badge"><?php echo($content["waist_remarks"]); ?></span></a></li>
									<li><a href="#" class="">WHR <span class="badge"><?php echo($content["waist_hip_remarks"]); ?></span></a></li>
									<li>
										<div class="btn-group dropup">
										  <button class="btn btn-custom btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Abbreviation <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">
											<li class=""><a href="javascript:void(0);">BF% :Body Fat %</a></li>
											<li class=""><a href="javascript:void(0);">BFM : Body Fat Mass</a></li>
											<li class=""><a href="javascript:void(0);">LBM : Lean Body Mass</a></li>
											<li class=""><a href="javascript:void(0);">WC  : Waist Circumference</a></li>
											<li class=""><a href="javascript:void(0);">WHR : Waist Hip Ratio</a></li>
										  </ul>
										</div>
									</li>
								</ul>
							
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                        
                <?php if($i%2!=0){?>         
                </div>
                <?php }?>
          
          <!-- /.row -->
          
          <?php 
          $i=$i+1;
          }
     }
     ?>
    </div>
</div>
