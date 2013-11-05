<?php foreach ($project_item['media'] as $media_item): ?>
    	<p><img draggable="false" 
             class="strip_img" 
             src=<?php echo base_url('application/media/').'/'.$media_item['dir'].'/'.$media_item['file_name']?> 
             />
        </p>
<?php endforeach ?>
        <p>
            <div class="project_info">
                <div class="project_info_content">
                    <p><b><?php echo $title ?></b></p>
                    <p> <?php echo $year ?></p>
                </div>
            </div>
        </p>