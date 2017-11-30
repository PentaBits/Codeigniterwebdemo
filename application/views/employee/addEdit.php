<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Employees add edit
                    </li>
                </ol>  
                
            </div>
        </div>
        
        
        
        
        
        
        
        <div class="row">
            <div class="col-lg-12">
                
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            
                            <div class="panel panel-warning">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    <div class="alert alert-danger validation-msg" style="display: none;">
                                         <button type="button" class="close valid-alert-close">&times;</button>
                                            <strong>*</strong> Indicates a mandatory fields.
                                    </div>
                                    <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             Enter a valid email address.
                                    </div>
                                    <div class="alert alert-danger uploaderror-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                         <div id="fileerrmsg"></div>
                                    </div>
                                    
                                    <form role="form" enctype="multipart/form-data" id="frmDemo" method="post">
                                        <input type="hidden" id="hdemployeeid" name="hdemployeeid" value="<?php echo($bodycontent["empData"]["id"]);?>"/>
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input class="form-control" placeholder="First name" id="firstname" name="firstname" value="<?php echo($bodycontent["empData"]["firstname"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input class="form-control" placeholder="Last name" id="lastname" name="lastname" value="<?php echo($bodycontent["empData"]["lastname"]);?>" >
                                        </div>
                                        

                                        <div class="form-group">
                                            <label>Sex</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsex" id="optmale" value="M" <?php if($bodycontent["empData"]["sex"]=="M"){echo("checked");} ?> >Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsex" id="optfemale" value="F" <?php if($bodycontent["empData"]["sex"]=="F"){echo("checked");} ?>>Female
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input type="text" class="form-control custome-input" id="dateofbirth" 
                                                   name="dateofbirth" placeholder="" readonly="" style="cursor:pointer;" 
                                                   placeholder="Date of birth" value="<?php echo($bodycontent["empData"]["dob"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile *</label>
                                            <input class="form-control" placeholder="Mobile" value="<?php echo($bodycontent["empData"]["mobile"]);?>" id="empmobile" name="empmobile">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Email *</label>
                                            <input class="form-control" placeholder="piash@gmail.com" id="empemail" value="<?php echo($bodycontent["empData"]["email"]);?>" name="empemail">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" id="department" name="department">
                                                <option>--Select--</option>
                                                 
                                                <?php if($bodycontent["department"]){?>
                                                <?php foreach ($bodycontent["department"] as $department){?>
                                                        
                                                <option value="<?php echo($department["id"]);?>" <?php if($bodycontent["empData"]["departmentid"]==$department["id"]){echo("selected");} ?>> <?php echo($department["departmentname"]); ?></option>
                                                <?php }
                                                
                                                }?> 
                                            </select>
                                        </div>
                                        <div class="change-image-body-container-small">
                                            <?php if($bodycontent["empData"]["image"]==""){?>
                                            <img src="<?php echo(base_url()) ?>application/assets/images/demoimages/noimage.png" 
                                                 class="img-rounded port-folio-preview" id="empimagepreview" alt="Unknown upload error" >
                                            <?php }  else {?>
                                                <img src="<?php echo(base_url()) ?>application/assets/images/demoimages/<?php echo($bodycontent["empData"]["image"]); ?>" 
                                                 class="img-rounded port-folio-preview" id="empimagepreview" alt="Unknown upload error" >
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <span style="font-size: 14px; color: red;float: right;">*[Allowed type 'jpeg', 'jpg', 'png', 'gif']</span>
                                              <label  class="custom-file-input">
                                                <input type="file" name="imgEmp" id="imgEmp" accept="image/*" onchange=""/>
                                             </label>
                                            
                                        </div>

                                        

                                        <button type="submit" class="btn btn-primary" id="empSave">Save</button>
                                        <button type="button" class="btn btn-primary" id="empCancel">Cancel</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3"></div>
                </div>
                    
            </div>
        </div>
        
        <!--message modal --->
        <div class="modal fade" id="msgdivsuccess" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close mdclose" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <div id="successmsgText"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default mdclose" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>


