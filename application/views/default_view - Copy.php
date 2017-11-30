<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mantra- Member panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- data table css -->
    <link href="<?php echo base_url(); ?>application/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">  
	
	<!-- Custom CSS --
    <link href="<?php echo base_url(); ?>application/assets/css/sb-admin.css" rel="stylesheet">
	<!-- Morris Charts CSS --
    <link href="<?php echo base_url(); ?>application/assets/css/plugins/morris.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/plugins/metis-menu.css" rel="stylesheet">
	<!-- Custom Fonts --
    
    <!--slider
     <link href="<?php echo base_url(); ?>application/assets/css/slider.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>application/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom Style -->
	
	<link href="<?php echo base_url(); ?>application/assets/css/metisMenu.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/sb-admin-2.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/morris.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/magic-check.css" rel="stylesheet">
	

	
	
	<link href="<?php echo base_url(); ?>application/assets/css/style.css" rel="stylesheet">
	<!-- Bootstrap datepicker -->
	<link href="<?php echo base_url(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/bootstrap-timepicker.min.css" rel="stylesheet">
	<!-- Bootstrap datepicer end -->
	
	<!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />-->
	<link href="<?php echo base_url(); ?>application/assets/css/bootstrapselect.min.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>

</style>

</head>

<body>

    <!--
	<div id="wrapper">

    
        <nav class="navbar navbar-inverse navbar-fixed-top dashbord-top-nav" role="navigation">
          <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>memberdashboard">Member-panel</a>
                <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>      
            </div>
           <ul class="nav navbar-right top-nav">
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo  $CUS_NAME; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       <li>
                            <a href="<?php echo base_url(); ?>changepass"><i class="fa fa-fw fa-gear"></i> Change password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			<div class="navbar-default sidebar" role="navigation">
				 <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>memberdashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
            
					<li>
                        <a href="#"><i class="fa fa-user-md"></i> Health & Fitness <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="healthandfit" class="nav nav-second-level">   
                            <li>
                                <a href="javascript:void(0);" > General Fitness Assessment <i class="fa arrow"></i>
</a>
                                <ul id="generalfitness" class="nav nav-third-level">
                                    <li><a href="<?php echo(base_url());?>healthandfitness/endurancetest">Endurance test</a></li>
                                    <li><a href="<?php echo(base_url());?>healthandfitness/strengthtest">Strength test</a></li>
                                    <li><a href="<?php echo(base_url());?>healthandfitness/flexibilitytest">Flexibility test</a></li>
                                </ul>
                            
                            </li>
                            <li><a href="#">General Medical Assessment</a></li>
                            <li><a href="#">Orthopaedic Screening</a></li>
                            <li><a href="#">Archieves</a></li>
                            <li><a href="#">Anthropometry</a></li>
                            <li><a href="#">Blood Test(s)</a></li>
                        </ul>
                    </li>
                    
                    
                    <li>
                        <a href="#"><i class="fa fa-user-md">
                            </i> Portfolio <i class="fa fa-fw fa-caret-down"></i>
                         </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>portfolio">Body Composition</a></li>
                            <li><a href="<?php echo base_url(); ?>portfolio/viewfolio">View folio</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-external-link-square"></i>
					Health Asset Value</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Feedback</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Applications</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Dietary Management</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Other Reports</a></li>
                </ul>
				</div>
            </div>
        </nav> -->
		
		

       <!--content  inserted here---
	     <?php// if($bodyview)  : ?>  
		<?php// $this->load->view($bodyview); ?>
		<?php
		  // endif; 
		  ?>
	   --content inserted here ---

    </div>
    <!-- /#wrapper -->
	
	
	  <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>memberdashboard">Member-panel</a>
                <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>      
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo  $CUS_NAME; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url(); ?>changepass"><i class="fa fa-fw fa-gear"></i> Change password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
             
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <li class="active">
							<a href="<?php echo base_url(); ?>memberdashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
						</li>
						
						<li>
							<a href="javascript:void(0);" data-toggle="collapse"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Health & Fitness <span class=" glyphicon glyphicon-menu-down" ></span></a>
							<ul class="collapse nav nav-second-level">
								<li>
									<a href="javascript:void(0);" data-toggle="collapse" > General Fitness Assessment <span class="glyphicon glyphicon-menu-down"></span></a>
									<ul id="generalfitness" class="collapse nav nav-third-level">
										<li><a href="<?php echo(base_url());?>healthandfitness/endurancetest">Endurance test</a></li>
										<li><a href="<?php echo(base_url());?>healthandfitness/strengthtest">Strength test</a></li>
										<li><a href="<?php echo(base_url());?>healthandfitness/flexibilitytest">Flexibility test</a></li>
									</ul>
								
								</li>
								<li><a href="<?php echo(base_url());?>healthandfitness/generalmedicalassesment">General Medical Assessment</a></li>
								<li><a href="<?php echo(base_url());?>Orthopaedicscreening">Orthopaedic Screening</a></li>
								
                                                                
<!--                                                                <li><a href="#">Archieves</a></li>
								<li><a href="#">Anthropometry</a></li>-->
								<li><a href="<?php echo(base_url());?>healthandfitness/bloodtest">Blood Test</a></li>
							</ul>
						</li>
                    
                    
                    <li>
                         <a href="javascript:void(0);" data-toggle="collapse"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Portfolio <span class=" glyphicon glyphicon-menu-down" ></span>
                         </a>
                        <ul id="portfolio" class="collapse nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>portfolio">Body Composition</a></li>
                            <li><a href="<?php echo base_url(); ?>portfolio/viewfolio">View folio</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url(); ?>healthassetvaluereport"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Health Asset Value</a></li>
					<li><a href="<?php echo base_url();?>feedback"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Feedback</a></li>
					<li><a href="<?php echo base_url();?>applications"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Applications</a></li>
					
					<li>
                         <a href="javascript:void(0);" data-toggle="collapse"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  Diet <span class=" glyphicon glyphicon-menu-down" ></span>
                         </a>
                        <ul id="portfolio" class="collapse nav nav-second-level">
                        <li><a href="<?php echo base_url();?>dietary_management/diet_chart">Diet List</a></li>
                        <li><a href="<?php echo base_url();?>dietary_management">Dietary Management</a></li>
                            
                        </ul>
                    </li>
					
					<!--
					<li><a href="<?php echo base_url();?>dietary_management"><i class="fa fa-external-link-square"></i> Dietary Management</a></li> -->
					
					
					<li><a href="#"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Other Reports</a></li>
					
					<li>
                         <a href="javascript:void(0);" data-toggle="collapse"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  Member's Family <span class=" glyphicon glyphicon-menu-down" ></span>
                         </a>
                        <ul class="collapse nav nav-second-level">
                            <li><a href="<?php echo base_url();?>memberfamily"><i class="fa fa-star" aria-hidden="true"></i> Family List</a></li>
							<li>
								<a href="javascript:void(0);" data-toggle="collapse">Test Report <span class=" glyphicon glyphicon-menu-down" ></span></a>
								<ul class="collapse nav nav-second-level"> 
									<li><a href="<?php echo base_url();?>memberfamily/bloodpressurelist"><i class="fa fa-star" aria-hidden="true"></i> Blood Pressure</a></li>
									<li><a href="<?php echo base_url();?>memberfamily/bloodtestlist"><i class="fa fa-star" aria-hidden="true"></i> Blood Test</a></li>
								</ul>
							</li>
							
                            
                        </ul>
                    </li>
				
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
		
		 <!--content  inserted here--->
		 
	     <?php if($bodyview)  : ?>  
    
                
        <?php $this->load->view($bodyview); ?>
 
 
		 <?php
		   endif; 
		  ?>
		

    </div>
    <!-- /#wrapper -->


	
	
	

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.js"></script>
	<!--for temporary  add file from folder-->
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>-->

	
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap-confirmation.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/dataTbleBootstrap.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/bootstrapselect.min.js"></script>
	
	 <script src="<?php echo base_url(); ?>application/assets/js/metisMenu.min.js"></script>
	 <script src="<?php echo base_url(); ?>application/assets/js/raphael.min.js"></script>
	 <script src="<?php echo base_url(); ?>application/assets/js/morris.min.js"></script>
	 <script src="<?php echo base_url(); ?>application/assets/js/sb-admin-2.js"></script>
         <!-- <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-slider.js"></script>-->

    <script src="<?php echo base_url(); ?>application/assets/js/memberdashboard/memberdashboard.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/changepass/changepass.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/profile/profile.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/portfolio/portfolio.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/healthandfitness/generalfitness.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/feedback/feedbackJS.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/member_application/applications.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/dietary_management/dietary_management.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/memberfamily/memberfamily.js"></script>
   
    
    
    <!-- Morris Charts JavaScript --
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris-data.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/metisMenu.js"></script> -->
	
	

</body>

</html>
