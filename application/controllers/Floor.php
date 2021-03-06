<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Floor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Floor_model');
    } 

    /*
     * Listing of floor
     */
    function index()
    {
        $data['floor'] = $this->Floor_model->get_all_floor();
        
        $data['_view'] = 'floor/index';
        $this->load->view('test',$data);
    }

    /*
     * Adding a new floor
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'BUILDING_ID' => $this->input->post('BUILDING_ID'),
				'FLOOR_ID' => $this->input->post('FLOOR_ID'),
            );
            
            $floor_id = $this->Floor_model->add_floor($params);
            redirect('floor/index');
        }
        else
        {
			$this->load->model('Building_model');
			$data['all_building'] = $this->Building_model->get_all_building();
            
            $data['_view'] = 'floor/add';
            $this->load->view('test',$data);
        }
    }  

    /*
     * Editing a floor
     */
    function edit($FLOOR_RID)
    {   
        // check if the floor exists before trying to edit it
        $data['floor'] = $this->Floor_model->get_floor($FLOOR_RID);
        
        if(isset($data['floor']['FLOOR_RID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'BUILDING_ID' => $this->input->post('BUILDING_ID'),
					'FLOOR_ID' => $this->input->post('FLOOR_ID'),
                );

                $this->Floor_model->update_floor($FLOOR_RID,$params);            
                redirect('floor/index');
            }
            else
            {
				$this->load->model('Building_model');
				$data['all_building'] = $this->Building_model->get_all_building();

                $data['_view'] = 'floor/edit';
                $this->load->view('test',$data);
            }
        }
        else
            show_error('The floor you are trying to edit does not exist.');
    } 

    /*
     * Deleting floor
     */
    function remove($FLOOR_RID)
    {
        $floor = $this->Floor_model->get_floor($FLOOR_RID);

        // check if the floor exists before trying to delete it
        if(isset($floor['FLOOR_RID']))
        {
            $this->Floor_model->delete_floor($FLOOR_RID);
            redirect('floor/index');
        }
        else
            show_error('The floor you are trying to delete does not exist.');
    }
    
}
