<?php
	session_start();
	include 'config.php';
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$query_username = mysql_query("SELECT * FROM user WHERE username = '$username'");
		if($query_username){
			$data = mysql_fetch_array($query_username);
			if($password == $data['password']){
				echo $_SESSION['username'] = $data['username'];
				echo $_SESSION['name'] = $data['nama'];
				if($data['level'] == 'admin'){
					header('location: admin/index.php');
				}else{
					header('location: index.php');
				}
			}else{
				echo "<script>alert('Password Salah atau belum diisi');</script>";
				echo "<script>window.history.back();</script>";
			}
		}else{
			echo "<script>alert('Username tidak terdaftar');</script>";
		}

	}
?>