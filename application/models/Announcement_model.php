<?php

class Announcement_model extends CORE_Model {
    protected  $table="announcement_post";
    protected  $pk_id="announcement_post_id";

    function __construct() {
        parent::__construct();
    }

    function get_listodannouncement($dept_id,$branch_id,$group_id,$from_date=null,$to_date=null,$is_read=null) {
        $query = $this->db->query("SELECT
                announcement_post.*,
                announcement_post_id, 
                announcement, 
                announcement_title,
                DATE_FORMAT(date_created,'%b %d, %Y') as announcement_date,
                DATE_FORMAT(date_created,'%a, %b %d %Y, %h:%i %p') as announcement_date_details,
                date_created as date_created_temp

                    FROM 
                        announcement_post 
                    WHERE 
                        announcement_post.is_deleted = 0
                    AND 
                    ((announcement_post.branch_id=$branch_id AND announcement_post.department_id=$dept_id AND announcement_post.group_id=$group_id)
                    
                    OR (branch_id=0 AND department_id =0 AND group_id =0)
                    
                    OR (branch_id=0 AND department_id IS NULL AND group_id IS NULL))
                    

                    ".($is_read == null?"":" AND is_read=0")."
                    ".(($from_date == null OR $to_date == null)?"":" AND DATE_FORMAT(announcement_post.date_created,'%Y-%m-%d') BETWEEN '$from_date' AND '$to_date'")." 
                    ORDER BY announcement_post_id DESC");
        $query->result();
        return $query->result();
    }

    function get_announcement_details($announcement_post_id) {
        $query = $this->db->query("SELECT
                announcement_post.*,
                announcement_post_id, 
                announcement, 
                announcement_title,
                DATE_FORMAT(date_created,'%b %d, %Y') as announcement_date,
                DATE_FORMAT(date_created,'%a, %b %d %Y, %h:%i %p') as announcement_date_details,
                date_created as date_created_temp
                    FROM 
                        announcement_post 
                    WHERE 
                        is_deleted = 0
                    AND announcement_post_id = $announcement_post_id");
        $query->result();
        return $query->result();
    }

}
?>