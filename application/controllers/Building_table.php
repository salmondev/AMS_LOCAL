<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Building_table extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Building_table_model');
    } 

    /*
     * Listing of building_table
     */
    function index()
    {
        $data['building_table'] = $this->Building_table_model->get_all_building_table();
        
        $data['_view'] = 'building_table/index';
        $this->load->view('test',$data);
    }

    /*
     * Adding a new building_table
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'building_lat' => $this->input->post('building_lat'),
				'building_long' => $this->input->post('building_long'),
				'building_name' => $this->input->post('building_name'),
            );
            
            $building_table_id = $this->Building_table_model->add_building_table($params);
            redirect('building_table/index');
        }
        else
        {            
            $data['_view'] = 'building_table/add';
            $this->load->view('test',$data);
        }
    }  

    /*
     * Editing a building_table
     */
    function edit($building_rid)
    {   
        // check if the building_table exists before trying to edit it
        $data['building_table'] = $this->Building_table_model->get_building_table($building_rid);
        
        if(isset($data['building_table']['building_rid']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'building_lat' => $this->input->post('building_lat'),
					'building_long' => $this->input->post('building_long'),
					'building_name' => $this->input->post('building_name'),
                );

                $this->Building_table_model->update_building_table($building_rid,$params);            
                redirect('building_table/index');
            }
            else
            {
                $data['_view'] = 'building_table/edit';
                $this->load->view('test',$data);
            }
        }
        else
            show_error('The building_table you are trying to edit does not exist.');
    } 

    /*
     * Deleting building_table
     */
    function remove($building_rid)
    {
        $building_table = $this->Building_table_model->get_building_table($building_rid);

        // check if the building_table exists before trying to delete it
        if(isset($building_table['building_rid']))
        {
            $this->Building_table_model->delete_building_table($building_rid);
            redirect('building_table/index');
        }
        else
            show_error('The building_table you are trying to delete does not exist.');
    }
    
}