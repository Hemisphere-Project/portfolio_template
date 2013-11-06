<h2 class="backoffice_title" ><a href="<?php echo site_url('backoffice'); ?>">&lt; </a>Create a new project</h2>
<div class="backoffice_content">
<?php echo validation_errors(); ?>

<?php echo $error;?>
<?php 
	$attributes = array('class' => 'create_form');
	echo form_open_multipart('backoffice/create', $attributes);      
?>    


	<input type="input" name="title" value="title" onclick="this.value = (this.value == 'title') ? '' : this.value;"/><br />
	
	<input type="input" name="type" value="type" onclick="this.value = (this.value == 'type') ? '' : this.value;"/><br />

	<textarea rows="4" cols="50" name="description_short" onclick="this.value = (this.value == 'short description') ? '' : this.value;">short description</textarea><br />
		
	<textarea rows="8" cols="100" name="description_long"  onclick="this.value = (this.value == 'long description') ? '' : this.value;"/>long description</textarea><br />
	
	<select id="input" name="year">
		<option value="2017">2017</option>
		<option value="2016">2016</option>
		<option value="2015">2015</option>
		<option value="2014">2014</option>
		<option value="2013">2013</option>
		<option value="2012">2012</option>
		<option value="2011">2011</option>
		<option value="2010">2010</option>
		<option value="2009">2009</option>
		<option value="2008">2008</option>
		<option value="2007">2007</option>
		<option value="2006">2006</option>
		<option value="2005">2005</option>
		<option value="2004">2004</option>
		<option value="2003">2003</option>
	</select>
	<br />
	<br />
	
	<!--<label for="thumbnail">thumbnail</label> <br />
	<input type="file" name="thumbnail" accept="image/*" /><br /><br />-->	

	
	<input style="float:right;" type="submit" name="submit" value="Create project" /> 

</form>


</div>
