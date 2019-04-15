
<!DOCTYPE html>
<html>
<head>
	<title>Login | Peminjaman Barang Sekolah</title>
	<link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body  style="background-image: url('img/gambar7.png') !important;">
	<div class="container">
		<div class='row'>
			<div class="col-md-4" style="padding-top: 20px;">
				<a class="btn btn-info btn-icon" href="index.php">
					<i class="fa fa-arrow-left"></i>
				</a>
			</div>
			<div class="col-md-4 form-register-container">
				<h2 class="">Login</h2>
				<form action="proses-login.php" method="post">
					<label>Username</label>
					<input class="form-control" type="" name="username" required>
					<label>Password</label>
					<input class="form-control" type="password" name="password" required>
					<button type="submit" name="login" class="btn btn-success" style="margin-top: 20px;">LOGIN</button><br>
					<label style="margin-top: 15px;">Tidak Punya Akun?</label> <a href="register.php">Daftar</a>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>