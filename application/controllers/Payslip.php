<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslip extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Ref_Emptype_model');
        $this->load->model('RefDepartment_model');
        $this->load->model('RefPosition_model');
        $this->load->model('RefBranch_model');
        $this->load->model('RefSection_model');
        $this->load->model('TemporaryDeduction_model');
        $this->load->model('RefGroup_model');
        $this->load->model('RefDepartment_model');
        $this->load->model('RefDeductionSetup_model');
        $this->load->model('Payslip_model');
        $this->load->model('GeneralSettings_model');
        $this->load->model('RefOtherEarningRegular_model');
        $this->load->model('PaySlip_earning_model');
        $this->load->model('PaySlip_deduction_model');
        $this->load->model('Payslip_OtherEarning_model');
        $this->load->model('Users_model');
        $this->load->model('RefPayPeriod_model');
        $this->load->model('RefLeave_model');
        $this->load->model('Leavefiled_model');
        $this->load->model('Entitlement_model');
        $this->load->model('RefYearSetup_model');
        $this->load->model('Memorandum_model');
        $this->load->model('Announcement_model');
        $this->load->model('SchedEmployee_model');
        
        $this->load->library('M_pdf');
    }
    public function index() {

        $data1['active']=2;        
        $data1['memo']=$this->Memorandum_model->get_listofmemos($this->session->employee_id,null,null,1);

        $employee = $this->Employee_model->get_employee_info($this->session->employee_id);

        $ref_department_id = 0;
        $ref_branch_id = 0;
        $group_id = 0;

        if (count($employee)>0){
            if ($employee[0]->ref_department_id == null){ $ref_department_id = 0; }else{ $ref_department_id =$employee[0]->ref_department_id; }
            if ($employee[0]->ref_branch_id == null){ $ref_branch_id = 0; }else{ $ref_branch_id =$employee[0]->ref_branch_id; }
            if ($employee[0]->group_id == null){ $group_id = 0; }else{ $group_id =$employee[0]->group_id; }
        }
        
        $data1['announcement'] = $this->Announcement_model->get_listodannouncement($ref_department_id,$ref_branch_id,$group_id,null,null,1);        
        $data['_def_css_files']=$this->load->view('template/assets/css_files_employee','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files_employee','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigationemployee',$data1,TRUE);
        $data['_header']=$this->load->view('template/elements/header','',TRUE);
        $data['_footer']=$this->load->view('template/elements/footer','',TRUE);
        $data['_rights'] = $this->load->view('template/elements/rights', '', TRUE);
        $data['loader'] = $this->load->view('template/elements/loader', '', TRUE);
        $data['loaderscript'] = $this->load->view('template/elements/loaderscript', '', TRUE);

        $data['title'] = 'Pay Slip';

        $data['user_id']=$this->session->user_id;
        $data['ecode'] = $this->session->employee_code;
        $this->load->view('pay_slip_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $employee_id = $this->session->employee_id;

                $response['data']=$this->Payslip_model->get_list(
                    array('daily_time_record.employee_id'=>$employee_id),
                    'pay_slip.net_pay,pay_slip.gross_pay, pay_slip.total_deductions, pay_slip.payslip_no, pay_slip.pay_slip_id, employee_list.*,CONCAT(employee_list.first_name," ",middle_name," ",employee_list.last_name) as full_name, CONCAT(DATE_FORMAT(pay_period_start, "%d %M %Y")," to ",DATE_FORMAT(pay_period_end,"%d %M %Y")) as pay_period',
                    array(
                        array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                         array('employee_list','employee_list.employee_id=daily_time_record.employee_id','left'),
                         array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                         array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left')
                         )
                    );
                echo json_encode($response);

                break;
        }
    }


    function layout($layout=null,$filter_value=null,$filter_value2=null,$type=null){




        switch($layout){
            //****************************************************
            case 'pay-slip': //
                        $getpayslip=$this->Payslip_model->get_list(
                        array('pay_slip.pay_slip_id'=>$filter_value),
                            'pay_slip.*,
                            daily_time_record.*,
                            employee_list.*,
                            refpayperiod.pay_period_start,
                            refpayperiod.pay_period_end,
                            CONCAT(DATE_FORMAT(refpayperiod.pay_period_start, "%m/%d/%Y")," ~ ",DATE_FORMAT(refpayperiod.pay_period_end, "%m/%d/%Y")) as payperiod,
                            CONCAT(employee_list.first_name," ",middle_name," ",employee_list.last_name) as full_name,
                            ref_payment_type.payment_type,
                            ref_department.department,
                            refgroup.group_desc,
                            ref_branch.branch,
                            ref_branch.description',
                        array(
                             array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                             array('employee_list','employee_list.employee_id=daily_time_record.employee_id','left'),
                             array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                             array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                             array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                             array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                             array('refgroup','refgroup.group_id=emp_rates_duties.group_id','left'),
                             array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left'),
                             )
                        );

                        // DEDUCTIONS & EARNINGS
                        $deductions=$this->PaySlip_deduction_model->get_payslip_deductions($filter_value);
                        $earnings=$this->PaySlip_earning_model->get_payslip_earnings($filter_value);

                        //COMPANY INFO GET
                        $getcompany=$this->GeneralSettings_model->get_list(
                        null,
                        'company_setup.*'
                        );

                        $data['payslip']=$getpayslip[0];
                        $data['deductions']=$deductions;
                        $data['earnings']=$earnings;
                        $data['reg_ot_hrs']=$getpayslip[0]->ot_reg+$getpayslip[0]->ot_reg_reg_hol+$getpayslip[0]->ot_reg_spe_hol;
                        $data['sun_ot_hrs']=$getpayslip[0]->ot_sun+$getpayslip[0]->ot_sun_reg_hol+$getpayslip[0]->ot_sun_spe_hol;
                        $data['spe_hol_hrs']=$getpayslip[0]->spe_hol+$getpayslip[0]->sun_spe_hol;
                        $data['reg_hol_hrs']=$getpayslip[0]->reg_hol+$getpayslip[0]->sun_reg_hol;
                        $data['nsd_reg_hrs']=$getpayslip[0]->nsd_reg+$getpayslip[0]->nsd_reg_reg_hol+$getpayslip[0]->nsd_reg_spe_hol;
                        $data['nsd_sun_hrs']=$getpayslip[0]->nsd_sun+$getpayslip[0]->nsd_sun_reg_hol+$getpayslip[0]->nsd_sun_spe_hol;
                        $data['company']=$getcompany[0];
                        
                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/pay_slip_content_print_html',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/pay_slip_content_print_html',$data,TRUE);
                        }

                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = $getpayslip[0]->full_name."-".$getpayslip[0]->pay_period_start."-".$getpayslip[0]->pay_period_end.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pay_slip_content_print_html',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");
                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = $getpayslip[0]->full_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pay_slip_content_print_html',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->SetJS('this.print();');
                            $pdf->Output();
                        }

                        break;



            case 'download_pdf_payslip':
                        $getpayslip=$this->Payslip_model->get_list(
                        array('pay_slip.pay_slip_id'=>$filter_value),
                            'pay_slip.*,
                            daily_time_record.*,
                            employee_list.*,
                            refpayperiod.pay_period_start,
                            refpayperiod.pay_period_end,
                            CONCAT(DATE_FORMAT(refpayperiod.pay_period_start, "%m/%d/%Y")," ~ ",DATE_FORMAT(refpayperiod.pay_period_end, "%m/%d/%Y")) as payperiod,
                            CONCAT(DATE_FORMAT(pay_period_start, "%d %M %Y")," to ",DATE_FORMAT(pay_period_end,"%d %M %Y")) as pay_period,
                            CONCAT(employee_list.first_name," ",middle_name," ",employee_list.last_name) as full_name,
                            ref_payment_type.payment_type,
                            ref_department.department,
                            refgroup.group_desc,
                            ref_branch.branch,
                            ref_branch.description',
                        array(
                             array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                             array('employee_list','employee_list.employee_id=daily_time_record.employee_id','left'),
                             array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                             array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                             array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                             array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                             array('refgroup','refgroup.group_id=emp_rates_duties.group_id','left'),
                             array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left'),
                             )
                        );

                        // DEDUCTIONS & EARNINGS
                        $deductions=$this->PaySlip_deduction_model->get_payslip_deductions($filter_value);
                        $earnings=$this->PaySlip_earning_model->get_payslip_earnings($filter_value);

                        //COMPANY INFO GET
                        $getcompany=$this->GeneralSettings_model->get_list(
                        null,
                        'company_setup.*'
                        );

                        $data['payslip']=$getpayslip[0];
                        $data['deductions']=$deductions;
                        $data['earnings']=$earnings;
                        $data['reg_ot_hrs']=$getpayslip[0]->ot_reg+$getpayslip[0]->ot_reg_reg_hol+$getpayslip[0]->ot_reg_spe_hol;
                        $data['sun_ot_hrs']=$getpayslip[0]->ot_sun+$getpayslip[0]->ot_sun_reg_hol+$getpayslip[0]->ot_sun_spe_hol;
                        $data['spe_hol_hrs']=$getpayslip[0]->spe_hol+$getpayslip[0]->sun_spe_hol;
                        $data['reg_hol_hrs']=$getpayslip[0]->reg_hol+$getpayslip[0]->sun_reg_hol;
                        $data['nsd_reg_hrs']=$getpayslip[0]->nsd_reg+$getpayslip[0]->nsd_reg_reg_hol+$getpayslip[0]->nsd_reg_spe_hol;
                        $data['nsd_sun_hrs']=$getpayslip[0]->nsd_sun+$getpayslip[0]->nsd_sun_reg_hol+$getpayslip[0]->nsd_sun_spe_hol;
                        $data['company']=$getcompany[0];

                        $file_name=$getpayslip[0]->full_name." (Payslip #".$getpayslip[0]->payslip_no." - ".$getpayslip[0]->pay_period.")";
                        $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                        $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                        $content=$this->load->view('template/pay_slip_content_print_html',$data,TRUE); //load the template
                        $pdf->WriteHTML($content);
                        //download it.
                        $pdf->Output($pdfFilePath,"D");



            break;

            case 'print_payslip':
                        $getpayslip=$this->Payslip_model->get_list(
                        array('pay_slip.pay_slip_id'=>$filter_value),
                        'pay_slip.*,daily_time_record.*,refpayperiod.pay_period_start,refpayperiod.pay_period_end,
                        employee_list.*,CONCAT(employee_list.first_name," ",middle_name," ",employee_list.last_name) as full_name,
                        ref_payment_type.payment_type,ref_department.department,refgroup.group_desc,ref_branch.branch,ref_branch.description',
                        array(
                             array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                             array('pay_slip_other_earnings','pay_slip_other_earnings.pay_slip_id=pay_slip.pay_slip_id','left'),
                             array('employee_list','employee_list.employee_id=daily_time_record.employee_id','left'),
                             array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                             array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                             array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                             array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                             array('refgroup','refgroup.group_id=emp_rates_duties.group_id','left'),
                             array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left'),
                             )
                        );
                        /*echo json_encode($getpayslip);*/
                        //TOTAL ALLOWANCE
                        $gettotal_allowance=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id=1',
                        'SUM(earnings_amount) as total_allowance'
                        );
                        //TOTAL SALARY ADJUSTMENTS
                        $getearningsalaryadjustments=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id=2',
                        'SUM(earnings_amount) as total_earnings_salary_adjustments'
                        );
                        //echo json_encode($getearningsalaryadjustments);
                        //TOTAL OTHER EARNINGs
                        $getotherearnings=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id!=1 AND earnings_id!=2',
                        'SUM(earnings_amount) as total_other_earnings'
                        );
                        //SSS DEDUCTION GET
                        $getsssdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=1 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_deduct'
                        );
                        //PHILHEALTH DEDUCTION GET
                        $getphilhealthdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=2 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_philhealth_deduct'
                        );
                        //PAGIBIG DEDUCTION GET
                        $getpagibigdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=3  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_deduct'
                        );
                        //WITH HOLDING DEDUCTION GET
                        $getwithholdingdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=4  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_withholdingtax_deduct'
                        );
                        //SSS LOAN DEDUCTION GET
                        $getsssloandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=5  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_loan'
                        );
                        //PAG IBIG LOAN DEDUCTION GET
                        $getpagibigloandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=6  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_loan'
                        );
                        //CASH ADVANCE DEDUCTION GET
                        $getcashadvancededuction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=7  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_cash_advance'
                        );
                        //COOP LOAN DEDUCTION GET
                        $getcooploandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=8  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_loan'
                        );
                        //COOP CONTRIBUTION DEDUCTION GET
                        $getcoopcontributiondeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=9  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_contribution'
                        );

                        //PAG IBIG CALAMITY La+OAN DEDUCTION GET
                        $getpagibigcalamityloan=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=12  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_calamity_loan'
                        );

                        //OTHER DEDUCTION GET
                        $getotherdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND refdeduction.deduction_type_id!=1 AND refdeduction.deduction_type_id!=2 AND refdeduction.deduction_type_id!=4 AND active_deduct=TRUE',
                        'SUM(pay_slip_deductions.deduction_amount) as total_other_deduction',
                        array(
                             array('refdeduction','refdeduction.deduction_id=pay_slip_deductions.deduction_id','left'),
                             )
                        );
                        //echo json_encode($getsssdeduction);

                        //echo json_encode($getotherearnings);
                        //COMPANY INFO GET
                        $getcompany=$this->GeneralSettings_model->get_list(
                        null,
                        'company_setup.*'
                        );
                        $data['payslip']=$getpayslip[0];
                        $data['earning_total_allowance']=$gettotal_allowance[0];
                        $data['earning_salary_adjustment']=$getearningsalaryadjustments[0];
                        $data['other_earnings']=$getotherearnings[0];
                        $data['total_sss_deduct']=$getsssdeduction[0];
                        $data['total_philhealth_deduct']=$getphilhealthdeduction[0];
                        $data['total_pagibig_deduct']=$getpagibigdeduction[0];
                        $data['total_withholdingtax_deduct']=$getwithholdingdeduction[0];
                        $data['total_sss_loan']=$getsssloandeduction[0];
                        $data['total_pagibig_loan']=$getpagibigloandeduction[0];
                        $data['total_cash_advance']=$getcashadvancededuction[0];
                        $data['total_coop_loan']=$getcooploandeduction[0];
                        $data['total_coop_contribution']=$getcoopcontributiondeduction[0];
                        $data['total_calamity_loan']=$getpagibigcalamityloan[0];
                        $data['total_other_deduction']=$getotherdeduction[0];
                        $data['company']=$getcompany[0];
                        $type = $this->input->get('type',TRUE);

                        echo $this->load->view('template/pay_slip_content_print_html',$data,TRUE);


            break;

            case 'pay-slip-printall': //
                        /*$getpayslip=$this->Payslip_model->get_list(
                        array('pay_slip.pay_slip_id'=>$filter_value),
                        'pay_slip.*,daily_time_record.*,refpayperiod.pay_period_start,refpayperiod.pay_period_end,
                        employee_list.*,CONCAT(employee_list.first_name," ",middle_name," ",employee_list.last_name) as full_name,
                        ref_payment_type.payment_type,ref_department.department,refgroup.group_desc',
                        array(
                             array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                             array('pay_slip_other_earnings','pay_slip_other_earnings.pay_slip_id=pay_slip.pay_slip_id','left'),
                             array('employee_list','employee_list.employee_id=daily_time_record.employee_id','left'),
                             array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                             array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                             array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                             array('refgroup','refgroup.group_id=emp_rates_duties.group_id','left'),
                             array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left'),
                             )
                        );*/
                        /*echo json_encode($getpayslip);*/
                        //TOTAL ALLOWANCE
                        /*$gettotal_allowance=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id=1',
                        'SUM(earnings_amount) as total_allowance'
                        );*/
                        //TOTAL SALARY ADJUSTMENTS
                        /*$getearningsalaryadjustments=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id=2',
                        'SUM(earnings_amount) as total_earnings_salary_adjustments'
                        );*/
                        //echo json_encode($getearningsalaryadjustments);
                        //TOTAL OTHER EARNINGs
                        /*$getotherearnings=$this->PaySlip_earning_model->get_list(
                        'pay_slip_id='.$filter_value.' AND earnings_id!=1 AND earnings_id!=2',
                        'SUM(earnings_amount) as total_other_earnings'
                        );*/
                        //SSS DEDUCTION GET
                        /*$getsssdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=1 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_deduct'
                        );*/
                        //PHILHEALTH DEDUCTION GET
                        /*$getphilhealthdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=2 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_philhealth_deduct'
                        );*/
                        //PAGIBIG DEDUCTION GET
                        /*$getpagibigdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=3  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_deduct'
                        );*/
                        //WITH HOLDING DEDUCTION GET
                       /* $getwithholdingdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=4  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_withholdingtax_deduct'
                        );*/
                        //SSS LOAN DEDUCTION GET
                        /*$getsssloandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=5  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_loan'
                        );*/
                        //PAG IBIG LOAN DEDUCTION GET
                        /*$getpagibigloandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=6  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_loan'
                        );*/
                        //CASH ADVANCE DEDUCTION GET
                        /*$getcashadvancededuction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=7  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_cash_advance'
                        );*/
                        //COOP LOAN DEDUCTION GET
                        /*$getcooploandeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=8  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_loan'
                        );*/
                        //COOP CONTRIBUTION DEDUCTION GET
                        /*$getcoopcontributiondeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=9  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_contribution'
                        );*/

                        //PAG IBIG CALAMITY La+OAN DEDUCTION GET
                        /*$getpagibigcalamityloan=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id=12  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_calamity_loan'
                        );*/

                        //OTHER DEDUCTION GET
                        /*$getotherdeduction=$this->PaySlip_deduction_model->get_list(
                        'pay_slip_id='.$filter_value.' AND deduction_id!=1  AND deduction_id!=2  AND deduction_id!=3  AND deduction_id!=4
                         AND deduction_id!=5  AND deduction_id!=6  AND deduction_id!=7  AND deduction_id!=8  AND deduction_id!=9  AND deduction_id!=12  AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_other_deduction'
                        );*/
                        //echo json_encode($getsssdeduction);

                        //echo json_encode($getotherearnings);
                        //COMPANY INFO GET
                        /*$getcompany=$this->GeneralSettings_model->get_list(
                        null,
                        'company_setup.*'
                        );
                        $data['payslip']=$getpayslip[0];
                        $data['earning_total_allowance']=$gettotal_allowance[0];
                        $data['earning_salary_adjustment']=$getearningsalaryadjustments[0];
                        $data['other_earnings']=$getotherearnings[0];
                        $data['total_sss_deduct']=$getsssdeduction[0];
                        $data['total_philhealth_deduct']=$getphilhealthdeduction[0];
                        $data['total_pagibig_deduct']=$getpagibigdeduction[0];
                        $data['total_withholdingtax_deduct']=$getwithholdingdeduction[0];
                        $data['total_sss_loan']=$getsssloandeduction[0];
                        $data['total_pagibig_loan']=$getpagibigloandeduction[0];
                        $data['total_cash_advance']=$getcashadvancededuction[0];
                        $data['total_coop_loan']=$getcooploandeduction[0];
                        $data['total_coop_contribution']=$getcoopcontributiondeduction[0];
                        $data['total_calamity_loan']=$getpagibigcalamityloan[0];
                        $data['total_other_deduction']=$getotherdeduction[0];
                        $data['company']=$getcompany[0];*/

                        $data['pay_period_id']=$filter_value2;
                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/pay_slip_content_printall_html',$data,TRUE);
                            //echo $this->load->view('template/dr_content_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/pay_slip_content_printall_content',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = $getpayslip[0]->full_name."-".$getpayslip[0]->pay_period_start."-".$getpayslip[0]->pay_period_end.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pay_slip_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = $getpayslip[0]->full_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pay_slip_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->SetJS('this.print();');
                            $pdf->Output();
                        }

                        break;

            case 'payroll-register-summary': //
                        //show only inside grid with menu button
                        if($filter_value=="all" AND $filter_value2=="all"){
                            $filter_array=null;
                        }
                        if($filter_value=="all" AND $filter_value2!="all"){
                            $filter_array=array('refpayperiod.month_id'=>$filter_value2);
                        }
                        if($filter_value!="all" AND $filter_value2=="all"){
                            $filter_array=array('ref_branch.ref_branch_id'=>$filter_value,'emp_rates_duties.active_rates_duties'=>TRUE);
                        }
                        if($filter_value!="all" AND $filter_value2!="all"){

                        }
                        $getpayrollregsummary=$this->Payslip_model->get_list(
                        $filter_array,
                        'pay_slip.*,SUM(reg_pay) as total_reg_pay,SUM(sun_pay+reg_hol_pay+spe_hol_pay+reg_ot_pay+sun_ot_pay) as total_hol_pay_sunday,
                        SUM(reg_nsd_pay+sun_nsd_pay) as total_nsd_amount,
                        SUM(pay_slip.minutes_late_amt) as total_minutes_late,ref_branch.branch',
                        array(
                             array('daily_time_record','daily_time_record.dtr_id=pay_slip.dtr_id','left'),
                             array('emp_rates_duties','emp_rates_duties.employee_id=daily_time_record.employee_id','left'),
                             array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                             array('refpayperiod','refpayperiod.pay_period_id=daily_time_record.pay_period_id','left'),
                             )
                        );
                        /*echo $branch;*/
                        //GET SALARY ADJUSTMENTS
                        $getadjustment=$this->Payslip_OtherEarning_model->get_list(
                        array('pay_slip_other_earnings.earnings_id'=>2),
                        'SUM(earnings_amount) as total_adjustment_amount'
                        );
                         //GET OTHER PAY/EARNING
                        $getotherpay=$this->Payslip_OtherEarning_model->get_list(
                        'pay_slip_other_earnings.earnings_id!=2',
                        'SUM(earnings_amount) as total_other_pay'
                        );
                         //TOTAL SSS DEDUCTION GET
                        $gettotalsssdeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=1 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_deduct'
                        );

                        //TOTAL PHILHEALTH GET
                        $gettotalphilhealthdeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=2 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_philhealth_deduct'
                        );
                        //TOTAL PHILHEALTH GET
                        $gettotalpagibigdeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=3 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_deduct'
                        );

                        $gettotalwithholdingdeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=4 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_withholdingtax_deduct'
                        );
                        //get total sss loan
                        $gettotalsssloandeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=5 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_sss_loan'
                        );
                        //get total pagibig loan
                        $gettotalpagibigloandeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=6 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_pagibig_loan'
                        );
                        //COOP LOAN DEDUCTION GET
                        $gettotalcooploandeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=8 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_loan'
                        );
                        //COOP CONTRIBUTION DEDUCTION GET
                        $gettotalcoopcontributiondeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id=9 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_coop_contribution'
                        );
                        //OTHER DEDUCTION GET
                        $gettotalotherdeduction=$this->PaySlip_deduction_model->get_list(
                        'deduction_id!=1  AND deduction_id!=2  AND deduction_id!=3  AND deduction_id!=4
                         AND deduction_id!=5  AND deduction_id!=6  AND deduction_id!=7  AND deduction_id!=8  AND deduction_id!=9 AND active_deduct=TRUE',
                        'SUM(deduction_amount) as total_other_deduction'
                        );

                       /*echo json_encode($gettotalotherdeduction);*/


                        $data['payroll_register_summary']=$getpayrollregsummary[0];
                        $data['total_adjustment_amount']=$getadjustment[0];
                        $data['total_other_pay']=$getotherpay[0];
                        $data['total_sss_deduct']=$gettotalsssdeduction[0];
                        $data['total_philhealth_deduct']=$gettotalphilhealthdeduction[0];
                        $data['total_pagibig_deduct']=$gettotalpagibigdeduction[0];
                        $data['total_withholdingtax_deduct']=$gettotalwithholdingdeduction[0];
                        $data['total_sss_loan']=$gettotalsssloandeduction[0];
                        $data['total_pagibig_loan']=$gettotalpagibigloandeduction[0];
                        $data['total_coop_loan']=$gettotalcooploandeduction[0];
                        $data['total_coop_contribution']=$gettotalcoopcontributiondeduction[0];
                        $data['total_other_deduction']=$gettotalotherdeduction[0];

                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/payroll_register_summary_html',$data,TRUE);
                            //echo $this->load->view('template/dr_content_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/payroll_register_summary_html',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = "PR-Summary-".$getpayrollregsummary[0]->branch.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/payroll_register_summary',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = "PR-Summary-".$getpayrollregsummary[0]->branch.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/payroll_register_summary',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            /*$pdf->SetJS('this.print();');*/
                            $pdf->Output();
                        }

              break;

              case 'pay-slip-delete': //
                    $pay_slip_id = $this->input->post('pay_slip_id', TRUE);

                    // echo $pay_slip_id;
                    $this->db->where('pay_slip_id', $pay_slip_id);
                    $this->db->delete('pay_slip');
                    //deleting deductions based on foreign key
                    $this->db->where('pay_slip_id', $pay_slip_id);
                    $this->db->delete('pay_slip_deductions');
                    //deleting earnings based on foreign key
                    $this->db->where('pay_slip_id', $pay_slip_id);
                    $this->db->delete('pay_slip_other_earnings');
              break;

              case 'pay-slip-print-all':
                    $data['payslips']=$this->Payslip_model->get_payslip($filter_value,$filter_value2,$type);
                    echo $this->load->view('template/pay_slip_content_printall_html',$data,TRUE);
              break;

        }
    }
}
