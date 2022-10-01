<?php
session_start();
include "../../backend/php/koneksi.php";
if ($_POST) {
    $id = $_POST['get_id'];
    $qry_bid = mysqli_query($conn, "update lelang SET harga_akhir = (harga_akhir+100) where id_masyarakat = $_SESSION[id_masyarakat] and id_barang = $id "); ?>
    <?php if ($qry_bid) : ?>
        <script>
            alert("Auction successful")
            window.location.href = "keranjang.php"
        </script>
    <?php endif ?>
<?php
}
?>