<?php
	$connect = mysql_connect("localhost","root","310801") or die("Gagal Koneksi");
	if(mysql_select_db("db_pinjam_barang")){
		//echo "DATABASE TERPILIH: db_pinjam_barang";
	}
?>