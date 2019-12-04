<?php
include "database/db.php";

// session dimulai
session_start();

// melakukan cek apakah session bernama username ada.. 
// jika ada maka akan diarahkan ke halaman index

if (isset($_SESSION['username'])) {
  if ($_SESSION['username']) {
    header('location:index.php');
  }
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

<script src='https://www.google.com/recaptcha/api.js'></script>

  <style>
    body {
      background-color: #363636;
    }
  </style>

  <title>Aplikasi Kesehatan!</title>
</head>

<body>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/heartbeat.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Kesehatan
    </a>
  </nav>
  <div class="container-fluid">
    <div class="row py-4">
      <div class="col-lg-5 mx-auto">
        <div class="card">
          <div class="card-body">
            <form action="configure/login.php" method="post" onsubmit="return validasi(this)">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <small class="text-danger" id="v_username"></small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="text-danger" id="v_password"></small>
              </div>
              <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6LcKosMUAAAAAPfU6797oGyuIlamb4HAh98yj3mF"></div>
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
    // melakukan validasi apakah username atau password itu diisi atau tidak ?
    const validasi = (form) => {
      let v_user = document.getElementById('v_username');
      let v_pass = document.getElementById('v_password')

      if (form.username.value == "") {
        v_user.innerText = "Username tidak boleh kosong.";
        return false;
      } else {
        v_user.innerText = "";
      }

      if (form.password.value == "") {
        v_pass.innerText = "Password tidak boleh kosong";
        return false;
      } else {
        v_pass.innerText = "";
      }
    }
  </script>

</body>

</html>