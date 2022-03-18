<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">code </p>
            <div class="input-group">
				<input type="password" placeholder="leader code" name="leader_code" >
			</div>
            <div class="input-group">
                <a style="text-decoration:none" name="submit" href="new_pass.php" class="btn"> Login </a>
			</div>
			<p class="login-register-text">Return to login : <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
<?php
extract($_POST);
$k=12345;
if(isset($_POST['submit']))
{
	if($_POST['leader_code']==$k)
	{
		header("location: welcome_pag.php");
	}
}
