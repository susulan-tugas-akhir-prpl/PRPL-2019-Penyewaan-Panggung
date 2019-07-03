<?php
  include '../connect.php';
  $query = "SELECT * FROM paket_panggung";
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
        <div class="card-body pb-5">
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
            <h1 class="mt-5" style="color:white">DAFTAR PAKET</h1>
            <div class="card mt-5" style="width: 65rem;">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Paket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                
                <?php $i=1; ?>
                <?php foreach ($sql as $key) {
                  
                  echo "
                    <tbody>
                      <tr>
                        <td align='center'>$i</td>
                        <td align='center'><img src='../img/$key[gambar]' width='50'></td>
                        <td align='center'>$key[nama_paket]</td>
                        <td align='center'>$key[harga_paket]</td>
                        <td align='center'>$key[keterangan_paket]</td>
                        <td align='center'><a href='PacketUpdated.php?id_paket=$key[id_paket]'>Ganti</a> atau <a href='PacketDeleted.php?id_paket=$key[id_paket]'>Hapus</a></td>
                      </tr>
                  </tbody>
                  ";
                  $i++;
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