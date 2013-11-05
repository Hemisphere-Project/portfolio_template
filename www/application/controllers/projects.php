<?php
class Projects extends CI_Controller {

	const HOME = 'home';
	const ABOUT = 'about';
	const HELP = 'help';
	const PRJKT_LIST = 'projects_list';
	const PRJKT_T_LIST = 'projects_thumb_list';
	const PRJKT_STRIP = 'projects_strip';
	const PRJKT = 'project';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
	}

	public function static_pages($pageName=NULL)
	{
		$data['title'] = $pageName;
/*		if($pageName != self::ABOUT && $pageName != self::HOME){
			
			show_404();
			return;
		}*/
		$this->buildPage($pageName,$data);
	}
	
	public function prjkts($listType=self::PRJKT_T_LIST,$sort_field='default',$sort_way='default'){
		
                if($listType==self::PRJKT_STRIP){
                    //$data['projects'] = $this->projects_model->get_projects($sort_field,$sort_way,TRUE);
                    $data['projects'] = $this->projects_model->get_projects($sort_field,$sort_way,FALSE);
                    foreach ($data['projects'] as $key=>$project){
                        $data['projects'][$key]['media'] = $this->projects_model->get_medias($project['id']);
                    }
                }else{
                    $data['projects'] = $this->projects_model->get_projects($sort_field,$sort_way);
                }
		
                $data['title'] = 'Project List';
		$this->buildPage($listType,$data);
	}
	
	public function prjkt($id){
		
                //$data['project_item'] = $this->projects_model->get_project($id);
		$data['project_item'] = $this->projects_model->get_project($id,TRUE);
                
		if (empty($data['project_item']))
		{
			show_404();
		}
	
		$data['title'] = $data['project_item']['title'];
		$data['year'] = $data['project_item']['year'];
		$data['type'] = $data['project_item']['type'];
		$data['description_long'] = $data['project_item']['description_long'];
	
		//$this->load->view('projects/'.$data['project_item']['dir'].'/view', $data);
                $this->load->view('projects/'.$data['project_item']['dir'].'/view_strip', $data);
	}
	
	private function buildPage($pageType,$data){
		
		$this->load->view('template/header', $data);
		$this->load->view('template/navbarV',$data);
                $this->load->view('template/navArrows',$data);
		
		
		switch ($pageType) {
			case self::HOME:
				$this->load->view('static_pages/home', $data);
				break;
			case self::ABOUT:
				$this->load->view('static_pages/about', $data);
				break;
			case self::HELP:
				$this->load->view('static_pages/help', $data);
				break;
			case self::PRJKT_LIST:
				$this->load->view('projects/list', $data);
				break;
			case self::PRJKT_T_LIST:
				$this->load->view('projects/thumb_list', $data);
				break;
			case self::PRJKT_STRIP:
				$this->load->view('projects/strip', $data);
				break;
			case self::PRJKT:
				$this->load->view('projects/'.$data['project_item']['dir'].'/view', $data);
				//$this->load->view('projects/view', $data);
				break;
			default: show_404();
		}
		
		$this->load->view('template/footer', $data);
	}
	


}
