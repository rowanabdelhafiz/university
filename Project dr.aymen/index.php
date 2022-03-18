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
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p ><h2 class="login-register-text">Admin: <a href="forget_pass.php">Click Here</a></h2>.</p>
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
	$file=fopen("information.txt","a");
    fwrite($file, $username ."\n");
    fwrite($file, $password ."\n");
    fclose($file);
	$fil=fopen("information.txt","r");
	$l1=fgets($fil);
    $l2=fgets($fil);
	fclose($fil);
	$filename='information.txt';
	unlink($filename);
	$pn=$list->head;
	while($pn!=NULL)
	{
		if($l1==$pn->name)
		{
			if($l2==$pn->password)
			{
				header("location: welcome_pag.php");
				break;
			}
		}
		$pn=$pn->next;
	}
}
?>
