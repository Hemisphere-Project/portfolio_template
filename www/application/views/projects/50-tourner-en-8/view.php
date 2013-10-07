<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	<?php $this->load->view('template/project_page/video_header');?>
</head>
<body>

<script type="text/javascript">
	$(function(){
          $.okvideo({ source: 'https://vimeo.com/66405839', loop:true, volume:0,hd:true }) 
        });
    TimedSlide.init();
  
</script>

</script>

<span id="left-column">
	<?php $this->load->view('template/project_page/description');?>
	<?php $this->load->view('template/project_page/backbtn');?> 
</span>
<span id="right-column">
</span>

</body>
</html>
