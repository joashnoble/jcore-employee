<style>
	#tbl_payslip1{
		border-collapse: collapse !important;
		width: 50% !important;
		border-spacing: 0 !important;;
		border: 1px solid #CFD8DC !important;
	}
	.theader-right1{
		vertical-align: baseline !important;
		width: 200px !important;
		border: 2px solid #CFD8DC !important;
		font-size: 8pt !important;
	}
	.ttitle1{
		font-weight: bold !important;
		padding-left: 10px !important;
		font-size: 12pt !important;
		border-top: 2px solid #CFD8DC !important;
		border-left: 2px solid #CFD8DC !important;
		border-bottom: 1px solid #CFD8DC !important;
	}
	.theader1{
		padding-left: 10px !important;
		border-left: 2px solid #CFD8DC !important;
		font-size: 10pt !important;
	}
	.theader-bottom1{
		padding-left: 10px !important;
		border-left: 2px solid #CFD8DC !important;
		border-bottom: 1px solid #CFD8DC !important;
		font-size: 10pt !important;
	}
	.title-td-first1{
		font-weight: bold !important;
		border-left: 2px solid #CFD8DC !important;
		font-size: 10pt !important;
		white-space:nowrap !important;
	}
	.title-td-top1{
		font-weight: bold !important;
		font-size: 10pt !important;
		border-left: 2px solid #CFD8DC !important;
		padding-left: 20px !important;
		white-space:nowrap !important;
	}
	.title-td1{
		font-weight: bold !important;
		padding-left: 20px !important;
		font-size: 10pt !important;
		white-space:nowrap !important;
	}
	.result-td1{
		font-weight: bold !important;
		border-right: 2px solid #CFD8DC !important;
		font-size: 10pt !important;
		padding-right: 10px !important;
		text-align: right !important;
		white-space:nowrap !important;
	}
	.result-td-top1{
		font-weight: bold !important;
		border-right: 2px solid #CFD8DC !important;
		padding-top: 5px !important;
		font-size: 10pt !important;
		padding-right: 10px !important;
		text-align: right !important;
		white-space:nowrap !important;
	}
	.result-total-td1{
		font-weight: bold !important;
		border-top: 2px solid #CFD8DC !important;
		border-bottom: 2px solid #CFD8DC !important;
		border-right: 2px solid #CFD8DC !important;
		font-size: 10pt !important;
		text-align: right !important;
	}
	.result-title-td1{
		font-weight: bold !important;
		font-size: 10pt !important;
		border-left: 2px solid #CFD8DC !important;
		border-top: 2px solid #CFD8DC !important;
		border-bottom: 2px solid #CFD8DC !important;
		padding-top: 5px !important;
		padding-bottom: 5px !important;
	}
	.info-right1{
		margin-top: 20px !important;
		padding: 10px !important;
		text-align: center !important;
		font-size: 9pt !important;
	}
	.title-margin1{
		margin-top: 40px !important;
	}
	.title-margin-bottom1{
		margin-top: 60px !important;
	}
	.PaySlip1{
		width: 100% !important;
	}
</style>
<div class="PaySlip1">
	<table id="tbl_payslip1">
		<tr>
			<td colspan="6" class="ttitle1"><?php echo $payslip->branch; ?></td>
			<td rowspan="19" class="theader-right1" style="border-bottom: 1px solid #CFD8DC;">
				<div class="info-right1">
						<strong>NAME:</strong>
						<p><?php echo $payslip->full_name; ?></p>
						<p class="title-margin1"><strong>NAME OF PROJECT/DEPARTMENT: </strong></p>
						<p><?php echo $payslip->department."/<br>".$payslip->group_desc; ?></p>
						<p class="title-margin1"><strong>PAY TYPE</strong></p>
						<p><?php echo $payslip->payment_type; ?></p>
						<p class="title-margin1"><strong>PERIOD COVERED</strong></p>
						<p><?php echo date("m-d-Y", strtotime($payslip->pay_period_start))." - ".date("m-d-Y", strtotime($payslip->pay_period_end)); ?></p>
						<p class="title-margin1">I acknowledge that i receive the amount</p>
						<hr>
						<p>and have no further claims for the services rendered</p>
						<p class="title-margin-bottom1"><strong>Employee Signature</strong></p>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6" class="theader1"><strong>NAME:</strong> <?php echo $payslip->full_name; ?></td>
		</tr>
		<tr>
			<td colspan="6" class="theader1"><strong>NAME OF PROJECT / DEPARTMENT:</strong> <?php echo $payslip->department; ?> </td>
		</tr>
		<tr>
			<td colspan="6" class="theader1"><strong>PAY TYPE:</strong> <?php echo $payslip->payment_type; ?></td>
		</tr>
		<tr>
			<td colspan="6" class="theader-bottom1"><strong>PERIOD COVERED:</strong>
				<?php echo date("m-d-Y", strtotime($payslip->pay_period_start))." - ".date("m-d-Y", strtotime($payslip->pay_period_end)); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Basic Pay: </td>
			<td class="result-td-top1"><?php echo number_format($payslip->reg_pay,2); ?></td>
			<td class="title-td1">SSS Premium: </td>
			<td class="result-td1"><?php echo number_format($total_sss_deduct->total_sss_deduct,2); ?></td>
			<td class="title-td1">Year to Date</td>
			<td class="result-td1"></td>
		</tr>
		<tr>
			<td class="title-td-first1">Sunday Pay: </td>
			<td class="result-td1"><?php echo number_format($payslip->sun_pay,2); ?></td>
			<td class="title-td1">Philhealth:</td>
			<td class="result-td1"><?php echo number_format($total_philhealth_deduct->total_philhealth_deduct,2); ?></td>
			<td class="title-td1">YTD SALARY</td>
			<td class="result-td1"></td>
		</tr>
		<tr>
			<td class="title-td-first1">Salary Adjustments</td>
			<td class="result-td1"><?php echo number_format($earning_salary_adjustment->total_earnings_salary_adjustments,2); ?></td>
			<td class="title-td1">Pag-ibig:</td>
			<td class="result-td1"><?php echo number_format($total_pagibig_deduct->total_pagibig_deduct,2); ?></td>
			<td class="title-td1">YTD W/TAX:</td>
			<td class="result-td1"></td>
		</tr>
		<tr>
			<td class="title-td-first1">Allowance:</td>
			<td class="result-td1"><?php echo number_format($earning_total_allowance->total_allowance,2); ?></td>
			<td class="title-td1">Withholding Tax:</td>
			<td class="result-td1"><?php echo number_format($total_withholdingtax_deduct->total_withholdingtax_deduct,2); ?></td>
			<td class="title-td1">Overtime Hours</td>
			<td class="result-td1"></td>
		</tr>
		<tr>
			<td class="title-td-first1">E.COLA:</td>
			<td class="result-td1"><?php echo number_format($payslip->cola_pay,2); ?></td>
			<td class="title-td1">SSS Loan:</td>
			<td class="result-td1"><?php echo number_format($total_sss_loan->total_sss_loan,2); ?></td>
			<td class="title-td1">Regular Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->reg,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Other Income:</td>
			<td class="result-td1"><?php echo number_format($other_earnings->total_other_earnings,2); ?></td>
			<td class="title-td1">Pag-ibig Loan:</td>
			<td class="result-td1"><?php echo number_format($total_pagibig_loan->total_pagibig_loan,2); ?></td>
			<td class="title-td1">Sundays:</td>
			<td class="result-td1"><?php echo number_format($payslip->sun,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Total Regular OT:</td>
			<td class="result-td1"><?php echo number_format($payslip->reg_ot_pay,2); ?></td>
			<td class="title-td1">Cash Advance:</td>
			<td class="result-td1"><?php echo number_format($total_cash_advance->total_cash_advance,2); ?></td>
			<td class="title-td1">Regular OT Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->ot_reg + $payslip->ot_reg_reg_hol + $payslip->ot_reg_spe_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Total Sunday OT:</td>
			<td class="result-td1"><?php echo number_format($payslip->sun_ot_pay,2); ?></td>
			<td class="title-td1">Minutes Late:</td>
			<td class="result-td1"><?php echo number_format($payslip->minutes_late_amt,2); ?></td>
			<td class="title-td1">Sunday OT Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->ot_sun + $payslip->ot_sun_reg_hol + $payslip->ot_sun_spe_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Total Special Holiday:</td>
			<td class="result-td1"><?php echo number_format($payslip->spe_hol_pay,2); ?></td>
			<td class="title-td1">COOP Loan:</td>
			<td class="result-td1"><?php echo number_format($total_coop_loan->total_coop_loan,2); ?></td>
			<td class="title-td1">Special Holiday Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->spe_hol+$payslip->sun_spe_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Total Legal Holiday:</td>
			<td class="result-td1"><?php echo number_format($payslip->reg_hol_pay,2); ?></td>
			<td class="title-td1">COOP Contribution:</td>
			<td class="result-td1"><?php echo number_format($total_coop_contribution->total_coop_contribution,2); ?></td>
			<td class="title-td1">Legal Holiday Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->reg_hol+$payslip->sun_reg_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">NSD Reg:</td>
			<td class="result-td1"><?php echo number_format($payslip->reg_nsd_pay,2); ?></td>
			<td class="title-td1">Calamity Loan:</td>
			<td class="result-td1"><?php echo number_format($total_calamity_loan->total_calamity_loan,2); ?></td>
			<td class="title-td1">NSD Reg Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->nsd_reg+$payslip->nsd_reg_reg_hol+$payslip->nsd_reg_spe_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">NSD Sunday:</td>
			<td class="result-td1"><?php echo number_format($payslip->sun_nsd_pay,2); ?></td>
			<td class="title-td1">Others:</td>
			<td class="result-td1"><?php echo number_format($total_other_deduction->total_other_deduction,2); ?></td>
			<td class="title-td1">NSD Sun Hours:</td>
			<td class="result-td1"><?php echo number_format($payslip->nsd_sun+$payslip->nsd_sun_reg_hol+$payslip->nsd_sun_spe_hol,2); ?></td>
		</tr>
		<tr>
			<td class="title-td-first1">Days W/Pay:</td>
			<td class="result-td1"><?php echo number_format($payslip->days_with_pay_amt,2); ?></td>
			<td class="title-td1">Days W/O Pay:</td>
			<td class="result-td1"><?php echo number_format($payslip->days_wout_pay_amt,2); ?></td>
			<td class="title-td1">--</td>
			<td class="result-td1"></td>
		</tr>
		<tr>
			<td class="result-title-td1" style="border-bottom: 1px solid #CFD8DC !important;">Gross Pay: </td>
			<td class="result-total-td1" style="color: #2980b9;border-bottom: 1px solid #CFD8DC !important;">
				<?php echo number_format($payslip->gross_pay,2); ?>
			</td>
			<td class="result-title-td1" style="border-bottom: 1px solid #CFD8DC !important;">Deductions: </td>
			<td class="result-total-td1" style="color: #c0392b;border-bottom: 1px solid #CFD8DC !important;">
				<?php echo number_format($total_sss_deduct->total_sss_deduct+$total_philhealth_deduct->total_philhealth_deduct+$total_pagibig_deduct->total_pagibig_deduct+$total_withholdingtax_deduct->total_withholdingtax_deduct+$total_sss_loan->total_sss_loan+$total_pagibig_loan->total_pagibig_loan+$total_cash_advance->total_cash_advance+$total_coop_loan->total_coop_loan+$total_coop_contribution->total_coop_contribution+$total_calamity_loan->total_calamity_loan+$total_other_deduction->total_other_deduction+$payslip->days_wout_pay_amt+$payslip->minutes_late_amt,2); ?>
			</td>
			<td class="result-title-td1" style="border-bottom: 1px solid #CFD8DC !important;">Net: </td>
			<td class="result-total-td1" style="color: #27ae60;border-bottom: 1px solid #CFD8DC !important;">
				<?php echo number_format($payslip->net_pay,2); ?>
			</td>
		</tr>
	</table>
</div>
