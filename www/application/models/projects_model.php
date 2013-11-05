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
	public function get_project($id,$return_medias=FALSE){// to be replaced by id
		
            
            if($return_medias){
                $project_query = $this->db->get_where('projects', array('id' => $id));
                $project_array = $project_query->row_array();
                $this->db->order_by("position", "asc");
                $media_query = $this->db->get_where('media', array('project_id' => $id));
                $media_array = $media_query->result_array();
                
                $project_array['media'] = $media_array;
                
		return $project_array;
            }else{
		$query = $this->db->get_where('projects', array('id' => $id));
		return $query->row_array();
            }
	
	}
        // get every media from a project
	public function get_medias($project_id)
	{
		$this->db->order_by("position", "asc");
		$query = $this->db->get_where('media',array('project_id' => $project_id));
		return $query->result_array();
	}
}
