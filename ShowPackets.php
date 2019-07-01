<?php
  include 'connect.php';

  $query = "SELECT * FROM paket_panggung";
  $sql = mysqli_query($koneksi, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Penyewaan Panggung</title>
  </head>
  <body>
    <div class="container">
      <div class="card" style="background-color: #050A27">
        <div class="card-body pl-5 pb-5">
          <ul class="nav mt-3">
          <h5 class="mr-5 ml-3"><a href="index.php" style="color:white"> Penyewaan<br>Panggung</a></h5>
          </ul>  
          <center>
          <h1 class="mt-5" style="color: white">Silahkan Pesan Paket Sesuai Kebutuhan Anda</h1>
        
          <?php while($hasil = mysqli_fetch_array($sql)) : ?>
            <div class="card mt-5" style="width: 40rem;">
              <img src="img/<?= $hasil["gambar"]; ?>" class="card-img-top" alt="Paket Gambar">
              <div class="card-body">
                <h5 class="card-title"><?= $hasil["nama_paket"]; ?></h5>
                <p class="card-text"><?= $hasil["keterangan_paket"]; ?></p>
                <a href="InputNewOrder.php?id_paket=<?= $hasil["id_paket"];?>" class="btn btn-primary">Pesan</a>
              </div>
            </div>
          <?php endwhile; ?>
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