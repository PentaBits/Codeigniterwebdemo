<style>
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Multiple image Uploader
                    </li>
                </ol>  
                
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-question-circle"></i>  <strong>Click "Choose multiple images"</strong> 
                            , a window will open for image file selection. Now, press Ctrl and select multiple images, 
                            <p>click the 'open' button at the bottom of this 'image window', click the upload button.
                            A message box on successfully uploaded images will appear. Now press the 'Okay' button and you will get the uploaded images in a list below.
                            </p>
                        </div>
                    </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="header-panel-info">
                    <button  class="btn btn-mantra imagelist"><i class="fa fa-arrow-down"></i>Show image list</button>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-md-4">
              
    </div>
    <div class="col-md-4">
        <form role="form" method="post" id="fileupldfrm" enctype="multipart/form-data" >
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                           <h3 class="panel-title"><i class="fa fa-upload fa-fw"></i> Multiple file upload</h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="alert alert-danger fileselct-msg" style="display: none;">
                             <button type="button" class="close fileselct-msg-close">&times;</button>
                             Select at least one file.
                            </div>
                            <div class="alert alert-danger upload-err-msg" style="display: none;">
                             <button type="button" class="close err-msg-close">&times;</button>
                             Error in upload.Try again.
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fileUpload btn btn-default">
                                <span>Choose multiple image from here.</span>
                                    <input type="file" class="upload"  multiple = "multiple" accept = "image/*" name="uploadfile[]"/>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name = "submit" value="Upload" class = "btn btn-primary center-block sbmtbtn" />
                            <button class = "btn btn-warning center-block prcbtn disabled" style="display:none;">Processing <i class="fa fa-spinner fa-spin"></i></button>
                        </div>
                        
                    </div>
            </form>  
    </div>
    <div class="col-md-4">
        
    </div>
</div> 
        
        
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="uplddt">
                    
                </div>
            </div>
            <div class="col-md-2"></div>
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
                  <button type="button" class="btn btn-default mdclose-fileuploader" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        <!--message modal--->
 <!--confirmation modal-->       
 <div id="removeconfmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-warning"></i> Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are your sure to remove this file ?</p>
        <input type="hidden" id="tempfileId" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default rmv-yes-file" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
<!--confirmation modal-->        
        
        
        
</div>
</div>
