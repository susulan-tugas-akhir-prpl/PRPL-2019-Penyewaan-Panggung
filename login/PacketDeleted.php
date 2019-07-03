<?php
    include '../connect.php';

    $id_paket = $_GET["id_paket"];

    $query = mysqli_query($koneksi, "DELETE FROM paket_panggung WHERE id_paket = '$id_paket'");

    if($query){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'PacketList.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal dihapus!');
            </script>
        ";
    }
    
?>