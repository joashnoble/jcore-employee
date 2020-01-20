<style>
.tdstlye {
	border-bottom: .5px solid lightgray !important;
	padding-bottom: 5px !important;
	padding-top: 5px !important;
}

.label {
	color: #fff;
	font-size: 75%;
	padding: 20px;
	text-align: center;
	vertical-align: baseline;
	line-height: 1;
	white-space: nowrap;
	border-radius: .25em;
}
.success{
	background-color: #5cb85c;
}

.warning{
	background-color: #f0ad4e;
}

.danger{
	background-color: #d9534f;
}

</style>
<div style="margin: 20px;font-family: calibri!important;">
	<?php echo $company->company_name; ?>
	<img src="<?php echo $this->config->item("base_urlmain").'/'.$company->image_name;?>" style="width: auto; max-width: auto; height: 60px; max-height: 60px; float: right; top: 0px !important;">
	<div style="font-size: 10pt;"><?php echo $company->address ?>
		<br /><br />
	<p style="margin-bottom: 2; font-size: 10pt;font-family: calibri;"><strong>
		Employee Leaves Filed Report
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
		</table>
	</div>
	<hr><br />
		<table class="table" style="width:100%;font-family: calibri;font-size: 8pt;">
			<thead class="thead-inverse">
				<tr>
					<th class="tdstlye" style="text-align: left;" width="10%">Status</th>
					<th class="tdstlye" style="text-align: left;" width="20%">Leave Type</th>
					<th class="tdstlye" style="text-align: left;" width="15%">Date Filed</th>
					<th class="tdstlye" style="text-align: left;" width="15%">From</th>
					<th class="tdstlye" style="text-align: left;" width="15%">To</th>
					<th class="tdstlye" style="text-align: left;" width="25%">Purpose</th>
				</tr>
			</thead>
			<tbody>
					<?php
					if (count($data) == 0){?>
						<td colspan="6"><center><strong>No Record(s)</strong></center></td>
					<?php } else{ foreach($data as $row) {
					?>
				<tr>
					<td class="tdstlye"><div class="label <?php echo $row->status_label; ?>"><?php echo $row->status_name; ?></div></td>
					<td class="tdstlye"><?php echo $row->leave_type; ?></td>
					<td class="tdstlye"><?php echo $row->date_filed; ?></td>
					<td class="tdstlye"><?php echo $row->date_time_from; ?></td>
					<td class="tdstlye"><?php echo $row->date_time_to; ?></td>
					<td class="tdstlye"><?php echo $row->purpose; ?></td>
				</tr>
			<?php }} ?>
			</tbody>
	</table>
</div>
