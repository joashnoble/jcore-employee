<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends CORE_Controller {

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

        $data1['active']=3;
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
        $this->load->view('leaves_view',$data);
    }

    function transaction($txn = null, $filter_value= null) {
        switch ($txn) {


            case 'listofleave':
                $m_leave=$this->Leavefiled_model;

                $leave_status_id = $this->input->post('leave_status_id', TRUE);
                $employee_id = $this->session->employee_id;
                
                $response['data']=$m_leave->get_listofleaves($employee_id,$leave_status_id);
                echo json_encode($response);
            break;            


            case 'leave_report':

            $leave_status_id = $filter_value;
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

            $data['data']=$this->Leavefiled_model->get_listofleaves($employee_id,$leave_status_id);    
            $status;
            
            if ($leave_status_id == "all"){
                $status = "All";
            }else{
                $get_status_name = $this->RefLeave_model->get_status_list($leave_status_id);
                $status = $get_status_name[0]->status_name;
            }   

            $file_name=$data['emp_info'][0]->full_name.' (Leaves '.$status.')';
            $pdfFilePath = $file_name.".pdf"; //generate filename base on id
            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
            $content=$this->load->view('template/leave_report_html',$data,TRUE); //load the template
            $pdf->WriteHTML($content);
            //download it.
            $pdf->Output($pdfFilePath,"D");

            break;

            case 'createleave':

                $m_leave=$this->Leavefiled_model;
                $m_yearsetup = $this->RefYearSetup_model;
                $m_leavefiled = $this->Leavefiled_model;
                $m_leaves_entitlement = $this->Entitlement_model;

                $employee_id = $this->session->employee_id;
                $active_year = $m_yearsetup->getactiveyear();

                $emp_leaves_entitlement_id = $this->input->post('ref_leave_type_id',TRUE);
                $total_leave = $this->get_numeric_value($this->input->post('total_leave',TRUE));

                $total_leaves_grant_this_year = $m_leaves_entitlement->getEntitlement(null,$emp_leaves_entitlement_id);

                $current_balance=0;
                if (count($total_leaves_grant_this_year) > 0){
                    $current_balance = $total_leaves_grant_this_year[0]->current_balance;
                }else{
                    $current_balance = 0;
                }

                if($current_balance>=$total_leave){

                        $m_leave->emp_leaves_entitlement_id = $emp_leaves_entitlement_id;
                        $m_leave->employee_id = $employee_id;
                        $m_leave->date_filed= date("Y-m-d");
                        $m_leave->emp_leave_year_id = $active_year;
                        $m_leave->purpose=$this->input->post('reason',TRUE);
                        $m_leave->total = $this->get_numeric_value($total_leave);
                        $m_leave->date_time_from=date('Y-m-d', strtotime($this->input->post('from_date',TRUE)));
                        $m_leave->date_time_to=date('Y-m-d', strtotime($this->input->post('to_date',TRUE)));
                        $m_leavefiled->date_created = date("Y-m-d H:i:s");
                        $m_leave->status = 1; // Pending
                        $m_leave->save();

                        $leave_id = $m_leave->last_insert_id();

                        $response['title']='Success!';
                        $response['stat']='success';
                        $response['msg']='New Leave Request is successfully created.';
                        $response['row_added']=$m_leave->get_listofleaves(null,'all',$leave_id);

                }else{

                        $response['title'] = 'Error!';
                        $response['stat'] = 'error';
                        $response['msg'] = 'Not Enough Leave Grant.';

                }

                echo json_encode($response);                

            break;

            case 'getavailableleave':
                $m_yearsetup = $this->RefYearSetup_model;
                $active_year = $m_yearsetup->getactiveyear();
                $employee_id = $this->session->employee_id;

                $response['available_leave']=$this->Entitlement_model->get_available_leave($employee_id,$active_year);
                echo json_encode($response);
                break;

            case 'leave_details':
                $m_leaves_entitlement = $this->Entitlement_model;
                $emp_leaves_entitlement_id = $this->input->post('emp_leaves_entitlement_id', TRUE);
                $response['data']=$m_leaves_entitlement->getEntitlement(null,$emp_leaves_entitlement_id);
                echo json_encode($response);
                break;                
        }
    }
}
