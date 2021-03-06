<!DOCTYPE html>
<html>
</html>


<body>
<table class="tbl_pay_slip_print" width="100%" border="1" style="font-size: 8pt!important;border-collapse: collapse;width: 100%; border-spacing: 0;font-family: calibri;page-break-inside:avoid;color: black;">
  <tr>   
    <td colspan="3" valign="top">
      <table style="border-collapse: collapse;width: 100%;max-width: 100%;border-spacing: 0;font-family: calibri;page-break-inside:avoid;">
          <tr>
            <td style="font-weight: bold; font-size: 8pt;padding-left: 5px;padding-right: 5px;border-bottom: 1px solid black; padding-top: 10px;padding-bottom: 10px;" valign="middle">
              <?php echo $payslip->branch; ?>
            </td>
          </tr>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" valign="middle"><strong>Payslip No:</strong> <?php echo $payslip->payslip_no; ?></td>
          </tr>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" valign="middle"><strong>NAME:</strong> <?php echo $payslip->full_name; ?></td>
          </tr>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" valign="middle"><strong>NAME OF PROJECT / DEPARTMENT:</strong> <?php echo $payslip->department; ?> </td>
          </tr>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" valign="middle"><strong>PAY TYPE:</strong> <?php echo $payslip->payment_type; ?></td>
          </tr>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" valign="middle"><strong>PERIOD COVERED:</strong>
              <?php echo $payslip->payperiod; ?></td>
          </tr>        
      </table>
    </td>
    <td style="border-bottom: 0px!important;border-top: 1px!important;font-size: 8pt!important;border-top: 1px solid black!important; border-left: 1px solid black;border-right: 1px solid black!important;padding-left: 5px;padding-right: 5px;">
      
            <strong>Payslip No:</strong><br/>
            <?php echo $payslip->payslip_no;?><br/><br/>

            <strong>NAME:</strong><br/>
            <?php echo $payslip->full_name; ?><br/><br/>


            <strong>NAME OF PROJECT/DEPARTMENT: </strong><br/>
            <?php echo $payslip->department."/<br>".$payslip->group_desc; ?>

    </td>
  </tr>
  <tr>
    <td width="25%" valign="top" style="border: 1px solid black!important;">
      <table cellpadding="3" style="border-collapse: collapse;width: 100%;max-width: 100%;border-spacing: 0;font-family: calibri;page-break-inside:avoid;">
        <?php if(number_format($payslip->reg_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Basic Pay: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->reg_pay,2); ?></td>
          </tr>
        <?php }?>
        <?php if(number_format($payslip->sun_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Sunday Pay: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->sun_pay,2); ?></td>
          </tr>
        <?php }?>
        <?php if(number_format($payslip->cola_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">E.COLA: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->cola_pay,2); ?></td>
          </tr>
        <?php }?>
        <?php if(number_format($payslip->reg_ot_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Regular OT: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->reg_ot_pay,2); ?></td>
          </tr>
        <?php }?>  
        <?php if(number_format($payslip->sun_ot_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Sunday OT: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->sun_ot_pay,2); ?></td>
          </tr>
        <?php }?>    
        <?php if(number_format($payslip->spe_hol_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Special Holiday: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->spe_hol_pay,2); ?></td>
          </tr>
        <?php }?>    
        <?php if(number_format($payslip->reg_hol_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Legal Holiday: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->reg_hol_pay,2); ?></td>
          </tr>
        <?php }?>   
        <?php if(number_format($payslip->reg_nsd_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">NSD Reg: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->reg_nsd_pay,2); ?></td>
          </tr>
        <?php }?>   
        <?php if(number_format($payslip->sun_nsd_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">NSD Sunday: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->sun_nsd_pay,2); ?></td>
          </tr>
        <?php }?> 
        <?php if(number_format($payslip->days_with_pay_amt,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Days w/ pay: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->days_with_pay_amt,2); ?></td>
          </tr>
        <?php }?> 
        <?php if(number_format($payslip->day_off_pay,0) != 0){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Rest Day Pay: </td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->day_off_pay,2); ?></td>
          </tr>
        <?php }?> 
        <?php foreach($earnings as $earning){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;"><?php echo $earning->earnings_desc; ?> :</td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($earning->earnings_amount,2); ?></td>
          </tr>
        <?php }?>
      </table>
    </td>
    <td width="25%" valign="top" style="border: 1px solid black!important;">
      <table cellpadding="3" style="border-collapse: collapse;width: 100%;max-width: 100%;border-spacing: 0;font-family: calibri;page-break-inside:avoid;">
        <?php if(number_format($payslip->total_deductions,0) == 0){ ?>
          <tr>
            <td colspan="2" style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">
              <center>- - - No Deduction - - -</center>
            </td>
          </tr>
        <?php }?>
        <?php foreach($deductions as $row){?>
          <tr>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;"><?php echo $row->deduction_desc; ?> :</td>
            <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($row->deduction_amount,2); ?></td>
          </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_late_amt,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Minutes Late:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_late_amt,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_undertime_amt,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Minutes Undertime:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_undertime_amt,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_excess_break_amt,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Minutes Excess Break:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_excess_break_amt,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->days_wout_pay_amt,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Days w/o pay:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->days_wout_pay_amt,2);?></td>
        </tr>
        <?php }?>
      </table>
    </td>
    <td width="25%" valign="top" style="border: 1px solid black!important;">      
      <table cellpadding="3" style="border-collapse: collapse;width: 100%;max-width: 100%;border-spacing: 0;font-family: calibri;page-break-inside:avoid;">
        <?php if(number_format($payslip->reg,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Regular Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->reg,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->sun,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Sunday Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->sun,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($reg_ot_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Regular OT Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($reg_ot_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($sun_ot_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Sunday OT Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($sun_ot_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($spe_hol_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Special Holiday Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($spe_hol_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($reg_hol_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Legal Holiday Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($reg_hol_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($nsd_reg_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">NSD Reg Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($nsd_reg_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($nsd_sun_hrs,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">NSD Sun Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($nsd_sun_hrs,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_late,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Late (Minutes):</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_late,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_undertime,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Undertime (Minutes):</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_undertime,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->minutes_excess_break,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Total Excess Break (Minutes):</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->minutes_excess_break,2);?></td>
        </tr>
        <?php }?>
        <?php if(number_format($payslip->day_off,0) != 0){?>
        <tr>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;">Rest Day Hours:</td>
          <td style="font-size: 8pt;padding-left: 5px;padding-right: 5px;" align="right"><?php echo number_format($payslip->day_off,2);?></td>
        </tr>
        <?php }?>
      </table>
    </td>
    <td style="border-bottom: 0px!important;border-top: 0px!important;border-right: 1px solid black!important;font-size: 8pt!important;padding-left: 5px;padding-right: 5px;" valign="top" align="left">
        <br />
        <strong>PAY TYPE</strong><br/>
        <?php echo $payslip->payment_type; ?><br/><br/>

        <strong>PERIOD COVERED</strong><br/>
        <?php echo $payslip->payperiod; ?>

        <center>
            <hr>
            <p>I acknowledge that I received the amount and have no further claims for the services rendered.</p>
        </center>
    </td>
  </tr>
  <tr>
    <td class="result-title-td" style="border: 1px solid black!important;">
      <table width="100%">
        <tr>
          <td>Gross Pay:</td>
          <td align="right">
            <span style="float: right!important;text-align: right!important;margin-right: 3px;color: #1A237E;">
              <?php echo number_format($payslip->gross_pay,2); ?>
            </span>
          </td>
        </tr>
      </table>
    </td>
    <td class="result-title-td" style="border: 1px solid black!important;">
      <table width="100%">
        <tr>
          <td>Deductions:</td>
          <td align="right">
              <span style="float: right!important;text-align: right!important;margin-right: 3px;color: #d50000;">
                <?php echo number_format($payslip->total_deductions,2); ?>
              </span>
          </td>
        </tr>
      </table>
    </td>
    <td class="result-title-td" style="border: 1px solid black!important;">
      <table width="100%">
        <tr>
          <td>Net Pay:</td>
          <td align="right">
              <span style="float: right!important;text-align: right!important;margin-right: 3px;color: #1B5E20;">
                <?php echo number_format($payslip->net_pay,2); ?>
              </span>
          </td>
        </tr>
      </table>
    </td>
    <td style="border-top: 0px!important;border-bottom: 1px solid black!important;border-right: 1px solid black!important;">
      <center>
        <strong>Employee Signature</strong>
      </center>
    </td>
  </tr>
</table>
</body>
</html>