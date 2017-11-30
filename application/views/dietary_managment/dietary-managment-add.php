<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Dietary Management Add</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Dietary Management
                    </li>
                </ol>
            </div>
        </div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>dietary_management" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> View Diet List</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid">
		<div class="row dietarymanagment-form-container">
			<form id="dietaryManagmentForm" name="dietaryManagmentForm" class="dietaryManagmentForm" method="post" >
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
					<input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']?>" />
					<input type="hidden" name="dietManagmentEditId" id="dietManagmentEditId" value="<?php echo $bodycontent['dietarymanagmentID']?>" />
					
					<!-- Meal 1 -->
					<label for="meal1"><span class="glyphicon glyphicon-menu-down"></span> Meal 1</label>
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal1" id="meal1opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal1']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal1" id="meal1opt1" value="Y" >
					<?php }?>
					<label for="meal1opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal1" id="meal1opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal1']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal1" id="meal1opt2" value="N">
					<?php } ?>
					<label for="meal1opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
					<!-- Meal 2 -->
					<label for="meal2"><span class="glyphicon glyphicon-menu-down"></span> Meal 2</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal2" id="meal2opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal2']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?> 
						<input class="magic-radio" type="radio" name="meal2" id="meal2opt1" value="Y">
					<?php } ?>
					<label for="meal2opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal2" id="meal2opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal2']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal2" id="meal2opt2" value="N">
					<?php } ?>
					<label for="meal2opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
					<!-- Meal 3 -->
					<label for="meal3"><span class="glyphicon glyphicon-menu-down"></span> Meal 3</label>
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal3" id="meal3opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal3']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{?>
						<input class="magic-radio" type="radio" name="meal3" id="meal3opt1" value="Y">
					<?php } ?>
					<label for="meal3opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal3" id="meal3opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal3']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal3" id="meal3opt2" value="N">
					<?php } ?>
					<label for="meal3opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 ">
				<div class="form-group">
					<!-- Meal 4 -->
					<label for="meal4"><span class="glyphicon glyphicon-menu-down"></span> Meal 4</label>
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal4" id="meal4opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal4']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal4" id="meal4opt1" value="Y">
					<?php } ?>
					<label for="meal4opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal4" id="meal4opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal4']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{?>
						<input class="magic-radio" type="radio" name="meal4" id="meal4opt2" value="N">
					<?php } ?>
					<label for="meal4opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
				<!-- Meal 5 -->
					<label for="meal5"><span class="glyphicon glyphicon-menu-down"></span> Meal 5</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal5" id="meal5opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal5']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal5" id="meal5opt1" value="Y">
					<?php } ?>
					<label for="meal5opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal5" id="meal5opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal5']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal5" id="meal5opt2" value="N" >
					<?php } ?>
					<label for="meal5opt2"> No</label>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
				
				<!-- Meal 6 -->
					<label for="meal6"><span class="glyphicon glyphicon-menu-down"></span> Meal 6</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal6" id="meal6opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal6']=="Y"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal6" id="meal6opt1" value="Y" >
					<?php } ?>
					<label for="meal6opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
					<input class="magic-radio" type="radio" name="meal6" id="meal6opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal6']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal6" id="meal6opt2" value="N" />
					<?php } ?>
					<label for="meal6opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 diet-col-border">
				<div class="form-group">
					<!-- Meal 7 -->
					<label for="meal7"><span class="glyphicon glyphicon-menu-down"></span> Meal 7</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal7" id="meal7opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal7']=="Y"){echo "checked"; }else{echo "";}?> />
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal7" id="meal7opt1" value="Y">
					<?php } ?>
					<label for="meal7opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal7" id="meal7opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal7']=="N"){echo "checked"; }else{echo "";}?> />
					<?php }else{?>
						<input class="magic-radio" type="radio" name="meal7" id="meal7opt2" value="N">
					<?php } ?>
					<label for="meal7opt2"> No</label>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="form-group">
				<!-- Meal 8 -->
					<label for="meal8"><span class="glyphicon glyphicon-menu-down"></span> Meal 8</label>
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal8" id="meal8opt1" value="Y" <?php if($bodycontent['dietaryManagmentData']['meal8']=="Y"){echo "checked"; }else{echo "";}?> />
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal8" id="meal8opt1" value="Y">
					<?php } ?>
					<label for="meal8opt1"> Yes</label>
					
					<?php if($bodycontent['mode']=="Edit"){?>
						<input class="magic-radio" type="radio" name="meal8" id="meal8opt2" value="N" <?php if($bodycontent['dietaryManagmentData']['meal8']=="N"){echo "checked"; }else{echo "";}?>>
					<?php }else{ ?>
						<input class="magic-radio" type="radio" name="meal8" id="meal8opt2" value="N">
					<?php } ?>
					<label for="meal8opt2"> No</label>
				</div>
			</div>
			
			<!--
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="carbohydrate">Carbohydrate</label>
					<input type="text" class="form-control" name="carbohydrate" id="carbohydrate" value="" onKeyup="numericFilter(this);"/>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="protein">Protein</label>
					<input type="text" class="form-control" name="protein" id="protein" value="" onKeyup="numericFilter(this);" />
				</div>
			</div> -->
			
			<div class="col-lg-3 col-md-3 col-sm-6 diet-col-border">
				<div class="form-group">
					<label for="weight">Weight</label>
					<?php if($bodycontent['mode']=="Edit"){?>
						<input type="text" class="form-control" name="weight" id="weight" value="<?php echo $bodycontent['dietaryManagmentData']['weight']; ?>" onKeyup="numericFilter(this);" autocomplete="off" />
					<?php }else{?>
						<input type="text" class="form-control" name="weight" id="weight" value="" onKeyup="numericFilter(this);" autocomplete="off" />
					<?php } ?>
				</div>
			</div>
			
			<div class="col-md-12">
				<?php if($bodycontent['mode']=="Edit"){?>
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Update</button>
				<?php }else{ ?>
				<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Submit</button>
				<?php } ?>
			</div>
		</form>
		
		<!-- Error -->
		<div class="col-md-12">
			<div class="submit-diet-err" style="padding:1%;">
				<p id="submit-diet-err" class="error-style" style="color:#F95340;"></p>
			</div>
		</div>
		
		
		</div><!-- end .row -->
		
	</div>

</div>



	<div id="dietsuccessModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:10%;">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo base_url();?>dietary_management'">×</button>
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="dietsuccessmsg"></span></h3>
			
			<!--		
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Message</h4>-->
		  </div>
		  <!--
		  <div class="modal-body">
			
		  </div> -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo base_url();?>dietary_management'">Close</button>
		  </div>
		</div>

	  </div>
	</div>

