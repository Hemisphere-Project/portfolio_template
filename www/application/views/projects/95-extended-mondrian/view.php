<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/project_page/common_header');?>
	
	<style type="text/css">
		img{
			position:absolute;
			top:50%;
			left:50%;
			margin-top:-64px;
			margin-left:-64px;
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
	<img onclick="window.open('/media/95-extended-mondrian/extended_mondrian_opti.pdf');" class="project_img_small" src="/media/95-extended-mondrian/ACP_PDF.png"/>
</span>
</body>
</html>

