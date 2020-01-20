<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        if($this->session->employee_account_id != '') {
            echo '<script>
            window.location.href = "Profile";
            </script>';
        }
        else{
        }
        $this->load->model('Employee_model');
        $this->load->model('Leavefiled_model');
        $this->load->model('Users_model');
        $this->load->model('User_groups_model');
        $this->load->model('GeneralSettings_model');
        $this->load->model('Employee_account_model');

    }


    public function index()
    {
        $this->create_required_default_data();

        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['loader'] = $this->load->view('template/elements/loader', '', TRUE);
        $data['loaderscript'] = $this->load->view('template/elements/loaderscript', '', TRUE);
        $data['company_setup']=$this->GeneralSettings_model->get_list();
        $data['title']='Employee Login';
        
        $data["code"] = $this->input->get('code');
        $data["ecode"] = $this->input->get('ecode');

        $this->load->view('forgot_password_view',$data);

    }


    function create_required_default_data(){

        //create default user : the admin
        $m_users=$this->Users_model;
        $m_users->create_default_user();

        //create default user group : the Super User
        $m_user_groups=$this->User_groups_model;
        $m_user_groups->create_default_user_group();


    }


    function transaction($txn=null,$filter_value=null){

        switch($txn){


                case 'reset_password':

                    $m_employee_account = $this->Employee_account_model;

                    $code = $this->input->post('code', TRUE);
                    $ecode = $this->input->post('ecode', TRUE);

                    $employee_new_pwd = $this->input->post('employee_new_pwd', TRUE);

                    if ($code != "" && $ecode != ""){
  
                        $check_code =  $m_employee_account->check_code($ecode,$code);

                        if(count($check_code) > 0){

                            $employee_account_id = $check_code[0]->employee_account_id;

                            $m_employee_account->employee_pwd = sha1($employee_new_pwd);
                            $m_employee_account->is_changed = 1;

                            if ($m_employee_account->modify($employee_account_id)){

                                $response['title']='Success!';
                                $response['stat']='success';
                                $response['msg']='Password was successfully changed.';
                                echo json_encode($response);

                            }else{

                                $response['title']='Error!';
                                $response['stat']='error';
                                $response['msg']='Code already expired.';
                                echo json_encode($response);                                

                            }

                        }else{

                            $response['title']='Error!';
                            $response['stat']='error';
                            $response['msg']='Code already expired.';
                            echo json_encode($response);        
                        }            

                    }else{

                        $response['title']='Error!';
                        $response['stat']='error';
                        $response['msg']='Code not found.';
                        echo json_encode($response);    

                    }


                    break;


        }
    }
}
