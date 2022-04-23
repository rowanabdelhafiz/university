<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="update.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Add student</p>
			<div class="input-group">
				<input type="id" placeholder="id" name="id" required>
			</div>
			<br>
			<br>
            <select name="faculity" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="3">password</option>
    		<option value="4">phone_number</option>
    		<option value="6">faculity</option>
			<option value="7">type</option>
  			</select>
			  <br>
			<div class="input-group">
				<button name="submit" class="btn">add</button>
			</div>
		</form>
	</div>
</body>
</html>