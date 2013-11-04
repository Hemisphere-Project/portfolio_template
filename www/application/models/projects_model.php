<?php
class Projects_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//retrieve the projects list
	public function get_projects($sort_field='default',$sort_way='default',$return_first_media=FALSE)
	{
		//if ($dir === FALSE)
		//{
		switch($sort_field){
			case 'title' : 
			case 'year' : 
			case 'type' : 
			case 'description_short' :
				if($sort_way != 'default')
					$this->db->order_by($sort_field, $sort_way);
				else
					$this->db->order_by($sort_field, "asc");
				break;
			case 'default' : 
				$this->db->order_by("position", "asc"); 
				break;
			default : 
				$this->db->order_by("position", "asc"); 
				break;
		}
		//$this->db->order_by("position", "asc");
                
                if($return_first_media){
                    $query = $this->db->query('SELECT projects.*, media.file_name FROM projects 
                                                LEFT JOIN media ON(projects.id=media.project_id) WHERE media.position = 0');
                    return $query->result_array();
                }else{
                    $query = $this->db->get('projects');
                    return $query->result_array();
		}
		
		// $query = $this->db->get_where('projects', array('dir' => $dir));
		// return $query->row_array();
	}
        
	
	//retrieve a single project
	public function get_project($dir){// to be replaced by id
		
		$query = $this->db->get_where('projects', array('dir' => $dir));
		return $query->row_array();
	
	}
}
