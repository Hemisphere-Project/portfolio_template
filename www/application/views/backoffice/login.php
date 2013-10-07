<!DOCTYPE html>
<html>
 <head>
   <title>Login</title>
   <link rel="stylesheet" href="/css/backoffice.css">
    <link rel="stylesheet" href="/css/main.css">
 </head>
 <body>
 	<div id="login_form">
	   <?php echo validation_errors(); ?>
	   <?php echo form_open('logincheck'); ?>
		 <label for="username">Username:</label>
		 <input type="text" size="20" id="username" name="username"/>
		 <br/>
		 <label for="password">Password:</label>
		 <input type="password" size="20" id="passowrd" name="password"/>
		 <br/>
		 <input type="submit" value="Login"/>
	   </form>
   </div>
 </body>
</html>


