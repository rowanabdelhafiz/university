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
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="Username" placeholder="name" name="username" required>
			</div>
            <div class="input-group">
				<input type="email" placeholder="email" name="email" required>
			</div>
			<div class="input-group">
				<input type="phone_number" placeholder="phone_number" name="phone_number" required>
			</div>
            <div class="input-group">
				<input type="date" placeholder="date of birth" name="date_of_birth" required>
			</div>
            <select name="Type" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="1">engineering</option>
    		<option value="2">computer science</option>
    		<option value="3">biotecnology</option>
			<option value="4">dentist</option>
			<option value="5">masscom</option>
			<option value="6">bussiness</option>
            <option value="7">pharmacy</option>
            <option value="8">art&design</option>
            <option value="9">languages</option>
  			</select>
              <select name="Type" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="1">Science</option>
    		<option value="2">Mathematics</option>
    		<option value="3">literary</option>
  			</select>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>
//$id,$mail,$name,$phone_number,$date_of_birthday,$faculity