<?php

class Leavefiled_model extends CORE_Model {
    protected  $table="emp_leaves_filed";
    protected  $pk_id="emp_leaves_filed_id";

    function __construct() {
        parent::__construct();
    }

    function getleavesfiled($active_year,$employee_id,$emp_leaves_entitlement_id) {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('emp_leaves_entitlement_id', $emp_leaves_entitlement_id);
        $this->db->where('emp_leave_year_id', $active_year);
        /*$this->db->select('emp_leaves_entitlement_id');*/
        $this->db->select_sum('total');
        $query = $this->db->get('emp_leaves_filed');
        foreach($query->result() as $row)  
        {
            $total_leave=$row->total;
        }              
         return $total_leave;
    }

    function get_listofleaves($emp_id=null,$status="all",$leave_id=null){
        $query = $this->db->query("SELECT 
                                ref_leave_type.leave_type, 
                                DATE_FORMAT(emp_leaves_filed.date_filed,'%d %b %Y') as date_filed,
                                emp_leaves_filed.purpose,
                                DATE_FORMAT(emp_leaves_filed.date_time_from,'%m/%d/%Y') as date_time_from,
                                DATE_FORMAT(emp_leaves_filed.date_time_to,'%m/%d/%Y') as date_time_to,
                                (CASE
                                    WHEN emp_leaves_filed.date_granted IS NULL
                                        THEN 'N/A'
                                    ELSE DATE_FORMAT(emp_leaves_filed.date_granted,'%d %b %Y')
                                END) as date_granted, 
                                emp_leaves_filed.total,
                                leave_status.*,
                                emp_leaves_filed.status
                            FROM 
                                emp_leaves_filed 

                            LEFT JOIN emp_leaves_entitlement
                                ON emp_leaves_entitlement.emp_leaves_entitlement_id = emp_leaves_filed.emp_leaves_entitlement_id
                            LEFT JOIN ref_leave_type
                                ON ref_leave_type.ref_leave_type_id = emp_leaves_entitlement.ref_leave_type_id
                            LEFT JOIN leave_status
                                ON leave_status.leave_status_id = emp_leaves_filed.status
                            WHERE 
                                emp_leaves_filed.is_deleted = FALSE
                                ".($emp_id==null?"":" AND emp_leaves_filed.employee_id=$emp_id")."
                                ".($status=='all'?"":" AND emp_leaves_filed.status=$status")."
                                ".($leave_id==null?"":" AND emp_leaves_filed.emp_leaves_filed_id=$leave_id")."
                            ORDER BY leave_status.status_name ASC, emp_leaves_filed.emp_leaves_filed_id ASC

                ");

        $query->result();
        return $query->result();
    }

        function get_listofleavesbyid($leave_id){
        $query = $this->db->query("SELECT 
                                ref_leave_type.leave_type, 
                                DATE_FORMAT(emp_leaves_filed.date_filed,'%m-%d-%Y') as date_filed,
                                emp_leaves_filed.purpose,
                                DATE_FORMAT(emp_leaves_filed.date_time_from,'%m-%d-%Y') as date_time_from,
                                DATE_FORMAT(emp_leaves_filed.date_time_to,'%m-%d-%Y') as date_time_to,
                                emp_leaves_filed.total,
                                CASE emp_leaves_filed.status 
                                  WHEN 1 THEN 'Approved' 
                                  WHEN 2 THEN 'Declined'  
                                  ELSE 'Pending' 
                                END as status 
                            FROM 
                                emp_leaves_filed 
                            LEFT JOIN ref_leave_type
                                ON ref_leave_type.ref_leave_type_id = emp_leaves_filed.ref_leave_type_id
                            WHERE 
                                emp_leaves_filed.emp_leaves_filed_id = ".$leave_id."
                            ORDER BY emp_leaves_filed.emp_leaves_filed_id ASC

                ");


        $query->result();
        return $query->result();
    }

}
?>