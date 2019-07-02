<?php
  include '../connect.php';

  $id_transaksi = $_GET['id_transaksi'];

  $query = "SELECT user.id_user AS ID, user.nama_user AS Nama, user.telp AS Telephone, paket_panggung.nama_paket AS Paket, paket_panggung.harga_paket AS Harga, transaksi.alamat AS Alamat FROM user JOIN transaksi ON user.id_user = transaksi.id_user JOIN paket_panggung ON paket_panggung.id_paket = transaksi.id_paket WHERE transaksi.id_transaksi = '$id_transaksi'";
  $sql = mysqli_query($koneksi,$query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">


    <title>PENYEWAAN PANGGUNG</title>
  </head>
  <body>
    

    <div class="container">
      

      <div class="card" style="background-color: #050A27">
        <div class="card-body pl-5 pb-5">
          <ul class="nav mt-3">
            <h5 class="mr-5 ml-3"><a href="AdminPage.php" style="color:white"> Penyewaan<br>Panggung</a></h5>
            <li class="nav-item">
              <a class="nav-link" href="Transaksi.php">Daftar Transaksi</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kelola Paket
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="PacketList.php">Lihat Paket</a>
                <a class="dropdown-item" href="InputPacket.php">Tambah Paket</a>
              </div>
            </li>
          </ul>  
          <center>
            <h1 class="mt-5" style="color:white">DATA TRANSAKSI</h1>
            <div class="card mt-5" style="width: 65rem;">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Alamat</th>
                  </tr>
                </thead>
                
                <?php foreach ($sql as $key) {
                  $total_transaksi = number_format($key["Harga"],0, ".",".");
                  
                  echo "
                    <tbody>
                      <tr>
                        <td>$key[ID]</td>
                        <td>$key[Nama]</td>
                        <td>$key[Telephone]</td>
                        <td>$key[Paket]</td>
                        <td>Rp. $total_transaksi</td>
                        <td>$key[Alamat]</td>
                      </tr>
                  </tbody>
                  ";
                } 
                ?>
                
              </table>
            </div>
          </center>
          
        </div>
      </div>     
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>