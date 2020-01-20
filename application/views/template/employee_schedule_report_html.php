<style>
.tdstlye {
	border-bottom: .5px solid lightgray !important;
	padding-bottom: 5px !important;
	padding-top: 5px !important;
}
</style>
<div style="margin: 20px;font-family: calibri!important;">
	<?php echo $company->company_name; ?>
	<img src="<?php echo $this->config->item("base_urlmain").'/'.$company->image_name;?>" style="width: auto; max-width: auto; height: 60px; max-height: 60px; float: right; top: 0px !important;">
	<div style="font-size: 10pt;"><?php echo $company->address ?>
		<br /><br />
	<p style="margin-bottom: 2; font-size: 10pt;font-family: calibri;"><strong>
		Employee Schedule Detailed Report
	</strong></p>
	<div style="font-size: 10pt;">
		<table style="font-size: 9pt;font-family: calibri;">
			<tr>
				<td>Employee Name </td>
				<td style="width: 20px; max-width: 20px;"></td>
				<td><?php echo $emp_info[0]->full_name; ?></td>
			</tr>
			<tr>
				<td>Ecode</td>
				<td></td>
				<td><?php echo $emp_info[0]->ecode; ?></td>
			</tr>
			<tr>
				<td>Branch </td>
				<td></td>
				<td><?php echo $emp_info[0]->branch; ?></td>
			</tr>
			<tr>
				<td>Department </td>
				<td></td>
				<td><?php echo $emp_info[0]->department; ?></td>
			</tr>
			<tr>
				<td>Period </td>
				<td></td>
				<td><?php echo $payperiod[0]->pay_period; ?></td>
			</tr>
		</table>
	</div>
	<hr><br />
		<table class="table" style="width:100%;font-family: calibri;font-size: 9pt;">
			<thead class="thead-inverse">
				<tr>
					<th class="tdstlye" style="width: 70px; max-width: 70px; font-size: 10pt;text-align: left;">Day</th>
					<th class="tdstlye" style="width: 130px; max-width: 130px;text-align: left;">Date</th>
					<th class="tdstlye" style="width: 150px; max-width: 150px;text-align: left;"><center>Shift</center></th>
					<th class="tdstlye" style="width: 130px; max-width: 130px;text-align: left;"><center>Schedule Time In</center></th>
					<th class="tdstlye" style="width: 130px; max-width: 130px;text-align: left;"><center>Schedule Time Out</center></th>
					<th class="tdstlye" style="width: 130px; max-width: 130px;text-align: left;"><center>Schedule Type</center></th>
				</tr>
			</thead>
			<tbody>
					<?php
					if (count($emp_sched_report) == 0){?>
						<td colspan="5"><center><strong>No Record(s)</strong></center></td>
					<?php } else{ foreach($emp_sched_report as $row) {
					?>
				<tr>
					<td class="tdstlye"><?php echo $row->day; ?></td>
					<td class="tdstlye"><?php echo date("m/d/Y", strtotime($row->date)); ?></td>
					<td class="tdstlye"><center><?php echo $row->shift; ?></center></td>
					<td class="tdstlye"><center><?php echo date("h:i a", strtotime($row->time_in)); ?></center></td>
					<td class="tdstlye"><center><?php echo date("h:i a", strtotime($row->time_out)); ?></center></td>
					<td class="tdstlye"><center><?php echo $row->daytype; ?></center></td>
				</tr>
			<?php }} ?>
			</tbody>
	</table>
</div>
