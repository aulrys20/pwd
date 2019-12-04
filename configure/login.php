<?php
include '../database/db.php';

$secret_key = "6LcKosMUAAAAAOzt7KacdKmjjRpVvpjQkgVtjaNK";
// Disini kita akan melakukan komunkasi dengan google recpatcha
// dengan mengirimkan scret key dan hasil dari response recaptcha nya
$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);

session_start();

if($response->success){
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE `username` = '$username' AND `password` = '$password'";

    if (mysqli_query($connection, $query)) {
      $_SESSION["username"] = $username;
      header('location:../index.php');
    } else {
      echo '<script>
      alert("Kombinasi Username dan Password tidak cocok!");
      window.location.href = "http://localhost/kesehatan_pwd-master/login.php";
     </script>';
    }
  }else{
    echo '<script>
      alert("Username atau Password tidak boleh kosong!");
      window.location.href = "http://localhost/kesehatan_pwd-master/login.php";
     </script>';
  }
} else {
	 echo '<script>
    alert("Captcha salah!");
    window.location.href = "http://localhost/kesehatan_pwd-master/login.php";
   </script>';
}
?>