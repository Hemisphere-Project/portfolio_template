<h2 class="backoffice_title" ><a href="/index.php/backoffice">&lt; </a>Create a new piece</h2>
<div class="backoffice_content">
<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('backoffice/create');?>

	<!--<label for="title">title</label>--> 
	<input type="input" name="title" value="title" onclick="this.value = (this.value == 'title') ? '' : this.value;"/><br />
	
	<!--<label for="type">type</label> -->
	<input type="input" name="type" value="type" onclick="this.value = (this.value == 'type') ? '' : this.value;"/><br />

	<!--<label for="description_short">Text</label>-->
	<textarea rows="4" cols="50" name="description_short" onclick="this.value = (this.value == 'short description') ? '' : this.value;">short description</textarea><br />
		
	<!--<label for="description_long">Text</label>-->
	<textarea rows="8" cols="100" name="description_long"  onclick="this.value = (this.value == 'long description') ? '' : this.value;"/>long description</textarea><br />
	
	<!--<label for="year">year</label> -->
	<!--<input type="input" name="year" >-->
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
	<!--</input>--><br /><br />

	<label for="thumbnail">thumbnail</label> <br />
	<input type="file" name="thumbnail" accept="image/*" /><br /><br />	
	
	<label for="media">media</label> <br />
	<input type="file" name="media" /><br /><br />
	
	
	
	<input style="float:right;" type="submit" name="submit" value="Create news item" /> 

</form>

<button id="addfile" style="width:30px;height:30px;border-radius:5px;"> [+] </button><br/>

</div>
