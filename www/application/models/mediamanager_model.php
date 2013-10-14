<?php

class MediaManager_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	// get every media from a project
	public function get_medias($project_id)
	{
		//$this->db->order_by("position", "asc");
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
		unlink(APPPATH.'/media/'.$media['dir'].'/'.$media['file_name']);
	}
	
	// update media information
	public function update_media($id){
		
	}
	
	


}
