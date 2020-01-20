<style type="text/css">
	.tblmemo{
		width: 100%;
		border: 1px solid #ECEFF1;
	}
	.tblmemo td{
		border: 1px solid #ECEFF1 !important;
	}
</style>

<table class="tblmemo">
		<?php foreach($info as $row){ ?>
		<tr>
			<td><strong><i class="fa fa-newspaper-o"></i> Announcement Title :</strong> <?php echo $row->announcement_title;?></td>

			<td><strong><i class="fa fa-calendar-o"></i> Date & Time Announced :</strong> <?php echo $row->date_created;?></td>
		</tr>
		<tr>
			<td colspan="2">
				<strong>Announcement:</strong><hr>
				<?php echo $row->announcement;?>
			</td>
		</tr>
		<?php }?>
</table>
