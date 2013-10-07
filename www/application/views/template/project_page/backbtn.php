<script type="text/javascript">
	function onBackBtnClick(){
		//document.location ="/index.php/projects/prjkts/";	
		console.log(document.referrer);
		if(document.referrer.search(window.location.host) != -1)
			window.history.back();
		else
			document.location ="/index.php/projects/prjkts/";
	}
</script>

<div class="backbtn" >
	<div style="position:absolute;left:0px;top:0px;cursor:pointer;width:100%;height:100%;line-height:66px;" onclick="onBackBtnClick()">&lt;</div>
</div>
