<div id="thumb_container">
<?php foreach ($projects as $project_item): ?>
    <div class="thumb">
    	<a href=<?php echo '/index.php/projects/prjkt/'.$project_item['dir']?> >
    		<img src=<?php echo '/media/'.$project_item['dir'].'/'.$project_item['thumb_name']?> />
    	</a>
    </div>
<?php endforeach ?>
</div>
