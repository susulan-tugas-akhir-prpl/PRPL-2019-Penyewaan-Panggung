<?php
  include 'connect.php';
  session_start();
  if($_GET){
    $id_paket = $_GET["id_paket"];
    $_SESSION['id_paket'] = $id_paket;
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
          <p style="color: white">Belum pernah memesan sebelumnya ? klik <a href="InputNewUser.php">disini</a></p>
          <form action="" method="post">
            <div class="form-group row">
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukkan nomor identitas yang pernah anda daftarkan" name="cari" autofocus>
              </div>
              <button class="btn btn-primary" type="submit" name="search">Cari</button>
            </div>
          </form>
          <br>

          <?php
            include 'connect.php';
            if(isset($_POST["search"])){
                $cari = $_POST["cari"];
                $sql = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$cari'");
                $jumlah = mysqli_num_rows($sql);
                if($jumlah > 0){
                    
                    
                    foreach ($sql as $key) {
                      echo "
                      <table style='color: white' class='table'>
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td>$key[nama_user]</td>
                          </tr>
                          <tr>
                          <td>Nomor Telephone</td>
                          <td> : </td>
                          <td>$key[telp]</td>
                          </tr>
                          <tr>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                        </tr>
                        </tbody>
                      </table>    
                      <a href='ProcessingNewOrder.php?id_user=$key[id_user]' class='btn btn-primary'>Lanjutkan Pemesanan</a><br>
                        ";
                    }
                }
                else{
                    echo "<p style='color:white'>Maaf, nomor ID tidak ditemukan</p>";
                }
            }
          ?>


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