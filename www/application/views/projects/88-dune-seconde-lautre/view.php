<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	
	<style type="text/css">
	img{
		position:absolute;
		top:50%;
		left:50%;
		margin-top:-294px;
		margin-left:-350px;
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
	<img onclick="window.open('http://www.dunsesecondealautre.com', '_blank');" class="project_img_small" src="/media/88-dune-seconde-lautre/duneseconde.png"/>
</span>
</body>
</html>
