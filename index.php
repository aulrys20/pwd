<?php
session_start();

if (!$_SESSION['username']) {
  header('location:login.php');
}

include "database/db.php";

$query = "SELECT * FROM pasien";

$pasien = mysqli_query($connection, $query);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <title>Aplikasi Kesehatan!</title>
</head>

<body>

  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/heartbeat.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Kesehatan
    </a>
    <a href="beranda.php" class="navbar-brand" align="left">Beranda</a>
    <a href="pasien.php" class="navbar-brand" align="left">Pasien</a>
    <a href="dokter.php" class="navbar-brand" align="left">Dokter</a>
    <a href="beranda.php" class="navbar-brand" align="left">Apoteker</a>
    <a href="obat.php" class="navbar-brand" align="left">Obat</a> 
    <a href="beranda.php" class="navbar-brand" align="left">Jenis Obat</a>
    
    

    <a href="configure/logout.php" class="btn btn-outline-primary">Logout</a>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <form action="" method="post">
         <div class="form-group">

            <div class="col-lg-10">
              <input type="text" name="keyword" size="40"   class="form-control" autofocus placeholder="masukan keyword" autocomplete="off" id="keyword" >
            </div>
            <div class="form-group">
           <label for="inputEmail" class="col-lg-2 control-label"></label>
            <div class="col-lg-10">
            <button class="btn btn-danger" type="submit" name="cari" id="tombol-cari">Cari!</button>
            </div>
      </div> 
</form>
      <div class="col-lg-12 py-4">
         <a href="form.php" class="btn btn-primary">Tambah Data Pasien</a>
      </div>
      <div class="col-lg-12">
        <table class="table table-striped table-hovered" id="example">
          <thead>
            <th>ID</th>
            <th>Nama Pasien</th>
            <th>Nomor Telp</th>
            <th>Alamat</th>
            <th>Tempat, Tanggal lahir</th>
            <th>Golongan Darah</th>
            <th>Tinggi Badan (cm)</th>
            <th>Berat Badan (kg)</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($pasien) > 0) : ?>
              <?php while ($row = mysqli_fetch_assoc($pasien)) : ?>
                <tr>
                  <td>P_000<?= $row['id'] ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['nomor'] ?></td>
                  <td><?= $row['alamat'] ?></td>
                  <td><?= $row['tempat_lahir'] ?>, <?= date('d M Y', strtotime($row['tanggal_lahir'])) ?></td>
                  <td><?= $row['golongan_darah'] ?></td>
                  <td><?= $row['tinggi_badan'] ?></td>
                  <td><?= $row['berat_badan'] ?></td>
                  <td>
                    <a href="form_edit.php?id=<?= $row['id'] ?>" class="badge badge-info badge-pill">Ubah</a>
                    <button class="badge badge-danger badge-pill" data-toggle="modal" data-target="#hapusModal" ketempelan="<?= $row['id'] ?>" onclick="hapusDong(this)">Hapus</button>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusModalLabel">Notice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="configure/hapus.php" method="GET">
          <div class="modal-body">
            <input type="hidden" id="data_hapus" name="id">
            Apakah kamu yakin ingin menghapus file ini ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Gak dong ah</button>
            <button type="submit" class="btn btn-danger">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const hapusDong = (e) => {
      console.log(e.getAttribute('ketempelan'));

      let id = document.getElementById('data_hapus');
      id.value = e.getAttribute('ketempelan');
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="asset/js/jquery-3.4.1.min.js"></script>
<script src="asset/js/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdf'
        ]
    } );
} );
</script>
</body>


</html>
