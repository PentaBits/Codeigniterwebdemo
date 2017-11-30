
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Purchase order
                    </li>
                </ol>  
                
            </div>
        </div>
    </div>
    <div class="container-fluid">
     <div class="panel panel-info">
      <div class="panel-heading">Purchase Order</div>
      <div class="panel-body">
          <div class="alert alert-danger validation-msg" style="display: none;">
                <button type="button" class="close valid-alert-close">&times;</button>
                   <strong>*</strong> Indicates a mandatory fields.
          </div>
          <div class="row">
              <div class="col-lg-2"></div>              
              <div class="col-lg-8">
                <table class="table table-bordered">
                
                <tbody>
                  <tr>
                      <td>
                          <label>Order No.*</label>
                      </td>
                      <td>
                          <input type="hidden" id="poid" value="<?php echo($bodycontent["pomaster"]["po_id"]); ?>"/>
                          <input type="text" class="form-control" value="<?php echo($bodycontent["pomaster"]["po_number"]); ?>" id="pono" name="pono" />
                      </td>
                    <td></td>       
                    <td><label>Date.*</label></td>
                    <td><input type="text" class="form-control" value="<?php echo($bodycontent["pomaster"]["po_date"]); ?>" id="podt" name="podt" readonly=""/></td>

                  </tr>
                  <tr>
                      <td>
                          <label>Vendor*</label>
                      </td>
                      <td colspan="4">
                          
                          <select class="form-control input-sm" id="vendor" name="vendor">
                              <option value="">--Select--</option>
                              <?php 
                                    if($bodycontent["vendor"]){
                                        foreach ($bodycontent["vendor"] as $vndr) {
                              ?>
                              <option value="<?php echo ($vndr["vendor_id"]); ?>"
 <?php if($vndr["vendor_id"]==$bodycontent["pomaster"]["vendor_id"]){echo("selected='selected'");} ?>>
                              <?php echo ($vndr["vendor_name"]); ?>
                              </option>
                              
                              <?php
                              }
                                    }
                              ?>
                              
                          </select>
                      </td>
                  </tr>
                
                </tbody>
              </table>
              </div>
              <div class="col-lg-2"></div>

          </div>
          <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                  
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Item</th>
                              <th>Unit</th>
                              <th>Qty</th>
                              <th>Rate</th>
                              <th>Amount</th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>
                                  <select class="form-control input-sm" id="item" name="item">
                                      <option value="">--Product--</option>
                                      <?php if($bodycontent["product"]){
                                        foreach ($bodycontent["product"] as $item){
                                         ?>
                                      <option value="<?php echo($item["product_id"]); ?>"><?php echo($item["product_name"]); ?></option>
                                     <?php 
                                        }   
                                       }
                                     ?>
                                      
                              
                                  </select>
                              </td>
                              <td><input type="text" class="form-control" value="" name="itemunit" id="itemunit" disabled=""/></td>
                              <td>
                                  <input type="text" class="form-control decimalbox" value="" name="itemqty" id="itemqty" />
                              </td>
                              <td>
                                  <input type="text" class="form-control decimalbox" value="" name="itemrate" id="itemrate"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" value="" name="itemamt" id="itemamt" disabled=""/>
                              </td>
                              <td>
                                  <button type="button" class="btn btn-warning btn-md dtl-add">Add</button>
                              </td>

                          </tr>
                          
                      </tbody>
                  </table>
              </div>
              <div class="col-lg-2"></div>
          </div>
         
      </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-body">
            <table class="table table-bordered dtl-table bg-info">
                      <thead>
                          <tr>
                              <th>Item</th>
                              <th>Unit</th>
                              <th>Qty</th>
                              <th>Rate</th>
                              <th>Amount</th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?PHP 
                          if($bodycontent["podtl"]){ 
                              foreach ($bodycontent["podtl"] as $podtlvalue) {
                                  
                              
                              ?>
                          <tr>
                              <td style="display:none"><?php echo($podtlvalue["product_id"]); ?></td>
                              <td><?php echo($podtlvalue["product_name"]); ?></td>
                              <td><?php echo($podtlvalue["uom"]); ?></td>
                              <td><?php echo($podtlvalue["qty"]); ?></td>
                              <td><?php echo($podtlvalue["rate"]); ?></td>
                              <td><?php echo($podtlvalue["amount"]); ?></td>
                              <td><button type="button" class="btn btn-danger btn-sm dtl-del">Del</button></td>
                          </tr>
                          <?PHP 
                                }
                              } ?>
                      </tbody>
            </table>
            <div class="row">
              <div class="col-lg-8"></div>
              <div class="col-lg-2"></div>
              <div class="col-lg-2">
                  <label>Total:*</label>
                  <input type="text" class="form-control" value="<?php echo($bodycontent["pomaster"]["total_amount"]); ?>" name="subtotal" id="subtotal" disabled=""/>
              </div>
          </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary" id="posave">Save</button>
                    <button type="button" class="btn btn-primary" id="pocancel">Cancel</button>
                </div>
              <div class="col-lg-2"></div>
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
                  <button type="button" class="btn btn-default mdclose-purorder" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
        
    </div>
</div>