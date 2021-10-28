<?php
//variabel koneksi
$konek = mysqli_connect("localhost","root","","tematik");

if(!$konek){
	echo "Koneksi Database Gagal...!!!";
}
?>