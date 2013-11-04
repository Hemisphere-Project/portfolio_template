<?php

class MediaManager_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	// get every media from a project
	public function get_medias($project_id)
	{
		$this->db->order_by("position", "asc");
		$query = $this->db->get_where('media',array('project_id' => $project_id));
		return $query->result_array();
	}
	
	// get a single media
	public function get_media($id)
	{
		$query = $this->db->get_where('media', array('id' => $id));
		return $query->row_array();
	}
	
	//add media
	public function add_media($project_id,$project_dir,$file){
		//do the insert with the form info
		
		$this->load->helper('url');
		
		$data = array(
			'project_id' => $project_id,
			'file_name' => $file['name'],
			'type' => $file['type'],
			'dir' => $project_dir,
			'size' => $file['size']
		);
		
		$this->db->insert('media', $data);
		
                // retrieve the id just created
		// WARNING here if two rows in the DB are completelly identical exept for the id
		// the following line won't work (it will always retrive the line with the lowest id)
		// FIXED by the order by id desc
		$this->db->order_by('id', 'desc');
		$row = $this->db->get_where('media', $data)->row_array();
                
                //set initial position which is length - 1 of the SELECT * for the current project id
                
                $lenght = count($this->db->get_where('media',array('project_id' => $project_id))->result_array());
                
                $this->db->where('id', $row['id']);
		$this->db->update('media', array('position' => $lenght - 1));
	}
	
	// remove media
	public function remove_media($id){
		
		$media = $this->get_media($id);
		
		// DB Delete
		$this->db->where('id', $id);
		$this->db->delete('media');
		
		// We have three options here for what to do with the deleted media
		// 1. move it in the project_trashed/project_dir folder. For this we have to create the dir if it doesnt exist
		// AND modify the delete project function (in backoffice controler) in order to take that change in account (avoid duplication and so on
		// 2. don't delete it and let it be place in the trash dir in case of project deletion
		// 3. definitivelty delete it 
		
		// here is the option 3.
		unlink(APPPATH.'media/'.$media['dir'].'/'.$media['file_name']);
	}
        
        public function update_media_position($id,$project_id,$position,$direction){
		
		if($id != null && $position != null && ($direction === 'up' || $direction === 'down')){
                        
                        
			if($direction == 'up'){
				$value = $position - 1;
				$data = array('position' => $value, 'project_id' => $project_id);
			}else if($direction == 'down'){
				$value = $position + 1;
				$data = array('position' => $value, 'project_id' => $project_id);
			}
                        
                        $old_id_res = $this->db->get_where('media', $data)->row_array();
                        if(!empty($old_id_res)){//which means the row exist (always the case exept on boundaries)
                            // update current row
                            $this->db->where('id', $id);
                            $this->db->update('media', array('position' => $value));

                            // update old row
                            $this->db->where('id', $old_id_res['id']);
                            $this->db->update('media', array('position' => $position));
                        }
		}
	}
	
	// update media information
	public function update_media($id){
		
	}
	
	


}
