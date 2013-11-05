<?php

class Backoffice_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_project()
	{
		
		//do the insert with the form info
		
		$this->load->helper('url');
		
		$data = array(
			'title' => $this->input->post('title'),
			'year' => $this->input->post('year'),
			'type' =>$this->input->post('type'),
			'description_short' => $this->input->post('description_short'),
			'description_long' => $this->input->post('description_long'),
			//'dir' => url_title($this->input->post('title'), 'dash', TRUE) 
		);
		
		$this->db->insert('projects', $data);
                
                
		// retrieve the id just created
		// WARNING here if two rows in the DB are completelly identical exept for the id
		// the following line won't work (it will always retrive the line with the lowest id)
		// FIXED by the order by id desc
		$this->db->order_by('id', 'desc');
		$row = $this->db->get_where('projects', $data)->row_array();
                
                //set initial position NB a trigger would have been better but not easily implement because of the AUTO_INC of id
                $this->db->where('id', $row['id']);
		$this->db->update('projects', array('position' => $row['id']));
		
		// create the dir name
		$data['dir'] = $row['id'].'-'.url_title($this->input->post('title'), 'dash', TRUE);
		// we create the media directory for the project "current dir is relative to index.php"
		if(!mkdir(APPPATH.'media/'.$data['dir'],0777)){
			die('oooops unable to create media directory...');	
		}
		// we create the view directory for the project "current dir is relative to index.php"
		if(!mkdir(APPPATH.'views/projects/'.$data['dir'],0777)){
			die('oooops unable to create media directory...');	
		}
		// we copy the project page template from the views/template/project_page directory
//		copy(APPPATH.'views/template/project_page/view.php',APPPATH.'views/projects/'.$data['dir']."/view.php");
		copy(APPPATH.'views/template/project_page/view.php',APPPATH.'views/projects/'.$data['dir']."/view_strip.php");
		
		//$res = $this->db->insert('projects', $data);
		//return array( 'dir' => $data['dir'] , 'res' => $res);
		
		// we update the directory field in the db
		$this->db->where('id', $row['id']);
		$this->db->update('projects', array('dir' => $data['dir']));
		
		return array('id' => $row['id'], 'dir' => $data['dir']);
	}
	
	public function get_projects()
	{
		$this->db->order_by("position", "asc");
		$query = $this->db->get('projects');
		return $query->result_array();
	}
	
	public function get_project($id)
	{
		$query = $this->db->get_where('projects', array('id' => $id));
		return $query->row_array();
	}
	
	public function update_project($id){
		
		$data = array(
			'id' => $this->input->post('id'),
			'title' => $this->input->post('title'),// never changed for the moment
			'year' => $this->input->post('year'),
			'type' =>$this->input->post('type'),
			'description_short' => $this->input->post('description_short'),
			'description_long' => $this->input->post('description_long'),
		);
		$this->db->where('id', $id);
		$this->db->update('projects', $data);
	}
	
	public function update_thumb_name($id,$thumb_name){
		$this->db->where('id', $id);
		$this->db->update('projects', array('thumb_name' => $thumb_name));
	}
	
	public function remove_project($id){
		
		$project = $this->get_project($id);
		
		// DB Delete
		$this->db->where('id', $project['id']);
		$this->db->delete('projects');
		
		
		//$this->db->where('project_id', $project['id']);
		///$this->db->delete('media');
		
		// Move media and view.php to the project_trashed folder
		rename(APPPATH.'media/'.$project['dir'],APPPATH.'project_trashed/'.$project['dir']);
		rename(APPPATH.'views/projects/'.$project['dir'],APPPATH.'project_trashed/'.$project['dir']."/".$project['dir']);
		//rename("media/hello-yeah-ii", "project_bin/hello-yeah-ii");
		//exec("mv -r /application/views/projects/".$project['dir']." /project_bin/".$project['dir']);
	}
	
	public function update_project_position($id,$position,$direction){
		
		if($id != null && $position != null && ($direction === 'up' || $direction === 'down')){
                        
                        
			if($direction == 'up'){
				$value = $position - 1;
				$data = array('position' => $value);
//                                $old_id_res = $this->db->get_where('projects', $data)->row_array();
//                                if(!empty($old_id_res)){//which means the row exist (always the case exept on boundaries)
//                                    // update current row
//                                    $this->db->where('id', $id);
//                                    $this->db->update('projects', $data);
//                                    
//                                    // update old row
//                                    $this->db->where('id', $old_id_res['id']);
//                                    $this->db->update('projects', array('position' => $position));
//                                }
				//$this->db->where('id', $id);
				//$this->db->update('projects', $data);
				
			}else if($direction == 'down'){
				$value = $position + 1;
				$data = array('position' => $value);

				//$this->db->where('id', $id);
				//$this->db->update('projects', $data);	
			}
                        
                        $old_id_res = $this->db->get_where('projects', $data)->row_array();
                        if(!empty($old_id_res)){//which means the row exist (always the case exept on boundaries)
                            // update current row
                            $this->db->where('id', $id);
                            $this->db->update('projects', $data);

                            // update old row
                            $this->db->where('id', $old_id_res['id']);
                            $this->db->update('projects', array('position' => $position));
                        }
		}
	}
	
	
	function login($username, $password){
		
	   $this->db->select('id, username, password');
	   $this->db->from('users');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);
	
	   $query=$this->db->get();
	
	   if($query->num_rows()==1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}
	
	function logout(){
		
	}


}
