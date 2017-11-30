<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Csv Uploader
                    </li>
                </ol>  
                
            </div>
        </div>
        
         <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>csvuploader/listLoad" class="btn btn-mantra">
                        <span class="glyphicon glyphicon-arrow-right">                       
                        </span> Previous CSV Data List
                    </a>
                </div>
            </div>
        </div>
        
        
        
        
        
        <div class="row">
            <div class="col-lg-12">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3>Download sample csv</h3>
                        <a href="<?php echo base_url ()?>csvuploader/DownloadCSV/data.csv" class="btn btn-primary">Download data.csv</a>
                    </div>
                        <div class="col-md-4">
                            
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">CSV Uploader</h3>
                                </div>
                                <div class="panel-body">
                                     <div>
                                        <font style="color: red;"> <?php echo ($bodycontent["msg"]); ?></font>
                                    </div>
                                    <form role="form" enctype="multipart/form-data" id="csvfrm"  method="post" action="<?php echo(base_url()); ?>csvuploader/uploadcsv">
                                        
                                        
                                        <div class="form-group">
                                            <label class="btn btn-warning" for="my-file-selector">
                                                <input id="my-file-selector" type="file" style="display:none;" 
                                                       name="csvpld" id="csvpld" accept=".csv"  onchange="$('#upload-file-info').html(this.files[0].name)"/>
                                                Choose CSV
                                            </label>
                                             <span class='label  label-info ' id="upload-file-info"></span> 
                                             
                                        </div>
                                          
                                         

                                        <button type="submit" class="btn btn-primary csvUplad" id="">Uplaod</button>
<!--                                        <button type="button" class="btn btn-primary" id="">Cancel</button>-->
                                        
                                        <div id="loader" style="display: none;">
                                            <img src="<?php echo(base_url()) ?>application/assets/images/plswait.gif" alt="Please wait"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-4"></div>
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

