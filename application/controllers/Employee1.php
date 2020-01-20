<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee1 extends CORE_Controller {

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

        $this->validate_session();

    }

    public function index()
    {

        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        // $data['_top_navigation']=$this->load->view('template/elements/top_navigationemployee','',TRUE);
        $data['_footer']=$this->load->view('template/elements/footer','',TRUE);
        $data['_rights'] = $this->load->view('template/elements/rights', '', TRUE);
        $data['loader'] = $this->load->view('template/elements/loader', '', TRUE);
        $data['loaderscript'] = $this->load->view('template/elements/loaderscript', '', TRUE);

        $data['user_id']=$this->session->user_id;
        $data['pay_period']=$this->RefPayPeriod_model->get_list(
            array('refpayperiod.is_deleted'=>FALSE),
            'refpayperiod.*',   
            array(
            ),
        'refpayperiod.pay_period_start DESC'
        );

        $data['type_leave']=$this->RefLeave_model->get_list(
            array('ref_leave_type.is_deleted'=>FALSE),
            'ref_leave_type.*',   
            array(
            ),
        'ref_leave_type.ref_leave_type_id DESC'
        );

        $data['ecode'] = $this->session->employee_code;;
        $this->load->view('employee_view1',$data);
    }

    function transaction($txn = null, $filter_value= null) {
        switch ($txn) {

            case 'get_info':
                $emp_id = $this->input->post('emp_id', TRUE);
                $response['info']=$this->Employee_model->get_employee_info($emp_id);
                echo json_encode($response);
            break;

            case 'listofannouncement':
                $m_announcement = $this->Announcement_model;

                $dept_id = $this->input->post('dept_id', TRUE);
                $branch_id = $this->input->post('branch_id', TRUE);
                $group_id = $this->input->post('group_id', TRUE);

                $response['data'] = $m_announcement->get_listodannouncement($dept_id,$branch_id,$group_id);
                echo json_encode($response);
            break;

            case 'announcement_detail':
                $m_announcement = $this->Announcement_model;
                $data['info'] = $m_announcement->get_announcement_details($filter_value);
                echo $this->load->view('template/announcement_detail_html',$data,TRUE);
            break;

            case 'createleave':

                $m_leave=$this->Leavefiled_model;
                $m_yearsetup = $this->RefYearSetup_model;

                $active_year = $m_yearsetup->getactiveyear(); //model funct. to get active year :)

                $employee_id = $this->session->employee_id;
                $m_leave->ref_leave_type_id = $this->input->post('typeofleave',TRUE);
                $m_leave->employee_id = $employee_id;
                $m_leave->date_filed= date("Y-m-d");
                $m_leave->emp_leave_year_id = $active_year;
                $m_leave->purpose=$this->input->post('reason',TRUE);
                $m_leave->date_time_from=date('Y-m-d', strtotime($this->input->post('fromdate',TRUE)));
                $m_leave->date_time_to=date('Y-m-d', strtotime($this->input->post('todatehidden',TRUE)));
                $m_leave->total=$this->input->post('numberofdates',TRUE);
                $m_leave->date_created = date("Y-m-d");
                $m_leave->save();



                $leave_id = $m_leave->last_insert_id();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='New Leave Request is successfully created.';
                $response['row_added']=$m_leave->get_listofleavesbyid($leave_id);
                echo json_encode($response);                

            break;

            case 'listofleave':
                $m_leave=$this->Leavefiled_model;
                $employee_id = $this->session->employee_id;
                $response['data']=$m_leave->get_listofleaves($employee_id);
                echo json_encode($response);
            break;            

            case 'memolayout':
                $m_memo=$this->Memorandum_model;
                $data['memo']=$m_memo->get_listofmemosbyid($filter_value);
                echo $this->load->view('template/memo_list_html',$data,TRUE);
            break;

            case 'listofmemo':
                $m_memo=$this->Memorandum_model;
                $employee_id = $this->session->employee_id;
                $response['data']=$m_memo->get_listofmemos($employee_id);
                echo json_encode($response);
            break;

            case 'getstats':
                $this->validate_session();
                $getretired=$this->Employee_model->get_list('employee_list.is_deleted=0 AND employee_list.is_retired=1',
                    'COUNT(employee_list.employee_id) as retired_employees');
                /*getting ALL employees*/
                $gettotalemployee=$this->Employee_model->getcountemployee();
                /*computing percentage*/
               /* echo $gettotalemployee[0]->total_employee;*/
                $response['active_count']=abs($gettotalemployee[0]->total_employee-$getretired[0]->retired_employees);
                $response['retired_count']=$getretired[0]->retired_employees;
                $response['retired_percentage']=round(($getretired[0]->retired_employees/$gettotalemployee[0]->total_employee)*100,2);
                $response['active_percentage']=abs($response['retired_percentage']-100);

                //get online users
                $getonlineusers=$this->Users_model->get_list('user_accounts.is_deleted=0 AND session_status=1',
                    'COUNT(*) as online_users');
                //get all users
                $getalleusers=$this->Users_model->get_list('user_accounts.is_deleted=0',
                    'COUNT(*) as all_users');
                $response['percent_online_users']=round(($getonlineusers[0]->online_users/$getalleusers[0]->all_users)*100,2);
                $response['percent_offline_users']=abs($response['percent_online_users']-100);
                $response['online_users']=$getonlineusers[0]->online_users;
                $response['offline_users']=abs($getalleusers[0]->all_users-$getonlineusers[0]->online_users);

                //box users online
                $response['online_users_box']=$this->Users_model->get_list('user_accounts.is_deleted=0 AND session_status=1',
                    'user_accounts.*,CONCAT(user_accounts.user_fname," ",user_accounts.user_mname," ",user_accounts.user_lname) as full_name');
                //box users offline
                $response['offline_users_box']=$this->Users_model->get_list('user_accounts.is_deleted=0 AND session_status=0',
                    'user_accounts.*,CONCAT(user_accounts.user_fname," ",user_accounts.user_mname," ",user_accounts.user_lname) as full_name');

                //wall post
                $chatamount = $this->input->post('chatamount', TRUE);
                $response['wall_post']=$this->Wall_post_model->wall_post($chatamount);
                $response['count']=$this->Wall_post_model->get_list(
                            null,
                            'COUNT(*) as count'
                            );

                echo json_encode($response);
            break;

            case 'create':
                $m_wallpost=$this->Wall_post_model;
                $m_wallpost->post_content=$this->input->post('post_content',TRUE);
                $m_wallpost->user_id = $this->session->user_id;
                $m_wallpost->date_created = date("Y-m-d H:i:s");
                $m_wallpost->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Post Successfull.';


                echo json_encode($response);

            break;
        }
    }
}
