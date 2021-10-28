<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
//jika ada get act
if(isset($_GET['act'])){

	//jika act=insert
	if($_GET['act']=='insert'){
	//simpan inputan form ke variabel
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$nama_lengkap = $_POST['nama_lengkap'];

	//apabila form belum lengkap
	if($username==''|| $_POST['password']=='' || $nama_lengkap==''){
 		//header('location:data_admin.php?view=tambah$e=bl');
 		echo"pengisian form anda belum lengkap....!";
 	}else{
 		//proses penyimpanan data
 		$simpan = mysqli_query($konek, "INSERT INTO admin(username,password,nama_lengkap) VALUES ('$username','$password','$nama_lengkap')");
 		if($simpan){
 			header('location:data_admin.php?e=sukses');
 		}else{
 			header('location:data_admin.php?e=gagal');
 		}

 	 }
   }elseif($_GET['act']=='update'){ //jika act=update
   		$idadmin = $_POST['idadmin'];
   	    $username = $_POST['username'];
		$passowrd = md5($_POST['password']);
		$nama_lengkap = $_POST['nama_lengkap'];

		//apabila form belum lengkap
	if($username==''|| $nama_lengkap==''){
 		//header('location:data_admin.php?view=tambah$e=bl');
 		echo"pengisian form anda belum lengkap....!";
 	}else{
 		//jika password tdk di ubah
 		if($_POST['password']==''){
 		   $update = mysqli_query($konek, "UPDATE admin SET username='$username', nama_lengkap='$nama_lengkap' WHERE idadmin='$idadmin'");
 		}else{
 		//jika password di ubah
 			$update = mysqli_query($konek, "UPDATE admin SET username='$username', password='$password', nama_lengkap='$nama_lengkap' 								WHERE idadmin='$idadmin'");
 		}

 		if($update){
 			header('location:data_admin.php?e=sukses');
 		}else{
 			header('location:data_admin.php?e=gagal');
 		}
 	  }
   }elseif($_GET['act']=='delete'){
   		$hapus =mysqli_query($konek, "DELETE FROM admin Where idadmin='$_GET[id]' AND idadmin!='1'");
   		if($hapus){
   			header('location:data_admin.php?e=sukses');
   		}else{
 			header('location:data_admin.php?e=gagal');
 		}
   }else{ //jika act bukan insert, update, ataupun delete
   		header('location:data_admin.php');
  }
 }else{ //jika tdk ada get act
 		header('location:data_admin.php');
 }
?>