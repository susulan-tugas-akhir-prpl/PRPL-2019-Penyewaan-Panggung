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
          <h5 class="mr-5 ml-3 mb-5"><a href="index.php" style="color:white"> Penyewaan<br>Panggung</a></h5>
          </ul>  
          <center>
          <form action="" method="post">
            <div class="form-group row">
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Silahkan Masukkan Nomor Pesanan Anda" name="cari" autofocus>
              </div>
              <button class="btn btn-primary" type="submit" name="search">Cari</button>
            </div>
          </form>
          <br>

          <?php
            include 'connect.php';
            if(isset($_POST["search"])){
                $cari = $_POST["cari"];
                
                $queryCheckout = "SELECT transaksi.id_transaksi AS Pesanan, user.nama_user AS nama, transaksi.tgl_pesan AS pesan, transaksi.tgl_acara AS acara, transaksi.alamat AS alamat, transaksi.total AS total, paket_panggung.nama_paket AS paket FROM user JOIN transaksi ON user.id_user = transaksi.id_user JOIN paket_panggung ON paket_panggung.id_paket = transaksi.id_paket WHERE transaksi.id_transaksi='$cari'";
                $sql = mysqli_query($koneksi, $queryCheckout);
                $jumlah = mysqli_num_rows($sql);
                if($jumlah > 0){
                  //var_dump($sql["total"]);die();
                  
                  foreach ($sql as $key) {
                    $total_biaya = number_format($key["total"],0, ".",".");
                    echo "
                    <table  style='color: white' class='table'>
                      <tbody>
                        <tr>
                          <td>Nomor Pesanan</td>
                          <td> : </td>
                          <td>$key[Pesanan]</td>
                        </tr>
                        <tr>
                          <td>Nama Pemesan</td>
                          <td> : </td>
                          <td>$key[nama]</td>
                        </tr>
                        <tr>
                          <td>Tanggal Pesan</td>
                          <td> : </td>
                          <td>$key[pesan]</td>
                        </tr>
                        <tr>
                          <td>Tanggal Acara</td>
                          <td> : </td>
                          <td>$key[acara]</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td> : </td>
                          <td>$key[alamat]</td>
                        </tr>
                        <tr>
                          <td>Paket yang dipesan</td>
                          <td> : </td>
                          <td>$key[paket]</td>
                        </tr>
                        <tr>
                          <td>Total biaya</td>
                          <td> : </td>
                          <td>Rp. $total_biaya</td>
                        </tr>
                        <tr>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                        </tr>
                      </tbody>
                    </table>    
                        ";
                    }
                }
                else{
                    echo "<p style='color:white'>Maaf, nomor pesanan tidak ditemukan</p>";
                }
            }
            else if ($_GET) {
                $cari = $_GET["id_transaksi"];
                
                $queryCheckout = "SELECT transaksi.id_transaksi AS Pesanan, user.nama_user AS nama, transaksi.tgl_pesan AS pesan, transaksi.tgl_acara AS acara, transaksi.alamat AS alamat, transaksi.total AS total, paket_panggung.nama_paket AS paket FROM user JOIN transaksi ON user.id_user = transaksi.id_user JOIN paket_panggung ON paket_panggung.id_paket = transaksi.id_paket WHERE transaksi.id_transaksi='$cari'";
                $sql = mysqli_query($koneksi, $queryCheckout);
                $jumlah = mysqli_num_rows($sql);
                if($jumlah > 0){
                  //var_dump($sql["total"]);die();
                  
                  foreach ($sql as $key) {
                    $total_biaya = number_format($key["total"],0, ".",".");
                    echo "
                    <table  style='color: white' class='table'>
                      <tbody>
                        <tr>
                          <td>Nomor Pesanan</td>
                          <td> : </td>
                          <td>$key[Pesanan]</td>
                        </tr>
                        <tr>
                          <td>Nama Pemesan</td>
                          <td> : </td>
                          <td>$key[nama]</td>
                        </tr>
                        <tr>
                          <td>Tanggal Pesan</td>
                          <td> : </td>
                          <td>$key[pesan]</td>
                        </tr>
                        <tr>
                          <td>Tanggal Acara</td>
                          <td> : </td>
                          <td>$key[acara]</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td> : </td>
                          <td>$key[alamat]</td>
                        </tr>
                        <tr>
                          <td>Paket yang dipesan</td>
                          <td> : </td>
                          <td>$key[paket]</td>
                        </tr>
                        <tr>
                          <td>Total biaya</td>
                          <td> : </td>
                          <td>Rp. $total_biaya</td>
                        </tr>
                        <tr>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                        </tr>
                      </tbody>
                    </table>    
                        ";
                    }
            }
          }
          ?>

          <a href="index.php">Kembali Ke Menu Utama</a>

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