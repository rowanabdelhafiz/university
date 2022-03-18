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
		<form action="regist_out.php" method="POST" class="login-email">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">This Username isn't available </p>
		<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="Password" placeholder="Password" name="opassword" required>
            </div>
            <div class="input-group">
				<input type="Password" placeholder="Confirm Password" name="Cpassword" required>
			</div>
			<select name="Type" class="input-group">
			<option value="leader">leader</option>
    		<option value="death cases officer">Death cases officer</option>
    		<option value="Compensation cases officer">Compensation cases officer</option>
			<option value="signature health officer">signature health officer</option>
			<option value="Officer family court">Officer family court</option>
			<option value="Officer's of economic courts experts">Officer's of economic courts experts</option>
			<option value="Security officer">Security officer</option>
  			</select>
			<div class="input-group">
				<button name="submit" class="btn">ADD</button>
			</div>
			<p class="login-register-text">Main page  <a href="Admin_page.php">Click Here</a></p>
		</form>
	</div>
</body>
</html>