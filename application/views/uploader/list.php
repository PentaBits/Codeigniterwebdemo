<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> CSV Data
                    </li>
                </ol>  
                
            </div>
        </div>


        <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>csvuploader" class="btn btn-mantra">
                        <span class="glyphicon glyphicon-arrow-left">                       
                        </span> Upload CSV
                    </a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Csv data</h3>
                    </div>
		<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="csvDatas">
                                            <thead>
                                                <tr>
                                                    <th>Change date</th>
                                                    <th>Change comment</th>
                                                    <th>Created date</th>
                                                    <th>NPU code</th>
                                                    <th>Short definition</th>
                                                    <th>System</th>
                                                    <th>Prefix</th>
                                                    <th>Component</th>
                                                    <th>Kind-of-property</th>
                                                    <th>Unit</th>
                                                    <th>Type</th>
                                                    <th>Scale type</th>
                                                    <th>Post type</th>
                                                </tr>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--One Repeatation Max Test-->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
<!--<div id="delconfmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

     Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are your sure to delete ?</p>
        <input type="hidden" id="tempempid" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default del-yes" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>-->
        
        
        
        
        
    </div>
</div>



