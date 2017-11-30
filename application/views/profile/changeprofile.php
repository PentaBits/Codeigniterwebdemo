<div id="page-wrapper">

            <div class="container-fluid">
                
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header page-label"> Profile update</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Profile update
                            </li>
                        </ol>
                    </div>
                </div>
			
			<div class="row">
             <form name="frmPersonalia" id="frmPersonalia" method="post">
               <fieldset>
                    <legend class="page-label">Personal Information</legend>   
				<div class="row">
					<div class="col-md-6">
						 <div class="form-group">
						  <label for="membername">Name*</label>
						  <input type="text" class="form-control custome-input" id="membername" placeholder="Name" name="memberName" id="memberName" value="<?php echo($bodycontent["CUS_NAME"]) ;?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="dateofbirth">DOB* </label>
						  <input type="text" class="form-control custome-input" id="dateofbirth" name="dateofbirth" placeholder="Date of birth"  value="<?php echo($bodycontent["CUS_DOB"]); ?>" readonly>
						</div>  
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="registermobilenumber">Mobile</label>
						  <input type="text" class="form-control custome-input"  placeholder="Moblie" name="memberRegisterMobile" id="memberRegisterMobile" value="<?php echo($bodycontent["CUS_PHONE"]) ;?>" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="alternatemobilenumber">Alternative Mobile</label>
							<input type="text" class="form-control custome-input" name="alternatemobilenumber" id="alternatemobilenumber" value="<?php echo($bodycontent["CUS_PHONE2"]) ;?>" placeholder="Moblie" >
						</div>  
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="Email">Email address*</label>
						  <input type="email" class="form-control custome-input" id="Email" name="Email" placeholder="Email" value="<?php echo($bodycontent["CUS_EMAIL"]) ;?>">
						</div>   
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="pinnumber">Pin*</label>
						  <input type="text" class="form-control custome-input" id="pinnumber" name="pinnumber" placeholder="Pin" value="<?php echo($bodycontent["CUS_PIN"]) ;?>" >
						</div>
					</div>
				</div>
               
                
                
                    
                
                    
                <div class="form-group">
                  <label for="address">Address*</label>
                  <textarea class="form-control custome-input" rows="3" id="address" name="memberAddress" id="memberAddress"><?php echo($bodycontent["CUS_ADRESS"]) ;?></textarea>
                </div>    
                    
               
                
                

               <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="membersex" id="membersex" value="M" <?php if($bodycontent["CUS_SEX"]=="M"){echo("Checked");}else{echo("");} ?> > Male
                    </label>
                   <label class="radio-inline">
                     <input type="radio" name="membersex" id="membersex" value="F" <?php if($bodycontent["CUS_SEX"]=="F"){echo("Checked");}else{echo("");} ?>> Female
                   </label>
                </div> 
                   
                <div class="form-group">
                    <label for="Email">Blood group*</label>
                    <select class="form-control custome-input" name="bloodgroup">
                        <option value="">Select</option>
                        
                        <?php foreach ($header["bloodgroup"] as $rows) {?>
                                
                        <option value="<?php echo($rows["bld_group_code"]); ?>" <?php echo($rows["bld_group_code"]==$bodycontent["CUS_BLOOD_GRP"]?"selected":"") ?>>
                            <?php echo($rows["bld_group_code"]); ?>
                        </option> 
                        
                        <?php } ?>
                        
                    </select>  
                </div>         
                        
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
                    
                <button type="submit" class="btn btn-default custome-button">Update</button>
               </fieldset>
            </form>

                
                    <fieldset>
                        <legend class="page-label page-label-margin">Accounts</legend>  
                        
                        <div class="form-group">
                        <label for="mantrapackage">Packeage</label>
                        <input type="text" class="form-control custome-input" id="mantrapackage" placeholder="Currentpackages" value="<?php echo($bodycontent["CARD_DESC"]); ?>" disabled="" >
                        </div>    
                    
                        <div class="form-group">
                        <label for="registrationdate">Date of registration</label>
                        <input type="text" class="form-control custome-input" id="registrationdate" placeholder="Date of registration" disabled=""  value="<?php echo($bodycontent["REGISTRATION_DT"]);?>">
                        </div> 
                    </fieldset>
              
                
                <fieldset>
                     <div class="alert alert-danger" role="alert" style="display:none;" id="msgdivImage">
						<div id="ImagemsgText"></div>
						<span class="glyphicon glyphicon-remove" aria-hidden="true" id="errorImageclose" style="float: right;margin-top: -10px;cursor: pointer;"></span>
					 </div>
					 
                        <legend class="page-label page-label-margin">Profile picture</legend>  
                        <?php 
                        if($bodycontent["image_name"]==""){
                        $images="noimage.png";
                        }else{
                           $images=$bodycontent["image_name"]; 
                        }
                        ?>
                        
                        <div class="form-group" style="position: relative">
                        <label for="profilepic"></label>
                        <img src="<?php echo base_url(); ?>application/assets/images/Profilepicture/<?php echo($images);?>" class="img-rounded profileimg" alt="<?php echo($bodycontent["CUS_NAME"]) ;?>" width="255" height="255" id="profilepic" name="profilepic">    
                        <img src="<?php echo base_url(); ?>application/assets/images/imagefileloading.gif" style="position: absolute;top:0;left:17px; display: none;" id="loadergif"/>
                        </div>
                </fieldset>
                 
                
                <form enctype="multipart/form-data" accept-charset="utf-8" name="formnamememberImg" id="formnamememberImg"  method="post" action="">
                    <fieldset>
                        <input type="hidden" name="filepost" value="1"/>
                        <div class="form-group">
                             <label  class="custom-file-input" style="width:auto;">
                                <input type="file" name="imagefile" id="imagefile" accept="image/*" onchange=""/>
                             </label>
                        </div>
                    </fieldset>
                </form>
                
              
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>