<?php
class Backoffice extends CI_Controller {

	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('backoffice_model');
		//$this->load->library('session');
	}
	
/*	public function home(){
		$data['title'] = 'Backoffice home';
		
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar',$data);
			$this->load->view('backoffice/home');
			$this->load->view('template/footer');
	}*/
	
	public function login(){
		$this->load->helper(array('form', 'url'));
		$this->load->view('backoffice/login');
	}
	public function logout(){
		$this->load->helper(array('url'));
		
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('backoffice/projects', 'refresh');
	}
	
	public function create()
	{

		// TODO ERROR MANAGEMENT
		
		$this->load->helper(array('form', 'url'));
		
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->load->library('form_validation');
			
			$data['title'] = 'Create a new item';
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar',$data);
				$this->load->view('backoffice/create',array('error' => ' ' ));
				$this->load->view('template/footer');
				
			}
			else 
			{	
				
				$res = $this->backoffice_model->create_project();
				$upload_path = 'media/'.$res['dir'];
				
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = '*';
				
				$this->load->library('upload', $config);
				
				foreach ($_FILES as $key => $value)
				{
					
					if($key == 'thumbnail'){
						//echo '(key|value)  ('.$key.'|'.print_r($value).')';
						
						//concatenate 'thumb' with the actual file extension
						$config['file_name'] = 'thumb'.substr(strrchr($value['name'], "."),0);
						
						//update the 'thumb_name' db field
						$this->backoffice_model->update_thumb_name($res['id'],$config['file_name']);
					
					}else{
						$config['file_name'] = null;
					}
						$this->upload->initialize($config);
						if (!$this->upload->do_upload($key))
						{
							$errors = $this->upload->display_errors();
							$error = array('error' => $this->upload->display_errors());
							$this->load->view('backoffice/create', $error);
	
						}
						else
						{
							// put some code for upload success here
						}
				}
				
				redirect('/backoffice/projects', 'refresh');
			}
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	public function projects(){
		
		$this->load->helper(array('form', 'url'));
		
		if($this->session->userdata('logged_in') !== FALSE){	
			

			//$this->load->library('form_validation');
			
			$data['projects'] = $this->backoffice_model->get_projects();
			
			$data['title'] = 'Backoffice';
			
			
			//if ($this->form_validation->run() === FALSE){
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar',$data);
			$this->load->view('backoffice/logout', $data);
			$this->load->view('backoffice/list', $data);
			$this->load->view('template/footer');
			//}else{
				
			//	$this->backoffice_model->modify_project();	
				
			//}
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	public function edit($id=FALSE){
		$this->load->helper(array('form', 'url'));
		
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->load->library('form_validation');
			
			$data['title'] = 'Create a new item';
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{
				$values = $this->backoffice_model->get_project($id);
				
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar',$data);
				$this->load->view('backoffice/edit',array('values' => $values));
				$this->load->view('template/footer');
				
			}
			else 
			{	
				// TODO ERROR MANAGEMENT
				$this->backoffice_model->update_project();
				
				redirect('/backoffice/projects', 'refresh');
			}
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	public function remove($id){
		
		$this->load->helper('url');
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->backoffice_model->remove_project($id);
			redirect('/backoffice/projects', 'refresh');
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	public function moveup($id,$position){
		
		$this->load->helper('url');
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->backoffice_model->update_project_position($id,$position,'up');
			redirect('/backoffice/projects', 'refresh');
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	public function movedown($id,$position){
		
		$this->load->helper('url');
		
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->backoffice_model->update_project_position($id,$position,'down');
			redirect('/backoffice/projects', 'refresh');
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	
	
}
