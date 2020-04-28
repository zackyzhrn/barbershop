<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/png" href="Login_v13/Login_v13/images/icons/barber.png"/>
</head>
<body background="barber.jfif">

<form class="box" action="cekregis.php" method="post">
	<h1>Sign up</h1>
	<input class="contoh3" type="text" name="username" placeholder="Username" required>
	<input class="contoh4" type="email" name="email" placeholder="Email" required>
	<input class="contoh5" type="password" name="password" placeholder="Password" required>
	<input class="contoh6" type="text" name="alamat" placeholder="Alamat" required>
	<input type="submit" class = "btn" name="Sign up" required>
	<a href="login.php" class="btn">Back</a>
</form>

</body>
</html>