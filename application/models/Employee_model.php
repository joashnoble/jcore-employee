<?php

class Employee_model extends CORE_Model {
    protected  $table="employee_list";
    protected  $pk_id="employee_id";

    function __construct() {
        parent::__construct();
    }

    function get_emp_pass($employee_id,$cpass){

        $query = $this->db->query("SELECT * FROM employee_account WHERE employee_id = $employee_id AND employee_pwd = SHA1('$cpass')");
        return $query->result();
    }

    function getcountemployee() {
        $query = $this->db->query('SELECT COUNT(employee_list.employee_id) as total_employee FROM employee_list
								LEFT join emp_rates_duties ON
								employee_list.employee_id=emp_rates_duties.employee_id
								 WHERE employee_list.is_deleted=0 AND active_rates_duties=TRUE');
                    $query->result();
                    return $query->result();
    }

    function check_email($email_address){

        $query = $this->db->query("SELECT 
                employee_list.*,
                employee_account.*,
                CONCAT_WS(' ', employee_list.first_name,employee_list.middle_name,employee_list.last_name) as fullname
            FROM
                employee_list
                LEFT JOIN employee_account ON employee_account.employee_id = employee_list.employee_id
            WHERE
                employee_list.email_address = '$email_address'
                AND employee_list.is_deleted = FALSE
                AND employee_list.status = 'Active'
                AND employee_list.is_retired = FALSE
            ORDER BY employee_list.employee_id DESC
            LIMIT 1");    
        return $query->result();

    }


    function empcountperdept() {
        $query = $this->db->query('SELECT COUNT(ref_department.ref_department_id) as totalperdept,ref_department.department FROM employee_list
        LEFT JOIN emp_rates_duties ON
        emp_rates_duties.employee_id=employee_list.employee_id
        LEFT JOIN ref_department ON
        ref_department.ref_department_id=emp_rates_duties.ref_department_id
        WHERE active_rates_duties=1 AND employee_list.is_deleted=0
        GROUP BY ref_department.ref_department_id');
        $query->result();
        return $query->result();
    }

    function get_employee_image($ecode){
        $query = $this->db->query('SELECT 
                CONCAT(emplist.first_name," ",emplist.middle_name," ",emplist.last_name) as fullname,
                emplist.birthdate, emplist.image_name
                FROM employee_list as emplist 
                WHERE emplist.ecode = "'.$ecode.'" 
                AND emplist.is_deleted = 0');
        $query->result();
        return $query->result();
    }

    function get_employee_info($emp_id){
        $query = $this->db->query('SELECT ref_department_id, ref_branch_id, group_id FROM emp_rates_duties WHERE is_deleted = 0 AND active_rates_duties = 1 AND employee_id = '.$emp_id);
        $query->result();
        return $query->result();
    }

    function get_bday($month){
        $query = $this->db->query('SELECT 
                CONCAT(emplist.first_name," ",emplist.middle_name," ",emplist.last_name) as fullname,
                emplist.birthdate,dept.department 
                FROM employee_list as emplist 
                LEFT JOIN emp_rates_duties as emp_rd ON
                emp_rd.emp_rates_duties_id = emplist.emp_rates_duties_id
                LEFT JOIN ref_department as dept ON
                dept.ref_department_id = emp_rd.ref_department_id
                WHERE EXTRACT(MONTH FROM emplist.birthdate) = '.$month.' 
                AND emplist.is_deleted = 0 AND emplist.is_retired = 0');
        $query->result();
        return $query->result();
    }

    function empcountperbranch() {
        $query = $this->db->query('SELECT COUNT(ref_branch.ref_branch_id) as totalperbranch,ref_branch.branch FROM employee_list
        LEFT JOIN emp_rates_duties ON
        emp_rates_duties.employee_id=employee_list.employee_id
        LEFT JOIN ref_branch ON
        ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id
        WHERE active_rates_duties=1 AND employee_list.is_deleted=0
        GROUP BY ref_branch.ref_branch_id');
        $query->result();
        return $query->result();
    }

    function dashmonthlygross() {
        $query = $this->db->query("SELECT m.*
        	FROM(SELECT (CASE
        	WHEN EXTRACT(MONTH FROM pay_period_start) = '1' THEN '00'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '2' THEN '01'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '3' THEN '02'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '4' THEN '03'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '5' THEN '04'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '6' THEN '05'
        	WHEN EXTRACT(MONTH FROM pay_period_start) = '7' THEN '06'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '8' THEN '07'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '9' THEN '08'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '10' THEN '09'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '11' THEN '10'
            WHEN EXTRACT(MONTH FROM pay_period_start) = '12' THEN '11'
              END) as Month,
              ROUND(SUM(reg_pay),2) as reg_pay,ROUND(SUM(net_pay),2) as net_pay
         FROM pay_slip
        LEFT JOIN daily_time_record ON
        daily_time_record.dtr_id=pay_slip.dtr_id
        LEFT JOIN refpayperiod ON
        refpayperiod.pay_period_id=daily_time_record.pay_period_id
        GROUP BY Month) as m");
        $query->result();
        return $query->result();
    }

    function dashcompensationdept() {
        $year = date('Y');
        $query = $this->db->query("SELECT m.*
          	FROM(SELECT ref_department.department,
                ROUND(SUM(reg_pay),2) as reg_pay,ROUND(SUM(net_pay),2) as net_pay
           FROM pay_slip
          LEFT JOIN daily_time_record ON
          daily_time_record.dtr_id=pay_slip.dtr_id
          LEFT JOIN refpayperiod ON
          refpayperiod.pay_period_id=daily_time_record.pay_period_id
          LEFT JOIN emp_rates_duties ON
          emp_rates_duties.employee_id=daily_time_record.employee_id
          LEFT JOIN ref_department ON
          ref_department.ref_department_id=emp_rates_duties.ref_department_id
          WHERE EXTRACT(YEAR FROM pay_period_start) = '".$year."' AND emp_rates_duties.active_rates_duties=1
          GROUP BY ref_department.ref_department_id) as m");
        $query->result();
        return $query->result();
    }

      function send_mail($email,$message,$subject,$company_email,$email_password,$company_name)
      {     
        $emailConfig = array('protocol' => 'smtp', 
        'smtp_host' => 'ssl://smtp.googlemail.com', 
        'smtp_port' => 465, 
        'smtp_user' => $company_email, 
        'smtp_pass' => $email_password, 
        'mailtype' => 'html', 
        'charset' => 'iso-8859-1');

        $this->load->library('email', $emailConfig);
        $this->email->set_newline("\r\n");
        $this->email->from($company_email, $company_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
      }
}
?>
