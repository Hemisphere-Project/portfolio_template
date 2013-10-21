<script src="<?php echo base_url('js/lib/jquery-ui-1.10.3.custom.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('js/lib/jquery.mousewheel.js'); ?>"></script>

<script type="text/javascript">var COUNT = <?php echo count($projects); ?>+1</script>
<script src="<?php echo base_url('js/effects/stripscript.js'); ?>"></script>


<script type="text/javascript">



</script>

<div id="strip_container">
        
<!--    <div class="strip_element">
    <p style="font-size: 50px">test hors boucle</p>
    </div>-->
<?php foreach ($projects as $project_item): ?>
    <div class="strip_element">
    		<img draggable="false" class="strip_img" src=<?php echo base_url('application/media/').'/'.$project_item['dir'].'/'.$project_item['thumb_name']?> />
    </div>
<?php endforeach ?>
</div>

