<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <div class="input-group">
				<input type="username" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<select name="Type" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="1">leader</option>
			<option value="2">Death cases officer</option>
    		<option value="3">Student</option>
			<option value="4">Guard</option>
			<option value="5">Doctor</option>
			<option value="6">Secretary</option>
  			</select>
            <div class="input-group">
			<div class="input-group">
				<button name="submit" class="btn">Update</button>
				</div>
				<a style="text-decoration:none" name="sub" href="index.php" class="btn"> Return to Login </a>
			</div>
		</form>
		<br>
		<br>
		<br>
<?php
include"user_login_list.php";
$pn=$list->head;
extract($_POST);
$k=1;
if(isset($_POST['submit']))
{
	$h=0;
	$old_type=$Type;
    while($pn!=NULL)
	{
		if($username==$pn->name)
		{
			$pn->password=$password;
			$old_type=$pn->type;
			$pn->type=$Type;
			$h=1;
            break;
		}
		$pn=$pn->next;
	}
	if($h==1)
	{
		if($old_type==$Type)
		{
			$filenam='user.txt';
			unlink($filenam);
			$pn=$list->head;
			update_employee($Type,$pn);
		}
		else
		{
			$filenam='user.txt';
			unlink($filenam);
			$pn=$list->head;
			update_employee($Type,$pn);
		}
		header("location: index.php");
	}
	else{
	echo "Username Not Fount !";
	}
}
?>
	</div>
</body>
</html>