<?php
include "../database/db.php";

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nomor = $_POST['nomor'];
  $alamat = $_POST['alamat'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $golongan_darah = $_POST['golongan_darah'];
  $tinggi_badan = $_POST['tinggi_badan'];
  $berat_badan = $_POST['berat_badan'];

  $query = "UPDATE pasien SET nama='$nama', nomor='$nomor', alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', golongan_darah='$golongan_darah', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan' WHERE id='$id'";

  if (mysqli_query($connection, $query)) {
    header('location:../index.php');
  } else {
    die('Ada kesalahan saat mengedit data');
  }
}
