<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Product category
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
                                <div class="panel-heading">Add/Edit</div>
                                <div class="panel-body">
                                    <div class="alert alert-danger validation-msg" style="display: none;">
                                         <button type="button" class="close valid-alert-close">&times;</button>
                                            <strong>*</strong> Indicates a mandatory fields.
                                    </div>
<!--                                    <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             Enter a valid email address.
                                    </div>-->
<!--                                    <div class="alert alert-danger uploaderror-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                         <div id="fileerrmsg"></div>
                                    </div>-->
                                    
                                    <form role="form"  id="frmcatg" method="post">
                                        <input type="hidden" id="hdcatgid" name="hdcatgid" 
                                               value="<?php echo($bodycontent["prodctg"]["category_id"]);?>"/>
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <input class="form-control" placeholder="Category" id="catg" name="catg" 
                                                   value="<?php echo($bodycontent["prodctg"]["category_name"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Desc</label>
                                            <textarea class="form-control" placeholder="Category Description" id="catgdesc" name="catgdesc"><?php echo($bodycontent["prodctg"]["category_desc"]);?>
                                            </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="catgsave">Save</button>
                                        <button type="button" class="btn btn-primary" id="catgcancel">Cancel</button>

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
                  <button type="button" class="btn btn-default mdclose-prodcatg" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>


