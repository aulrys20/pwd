<?php
session_start();

if (!$_SESSION['username']) {
  header('location:login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <title>Aplikasi Kesehatan!</title>
</head>

<body>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/heartbeat.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Kesehatan
    </a>

    <a href="configure/logout.php" class="btn btn-outline-primary">Logout</a>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 pt-4">
        <h1 class="display-3 text-center">Pasien Baru</h1>
      </div>
      <div class="col-lg-12 pb-4">
        <a href="index.php" class="text-info">
          Kembali ke halaman utama
        </a>
      </div>
      <div class="col-lg-12">
        <form action="configure/simpan.php" method="post" onsubmit="return validasi()">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control">
                <small id="nama_validate" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label for="nomor">Nomor Telp</label>
                <input type="text" name="nomor" id="nomor" class="form-control">
                <small id="nomor_validate" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"></textarea>
                <small id="alamat_validate" class="text-danger"></small>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                <small id="tempat_lahir_validate" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                <small id="tanggal_lahir_validate" class="text-danger"></small>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="golongan_darah">Golongan Darah</label>
                    <select name="golongan_darah" id="golongan_darah" class="form-control">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="AB">AB</option>
                      <option value="O">O</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input type="number" id="tinggi_badan" name="tinggi_badan" min=1 class="form-control">
                    <small id="tinggi_badan_validate" class="text-danger"></small>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="berat_badan">Berat Badan</label>
                    <input type="number" id="berat_badan" name="berat_badan" min=1 class="form-control">
                    <small id="berat_badan_validate" class="text-danger"></small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const validasi = () => {
      let nama = document.getElementById('nama').value;
      let nomor = document.getElementById('nomor').value;
      let alamat = document.getElementById('alamat').value;
      let tinggi_badan = document.getElementById('tinggi_badan').value;
      let berat_badan = document.getElementById('berat_badan').value;
      let tempat_lahir = document.getElementById('tempat_lahir').value;
      let tanggal_lahir = document.getElementById('tanggal_lahir').value;

      let v_nama = document.getElementById('nama_validate');
      let v_nomor = document.getElementById('nomor_validate');
      let v_alamat = document.getElementById('alamat_validate');
      let v_tinggi_badan = document.getElementById('tinggi_badan_validate');
      let v_berat_badan = document.getElementById('berat_badan_validate');
      let v_tempat_lahir = document.getElementById('tempat_lahir_validate');
      let v_tanggal_lahir = document.getElementById('tanggal_lahir_validate');

      let number_validate = /[0-9]/g
      let char_validate = /[A-z]/g
      let require = 0;

      if (!nama.match(number_validate) && nama != "") {
        require++;

        v_nama.innerText = "";
      } else {
        v_nama.innerText = "Masih ada yang salah pada kolom nama";
        // return false;
      }

      if (!char_validate.test(nomor) && nomor != "") {
        require++;

        v_nomor.innerText = "";
      } else {
        v_nomor.innerText = "Masih ada yang salah pada kolom nomor telepon";
        // return false;
      }

      if (!tinggi_badan < 5 && tinggi_badan != "") {
        require++

        v_tinggi_badan.innerText = "";
      } else {
        v_tinggi_badan.innerText = "Masih ada yang salah pada kolom tinggi badan";
        // return false;
      }

      if (!berat_badan < 1 && berat_badan != "") {
        require++

        v_berat_badan.innerText = "";
      } else {
        v_berat_badan.innerText = "Masih ada yang salah pada kolom berat badan";
        // return false;
      }

      if (alamat != "") {
        require++;

        v_alamat.innerText = "";
      } else {
        v_alamat.innerText = "Masih ada yang salah pada kolom alamat";
        // return false;
      }

      if (tempat_lahir != "" && !tempat_lahir.match(number_validate)) {
        require++;

        v_tempat_lahir.innerText = "";
      } else {
        v_tempat_lahir.innerText = "Masih ada yang salah pada kolom tempat lahir";
        // return false;
      }

      if (tanggal_lahir != "") {
        require++

        v_tanggal_lahir.innerText = "";
      } else {
        v_tanggal_lahir.innerText = "Masih ada yang salah pada kolom tanggal lahir";
        // return false;
      }

      if (require == 7) {
        return true;
      } else {
        Swal.fire('Ops.. ', 'Masih ada yang salah', 'error');
        return false;
      }
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>