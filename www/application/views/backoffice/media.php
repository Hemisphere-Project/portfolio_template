<link rel="stylesheet" href="<?php echo base_url('css/dropzone_css/basic.css'); ?>">
<script src="<?php echo base_url('js/lib/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('js/effects/dzuploadformparam.js'); ?>"></script>

<h2 class="backoffice_title"><a href="<?php echo site_url('backoffice'); ?>">&lt; </a>add media</h2>
<div class="backoffice_content">
	
	
	<?php echo $error;?>
	
	
	<!-- add media -->
	<?php 
		$attributes = array('class' => 'dropzone', 'id' => 'dz_uploadform');
		echo form_open_multipart('mediamanager/add'.'/'.$project_id.'/'.$project_dir, $attributes);      
	?>    	
		
		<input style="float:right;" type="submit" name="submit" value="send" /> 
	
	</form>
	
	<!-- media list -->
	
	<script type="text/javascript">
	function delete_confirm(id){
		var r=confirm("Delete media #"+id+" ?");
		if (r==true){
			window.location.href = "<?php echo site_url('mediamanager/remove').'/' ?>"+id+"<?php echo '/'.$project_id.'/'.$project_dir ?>";		
		}
	}
	</script>
	
	<table class="backoffice_table">
	<?php foreach ($medias as $media): ?>
            
                <tr><td><?php echo $media['project_id'] ?></td>
		<td><?php echo $media['id'] ?></td>
		<td style="font-weight:bold;"><a onclick=delete_confirm("<?php echo $media['id'].'","'.$project_id.'","'.$project_dir?>") >x</a></td>
                <td style="font-weight:bold;"><a href=<?php echo site_url('mediamanager/moveup').'/'.$media['id'].'/'.$media['project_id'].'/'.$project_dir.'/'.$media['position']?>>⋀</a></td>
                <td><?php echo $media['position'] ?></td>
                <td style="font-weight:bold;"><a href=<?php echo site_url('mediamanager/movedown').'/'.$media['id'].'/'.$media['project_id'].'/'.$project_dir.'/'.$media['position']?>>⋁</a></td>
		<td><?php echo $media['file_name'] ?></td>
		<td><?php echo $media['type'] ?></td>
		<td><?php echo $media['dir'] ?></td>
		<td><?php echo $media['size'] ?></td>
	   </tr>
	  
	<?php endforeach ?>
	</table>

</div>
