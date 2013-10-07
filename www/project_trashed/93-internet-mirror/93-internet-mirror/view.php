<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	
	<style type="text/css">
	img{
		position:absolute;
		top:50%;
		left:50%;
		margin-top:-193px;
		margin-left:-375px;
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
	<img onclick="window.open('http://www.internetmirror.net', '_blank');" class="project_img_small" src="/media/91-twenty-six-degrees/twenty_750.png"/>
</span>
</body>
</html>
