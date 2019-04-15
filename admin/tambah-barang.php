<?php
    session_start();
    include '../config.php';
    if(isset($_POST['tambah-barang'])){
        $nama_barang  = $_POST['nama_barang'];
        $stok_barang  = $_POST['stok_barang'];

        $file_name    = str_replace(" ","_",$_FILES['gambar_barang']['name']);
        $file_size    = $_FILES['gambar_barang']['size'];
        $file_type    = $_FILES['gambar_barang']['type'];
        $tmp_name     = $_FILES['gambar_barang']['tmp_name'];
        $max_size     = 2000000;
        $extension    = substr($file_name, strpos($file_name, '.') + 1);

        if(isset($file_name) && !empty($file_name)){
           // echo $file_name." ".$file_type." ".$file_size." ".$nama_barang." ".$stok_barang." ".$extension;
            if(($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png") && ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type=="image/gif") && $extension == $file_size<=$max_size){
                $location = "../assets/img/uploads/";
                if (move_uploaded_file($tmp_name, $location.$file_name)) {
                    if(mysql_query("INSERT INTO tbl_barang (nama_barang, gambar_barang, stok_barang) VALUES ('$nama_barang', '$file_name', '$stok_barang')")){
                        echo "<script>alert('Berhasil Ditambahkan');</script>";
                        echo "<script>window.location('index.php');</script>";
                    }else{
                        echo "<script>alert('Gagal Ditambahkan ke Database');</script>";
                    }
                }else{
                    echo "<script>alert('Gagal Upload ke direktori');</script>";
                }
            }else{
                echo "<script>alert('Bukan file gambar dan melebihi batas ukuran');</script>";
            }
        }
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Tambah Barang</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php
        include 'sidebar.php';
    ?>
    <div id="right-panel" class="right-panel">
        <?php
            include 'header.php'; 
        ?>
                <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title" style="padding: 20px 0;">
                        <h1 style="display: unset;">Tambah Barang</h1>
                        <a href="data-barang.php" class="btn btn-info btn-sm" style="margin-left: 20px;">
                                <i class="fa fa-search"></i>
                                Lihat Data Barang
                            </a>
                    </div>


                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Barang</a></li>
                            <li class="active">Tambah Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header"><strong>Tambah Data Barang </strong></div>
                          
                          <form class="card-body card-block" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama" class=" form-control-label">Nama Barang</label>
                                <input type="text" id="nama" name="nama_barang" placeholder="contoh: LCD" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Upload Foto Barang</label>
                                <input type="file" id="gambar" name="gambar_barang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stok" class=" form-control-label">Jumlah Barang</label>
                                <input type="number" id="stok" name="stok_barang" placeholder="contoh: 40" class="form-control"> 
                            </div>
                            <button type="submit" class="btn btn-success" name="tambah-barang">
                                <i class="fa fa-check"></i>
                                Tambah
                            </button>
                        </form>
                      </div>

                </div>
            </div>
        </div>

    </div>

    
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>