<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model('Employee_model');
        $this->load->model('Users_model');
        $this->load->model('RefPayPeriod_model');
        $this->load->model('RefLeave_model');
        $this->load->model('Leavefiled_model');
        $this->load->model('Entitlement_model');
        $this->load->model('RefYearSetup_model');
        $this->load->model('Memorandum_model');
        $this->load->model('Announcement_model');
        $this->load->model('SchedEmployee_model');
        $this->load->model('GeneralSettings_model');

        $this->load->library('M_pdf');
        $this->validate_session();

    }

    public function index()
    {

        $data1['active']=5;
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

        $data['user_id']=$this->session->user_id;
        $data['pay_period']=$this->RefPayPeriod_model->get_list(
            array('refpayperiod.is_deleted'=>FALSE),
            'refpayperiod.*, CONCAT(pay_period_start," ~ ",pay_period_end) as period',   
            array(
            ),
        'refpayperiod.pay_period_start DESC'
        );

        $data['status'] = $this->RefLeave_model->get_status_list();
        $data['type_leave']=$this->RefLeave_model->get_list(
            array('ref_leave_type.is_deleted'=>FALSE),
            'ref_leave_type.*',   
            array(
            ),
        'ref_leave_type.ref_leave_type_id DESC'
        );

        $data['ecode'] = $this->session->employee_code;;
        $this->load->view('announcement_view',$data);
    }

    function transaction($txn = null, $filter_value= null) {
        switch ($txn) {

            case 'announcement_report':

                $announcement_post_id = $filter_value;
                $employee_id = $this->session->employee_id;

                $data['company']=$this->GeneralSettings_model->get_list()[0];
                $data['emp_info']=$this->Employee_model->get_list(
                    'employee_list.employee_id='.$employee_id,
                    'employee_list.*,CONCAT(employee_list.first_name," ",employee_list.middle_name," ",employee_list.last_name) as full_name
                    ,ref_branch.branch,ref_department.department',
                    array(
                        array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                        array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                        array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                        )
                );

                $data['data']=$this->Announcement_model->get_announcement_details($announcement_post_id);

                $file_name=$data['emp_info'][0]->full_name.' (Announcement - '.$data['data'][0]->announcement_title.')';
                $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                $content=$this->load->view('template/announcement_list_html',$data,TRUE); //load the template
                $pdf->WriteHTML($content);
                //download it.
                $pdf->Output($pdfFilePath,"D");

                break;
            case 'read_announcement':
                $m_announcement = $this->Announcement_model;
                $announcement_post_id = $this->input->post('announcement_post_id', TRUE);

                $m_announcement->is_read = 1;
                $m_announcement->modify($announcement_post_id);

                $employee_id = $this->session->employee_id;
                $employee = $this->Employee_model->get_employee_info($employee_id);

                $ref_department_id = 0;
                $ref_branch_id = 0;
                $group_id = 0;

                if (count($employee)>0){
                    $ref_department_id = $employee[0]->ref_department_id;
                    $ref_branch_id = $employee[0]->ref_branch_id;
                    $group_id = $employee[0]->group_id;
                }

                $response['announcement_count'] = count($m_announcement->get_listodannouncement($ref_department_id,$ref_branch_id,$group_id,null,null,1));
                echo json_encode($response);
                break;

            case 'listofannouncement':
                $m_announcement = $this->Announcement_model;

                $from_date_temp = $this->input->post('from_date',TRUE); 
                $to_date_temp = $this->input->post('to_date',TRUE); 

                if ($from_date_temp == null){
                    $from_date = null;
                }else{
                    $from_date = date("Y-m-d", strtotime($from_date_temp)); 
                }

                if ($to_date_temp == null){
                    $to_date = null;
                }else{
                    $to_date = date("Y-m-d", strtotime($to_date_temp)); 
                }

                $employee_id = $this->session->employee_id;
                $employee = $this->Employee_model->get_employee_info($employee_id);

                $ref_department_id = 0;
                $ref_branch_id = 0;
                $group_id = 0;

                if (count($employee)>0){
                    if ($employee[0]->ref_department_id == null){ $ref_department_id = 0; }else{ $ref_department_id =$employee[0]->ref_department_id; }
                    if ($employee[0]->ref_branch_id == null){ $ref_branch_id = 0; }else{ $ref_branch_id =$employee[0]->ref_branch_id; }
                    if ($employee[0]->group_id == null){ $group_id = 0; }else{ $group_id =$employee[0]->group_id; }
                }

                $response['data'] = $m_announcement->get_listodannouncement($ref_department_id,$ref_branch_id,$group_id,$from_date,$to_date);
                echo json_encode($response);
                break;



        }
    }
}
