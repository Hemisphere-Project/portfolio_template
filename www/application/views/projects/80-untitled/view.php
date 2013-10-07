<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	<?php $this->load->view('template/project_page/video_header');?>
</head>
<body>
<body>

<script type="text/javascript">
	//var SLID=false;
	$(function(){
          $.okvideo({ source: 'https://vimeo.com/67209782', loop:false, volume:0,hd:true }) 
        });
    TimedSlide.init();

  
</script>

<span id="left-column">
	<?php $this->load->view('template/project_page/description');?>
	<?php $this->load->view('template/project_page/backbtn');?> 
</span>
<span id="right-column">
</span>
</body>
</html>
