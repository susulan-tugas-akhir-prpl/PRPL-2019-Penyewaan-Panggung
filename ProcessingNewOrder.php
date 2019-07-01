<?php
    include 'connect.php';
    
    $id = $_GET["id_user"];
    session_start();
    $id_paket = $_SESSION['id_paket'];


    $query = "SELECT * FROM user WHERE id_user ='$id'";
    $sql = mysqli_query($koneksi,$query);
    $row = mysqli_fetch_array($sql);

    $query_paket = "SELECT * FROM paket_panggung WHERE id_paket = '$id_paket'";
    $sql_paket = mysqli_query($koneksi, $query_paket);
    $row_paket = mysqli_fetch_array($sql_paket);
    
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
    <?php
        include 'connect.php';
        $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $string = '';
        for($i = 0; $i < 6; $i++) {
            $pos = rand(0, strlen($data)-1);
            $string .= $data{$pos};
        }

        if($_POST){
            foreach ($sql as $key) {
              $id_transaksi = $string . $key["telp"];
            }
            //var_dump($id_transaksi);die();

            $id_user = $_POST["id_user"];
            $tgl_pesan = date('Y-m-d');
            $tgl_acara = $_POST["tgl_acara"];
            $alamat_acara = $_POST["alamat_acara"];
            $total = $_POST["harga_paket"];

            

            $tgl_acara = date('Y-m-d',strtotime($tgl_acara));
            //var_dump($tgl_acara);

            $queryinput = "INSERT INTO transaksi VALUES('$id_transaksi','$id_user','$id_paket','$tgl_pesan','$tgl_acara','$alamat_acara', '$total')";
            $sqlinput = mysqli_query($koneksi,$queryinput);

            if ($sqlinput) {
              $queryTransaksi = "SELECT * FROM transaksi WHERE id_transaksi ='$id_transaksi'";
              $sql_Transaksi = mysqli_query($koneksi, $queryTransaksi);
              $jumlahTransaksi = mysqli_num_rows($sql_Transaksi);
              if($jumlahTransaksi > 0){
                foreach ($sql_Transaksi as $key) {
                  echo "
                      <script>
                          alert('Pesanan Berhasil Dibuat');
                          document.location.href = 'DataTransaksi.php?id_transaksi=$key[id_transaksi]';
                      </script>
                  ";

                }
              }
            }
            else {
                echo "
                    <script>
                        alert('Pesanan Gagal Dibuat');
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
          <h5 class="mr-5 ml-3"><a href="index.php" style="color:white"> Penyewaan<br>Panggung</a></h5>
          </ul>  
          <center>
          <h5 class="mb-4" style="color: white">Silahkan lengkapi form di bawah untuk menyelesaikan pesanan</h5>
          <form action="" method="post" name="postform">
          <input type="hidden" value="<?php echo "$row_paket[harga_paket]";?>" name="harga_paket">
            <table class="table" style="color: white">
              <tbody>

                <tr>
                  <td>Nomor ID</td>
                  <td> : </td>
                  <td>
                  <input type="text" class="form-control" value="<?php echo "$row[id_user]";?>" name="id_user" readonly>
                  </td>
                </tr>

                <tr>
                  <td>Tanggal acara</td>
                  <td> : </td>
                  <td>
                  <input type="text" id="tgl_acara" name="tgl_acara" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_acara);return false;">
                  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl_acara);return false;"><img name="kalender" align="absmiddle" style="border:none" src="kalender.png" width="34" height="29" border="0" alt=""></a>
                  </td>
                </tr>

                <tr>
                  <td>Alamat</td>
                  <td> : </td>
                  <td>
                  <textarea name="alamat_acara" class="form-control"></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="SUBMIT">
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