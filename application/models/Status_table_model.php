<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Status_table_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get status_table by status_rid
     */
    function get_status_table($status_rid)
    {
        return $this->db->get_where('STATUS_TABLE',array('status_rid'=>$status_rid))->row_array();
    }
        
    /*
     * Get all status_table
     */
    function get_all_status_table()
    {
        $this->db->order_by('status_rid', 'desc');
        return $this->db->get('STATUS_TABLE')->result_array();
    }
        
    /*
     * function to add new status_table
     */
    function add_status_table($params)
    {
        $this->db->insert('STATUS_TABLE',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update status_table
     */
    function update_status_table($status_rid,$params)
    {
        $this->db->where('status_rid',$status_rid);
        return $this->db->update('STATUS_TABLE',$params);
    }
    
    /*
     * function to delete status_table
     */
    function delete_status_table($status_rid)
    {
        return $this->db->delete('STATUS_TABLE',array('status_rid'=>$status_rid));
    }
}
