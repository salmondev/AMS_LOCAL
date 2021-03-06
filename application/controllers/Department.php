<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Department extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Department_model');
    } 

    /*
     * Listing of department
     */
    function index()
    {
        $data['department'] = $this->Department_model->get_all_department();
        
        $data['_view'] = 'department/index';
        $this->load->view('test',$data);
    }

    /*
     * Adding a new department
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'DEPARTMENTNAME' => $this->input->post('DEPARTMENTNAME'),
            );
            
            $department_id = $this->Department_model->add_department($params);
            redirect('department/index');
        }
        else
        {            
            $data['_view'] = 'department/add';
            $this->load->view('test',$data);
        }
    }  

    /*
     * Editing a department
     */
    function edit($DEPARTMENTID)
    {   
        // check if the department exists before trying to edit it
        $data['department'] = $this->Department_model->get_department($DEPARTMENTID);
        
        if(isset($data['department']['DEPARTMENTID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'DEPARTMENTNAME' => $this->input->post('DEPARTMENTNAME'),
                );

                $this->Department_model->update_department($DEPARTMENTID,$params);            
                redirect('department/index');
            }
            else
            {
                $data['_view'] = 'department/edit';
                $this->load->view('test',$data);
            }
        }
        else
            show_error('The department you are trying to edit does not exist.');
    } 

    /*
     * Deleting department
     */
    function remove($DEPARTMENTID)
    {
        $department = $this->Department_model->get_department($DEPARTMENTID);

        // check if the department exists before trying to delete it
        if(isset($department['DEPARTMENTID']))
        {
            $this->Department_model->delete_department($DEPARTMENTID);
            redirect('department/index');
        }
        else
            show_error('The department you are trying to delete does not exist.');
    }
    
}
