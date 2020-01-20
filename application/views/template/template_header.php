

<table width="100%">
	<tr>
		<td rowspan="4" width="5%">
			<img src="<?php echo $this->config->item("base_urlmain").'/'.$company->image_name;?>" style="width: auto; max-width: auto; height: 50px; max-height: 50px; float: left; margin-top: 5px !important;margin-right: 10px;float: left;">
		</td>

		<td width="95%"><div style="font-size: 11pt;font-weight: 500;"><?php echo $company->company_name; ?></div></td>
	</tr>
	<tr>
		
		<td><div style="font-size: 8pt;font-weight: 500;margin-top: 0px;"><?php echo $company->address ?></div></td>
	</tr>
	<tr>
		
		<td><div style="font-size: 8pt;font-weight: 500;margin-top: 0px;"><?php echo $company->contact_no ?></div></td>
	</tr>
	<tr>
		
		<td><div style="font-size: 8pt;font-weight: 500;margin-top: 0px;"><?php echo $company->email_address ?></div></td>
	</tr>
</table>