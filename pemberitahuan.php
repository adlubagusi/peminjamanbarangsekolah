<!DOCTYPE html>
		<html>
		<head>
			<title>Request berhasil | Peminjaman Barang Sekolah</title>
			<link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		</head>
		<body  style="background-image: url('') !important;">
			<div class="container">
				<div class='row'>
					<div class="col-md-3 " style="padding-top: 20px;">
						
					</div>
					<div class="col-md-5 form-register-container">
						<?php
							include 'config.php';
							$username = $_GET['username'];
							$query = mysql_query("SELECT * FROM pemberitahuan WHERE username='$username' ORDER BY timestamp DESC");
							if(mysql_num_rows($query) > 0){
								while ($data = mysql_fetch_array($query)) {
									if($data['status'] == 'terima'){
										$alert = "success";
									}else if($data['status'] == 'tolak'){
										$alert = "danger";
									}else if($data['status'] == 'kembali'){
										$alert = "info";
									}
						?>
								<div class="alert alert-<?php echo $alert?>">
									<?php echo $data['konten'];?><br>
									<strong><?php echo $data['timestamp'];?></strong>
								</div>
						<?php
								}
							}else{
						?>
								<div class="alert alert-info" >
									Belum Ada Pemberitahuan
								</div>
						<?php
							}
						?>
						
						<a href="index.php" class="btn btn-success">KEMBALI</a>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
			<script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
			<script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>

		</body>
		</html>