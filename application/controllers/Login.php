<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller {

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
        $this->load->view('login_view',$data);

    }


    function create_required_default_data(){

        //create default user : the admin
        $m_users=$this->Users_model;
        $m_users->create_default_user();

        //create default user group : the Super User
        $m_user_groups=$this->User_groups_model;
        $m_user_groups->create_default_user_group();


    }


    function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'getemployeedetails':
                    $ecode = ($this->input->post('ecode', TRUE) == null || $this->input->post('ecode', TRUE) == "" ) ? 0 : $this->input->post('ecode', TRUE);


                    $response['employee_list']=$this->Employee_model->get_employee_image($ecode);

                    echo json_encode($response);
                break;

                case 'validateemployee':
                    $ecode=$this->input->post('user_ecode');
                    $pword=$this->input->post('user_pword');

                    $m_employee_account = $this->Employee_account_model;
                    $results = $m_employee_account->authenticate_user($ecode,$pword);

                    // Get company Information

                    $m_company_setup = $this->GeneralSettings_model;
                    $company = $m_company_setup->get_list();
                    $c_info = $company[0];

                    if($results->num_rows()>0){//valid username and pword

                            if ( $results->row()->is_new == 1){
                            
                                $response['is_new']=1;
                                $response['employee_id']=$results->row()->employee_id;
                                $response['employee_account_id']=$results->row()->employee_account_id;                                      
                                echo json_encode($response);
                                die();

                            }else{
                                $employee_account_id = $results->row()->employee_account_id;
                                $m_employee_account->session_status = 1; //1 is equivalent to active or logged in
                                $m_employee_account->modify($employee_account_id);

                                $this->session->set_userdata(
                                    array(
                                        'employee_account_id'=>$results->row()->employee_account_id,
                                        'employee_id'=>$results->row()->employee_id,
                                        'employee_photo'=>$results->row()->image_name,
                                        'employee_fullname'=>$results->row()->fullname,
                                        'employee_fname'=>$results->row()->first_name,
                                        'employee_mname'=>$results->row()->middle_name,
                                        'employee_lname'=>$results->row()->last_name,
                                        'employee_birthdate'=>$results->row()->birthdate,
                                        'employee_address'=>$results->row()->fulladdress,
                                        'employee_telphone'=>$results->row()->telphone_number,
                                        'employee_contact'=>$results->row()->cell_number,
                                        'employee_email'=>$results->row()->email_address,
                                        'employee_ecode'=>$results->row()->employee_ecode,
                                        'employee_empdate'=>$results->row()->employment_date,
                                        'is_retired'=>$results->row()->is_retired,
                                        'company_name'=>$c_info->company_name,
                                        'company_contact_no'=>$c_info->contact_no,
                                        'company_email_address'=>$c_info->email_address,
                                        'company_logo'=>$c_info->image_name, 
                                        'employment_type'=>$results->row()->employment_type,
                                        'department'=>$results->row()->department,
                                        'position'=>$results->row()->position,
                                        'branch'=>$results->row()->branch,
                                        'section'=>$results->row()->section,
                                        'payment_type'=>$results->row()->payment_type,
                                        'tax_name'=>$results->row()->tax_name,
                                        'tax_code'=>$results->row()->tax_code,
                                        'group_desc'=>$results->row()->group_desc
                                    ));

                                $response['title']='Success';
                                $response['stat']='success';
                                $response['is_new']=0;
                                $response['msg']='Employee successfully authenticated.';
                                echo json_encode($response);
                            }


                    }else{ //not valid

                        $response['title']='Cannot authenticate!';
                        $response['stat']='error';
                        $response['is_new']=0;
                        $response['msg']='Invalid code or password.';
                        echo json_encode($response);

                    }


                break;

                case 'change_password':

                    $employee_id=$this->input->post('employee_id',TRUE);
                    $employee_account_id=$this->input->post('employee_account_id',TRUE);
                    $new_password=sha1($this->input->post('employee_new_pwd',TRUE));

                    $m_employee_account = $this->Employee_account_model;
                    $m_employee_account->employee_pwd = $new_password;
                    $m_employee_account->is_new = 0;


                    $results = $m_employee_account->get_account($employee_id);
                    $current_password = $results->row()->employee_pwd;

                    if ($current_password!=$new_password){

                            if($m_employee_account->modify($employee_account_id)){

                                $results = $m_employee_account->get_account($employee_id);

                                $m_employee_account->session_status = 1; //1 is equivalent to active or logged in
                                $m_employee_account->modify($employee_account_id);

                                // Get company Information

                                $m_company_setup = $this->GeneralSettings_model;
                                $company = $m_company_setup->get_list();
                                $c_info = $company[0];

                                $this->session->set_userdata(
                                    array(
                                        'employee_account_id'=>$results->row()->employee_account_id,
                                        'employee_id'=>$results->row()->employee_id,
                                        'employee_photo'=>$results->row()->image_name,
                                        'employee_fullname'=>$results->row()->fullname,
                                        'employee_fname'=>$results->row()->first_name,
                                        'employee_mname'=>$results->row()->middle_name,
                                        'employee_lname'=>$results->row()->last_name,
                                        'employee_birthdate'=>$results->row()->birthdate,
                                        'employee_address'=>$results->row()->fulladdress,
                                        'employee_telphone'=>$results->row()->telphone_number,
                                        'employee_contact'=>$results->row()->cell_number,
                                        'employee_email'=>$results->row()->email_address,
                                        'employee_ecode'=>$results->row()->employee_ecode,
                                        'employee_empdate'=>$results->row()->employment_date,
                                        'is_retired'=>$results->row()->is_retired,
                                        'company_name'=>$c_info->company_name,
                                        'company_contact_no'=>$c_info->contact_no,
                                        'company_email_address'=>$c_info->email_address,
                                        'company_logo'=>$c_info->image_name, 
                                        'employment_type'=>$results->row()->employment_type,
                                        'department'=>$results->row()->department,
                                        'position'=>$results->row()->position,
                                        'branch'=>$results->row()->branch,
                                        'section'=>$results->row()->section,
                                        'payment_type'=>$results->row()->payment_type,
                                        'tax_name'=>$results->row()->tax_name,
                                        'tax_code'=>$results->row()->tax_code,
                                        'group_desc'=>$results->row()->group_desc
                                    ));

                                $response['title']='Success';
                                $response['stat']='success';
                                $response['is_new']=0;
                                $response['msg']='Password successfully updated.';
                                echo json_encode($response);

                            }else{
                                $response['title']='Password!';
                                $response['stat']='error';
                                $response['is_new']=0;
                                $response['msg']='Password change failed.';
                                echo json_encode($response);
                            }

                    }else{

                        $response['title']='Password!';
                        $response['stat']='error';
                        $response['is_new']=0;
                        $response['msg']='Use a new password for your account.';
                        echo json_encode($response);

                    }

                    break;

                case 'forgot_password':

                    $email_address = $this->input->post('email_address', TRUE);
                    $get_employee = $this->Employee_model->check_email($email_address);
                    $m_employee = $this->Employee_model;
                    $m_employee_account = $this->Employee_account_model;
                    if (count($get_employee) > 0){


                        $employee_account_id = $get_employee[0]->employee_account_id;
                        $ecode = $get_employee[0]->employee_ecode;
                        $fullname = $get_employee[0]->fullname;

                        $randomdigits = mt_rand(1000, 9999);

                        $account_code = $ecode.$randomdigits;

                        $m_employee_account->account_code = $account_code;
                        $m_employee_account->is_changed = 0;
                        $m_employee_account->modify($employee_account_id);

                        $email_settings = $this->GeneralSettings_model->get_list();
                        $company_email = $email_settings[0]->email_address;
                        $email_password = $email_settings[0]->email_password;
                        $company_name = $email_settings[0]->company_name;                        

                        $subject = "Reset Password";

                        $year = date('Y');
                        $date = date('m-d-Y');

                        $message = '<div style="width:85%;background:#F5F5F5;padding: 50px;font-family: arial;">
                                        <div style="border: 1px solid #CFD8DC;">
                                            <div style="padding: 20px;background: #fff; font-weight: bold;font-size: 13pt;border-top: 5px solid #263238;">
                                                '.$company_name.'
                                            </div>
                                            <div style="background: #263238; color: #fff;padding: 10px;">
                                                '.$subject.'
                                            </div>
                                            <div style="background: #fff; padding: 15px;">
                                                <p>Greetings '.$fullname.', <span style="text-align: right;float:right;">'.$date.'</span> </p>
                                                <p style="text-align: justify;">This email contains your Reset Password Link. Click the button below to change password.
                                                <p>
                                                <br/>

                                                <center><a href="'.$this->config->item("base_url").'/Forgot_password?ecode='.$ecode.'&code='.$account_code.'" class="btn btn-info" style="padding: 10px;border-radius: .5em; background-color: #263238;color: #FFF;text-decoration: none;">    
                                                    Change Password
                                                </a>
                                                </center>
                                            </div>
                                            <div style="background: #F5F5F5;">
                                                <center>
                                                    <p style="font-size: 8pt;">Copyright &copy; '.$year.' '.$company_name.'</p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>';
                        
                       // Set SMTP Configuration
                            $emailConfig = array(
                                'protocol' => 'smtp', 
                                'smtp_host' => 'ssl://smtp.googlemail.com', 
                                'smtp_port' => 465, 
                                'smtp_user' => $company_email, 
                                'smtp_pass' => $email_password, 
                                'mailtype' => 'html', 
                                'charset' => 'iso-8859-1'
                            );

                            // Load CodeIgniter Email library
                            $this->load->library('email', $emailConfig);
                            // Sometimes you have to set the new line character for better result
                            $this->email->set_newline("\r\n");
                            // Set email preferences
                            $this->email->from($company_email, $company_name);
                            $this->email->to($email_address);
                            $this->email->subject($subject);
                            $this->email->message($message);
                            $this->email->set_mailtype("html");
                            // Ready to send email and check whether the email was successfully sent

                        if (!$this->email->send()) {
                                // Raise error message
                            $response['title']='Try Again!';
                            $response['stat']='error';
                            $response['msg']='Sending Email Failed, Please cooperate with your Manager / Supervisor.';

                            echo json_encode($response);
                        } else {
                            $response['title']='Success!';
                            $response['stat']='success';
                            $response['msg']='Reset Password Link is sent to your email.';
                            echo json_encode($response);
                        }

                    }else{
                        $response['title']='Error!';
                        $response['stat']='error';
                        $response['msg']='Email Address not Found.';
                        echo json_encode($response);
                    }

                    break;

                case 'validate' :
                    $uname=$this->input->post('uname');
                    $pword=$this->input->post('pword');

                    $users=$this->Users_model;
                    $m_employee = $this->Employee_model;
                    $m_leavefiled = $this->Leavefiled_model;
                    $result=$users->authenticate_user($uname,$pword);

                //****************************************************************************
                case 'logout' :
                    $m_employee_account=$this->Employee_account_model;
                    $employee_account_id = $this->session->employee_account_id;
                    $m_employee_account->session_status = 0; //0 is equivalent to inactive or logged out
                    $m_employee_account->modify($employee_account_id);
                    $this->end_session();
                //****************************************************************************
                break;
                default:

        }
    }
}
