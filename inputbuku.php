<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Buku V.2023 - Input Buku</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Input Buku Baru</h2>
  <form method="post">
   <div class="input-group mb-3">
    <span class="input-group-text">Kode Buku</span>
    <input type="text" class="form-control" name="kodebuku">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Judul Buku</span>
    <input type="text" class="form-control" name="judulbuku">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Pengarang</span>
    <input type="text" class="form-control" name="pengarang">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Tahun Terbit</span>
    <input type="text" class="form-control" name="tahunterbit">
   </div>
   <button type="submit" class="btn btn-primary" name="bSimpan">Simpan</button>
  </form>
<?php
if (isset($_POST['bSimpan'])) {
	$kodebuku=filter_var($_POST['kodebuku'],FILTER_SANITIZE_STRING);
	$judulbuku=filter_var($_POST['judulbuku'],FILTER_SANITIZE_STRING);
	$pengarang=filter_var($_POST['pengarang'],FILTER_SANITIZE_STRING);
	$tahunterbit=filter_var($_POST['tahunterbit'],FILTER_SANITIZE_STRING);
	include("koneksi.buku.php");
	$sql="insert into buku (kodebuku,judulbuku,pengarang,tahunterbit) values(
	'".$kodebuku."','".$judulbuku."','".$pengarang."','".$tahunterbit."');";
	$q=mysqli_query($koneksi,$sql);
	if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Berhasil Simpan!</strong> Rekord buku berhasil disimpan !.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Gagal Simpan!</strong> Rekord buku Gagal disimpan !.
</div>';
	}
}
?>
</div>
</body>
</html>