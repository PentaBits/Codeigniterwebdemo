<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead style="background:#2BB161;color:#FFF;">
      <tr>
		<th>#</th>
		<th>Payment Date</th>
		<th>Payment For</th>
		<th>Subscription Amt.</th>
		<th>Discount</th>
		<th>Paid Amount</th>
		<th>Due</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		$i = 1;
		$totalSubscription = 0;
		$tatalPaidAmt = 0;
		$totalDueAmount = 0;
		foreach($paymentDtlInfo as $payment_info_dtl){
			$due_amount = 0;
			$due_amount = $payment_info_dtl['subscription'] - ($payment_info_dtl['amountpaid']+$payment_info_dtl['totaldiscount']);
			/*if($payment_info_dtl['subscription']>0){
			  $due_amount = $payment_info_dtl['subscription'] - ($payment_info_dtl['amountpaid']+$payment_info_dtl['totaldiscount']);
		    }
			else
			{
				$due_amount = $totalDueAmount - ($payment_info_dtl['amountpaid']+$payment_info_dtl['totaldiscount']);
			}*/
	  ?>
		<tr>
			<td><?php echo $i++ ; ?></td>
			<td><?php echo date('d-m-Y',strtotime($payment_info_dtl['payment_date'])) ; ?></td>
			<td><?php echo $payment_info_dtl['payment_for_txt'] ; ?></td>
			<td align="right"><?php echo $payment_info_dtl['subscription'] ; ?></td>
			<td align="right"><?php echo $payment_info_dtl['totaldiscount'] ; ?></td>
			<td align="right"><?php echo $payment_info_dtl['amountpaid'] ; ?></td>
			<td align="right"><?php echo $due_amount; ?></td>
		</tr>
	 <?php 
		$totalSubscription=$totalSubscription+$payment_info_dtl['subscription'];
		$tatalPaidAmt=$tatalPaidAmt+$payment_info_dtl['amountpaid'];
		$totalDueAmount = $totalDueAmount+$due_amount;
	 } ?>
	 
	 <?php if($totalDueAmount>0){
		 $style = "background:#FC6553;font-weight:700;color:#FFF;";
		}
	 else
	 {
		 $style = "background:#099C4E;font-weight:700;color:#FFF;";
	 }?>
	 <tr style="<?php echo $style;?>">
		<td colspan="3">Total</td>
		<td align="right"><?php echo number_format($totalSubscription,2);?></td>
		<td>&nbsp;</td>
		<td align="right"><?php echo number_format($tatalPaidAmt,2);?></td>
		<td align="right"><?php echo number_format($totalDueAmount,2);?></td>
	 </tr>
	 
    </tbody>
  </table>
</div>
