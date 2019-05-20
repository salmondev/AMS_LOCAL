<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asset_verify_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asset_verify by ASSET_VERIFY_RID
     */
    function get_asset_verify($ASSET_VERIFY_RID)
    {
        return $this->db->get_where('ASSET_VERIFY',array('ASSET_VERIFY_RID'=>$ASSET_VERIFY_RID))->row_array();
    }
        
    /*
     * Get all asset_verify
     */
    function get_all_asset_verify()
    {
        $this->db->order_by('ASSET_VERIFY_RID', 'desc');
        return $this->db->get('ASSET_VERIFY')->result_array();
    }
        
    /*
     * function to add new asset_verify
     */
    function add_asset_verify($params)
    {
        $this->db->insert('ASSET_VERIFY',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asset_verify
     */
    function update_asset_verify($ASSET_VERIFY_RID,$params)
    {
        $this->db->where('ASSET_VERIFY_RID',$ASSET_VERIFY_RID);
        return $this->db->update('ASSET_VERIFY',$params);
    }
    
    /*
     * function to delete asset_verify
     */
    function delete_asset_verify($ASSET_VERIFY_RID)
    {
        return $this->db->delete('ASSET_VERIFY',array('ASSET_VERIFY_RID'=>$ASSET_VERIFY_RID));
    }
}
