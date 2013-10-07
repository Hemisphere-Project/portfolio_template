<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	
	<style type="text/css">
		img:hover{
			border:solid;
		}
	
	</style>
</head>
<body>

<body>
<span id="left-column">
	<?php $this->load->view('template/project_page/description');?>
	<?php $this->load->view('template/project_page/backbtn');?> 
</span>
<span id="right-column">
	<img onclick="window.open('http://www.northsidedown.com');" class="project_img" src="/media/96-north-side-down/north.png"/>
</span>
</body>




