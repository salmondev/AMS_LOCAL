<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Refer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get refer by REFERID
     */
    function get_refer($REFERID)
    {
        return $this->db->get_where('REFER',array('REFERID'=>$REFERID))->row_array();
    }
        
    /*
     * Get all refer
     */
    function get_all_refer()
    {
        $this->db->order_by('REFERID', 'desc');
        return $this->db->get('REFER')->result_array();
    }
        
    /*
     * function to add new refer
     */
    function add_refer($params)
    {
        $this->db->insert('REFER',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update refer
     */
    function update_refer($REFERID,$params)
    {
        $this->db->where('REFERID',$REFERID);
        return $this->db->update('REFER',$params);
    }
    
    /*
     * function to delete refer
     */
    function delete_refer($REFERID)
    {
        return $this->db->delete('REFER',array('REFERID'=>$REFERID));
    }
}
