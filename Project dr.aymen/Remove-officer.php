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
			<div class="input-group">
				<button name="submit" class="btn">Remove</button>
				</div>
				<a style="text-decoration:none" name="sub" href="Admin.php" class="btn"> Return </a>
			</div>
		</form>
		<br>
		<br>
		<br>
	</div>
	<?php
include"user_login_list.php";
$pn=$list->head;
extract($_POST);
$k=1;
if(isset($_POST['submit']))
{
	$h=0;
    while($pn!=NULL)
	{
		if($username==$pn->name)
		{
			$Type=$pn->type;
			$list->delete($pn);
			$h=1;
            break;
		}
		$pn=$pn->next;
	}
	if($h==1)
	{
		$filenam=$Type.".".'txt';
		unlink($filenam);
		$pn=$list->head;
		update_employee($Type,$pn);
		header("location: index.php");
	}
	else{
	echo "Username Not Fount !";
	}
}
?>
</body>
</html>