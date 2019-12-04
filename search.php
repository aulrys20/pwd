<?php
 require "../db.php";
 $keyword = $_GET['keyword'];
 $query = mysqli_query($connection,"SELECT * FROM pasien WHERE id LIKE '%$keyword%' OR name LIKE '%$keyword%' OR nomor LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%' OR tanggal_lahir LIKE '%$keyword%' OR golongan_darah LIKE '%$keyword%' OR tinggi_badan LIKE '%$keyword%'OR berat_badan LIKE '%$keyword%'");
?>
<table id="table" class="table table-striped table-hover ">


		  <thead>
		    <tr>
            <th>ID</th>
            <th>Nama Pasien</th>
            <th>Nomor Telp</th>
            <th>Alamat</th>
            <th>Tempat, Tanggal lahir</th>
            <th>Golongan Darah</th>
            <th>Tinggi Badan (cm)</th>
            <th>Berat Badan (kg)</th>
            <th>Aksi</th>
		     <!--  <th>Aksi</th> -->
		      
		    </tr>
		  </thead>
		  <?php 
		 
		  if(mysqli_num_rows($query)==0){
		    echo '<tbody>
		    <tr class="active">
		      <td colspan="5">Tidak ada data yang di entrikan </td>
		    </tr>
		  </tbody>';
		    
		  }
		  else{
		    $no=1;
		    while($data=mysqli_fetch_assoc($query)){
		    echo '<tbody>
		    <tr class="active">';
		    echo '<td>'.$no.'</td>';
		    echo '<td>'.$data['id'].'</td>';
		    echo '<td>'.$data['nama'].'</td>';
		    echo '<td>'.$data['nomor'].'</td>';
		    echo '<td>'.$data['alamat'].'</td>';
			echo '<td>'.$data['tempat_lahir'].'</td>';
			echo '<td>'.$data['tanggal_lahir'].'</td>';    
		    echo '<td>'.$data['golongan_darah'].'</td>';
   		    echo '<td>'.$data['tinggi_badan'].'</td>';
   		    echo '<td>'.$data['berat_badan'].'</td>';

		    // echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim='.$data['nim'].'">Update</a>
		    //  <a class="btn btn-danger" href="hapusmahasiswa.php?nim='.$data['nim'].'">Delete</a></tr>';
		    // echo '</tr>';
		    $no++;
		    }

		  }
		  
		  ?>
		</table> <?php
 require "../db.php";
 $keyword = $_GET['keyword'];
 $query = mysqli_query($connection,"SELECT * FROM pasien WHERE id LIKE '%$keyword%' OR name LIKE '%$keyword%' OR nomor LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%' OR tanggal_lahir LIKE '%$keyword%' OR golongan_darah LIKE '%$keyword%' OR tinggi_badan LIKE '%$keyword%'OR berat_badan LIKE '%$keyword%'");
?>
<table id="table" class="table table-striped table-hover ">


		  <thead>
		    <tr>
		      <th>No</th>
		      <th>NIM</th>
		      <th>Username</th>
		      <th>Email</th>
		      <th>Jenis Kelamin</th>
		      <th>Alamat</th>
		      <th>Asal</th>
		      <th>Tangal Lahir</th>
		     <!--  <th>Aksi</th> -->
		      
		    </tr>
		  </thead>
		  <?php 
		 
		  if(mysqli_num_rows($query)==0){
		    echo '<tbody>
		    <tr class="active">
		      <td colspan="5">Tidak ada data yang di entrikan </td>
		    </tr>
		  </tbody>';
		    
		  }
		  else{
		    $no=1;
		    while($data=mysqli_fetch_assoc($query)){
		    echo '<tbody>
		    <tr class="active">';
		   echo '<td>'.$no.'</td>';
		    echo '<td>'.$data['id'].'</td>';
		    echo '<td>'.$data['nama'].'</td>';
		    echo '<td>'.$data['nomor'].'</td>';
		    echo '<td>'.$data['alamat'].'</td>';
			echo '<td>'.$data['tempat_lahir'].'</td>';
			echo '<td>'.$data['tanggal_lahir'].'</td>';    
		    echo '<td>'.$data['golongan_darah'].'</td>';
   		    echo '<td>'.$data['tinggi_badan'].'</td>';
   		    echo '<td>'.$data['berat_badan'].'</td>';

		    // echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim='.$data['nim'].'">Update</a>
		    //  <a class="btn btn-danger" href="hapusmahasiswa.php?nim='.$data['nim'].'">Delete</a></tr>';
		    // echo '</tr>';
		    $no++;
		    }

		  }
		  
		  ?>
		</table> 