		<div class="modal-header modal-header-style" style="background-color:#F47846;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Diet Chart (<?php echo date('d-m-Y',strtotime($dietchartView['diet_date'])); ?>)</h4>
		  </div>
		  <div class="modal-body modal-height">
			<?php echo $dietchartView['diet_content']; ?>
		  </div>


