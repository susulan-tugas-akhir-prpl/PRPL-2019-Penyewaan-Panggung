<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login Admin</title>
	<?php

	if($_POST){
		$nama = $_POST['nama'];
		$pass = $_POST['pass'];
	
		if($nama == 'admin' && $pass == 'admin12345'){
			header('Location: AdminPage.php');
		}else{
			echo "
            <script>
              alert('Username atau password salah');
            </script>
      ";
		}
		
	}


	?>

	<link rel="stylesheet" href="style.css">
</head>
<body>

	<form class="box" action="" method="post">
		<h1>Login</h1>
		<input type="text" name="nama" placeholder="Masukkan Username" autofocus required>
		<input type="password" name="pass" placeholder="Masukkan Password">
		<input type="submit" name="" value="Login">
	</form>
</body>
</html>