<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="Username" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="Password" placeholder="Password" name="password" required>
			</div>
			<select name="Type" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="1">Admin</option>
    		<option value="2">Death cases officer</option>
    		<option value="3">Compensation cases officer</option>
			<option value="4">signature health officer</option>
			<option value="5">Officer family court</option>
			<option value="6">Officer's of economic courts experts</option>
			<option value="7">Security officer</option>
  			</select>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p ><h2 class="login-register-text">leader: <a href="Leader_code.php">Click Here</a></h2>.</p>
		</form>
	</div>
</body>
</html>
<?php
include"user_login_list.php";
$pn=$list->head;
extract($_POST);
if(isset($_POST['submit']))
{
	Check_login($pn,$username,$password,$Type);
}
?>
