<?php
class Page_functions extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('profile_model');
					$this->load->model('project_model');
					$this->load->helper('url_helper');
					$this->load->library('session');
					$this->load->helper('url');

				
			}

	public function check_restricted() {

			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if( empty($this->session->userdata('logged_in'))){	
				if(strpos($url,'/login') == false) {
					$data['title'] = 'Restricted Page, Please log in';
					$this->load->view('templates/header', $data);
					$this->load->view('templates/footer');
					redirect('login', 'refresh');
					//$this->output->set_header('refresh:3; url='.site_url('login'));
				}
				return false;					
			}
			return true;
	}

	public function view($slug = NULL)
	{
			$data['news_item'] = $this->profile_model->get_news($slug);

			if (empty($data['news_item']))
			{
					show_404();
			}

			$data['title'] = $data['news_item']['title'];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/view', $data);
			$this->load->view('templates/footer');
	}
			
	
		public function index(){

        $data['news'] = $this->profile_model->get_news();
        $data['title'] = 'Project archive';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);        
        $this->load->view('templates/footer', $data);
	}
	
		
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Register Profile';

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('emailAddress', 'emailAddress', 'required');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$data['created'] = "Your account has been successfully registerred, please log in to set up your profile.";
			$this->profile_model->set_account();
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login',$data);
			$this->load->view('templates/footer');
		}
	}
	public function profile(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit profile';
		
		$this->form_validation->set_rules('fname', 'fname', 'required');
		$this->form_validation->set_rules('sname', 'sname', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		
		$this->form_validation->set_rules('religion', 'religion');
		$this->form_validation->set_rules('LocationFlex', 'LocationFlex');
		
		
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('postcode', 'postcode', 'required');
		$this->form_validation->set_rules('streetName', 'streetName', 'required');
		$this->form_validation->set_rules('buildingNumber', 'buildingNumber', 'required');
		$data['info'] =  ($this->profile_model->load_profile());
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/profile_edit');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->profile_model->set_profile();
			redirect('view_profile', $data);

		} 
}

public function find_profile($usrname ){	
			
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['info'] = $this->profile_model->join_find_profile($usrname);
			$data['find'] = true;
			
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/show_profile');
			$this->load->view('templates/footer');
		
		}
		
public function view_profile(){	
			
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['info'] = $this->profile_model->join_load_profile();
			
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/show_profile');
			$this->load->view('templates/footer');
		
		}
		
public function adminreg(){	
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/admin');
			$this->load->view('templates/footer');
		
		}
	
	
public function search(){
	
		$this->check_restricted();
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('search', 'Search', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('pages/profile_search');
			$this->load->view('templates/footer');
		}
		else 
		{
			$search = $this->input->post('search');
			$option = $this->input->post('fields');
			$data['query'] = $this->profile_model->profile_search($option, $search);	
			
			$this->load->view('templates/header');
			$this->load->view('pages/profile_search', $data);
			$this->load->view('templates/footer');
		}
	}

public function view_projects()
{
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			
			$data['info'] = $this->project_model->get_all_projects();
			
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/projects_temp');
			$this->load->view('templates/footer');

}





public function find_project($projectID ){	
			
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['info'] = $this->project_model->join_find_project($projectID);
			$data['tasks'] = $this->project_model->find_tasks($projectID);
			$data['roles'] = $this->project_model->find_roles($projectID);
			//$data['find'] = true;
			
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/show_project');
			$this->load->view('templates/footer');
		
		}
/*
public function view_project($projectID){	
			
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['info'] = $this->project_model->join_load_project($projectID);
			$data['tasks'] = $this->project_model->find_tasks($projectID);
			$data['roles'] = $this->project_model->find_roles($projectID);
			
			
			$this->load->view('templates/profile_header');
			$this->load->view('pages/project/show_project');
			$this->load->view('templates/footer');
		
		}
*/
public function edit_project($projectID){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		

		$data['title'] = 'Edit project';
		
		$this->form_validation->set_rules('projectTitle', 'projectTitle', 'required');
		$this->form_validation->set_rules('projectType', 'projectType', 'required');
		$this->form_validation->set_rules('startDate', 'startDate', 'required');
		$this->form_validation->set_rules('endDate', 'endDate', 'required');
		$this->form_validation->set_rules('projectBudget', 'projectBudject', 'required');


		$data['info'] =  ($this->project_model->join_find_project($projectID));
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/project_edit');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->project_model->set_project();
			redirect('view_project', $data);

		} 
}

public function search_project(){
	
		$this->check_restricted();
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('search', 'Search', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('pages/project/project_search');
			$this->load->view('templates/footer');
		}
		else 
		{
			$search = $this->input->post('search');
			$option = $this->input->post('fields');
			$data['query'] = $this->project_model->project_search($option, $search);	
			
			$this->load->view('templates/header');
			$this->load->view('pages/project/project_search', $data);
			$this->load->view('templates/footer');
		}
	}


}
