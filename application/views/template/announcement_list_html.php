
<div style="margin: 20px;font-family: calibri!important;">
		<?php include 'template_header.php';?>
	<hr style="border-top: 1px solid lightgray; "><br />
	<div style="font-family: calibri; font-size: 10pt;">
		<table width="100%">
			<tr>
				<td align="left">
					<p style="margin-bottom: 2; font-size: 10pt;font-family: calibri;"><strong>
						ANNOUNCEMENT : <?php echo $data[0]->announcement_title; ?>
					</strong></p>
				</td>

				<td align="right">
					<span style="float: right; font-size: 9pt;">
						<?php echo $data[0]->announcement_date_details; ?>
					</span>					
				</td>
			</tr>

		</table>
		<br>
	</div>

	<div  style="font-family: calibri;font-size: 10pt;">

		<table width="100%" style="font-size: 10pt;font-family: calibri;">
			<tr>
				<td>
					<?php echo $data[0]->announcement; ?>
				</td>
			</tr>
		</table>

	</div>
</div>
