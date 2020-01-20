
<div style="margin: 20px;font-family: calibri!important;">
		<?php include 'template_header.php';?>
	<hr style="border-top: 1px solid lightgray; "><br />
	<div style="font-family: calibri; font-size: 10pt;">
			

		<table width="100%">
			<tr>
				<td>
	<p style="margin-bottom: 2; font-size: 10pt;font-family: calibri;"><strong>
		MEMO : <?php echo $data[0]->memo_number; ?>
	</strong></p>
	</td>
			</tr>
			<tr>
				<td align="left">
					<span style="float: left;">
						<b><?php echo $data[0]->disciplinary_action_policy; ?></b>
					</span>
				</td>
				<td align="right">
					<span style="float: right; font-size: 9pt;">
						<?php echo $data[0]->memo_date_details; ?>
					</span>					
				</td>
			</tr>
		</table>

		<br>

	</div>
	<div style="font-family: calibri;font-size: 10pt;">

		<table width="100%" style="font-size: 10pt;font-family: calibri;">
			<tr>
				<td>
					Employee :  <b><?php echo $emp_info[0]->full_name; ?></b> <br>
					Action Taken : <b><?php echo $data[0]->action_taken; ?></b> <br>
					Date Granted : <b><?php echo $data[0]->date_granted; ?></b> <br><br>					
				</td>
			</tr>
		</table>
		<br>

	</div>

	<div  style="font-family: calibri;font-size: 10pt;">

		<table width="100%" style="font-size: 10pt;font-family: calibri;">
			<tr>
				<td>
					<?php echo $data[0]->remarks; ?>
				</td>
			</tr>
		</table>

	</div>
</div>
