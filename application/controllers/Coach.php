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

class Coach extends CI_Controller
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
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function personal()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = 'goals';
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function goals($param1="")
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
	
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	function add_goal(){
			$dt = $this->input->post();
			
			$this->db->insert('goals',$dt);
			
			$id=$this->db->insert_id();
			
		// $data['row'] =$this->db->get_where('goals',array('goals_id'=>$id))->row();
		
		echo $id;
		// $rst['goal_view'] = $this->load->view('backend/loaded/load_a_goal',$data,true); 
		// echo json_encode($rst);
		
		}	
	function edit_goal($param1=""){
		$dt = $this->input->post();
		$this->db->where(array('goals_id'=>$param1));		
		$this->db->update('goals',$dt);
		
		$data['row'] =$this->db->get_where('goals',array('goals_id'=>$param1))->row();
		echo $this->load->view('backend/loaded/load_a_goal',$data,true);
	}
	
	// function get_goals_loaded($param1=""){
// 		
		// $data['row'] =$this->db->get_where('goals',array('goals_id'=>$param1))->row();
		// echo $this->load->view('backend/loaded/load_a_goal',$data,true);
	// }
	function get_themes_chart(){
		$data['row'] ="";
		echo $this->load->view('backend/loaded/theme_chart',$data,true);
	}
	function tasks($param1="",$param2="")
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
		
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function get_single_task_update($param1=""){
		$data['tasks_status'] = '1';
		$data['completed_by'] = '0';
		
		$task = $this->db->get_where('tasks',array('tasks_id'=>$param1))->row();
		
		if($task->tasks_status==='1'){
			$data['tasks_status'] = '0';
			$data['completed_by'] = $this->session->login_user_id;
		}
		
		$this->db->where(array('tasks_id'=>$param1));
		
		$this->db->update('tasks',$data);
		
		$data['task'] = $task;//$this->db->get_where('tasks',array('tasks_id'=>$param1))->row();
		echo $this->load->view('backend/loaded/single_task',$data,true);
	}
	
	function get_tasks_list($param1=""){
		$data['tasks'] = $this->db->get_where('tasks',array('goals_id'=>$param1,'tasks_status'=>1))->result_object();
		echo $this->load->view('backend/loaded/tasks_list',$data,true);
	}	
	function get_goals_list($param1=""){
		$data['goals'] = $this->db->get_where('goals',array('yds_obj'=>$param1,'users_id'=>$this->session->login_user_id,"goals_status"=>1))->result_object();
		echo $this->load->view('backend/loaded/goals_list',$data,true);
	}
	function get_task_comments($param1=""){
		$data['comments'] = $this->db->get_where('tasks_comments',array('tasks_id'=>$param1))->result_object();
		echo $this->load->view('backend/loaded/tasks_comments_list',$data,true);
	}	
	function add_comment($param1=""){
		echo "Test";//get_task_comments($param1);
	}
	function get_task_due_date($param1=""){
		echo date('j M Y',strtotime($this->db->get_where('tasks',array('tasks_id'=>$param1))->row()->tasks_due_date));
	}
	
	function get_task_details($param1=""){
		
		$rst = (array)$this->db->get_where('tasks',array('tasks_id'=>$param1))->row();
		
		echo json_encode($rst);
	}
	function mark_task_progress($param1=""){
				
		$task = $this->db->get_where('tasks',array('tasks_id'=>$param1))->row();
		
		$data['tasks_status'] = '1';

		if($task->tasks_status==='1'){
			$data['tasks_status'] = '0';
			$data['completed_by'] = $this->session->login_user_id;
		}
		
		$this->db->where(array('tasks_id'=>$param1));
		
		$this->db->update('tasks',$data);
		
		$progress_data['count_completed_tasks'] = $this->db->get_where('tasks',array('goals_id'=>$task->goals_id,'tasks_status'=>'0'))->num_rows();
		$progress_data['count_of_tasks'] = $this->db->get_where('tasks',array('goals_id'=>$task->goals_id))->num_rows();
		
		echo $this->load->view('backend/loaded/goal_progressbar',$progress_data,true);
	}
	function mark_task_progress_on_add($param1=""){
		$progress_data['count_completed_tasks'] = $this->db->get_where('tasks',array('goals_id'=>$param1,'tasks_status'=>'0'))->num_rows();
		$progress_data['count_of_tasks'] = $this->db->get_where('tasks',array('goals_id'=>$param1))->num_rows();
		
		echo $this->load->view('backend/loaded/goal_progressbar',$progress_data,true);
	}
	function add_task(){
		$dt = $this->input->post();
		
		$this->db->insert('tasks',$dt);

	}
	
	function edit_task($param1=""){
		$data = $this->input->post();
		
		$this->db->where(array('tasks_id'=>$param1));
		
		$this->db->update('tasks',$data);
		
	}
	
	function task_progress($param1=""){
		echo $param1;
	}
	    
	function dreams()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }

	function status()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
  
	function journal()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function reports()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    } 	    
	
	function settings()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function goals_settings()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }	
	
	function mentees()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function objectives()
    {
        if ($this->session->userdata('coach_login') != 1)
            redirect(base_url(), 'refresh');
			
        $page_data['page_name']  = __FUNCTION__;
        $page_data['page_title'] = get_phrase(__FUNCTION__);
        $this->load->view('backend/index', $page_data);
    }
	
	function add_theme(){
		$data = $this->input->post();
		$this->db->insert("goal_themes",$data);
	}
	
	function tasks_form(){
		$content = array();
		$data['goals_id'] = '1';
		//$content['view'] = $this->load->view('backend/coach/load_task_form',$data,true);
		
		//echo json_encode($content);
		
		echo "Just a test";
	}	 
		
}
