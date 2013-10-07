<table>
<tr>
    <td style="letter-spacing:-3px;">
    	<a href='/index.php/projects/prjkts/projects_list/title/asc'>⋀</a>
    	<a href='/index.php/projects/prjkts/projects_list/title/desc'>⋁</a>
    </td>
    <td style="letter-spacing:-3px;">
    	<a href='/index.php/projects/prjkts/projects_list/type/asc'>⋀</a>
    	<a href='/index.php/projects/prjkts/projects_list/type/desc'>⋁</a>
    </td>
    <td style="letter-spacing:-3px;">
    	<a href='/index.php/projects/prjkts/projects_list/description_short/asc'>⋀</a>
    	<a href='/index.php/projects/prjkts/projects_list/description_short/desc'>⋁</a>
    </td>
    <td style="letter-spacing:-3px;">
    	<a href='/index.php/projects/prjkts/projects_list/year/asc'>⋀</a>
    	<a href='/index.php/projects/prjkts/projects_list/year/desc'>⋁</a>
    </td>
</tr>
<?php foreach ($projects as $project_item): ?>
  <tr onclick=onListRowClick(&quot;<?php echo '/index.php/projects/prjkt/'.$project_item['dir']?>&quot;) >
	<td><?php echo $project_item['title'] ?></td>
	<td><?php echo $project_item['type'] ?></td>
    <td><?php echo $project_item['description_short'] ?></td>
    <td><?php echo $project_item['year'] ?></td>
  </tr>
<?php endforeach ?>
</table>
