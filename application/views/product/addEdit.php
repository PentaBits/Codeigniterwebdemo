<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Product
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
                                    
                                    <form role="form"  id="frmprodct" method="post">
                                        <input type="hidden" id="hdprodid" name="hdprodid" 
                                               value="<?php echo($bodycontent["product"]["product_id"]);?>"/>
                                        <div class="form-group">
                                            <label>Product *</label>
                                            <input class="form-control" placeholder="Product" id="product" name="product" 
                                                   value="<?php echo($bodycontent["product"]["product_name"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Desc</label>
                                            <textarea class="form-control" placeholder="Product Description" id="proddesc" name="proddesc"><?php echo($bodycontent["product"]["product_desc"]);?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit *</label>
                                            <select id="produnit" name="produnit" class="form-control">
                                                <option value="">--Select--</option>
                                                <?php if($bodycontent["unit"]){
                                                    foreach ($bodycontent["unit"] as $units){
                                                    ?>
                                                        <option value="<?php echo($units["uom_id"])?>"
                                                                <?php if($units["uom_id"]==$bodycontent["product"]["uom_id"]){echo("selected='selected'");}?>
                                                                ><?php echo($units["uom"]); ?></option>

                                                    <?php } } ?>
                                                       </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select id="productcat" name="productcat" class="form-control">
                                                <option value="">--Select--</option>
                                                <?php if($bodycontent["category"]){
                                                    foreach ($bodycontent["category"] as $prodcatgs){
                                                    ?>
                                                        <option value="<?php echo($prodcatgs["category_id"])?>"
                                                                <?php if($prodcatgs["category_id"]==$bodycontent["product"]["category_id"]){echo("selected='selected'");}?>
                                                                ><?php echo($prodcatgs["category_name"]); ?></option>

                                                    <?php } } ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary" id="prodsave">Save</button>
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
                  <button type="button" class="btn btn-default mdclose-product" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>


