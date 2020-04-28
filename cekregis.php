<?php
	include 'koneksi.php';

	$user = $_POST['username'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$alamat = $_POST['alamat'];

	$query = mysqli_query($koneksi,"insert into tbl_account(username_account, password_account, email_account, alamat_account,level) values ('$user','$pw','$email','$alamat','user');");
	if($query)
	{
		echo '<script>
		alert("Register Succes");
		location.href="login.php";
		</script>';
	} else{
		// echo '<script>
		// alert("Register Failed");
		// location.href="form_register.php";
		// </script>';
	}