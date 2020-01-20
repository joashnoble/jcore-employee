<?php

class Memorandum_model extends CORE_Model {
    protected  $table="emp_memo";
    protected  $pk_id="emp_memo_id";

    function __construct() {
        parent::__construct();
    }

    function get_employee_memos($emp_id){
	$query = $this->db->query('SELECT 
			m_emp.date_memo, m_emp.remarks, rp.disciplinary_action_policy
			FROM emp_memo as m_emp
			LEFT JOIN ref_disciplinary_action_policy as rp ON
				rp.ref_disciplinary_action_policy_id = m_emp.ref_disciplinary_action_policy_id
			WHERE m_emp.employee_id = '.$emp_id.'
			AND m_emp.is_deleted = 0');
    $query->result();
    return $query->result();
	}

    function get_listofmemos($emp_id=null,$from_date=null,$to_date=null,$is_read=null,$emp_memo_id=null){
			$query = $this->db->query("SELECT 
						emp_memo.*,
						emp_memo.emp_memo_id,
						ref_action_taken.action_taken,
						ref_disciplinary_action_policy.disciplinary_action_policy,
						DATE_FORMAT(emp_memo.date_memo,'%h:%i %p') as date_memo,
						DATE_FORMAT(emp_memo.date_memo,'%a, %b %d %Y, %h:%i %p') as memo_date_details,
						emp_memo.date_memo as date_memo_temp,
						emp_memo.memo_number,
						DATE_FORMAT(emp_memo.date_granted,'%M %d, %Y') as date_granted,
						emp_memo.remarks
					FROM emp_memo
					LEFT JOIN ref_disciplinary_action_policy ON
						ref_disciplinary_action_policy.ref_disciplinary_action_policy_id = emp_memo.ref_disciplinary_action_policy_id
					LEFT JOIN ref_action_taken ON
						ref_action_taken.ref_action_taken_id = emp_memo.ref_action_taken_id
					WHERE
						emp_memo.is_deleted = FALSE
						".($emp_id == null?"":" AND emp_memo.employee_id=$emp_id")."
						".($emp_memo_id == null?"":" AND emp_memo.emp_memo_id=$emp_memo_id")."
						".($is_read == null?"":" AND emp_memo.is_read=FALSE")."
						".(($from_date == null OR $to_date == null)?"":" AND DATE_FORMAT(emp_memo.date_memo,'%Y-%m-%d') BETWEEN '$from_date' AND '$to_date'")." 
						");

		    $query->result();
		    return $query->result();
	}

    function get_listofmemosbyid($emp_memo_id){
			$query = $this->db->query('SELECT 
						emp_memo.emp_memo_id,
						ref_action_taken.action_taken,
						ref_disciplinary_action_policy.disciplinary_action_policy,
						DATE_FORMAT(emp_memo.date_memo,"%m-%d-%Y") as date_memo,
						emp_memo.memo_number,
						DATE_FORMAT(emp_memo.date_granted,"%m-%d-%Y") as date_granted,
						emp_memo.remarks
					FROM emp_memo
					LEFT JOIN ref_disciplinary_action_policy ON
						ref_disciplinary_action_policy.ref_disciplinary_action_policy_id = emp_memo.ref_disciplinary_action_policy_id
					LEFT JOIN ref_action_taken ON
						ref_action_taken.ref_action_taken_id = emp_memo.ref_action_taken_id
					WHERE 
						emp_memo.emp_memo_id = '.$emp_memo_id);
		    $query->result();
		    return $query->result();
	}	
	
}
?>