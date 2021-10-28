   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/">

    <title>WELCOME</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
   <!-- Begin page content -->
   <?php
include "koneksi.php";
   ?>
<div class="container">
  <?php
  $view = isset($_GET['view']) ? $_GET['view']: null;
  switch ($view) {
  default:
  //untuk pesan berhasil atau gagal
  if(isset($_GET['e'])&& $_GET['e']== 'sukses'){
?>
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Selamat</strong> Proses Berhasil.
</div>
<?php
  }elseif(isset($_GET['e'])&& $_GET['e']== 'gagal'){
?>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Oh Tidak</strong> Proses Gagal!.
</div>
<?php
  }
?>
    <div class="panel panel-default">
      <div class="panel-heading panel-inverse">
        <h3 class="panel-title">Data Administrator</h3>
      </div>
    <div class="panel-body">
      <a href="data_admin.php?view=tambah" class="btn btn-primary" style="border-radius: 30px; margin-bottom: 10px; background-color: #65BCE9;">Tambah Data</a>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Password</th>
            <th>Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sqladmin = mysqli_query($konek,"SELECT * FROM admin ORDER BY username ASC");
          while($data=mysqli_fetch_array($sqladmin)){
            echo "<tr link(style.css)>
            <td class='text-center'>$no</td>
            <td>$data[nama_lengkap]</td>
            <td>$data[username]</td>
            <td>$data[password]</td>
            <td class='text-center'>
              <a href='data_admin.php?view=edit&id=$data[idadmin]' class='btn btn-warning btn-sm'>Edit</a>
              <a href='fungsi_admin.php?act=delete&id=$data[idadmin]' class='btn btn-danger btn-sm'>Hapus</a>
            </td>
            </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>

  </div>
 </div>
<?php
  break;
  case "tambah":
?>
    <div class="panel panel-default">
      <div class="panel-heading panel-inverse">
        <h3 class="panel-title">Tambah Data Administrator</h3>
      </div>
    <div class="panel-body">

      <form class="form-horizontal" method="POST" action="fungsi_admin.php?act=insert">
        <div class="form-group">
          <label class="col-md-2">Username</label>
          <div class="col-md-4">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Password</label>
          <div class="col-md-4">
            <input type="password" name="password" class="form-control" placeholder="password" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Nama lengkap</label>
          <div class="col-md-5">
            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2"></label>
          <div class="col-md-4">
            <input type="submit"  class="btn btn-success" value="Simpan">
            <a href="data_admin.php" class="btn btn-danger">Batal</a>
          </div>
        </div>
      </form>    
  </div>
 </div>
<?php        
  break;     
  case "edit":
  $sqlEdit = mysqli_query($konek, "SELECT *FROM admin WHERE idadmin='$_GET[id]'");
  //menampung data edit
  $e =mysqli_fetch_array($sqlEdit);
?>
    <div class="panel panel-default">
      <div class="panel-heading panel-inverse">
        <h3 class="panel-title">Edit Data Administrator</h3>
      </div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="fungsi_admin.php?act=update">
        <input type="hidden" name="idadmin" value="<?php echo $e['idadmin']; ?>">
        <div class="form-group">
          <label class="col-md-2">Username</label>
          <div class="col-md-4">
            <input type="text" name="username" class="form-control" value="<?php echo $e['username']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Password</label>
          <div class="col-md-4">
            <input type="password" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Ingin Diganti">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Nama lengkap</label>
          <div class="col-md-5">
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $e['nama_lengkap']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2"></label>
          <div class="col-md-4">
            <input type="submit"  class="btn btn-success" value="Update">
            <a href="data_admin.php" class="btn btn-danger">Batal</a>
          </div>
        </div>
      </form>   

  </div>
 </div>
<?php
  break;
}
?> 
   
</div>