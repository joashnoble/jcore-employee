<?php

class Employee_account_model extends CORE_Model {
    protected  $table="employee_account";
    protected  $pk_id="employee_account_id";

    function __construct() {
        parent::__construct();
    }

    function check_code($ecode,$code){
        $query = $this->db->query("SELECT * FROM employee_account WHERE employee_ecode = $ecode AND account_code='$code' AND is_changed=0");
        return $query->result();

    }

    function authenticate_user($ecode,$pword){
        $this->db->select('emp.*, ea.*, ea.employee_id, ea.employee_ecode, ea.employee_account_id, CONCAT(emp.first_name," ",emp.middle_name," ",emp.last_name) as fullname, CONCAT(emp.address_one," ",emp.address_two) as fulladdress, 
            ret.employment_type, rd.department, rp.position, rb.branch, rs.section, rpt.payment_type, tcn.tax_name, rtc.tax_code, rg.group_desc');
        $this->db->from('employee_account as ea');
        $this->db->join('employee_list as emp', 'emp.employee_id = ea.employee_id','left');
        $this->db->join('emp_rates_duties as erd', 'erd.emp_rates_duties_id = emp.emp_rates_duties_id','left');
        $this->db->join('ref_employment_type as ret', 'ret.ref_employment_type_id = erd.ref_employment_type_id','left');
        $this->db->join('ref_position as rp', 'rp.ref_position_id = erd.ref_position_id','left');
        $this->db->join('ref_branch as rb', 'rb.ref_branch_id = erd.ref_branch_id','left');
        $this->db->join('ref_department as rd', 'rd.ref_department_id = erd.ref_department_id','left');
        $this->db->join('ref_section as rs', 'rs.ref_section_id = erd.ref_section_id','left');
        $this->db->join('ref_payment_type as rpt', 'rpt.ref_payment_type_id = erd.ref_payment_type_id','left');
        $this->db->join('tax_code_name as tcn', 'tcn.tax_code_name_id = emp.tax_code','left');
        $this->db->join('reftaxcode as rtc', 'rtc.tax_id = emp.tax_code','left');
        $this->db->join('refgroup as rg', 'rg.group_id = erd.group_id','left');
        $this->db->where('ea.is_deleted=',0);
        $this->db->where('emp.status="Active"');
        $this->db->where('emp.is_retired=0');
        $this->db->where('ea.employee_ecode', $ecode);
        $this->db->where('ea.employee_pwd', sha1($pword));
        return $this->db->get();
    }

    function get_account($employee_id){
        $this->db->select('emp.*, ea.*, ea.employee_id, ea.employee_ecode, ea.employee_account_id, CONCAT(emp.first_name," ",emp.middle_name," ",emp.last_name) as fullname, CONCAT(emp.address_one," ",emp.address_two) as fulladdress, 
            ret.employment_type, rd.department, rp.position, rb.branch, rs.section, rpt.payment_type, tcn.tax_name, rtc.tax_code, rg.group_desc');
        $this->db->from('employee_account as ea');
        $this->db->join('employee_list as emp', 'emp.employee_id = ea.employee_id','left');
        $this->db->join('emp_rates_duties as erd', 'erd.emp_rates_duties_id = emp.emp_rates_duties_id','left');
        $this->db->join('ref_employment_type as ret', 'ret.ref_employment_type_id = erd.ref_employment_type_id','left');
        $this->db->join('ref_position as rp', 'rp.ref_position_id = erd.ref_position_id','left');
        $this->db->join('ref_branch as rb', 'rb.ref_branch_id = erd.ref_branch_id','left');
        $this->db->join('ref_department as rd', 'rd.ref_department_id = erd.ref_department_id','left');
        $this->db->join('ref_section as rs', 'rs.ref_section_id = erd.ref_section_id','left');
        $this->db->join('ref_payment_type as rpt', 'rpt.ref_payment_type_id = erd.ref_payment_type_id','left');
        $this->db->join('tax_code_name as tcn', 'tcn.tax_code_name_id = emp.tax_code','left');
        $this->db->join('reftaxcode as rtc', 'rtc.tax_id = emp.tax_code','left');
        $this->db->join('refgroup as rg', 'rg.group_id = erd.group_id','left');
        $this->db->where('ea.is_deleted=',0);
        $this->db->where('emp.status="Active"');
        $this->db->where('emp.is_retired=0');
        $this->db->where('emp.employee_id', $employee_id);
        return $this->db->get();
    }

}
?>
