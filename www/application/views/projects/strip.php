<div id="strip_container">
<?php foreach ($projects as $project_item): ?>
    <div class="strip_element">
    	<a href=<?php echo site_url('projects/prjkt/').'/'.$project_item['dir']?> >
    		<img src=<?php echo base_url('application/media/').'/'.$project_item['dir'].'/'.$project_item['thumb_name']?> />
    	</a>
    </div>
<?php endforeach ?>
</div>
