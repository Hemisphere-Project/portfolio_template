<div class="backoffice_content">
<script type="text/javascript">
function delete_confirm(id){
	var r=confirm("Delete project #"+id+"?");
	if (r==true){
		window.location.href = "<?php echo site_url('backoffice/remove').'/' ?>"+id;		
	}
}
</script>
<p style="font-weight:bold;height:30px;"><a href="<?php echo site_url('backoffice/create'); ?>"/>[+]</a></p>

<table class="backoffice_table">
<?php foreach ($projects as $project_item): ?>
   <tr>
   	<td><a href="<?php echo site_url('backoffice/edit/').'/'.$project_item['id'] ?>"><?php echo $project_item['id'] ?></a></td>
   	<td style="font-weight:bold;"><a onclick=delete_confirm(<?php echo $project_item['id']?>) >x</a></td>
   	<td style="font-weight:bold;"><a href=<?php echo site_url('backoffice/moveup').'/'.$project_item['id'].'/'.$project_item['position']?>>⋀</a></td>
   	<td><?php echo $project_item['position'] ?></td>
   	<td style="font-weight:bold;"><a href=<?php echo site_url('backoffice/movedown').'/'.$project_item['id'].'/'.$project_item['position']?>>⋁</a></td>
   	<td><a href="<?php echo site_url('mediamanager/index').'/'.$project_item['id'].'/'.$project_item['dir'] ?>">❖</a></td>
    <td style="font-weight:bold;"><a href="<?php echo site_url('backoffice/edit/').'/'.$project_item['id'] ?>"><?php echo $project_item['title'] ?></a></td>
    <td><?php echo $project_item['type'] ?></td>
    <td><?php echo $project_item['description_short'] ?></td>
    <td><?php echo $project_item['description_long'] ?></td>
    <td><?php echo $project_item['dir'] ?></td>
    <td><?php echo $project_item['thumb_name'] ?></td>
    <td><?php echo $project_item['year'] ?></td>
    
   </tr>
  
<?php endforeach ?>
</table>
</div>
