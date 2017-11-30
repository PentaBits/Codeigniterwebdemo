<!--<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imagefile1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("preview").src = oFREvent.target.result;
        };
    };

</script>-->
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
                        <i class="fa fa-edit"></i> Body Composition
                    </li>
                </ol>
            </div>
        </div>

        <!-- /.row -->
<form  method="post" enctype="multipart/form-data" id="frmbodycmp">
        <div class="row body-cal-container">
            <div class="col-lg-5 col-md-6 col-sm-12">
			
                <div class="panel panel-default custom-panel-body">
					<div class="panel-body change-image-body-container">
                        <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/No_Image_Available.png" class="img-rounded port-folio-preview" id="imgpreview" alt="Unknown upload error" >
                    </div>
                     <div class="form-group">
                             <label  class="custom-file-input">
                                <input type="file" name="imgInp" id="imgInp" accept="image/*" onchange=""/>
                             </label>
                     </div>
                </div>
			
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 ">
			 
                <div class="panel panel-default custom-panel-body">
                    <div class="panel-body ">
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label " for="Date">Date*</label>
                                <input type="text" class="form-control custome-input" id="dateofentry" name="dateofentry" placeholder="" readonly="" style="cursor:pointer;">
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                            <label class="control-label " for="weight">Weight (in Kgs.)* </label>
                            <input type="text" class="form-control decimal custome-input" id="weight" name="weight" placeholder="Enter weight">
                        </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="Waist">Waist (Navel - in Inches)*</label>
								<input type="text" class="form-control decimal custome-input" id="waist-navel" name="waist-navel" placeholder="Enter waist navel size">
                            </div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="Waist">Waist (in Inches)*</label>
								<input type="text" class="form-control decimal custome-input" id="Waist" name="waist" placeholder="Enter waist">
                            </div>
						</div>
						
						<div class="col-md-6">
							 <div class="form-group">
                                <label class="control-label" for="hip">Hip (in Inches)*</label>
                                <input type="text" class="form-control decimal custome-input" id="hip" name="hip" placeholder="Enter hip">
                                
                            </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn custome-button " id="getvalue">Calculate</a>
						</div>
					</div>

					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="bodyfat">Body fat(%)</label>
                                <input type="text" class="form-control custome-input" id="bodyfat" name="bodyfatPercentage" placeholder="" readonly="">
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="bodyfatmass">Body fat mass</label>
                                <input type="text" class="form-control custome-input" id="bodyfatmass" placeholder="" name="bodyfatmass" readonly="">
                            </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="bodyleanmass">Lean body mass</label>
                               <input type="text" class="form-control custome-input" id="bodyleanmass" placeholder="" readonly="" name="bodyleanmass">
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                                <label class="control-label" for="waistcrmfrnc">Waist circumference </label>
                                <input type="text" class="form-control custome-input" id="waistcrmfrnc" placeholder="" readonly="" name="waistcircumferenceasses">
                                    <input type="hidden" id="waistcrmfrncvalue" value="" name="waistcircumferencevalue"/>
                             </div>
                        </div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							 <div class="form-group">
                                <label class="control-label" for="waisthipratio">Waist hip ratio </label>
                                <input type="text" class="form-control custome-input" id="waisthipratio" placeholder="" readonly="" name="waisthipratioasses">
                                    <input type="hidden" id="waisthipratiovalue" value="" name="waisthipratiovalue"/>
                            </div> 
						</div>
						<div class="col-md-6">
						
						</div>
					</div>


					<!--

					

					
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="Date">Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="dateofentry" name="dateofentry" placeholder="" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="weight">Weight</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control decimal" id="weight" name="weight" placeholder="Enter weight">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="Waist">Waist</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control decimal" id="Waist" name="waist" placeholder="Enter waist">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="hip">Hip</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control decimal" id="hip" name="hip" placeholder="Enter hip">
                                </div>
                            </div>
                           
                            <a href="javascript:void(0);" class="btn btn-primary" id="getvalue">Get value</a>
                               
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="bodyfat">Bodyfat(%)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="bodyfat" name="bodyfatPercentage" placeholder="" readonly="">
                                    
                                </div>
                            </div>
                           
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="bodyfatmass">Bodyfat mass</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="bodyfatmass" placeholder="" name="bodyfatmass" readonly="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="bodyleanmass">Bodylean mass</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="bodyleanmass" placeholder="" readonly="" name="bodyleanmass">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="waistcrmfrnc">Waist circumference </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="waistcrmfrnc" placeholder="" readonly="" name="waistcircumferenceasses">
                                    <input type="hidden" id="waistcrmfrncvalue" value="" name="waistcircumferencevalue"/>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="waisthipratio">Waist hip ratio </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="waisthipratio" placeholder="" readonly="" name="waisthipratioasses">
                                    <input type="hidden" id="waisthipratiovalue" value="" name="waisthipratiovalue"/>
                                </div>
                            </div>  -->
                            
                    <!--message area-->
                    <div class="alert alert-danger custom-error" role="alert" style="display:none;" id="msgdiv">
                    <div id="msgText"></div>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" id="errorclose" style="float: right;margin-top: -19px;cursor: pointer;"></span>
                    </div>

                    <div class="alert alert-success custom-success" role="alert" style="display:none;" id="msgdivsuccess">
                    <div id="successmsgText"></div>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" id="successclose" style="float: right;margin-top: -19px;cursor: pointer;"></span>
                    </div>
                <!--message area--> 
                            
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn custome-button" id="save-data">Save Your Data</button>
                                <p class="btn custome-button save-loader" id="save-loader" style="display:none;">Please wait ...</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
				
			
				
            </div>
        </div>
     </form>
	 
	 
        <!-- /.row -->
    </div>
</div>