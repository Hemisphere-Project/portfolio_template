<h2 class="backoffice_title" ><a href="/index.php/backoffice/projects">&lt; </a><?php echo $values['id'];?></h2>
<div class="backoffice_content">
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('backoffice/edit');?>
	<input type="input" name="id" value="<?php echo $values['id'];?>" readonly/><br/>
	
	<input type="input" name="title" value="<?php echo $values['title'];?>" readonly/><br />
	
	<input type="input" name="type" value="<?php echo $values['type'];?>"/><br />

	<textarea rows="4" cols="50" name="description_short" ><?php echo $values['description_short'];?></textarea><br />
		
	<textarea rows="8" cols="100" name="description_long" /><?php echo $values['description_long'];?></textarea><br />
	
	<select id="input" name="year">
		<option value="2017" <?php if( $values['year'] == 2017 ) echo 'selected="selected"';?> >2017</option>
		<option value="2016" <?php if( $values['year'] == 2016 ) echo 'selected="selected"';?>>2016</option>
		<option value="2015" <?php if( $values['year'] == 2015 ) echo 'selected="selected"';?>>2015</option>
		<option value="2014" <?php if( $values['year'] == 2014 ) echo 'selected="selected"';?>>2014</option>
		<option value="2013" <?php if( $values['year'] == 2013 ) echo 'selected="selected"';?>>2013</option>
		<option value="2012" <?php if( $values['year'] == 2012 ) echo 'selected="selected"';?>>2012</option>
		<option value="2011" <?php if( $values['year'] == 2011 ) echo 'selected="selected"';?>>2011</option>
		<option value="2010" <?php if( $values['year'] == 2010 ) echo 'selected="selected"';?>>2010</option>
		<option value="2009" <?php if( $values['year'] == 2009 ) echo 'selected="selected"';?>>2009</option>
		<option value="2008" <?php if( $values['year'] == 2008 ) echo 'selected="selected"';?>>2008</option>
		<option value="2007" <?php if( $values['year'] == 2007 ) echo 'selected="selected"';?>>2007</option>
		<option value="2006" <?php if( $values['year'] == 2006 ) echo 'selected="selected"';?>>2006</option>
		<option value="2005" <?php if( $values['year'] == 2005 ) echo 'selected="selected"';?>>2005</option>
		<option value="2004" <?php if( $values['year'] == 2004 ) echo 'selected="selected"';?>>2004</option>
		<option value="2003" <?php if( $values['year'] == 2003 ) echo 'selected="selected"';?>>2003</option>
	</select>
	<br /><br />

	<p><em>to add a media please use ftp at <b>/media/<?php echo $values['dir'];?></b> for the moment</em></p>
	
	<br/>
	<input style="float:left;" type="submit" name="submit" value="update values" /> 

</form>

</div>
