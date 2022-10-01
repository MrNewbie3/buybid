<?php
session_start();
if ($_POST) {
    include "../../backend/php/koneksi.php";
    $id_barang = $_POST["reset"];
    $qry_data = mysqli_query($conn, "delete from lelang where id_masyarakat = $_SESSION[id_masyarakat] and id_barang like $id_barang "); ?>
    <?php if ($qry_data) : ?>
        <script>
            alert("Auction cancelled");
            location.href = "keranjang.php";
        </script>
    <?php endif ?>
<?php
} ?>