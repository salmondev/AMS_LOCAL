<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Floor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get floor by FLOOR_RID
     */
    function get_floor($FLOOR_RID)
    {
        return $this->db->get_where('FLOOR',array('FLOOR_RID'=>$FLOOR_RID))->row_array();
    }
        
    /*
     * Get all floor
     */
    function get_all_floor()
    {
        $this->db->order_by('FLOOR_RID', 'desc');
        return $this->db->get('FLOOR')->result_array();
    }
        
    /*
     * function to add new floor
     */
    function add_floor($params)
    {
        $this->db->insert('FLOOR',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update floor
     */
    function update_floor($FLOOR_RID,$params)
    {
        $this->db->where('FLOOR_RID',$FLOOR_RID);
        return $this->db->update('FLOOR',$params);
    }
    
    /*
     * function to delete floor
     */
    function delete_floor($FLOOR_RID)
    {
        return $this->db->delete('FLOOR',array('FLOOR_RID'=>$FLOOR_RID));
    }
}
