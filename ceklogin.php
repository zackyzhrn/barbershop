<?php
	
	include 'koneksi.php';

	$user = $_POST['username'];
	$pw =$_POST['password'];

	$query=mysqli_query($koneksi,  "select * from tbl_account where username_account = '$user' and password_account='$pw'" );

	$cek=mysqli_num_rows($query);

	if($cek>0)
	{
		session_start();
		$data = mysqli_fetch_assoc($query);
		if ($data['level']=="user"){
			$_SESSION['username_account']= $data['username_account'];
			$_SESSION['id']= $data['id_account'];
			$_SESSION['level']= 'user';
			
			echo '<script>
			alert("Hi User !");
			location.href = "animation.php"
			</script>';
		}

		else if ($data['level']=="admin"){
			$_SESSION['username_account']= $user;
			$_SESSION['id']= $data['id_account'];

			$_SESSION['level']= 'admin';
			echo '<script>
			alert("Hi Admin !");
			location.href = "halaman.php"
			</script>';
		}
		else if ($data['level']=="master admin"){
			$_SESSION['username_account']= $user;
			$_SESSION['id']= $data['id_account'];

			$_SESSION['level']= 'master admin';
			echo '<script>
			alert("Hi Master Admin !");
			location.href = "animation.php"
			</script>';
		}
		else if ($data['level']=="admin"){
			$_SESSION['username_account']= $user;
			$_SESSION['id']= $data['id_account'];

			$_SESSION['level']= 'admin';
			echo '<script>
			alert("Hi Admin !");
			location.href = "animation.php"
			</script>';
		}
	}else {
			echo'<script>
			alert("Login anda gagal");
			location.href = "login.php";
			</script>';
	}
?>