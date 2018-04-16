<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Joyonto Roy
 *	date		: 27 september, 2014
 *	FPS School Management System Pro
 *	http://codecanyon.net/user/FreePhpSoftwares
 *	support@freephpsoftwares.com
 */

class Mentee extends CI_Controller
{
    
    
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('mentee_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('mentee_login') != 1)
            redirect(base_url(), 'refresh');
		
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('personal');
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	function manage_profile($param1="",$param2="",$param3=""){
		if ($this->session->userdata('mentee_login') != 1)
            redirect(base_url(), 'refresh');
		
		if($param1==='add_user'){
			$data['name'] = $this->input->post('fname');
			$data['email'] = $this->input->post('email');
			$data['level'] = $this->input->post('level');
			$data['password'] = $this->input->post('password');
			
			//Check if email exists
			$e_check = $this->db->get_where('users',array('email'=>$this->input->post('email')))->num_rows();
			
			if($e_check===0){
				$this->db->insert('users',$data);
				
				$this->session->set_flashdata('flash_message',get_phrase('user_created_successfully'));
					
			}else{
				
				$this->session->set_flashdata('flash_message',get_phrase('process_failed_email_exists'));
			}
			
			redirect(base_url() . 'index.php?sdsa/manage_profile/', 'refresh');	
		}
		
		if($param1==='update'){
			
			$this->db->where(array('users_id'=>$param2));
			
			$data['name'] = $this->input->post('fname');
			$data['email'] = $this->input->post('email');
			if($this->input->post('password')!==""){
				$data['password'] = $this->input->post('password');
			}
			$data['level'] = $this->input->post('level');
			
			$this->db->update('users',$data);
			
			$this->session->set_flashdata('flash_message',get_phrase('profile_updated'));
			
			redirect(base_url() . 'index.php?sdsa/manage_profile/', 'refresh');
		}
		
		if($param1==='delete'){
				
			
				//Check if an project is link
				
				$level = array('none','none','sdsa','facilitator');
				
				$link_check = $this->db->get_where('projects',array($level[$param2]=>$param3))->num_rows();
				
				if($link_check===0){
					$this->db->where(array('users_id'=>$param3));
				
					$this->db->delete('users');
					
					$this->session->set_flashdata('flash_message',get_phrase('user_deleted'));
				}else{
					$this->session->set_flashdata('flash_message',get_phrase('user_with_linkage_cannot_delete'));	
				}
				
				redirect(base_url() . 'index.php?sdsa/manage_profile/', 'refresh');	
		}
		
		$page_data['trash_count']  = count(file_list('/uploads/trash/'));
		//$group = $this->db->get_where('projects',array('sdsa'=>$this->session->login_user_id))->row()->num;
		$page_data['new_count']  = $this->db->join('projects','projects.num=files.group')->get_where('files',array('status'=>'1','sdsa'=>$this->session->login_user_id))->num_rows();	
        
		$page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $this->load->view('backend/index', $page_data);
	}
	

}
