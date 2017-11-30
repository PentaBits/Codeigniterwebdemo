<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Contact form
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
                                <div class="panel-heading">Contact us</div>
                                <div class="panel-body">
                                    <div class="alert alert-danger validation-msg" style="display: none;">
                                         <button type="button" class="close valid-alert-close">&times;</button>
                                            <strong>*</strong> Indicates a mandatory fields.
                                    </div>
                                    <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             Enter a valid email address.
                                    </div>
                                    <div class="alert alert-danger captcha-err-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                         <div id="captchaerrrmsg"></div>
                                    </div>
                                    
                                    <form role="form"  id="frmcontactus" method="post">
                                        
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input class="form-control" placeholder="Your name" id="contpersonname" name="contpersonname" value="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input class="form-control" placeholder="Your email" id="contpersonemail" name="contpersonemail" value="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" placeholder="Message us..." id="contpersonemsg" name="contpersonemsg">
                                                
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                         <label id="captImg"><?php echo $bodycontent["captchaImg"]; ?></label>
                                         <a href="javascript:void(0);" class="refreshCaptcha" >
                                             <img src="<?php echo base_url().'application/assets/images/refresh.png'; ?>" alt="Refresh"/>
                                         </a>
                                        </div>  
                                        
                                        <div class="form-group">
                                            <input class="form-control input-sm " style="width: 200px;" placeholder="" id="captchadata" name="captchadata" value="">
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-primary" id="contctus">Send Us</button>
                                        <button type="button" class="btn btn-primary" id="prodcancel">Cancel</button>

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
                  <button type="button" class="btn btn-default mdclose-contactus" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>


