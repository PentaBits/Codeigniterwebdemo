<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Attendance</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Attendance
                    </li>
                </ol>
            </div>
        </div>
	</div>

	<?php /* 	echo "<pre>";
				print_r($bodycontent['memberAttendance']);
			echo "</pre>"; */
	?>
	
	<div class="container-fluid">
		<div class="row">
		
		<?php if($bodycontent['memberAttendance']){
			$i=0;
			foreach($bodycontent['memberAttendance'] as $member_attendance){
			
			$color_arry = array("1abc9c","3498db","9b59b6","34495e","f1c40f","27ae60","e74c3c","16a085","1abc9c","3498db","9b59b6","34495e","f1c40f","27ae60","e74c3c","16a085");
			
			
				?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="attendance-box " style="background:#<?php echo $color_arry[$i];?>">
				<p class="attd-month"><?php echo $member_attendance['month_info'];?>'<?php echo $member_attendance['year_info'];?></p>
				<p class="attd-dys-no"><?php echo $member_attendance['totalpresentDys'];?></p>
				<p class="attd-dys-label">Days</p>
				
				<div class="view-more-attd"><a href="<?php echo base_url();?>memberdashboard/attendancedetailbymonth/<?php echo $member_attendance['month_info'];?>/<?php echo $member_attendance['full_year'];?>" >Get Detail <i class="fa fa-caret-right" aria-hidden="true" ></i></a></div>
				
			</div>
		</div>
		
		<?php 
		$i++;
		}}else{?>
			<p style="text-align:center;font-size:2em;">No records found</p>
		<?php } ?>
		
		
		<!--
		<div class="col-md-3">
			<div class="attendance-box " style="background:#1ABC9C;">
				<p class="attd-month">May'17</p>
				<p class="attd-dys-no">20</p>
				<p class="attd-dys-label">Days</p>
				<div class="view-more-attd"><a href="">Detail</a></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#3498db;">
				<p class="attd-month">May'17</p>
				<p class="attd-dys-no">20</p>
				<p class="attd-dys-label">Days</p>
				<div class="view-more-attd"><a href="">Detail</a></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#9b59b6;">
				<p class="attd-month">May'17</p>
				<p class="attd-dys-no">20</p>
				<p class="attd-dys-label">Days</p>
				<div class="view-more-attd"><a href="">Detail</a></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#34495e;">
				<p class="attd-month">May'17</p>
				<p class="attd-dys-no">20</p>
				<p class="attd-dys-label">Days</p>
				<div class="view-more-attd"><a href="">Detail</a></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#f1c40f;"></div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#27ae60;"></div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#e74c3c;"></div>
		</div>
		<div class="col-md-3">
			<div class="attendance-box " style="background:#16a085;"></div>
		</div>
		-->
		
			
			
			
			
		</div>
	</div>

</div>





