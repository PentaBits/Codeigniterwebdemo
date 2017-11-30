<select id="blood-test-unit" name="blood-test-unit" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true" style="cursor:not-allowed;">
	<?php if(isset($bloodtestunit['unit_id'])):?>
	<option value="<?php echo $bloodtestunit['unit_id'];?>"><?php echo $bloodtestunit['unit_desc'];?></option>
	<?php else: ?>
	<option value="0">Select</option>
	<?php endif;?>
</select>