<!--<script src="<?php echo base_url('js/lib/jquery-ui-1.10.3.custom.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('js/lib/jquery.mousewheel.js'); ?>"></script>-->

<!-- count +3 because we have the info element -->
<script type="text/javascript">var COUNT = <?php echo count($projects); ?>+4</script>
<script src="<?php echo base_url('js/effects/stripscript.js'); ?>"></script>


<script type="text/javascript">



</script>
<div id="strip_container">
<!--<div class="strip_element">
    <p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/347-prj3/1_1383144905.jpg"">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/350-test33_2/1_1383583273.jpg">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/347-prj3/1_1383144905.jpg"">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/350-test33_2/1_1383583273.jpg">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/350-test33_2/1_1383583273.jpg">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/350-test33_2/1_1383583273.jpg">
    </p><p><img draggable="false" class="strip_img" src="http://localhost:80/repository/miscellaneous/2013/portfolio_template/www/application/media/350-test33_2/1_1383583273.jpg">
    </p><p>
        <div class="project_info">
            <div class="project_info_content">
            <p><b> Die ist mein Berlin</b></p>
            <p> 2013</p>
            </div>
        </div>
    </p>
</div> -->       

<?php foreach ($projects as $project_item): ?>
    <div class="strip_element">
    		<!--<img draggable="false"
                     class="strip_img"
                     src=<?php echo base_url('application/media/').'/'.$project_item['dir'].'/'.$project_item['file_name']?> 
                     />-->
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
                            <p><b><?php echo $project_item['title'] ?></b></p>
                            <p> <?php echo $project_item['year'] ?></p>
                        </div>
                    </div>
                </p>
    </div>
<?php endforeach ?>
    
<div class="strip_element">
    <?php $this->load->view('static_pages/about');?>
</div>
</div>

