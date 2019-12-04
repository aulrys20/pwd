<?php

include "../database/db.php";

if (isset($_POST['nama'])) {

  $nama = $_POST['nama'];
  $nomor = $_POST['nomor'];
  $alamat = $_POST['alamat'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $golongan_darah = $_POST['golongan_darah'];
  $tinggi_badan = $_POST['tinggi_badan'];
  $berat_badan = $_POST['berat_badan'];

  $query = "INSERT INTO pasien VALUES (NULL, '$nama', '$nomor', '$alamat', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', $tinggi_badan, $berat_badan)";

  $res = mysqli_query($connection, $query);

  if ($res) {
    header('location:../index.php');
  } else {
    die('bermasalah pada query penyimpanan');
  }
}
