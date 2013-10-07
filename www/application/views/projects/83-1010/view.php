<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	
	<style type="text/css">
	img{
		position:absolute;
		top:50%;
		left:50%;
		margin-top:-265px;
		margin-left:-178px;
		cursor:pointer;
	}
	img:hover{
		border:solid;
	}

</style>	
</head>
<body>
<span id="left-column">
	<?php $this->load->view('template/project_page/description');?>
	<?php $this->load->view('template/project_page/backbtn');?> 
</span>
<span id="right-column">
	<img onclick="window.open('http://www.ten-past-ten.com/', '_blank');" class="project_img_small" src="/media/83-1010/tenten.png"/>
</span>
</body>
</html>
