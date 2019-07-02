<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <title>Penyewaan Panggung</title>
    
    <?php
        include '../connect.php';

        if($_POST){
            $gambar = $_POST["gambar"];
            $nama_paket = $_POST["nama_paket"];
            $harga_paket = $_POST["harga_paket"];
            $keterangan_paket = $_POST["keterangan_paket"];

            $query = "INSERT INTO paket_panggung VALUES('', '$gambar', '$nama_paket', '$harga_paket', '$keterangan_paket')";

            $queryInput = mysqli_query($koneksi, $query);

            if ($queryInput) {
                echo "
                    <script>
                        alert('Data Berhasil Dibuat');
                        document.location.href = 'PacketList.php';
                    </script>
                ";
            }
            else {
                echo "
                    <script>
                        alert('Data Gagal Dibuat');
                    </script>
                ";
            }
        }
    ?>
    
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
          <h5 class="mb-4 mt-5" style="color: white">Silahkan lengkapi form di bawah untuk menyelesaikan pesanan</h5>
          <form action="" method="post">
            <table class="table" style="color: white">
              <tbody>

                <tr>
                  <td>Gambar</td>
                  <td> : </td>
                  <td>
                    <input class="btn btn-primary" type="file" name="gambar">
                  </td>
                </tr>

                <tr>
                  <td>Nama</td>
                  <td> : </td>
                  <td>
                  <input type="text" class="form-control" name="nama_paket">
                  </td>
                </tr>

                <tr>
                  <td>Harga</td>
                  <td> : </td>
                  <td>
                  <input type="number" class="form-control" name="harga_paket">
                  </td>
                </tr>

                <tr>
                  <td>Keterangan</td>
                  <td> : </td>
                  <td>
                  <input type="text" class="form-control" name="keterangan_paket">
                  </td>
                </tr>
              </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Tambah Data">
          </form>
          </center>
          
        
        
        
        </div>
      </div>      
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
    </iframe>
  </body>
</html>