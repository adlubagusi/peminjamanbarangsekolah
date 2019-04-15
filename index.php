<?php
	session_start();
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Barang Sekolah</title>
	<link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<header>
		<div class="bg-dark collapse" id="menuTop">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h4 class="text-white">Tentang Kami?</h4>
						<p class="text-muted">Peminjaman Barang Sekolah adalah aplikasi berbasis web yang dibuat dengan tujuan untuk mempermudah penanganan di bidang sarana & prasarana. Serta menyesuaikan diri dengan semakin majunya Teknologi Informasi</p>
						
					</div>
					<div class="col-sm-4">
						<h4 class="text-white">Kontak</h4>
						<p class="text-muted">
							<i class="fa fa-phone"></i> +62 815 5536 5579<br>
							<i class="fa fa-envelope"></i> email@email.com
						</p>
						<h4 class="text-white">Login</h4>
						<form action="proses-login.php" method="post">
							<input class="form-control" type="" name="username" placeholder="Username"><br>
							<input class="form-control" type="password" name="password" placeholder="Password"><br>
							<button type="submit" name="login" class="btn btn-primary">Login</button> <span class="text-muted"> Tidak punya akun? </span><a href="register.php">Daftar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container">
				<a class="navbar-brand align-items-center" style="color:#fff;">
					<strong> Peminjaman Barang Sekolah</strong>
				</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#menuTop" aria-expanded="false">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</div>
	</header>

	<main role="main">
		<section class="jumbotron text-center" style="background: #fff;">
			<div class="container">
				<h3 class="">Selamat Datang </h3>
				<?php 

					if(isset($_SESSION['username'])){
						$username = ($_SESSION['username']) ? $_SESSION['username'] : "";
						echo $username;
				?>
					<a href="logout.php" class="btn btn-danger btn-sm">Logout</a><br>
					<div class="btn-group" style="margin-top: 15px;">
							<a href="data-request.php?username=<?php echo $username;?>" class="btn btn-warning">
								<i class="fa fa-question"></i> 
								Permintaan Peminjaman
							</a>
							<a href="pemberitahuan.php?username=<?php echo $username;?>" class="btn btn-info">
								<i class="fa fa-globe"></i> 
								Pemberitahuan
							</a>
							<a href="barang-dipinjam.php?username=<?php echo $username;?>" class="btn btn-primary">
								<i class="fa fa-shopping-cart"></i> 
								Barang Dipinjam
							</a>
							<a href="barang-dikembalikan.php?username=<?php echo $username;?>" class="btn btn-success">
								<i class="fa fa-check"></i> 
								Barang dikembalikan
							</a>
						</div>
				<?php
					}
				?>
				<h1 class="jumbotron-heading" style="font-style: italic;">Daftar Barang</h1>
				<p>Pilih barang yang ingin dipinjam dari daftar barang dibawah</p>
			</div>
		</section>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">
					<?php
						include 'config.php';

						$query = mysql_query("SELECT * FROM tbl_barang ORDER BY id ASC");
						while ($data = mysql_fetch_array($query)) {
					?>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm" style="margin-bottom: 1.5rem;">
							<img src="assets/img/uploads/<?php echo $data['gambar_barang'];?>" style="width: 300px; height: 250px; margin: 5px 8px;">
							<div class="card-body">
								<p class="card-text"><?php echo $data['nama_barang'];?></p>
								<div class="d-flex justify-content-between align-items-center">
									<a href="proses-pinjam.php?username=
									<?php
										if(isset($_SESSION['username'])){
											echo $_SESSION['username'];
										}else{
											echo "";
										}
									?>
									&id_barang=<?php echo $data['id'];?>" class="btn btn-outline-info">Pinjam</a>
								</div>
							</div>
						</div>
					</div>
					<?php	
						}
					?>
					
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
<!-- writing by @adlubagus94->