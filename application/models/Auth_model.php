<?php

 
class Auth_model extends CI_Model
{
    /*function __construct()
    {
        parent::__construct();
    }*/

	public function Login($u,$p)
	{
		$owner_fname=$u;
		$owner_uid=$p;
		$login=$this->db->get_where('OWNER_TABLE' , array('owner_fname' => $owner_fname , 'owner_uid' => $owner_uid ));
		if (count($login->result())>=0) {
			foreach ($login->result() as $key) {
				$sess['status']='Login';
				$sess['name']=$key->name;
				$sess['owner_fname']=$key->owner_fname;
				$this->session->set_userdata($sess);
			}
			header('location:'.base_url().'Test');
		}else {
			header('location:'.base_url().'Login');
		}
		
	}
}
?>
