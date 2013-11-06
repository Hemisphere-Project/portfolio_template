<?php
class MediaManager extends CI_Controller {

	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mediamanager_model');
		//$this->load->library('session');
	}
	
	public function index($project_id=FALSE,$project_dir=FALSE){
		
		$this->load->helper(array('form', 'url'));
		
		//to redirect in case no id or project dir provided
		if($project_id===FALSE || $project_dir===FALSE)
			redirect('/backoffice', 'refresh');
			
		if($this->session->userdata('logged_in') !== FALSE){
			
			
			$data['title'] = 'media manager';
			$data['medias'] = $this->mediamanager_model->get_medias($project_id);
			$data['error'] = '';
			$data['project_id'] = $project_id;
			$data['project_dir'] = $project_dir;

			$this->load->view('backoffice/header', $data);
			//$this->load->view('template/navbarH',$data);
			$this->load->view('backoffice/media',$data);
			$this->load->view('backoffice/footer');
	
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}

		
	public function  media($id=FALSE)
	{

	}
	
	public function add($project_id,$project_dir){
		
		$this->load->helper(array('form', 'url'));
	
		if($this->session->userdata('logged_in') !== FALSE){
			
			$upload_path = APPPATH.'media/'.$project_dir;
			
			$upload_config['upload_path'] = $upload_path;
			$upload_config['allowed_types'] = '*';
			
			$this->load->library('upload', $upload_config);
			
			//codeingiter can't do multi upload (with a single input field as dropzone serves)
			//so we have to do single upload repetively
			$files = $_FILES;
			$cpt = count($_FILES['file']['name']);
			for($i=0; $i<$cpt; $i++)
			{
				$_FILES['file']['name']= $this->addTS($files['file']['name'][$i]);//timestamp = quickfix to avoid duplicate
				$_FILES['file']['type']= $files['file']['type'][$i];
				$_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
				$_FILES['file']['error']= $files['file']['error'][$i];
				$_FILES['file']['size']= $files['file']['size'][$i];    
				$this->doUpload($upload_config,'file');
				
                                //TODO Check if the dimensions à higher than 1920x1200
                                //$this->resizeImage($upload_path,$_FILES['file']['name']);
                                
				$this->mediamanager_model->add_media($project_id,$project_dir,$_FILES['file']);
			}
			//redirect('/backoffice', 'refresh'); // pour le moment marche pas
                        //redirect('/mediamanager/index/'.$project_id.'/'.$project_dir, 'refresh'); // pour le moment marche pas
		}else{
			redirect('/backoffice/login', 'refresh');	
		}	
	}
	
	public function addTS($file_name){
		$pos = strrpos($file_name, ".");
		return substr($file_name, 0, $pos)."_".time().substr($file_name, $pos);
	}
	
	public function doUpload($upload_config,$key){
		$this->upload->initialize($upload_config);
		if (!$this->upload->do_upload($key))
		{
			$errors = $this->upload->display_errors();
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('backoffice/create', $error);

		}
		else
		{
			//success
		}
	}
        
       public function resizeImage($path,$name){
                if(isset($resize_config)){
                    unset($resize_config);
                }
           
                $resize_config['image_library'] = 'gd2';
		$resize_config['source_image']	= $path.'/'.$name;
                //$resize_config['new_image']	= $path.'/salut'.$name;
		$resize_config['maintain_ratio'] = TRUE;
                
                list($width, $height) = getimagesize($resize_config['source_image']);
                if($width > 1920){
                        $resize_config['width']	= 1920;
                }else if ($height > 1200){ 
                	$resize_config['height'] = 1200;
                }else{
                    return false;//we don't need to resize the image
                }
		
		$this->load->library('image_lib', $resize_config); 
                $this->image_lib->clear();
                $this->image_lib->initialize($resize_config);
		
		if ( ! $this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
                
                return true;
            
        }
	
	public function remove($id,$project_id,$project_dir){
		$this->load->helper('url');
		if($this->session->userdata('logged_in') !== FALSE){
			
			$this->mediamanager_model->remove_media($id);
			redirect('/mediamanager/index/'.$project_id.'/'.$project_dir, 'refresh'); // pour le moment
		}else{
			redirect('/backoffice/login', 'refresh');	
		}
	}
	public function moveup($id,$project_id,$project_dir,$position){
            
            $this->load->helper('url');
            if($this->session->userdata('logged_in') !== FALSE){

                    $this->mediamanager_model->update_media_position($id,$project_id,$position,'up');
                    redirect('/mediamanager/index/'.$project_id.'/'.$project_dir, 'refresh'); // pour le moment
            }else{
                    redirect('/backoffice/login', 'refresh');	
            }
            
            
        }
	public function movedown($id,$project_id,$project_dir,$position){
            
            $this->load->helper('url');

            if($this->session->userdata('logged_in') !== FALSE){

                    $this->mediamanager_model->update_media_position($id,$project_id,$position,'down');
                    redirect('/mediamanager/index/'.$project_id.'/'.$project_dir, 'refresh'); // pour le moment
            }else{
                    redirect('/backoffice/login', 'refresh');	
            }
            
        }
	

}
