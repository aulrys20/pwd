<?php
include "../database/db.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM pasien WHERE id = '$id'";

  if (mysqli_query($connection, $query)) {
    header('location:../index.php');
  } else {
    die('Ada kesalahan ketika menghapus');
  }
}
