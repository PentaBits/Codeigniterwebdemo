<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Employees
                    </li>
                </ol>  
                
            </div>
        </div>


        <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>demolist/addEdit" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add employee</a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Employee</h3>
                    </div>
		<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
<!--                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                                </div>-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="emplist">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Sex</th>
                                                    <th>Dob</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($bodycontent["employeelist"]) {
                                                    foreach ($bodycontent["employeelist"] as $content) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo($content["firstname"]); ?></td>
                                                            <td><?php echo($content["lastname"]); ?></td>
                                                            <td><?php echo($content["sex"]); ?></td>
                                                            <td><?php echo($content["dob"]); ?></td>
                                                            <td><?php echo($content["mobile"]); ?></td>
                                                            <td><?php echo($content["email"]); ?></td>
                                                            <td><?php echo($content["departmentname"]); ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>demolist/addEdit/id/<?php echo($content["id"]);?>" class="btn btn-warning btn-xs" role="button">Edit</a>
                                                                <button type="button" id="<?php echo($content["id"]);?>" class="btn btn-danger btn-xs delemp" data-toggle="modal" data-target="#delconfmodal">Del</button>
                                                            </td>
                                                            
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
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
<div id="delconfmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
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
</div>
        
        
        
        
        
    </div>
</div>



