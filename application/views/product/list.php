
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


        <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>product/addEdit" class="btn btn-mantra">
                        <span class="glyphicon glyphicon-plus"></span> Add product</a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-asterisk fa-fw"></i> Product </h3>
                    </div>
		<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
<!--                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                                </div>-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="productlist">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Unit</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($bodycontent["product"]) {
                                                    foreach ($bodycontent["product"] as $content) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo($content["product_name"]); ?></td>
                                                            <td><?php echo($content["product_desc"]); ?></td>
                                                            <td><?php echo($content["category_name"]); ?></td>
                                                            <td><?php echo($content["uom"]); ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>product/addEdit/id/<?php echo($content["product_id"]);?>" class="btn btn-warning btn-xs" role="button">Edit</a>
                                                                <button type="button" id="<?php echo($content["product_id"]);?>" 
                                                                        class="btn btn-danger btn-xs delprod" 
                                                                        data-toggle="modal" 
                                                                        data-target="#delconfmodal-product">Del</button>
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
<div id="delconfmodal-product" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are your sure to delete ?</p>
        <input type="hidden" id="hdproductid" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default del-product-yes" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
        
        
        
        
        
    </div>
</div>



