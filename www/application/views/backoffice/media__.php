<link rel="stylesheet" href="<?php echo base_url('css/dropzone_css/basic.css'); ?>">
<script src="<?php echo base_url('js/lib/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('js/effects/dzuploadformparam.js'); ?>"></script>

<h2 class="backoffice_title" ><a href="<?php echo site_url('backoffice'); ?>">&lt; </a>add media</h2>
<div class="backoffice_content">
	
	<?php echo $error;?>
		  
	<?php 
		$attributes = array('class' => 'dropzone', 'id' => 'dz_uploadform');
		echo form_open_multipart('backoffice/media'.'/'.$id, $attributes);      
	?>    	
		
		<input style="float:right;" type="submit" name="submit" value="add media" /> 
	
	</form>


</div>
