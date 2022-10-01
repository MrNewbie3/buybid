<?php
session_start();
if ($_POST) {
    include "../../backend/php/koneksi.php";
    $penawaran_produk = $_POST['harga_penawaran'];
    $qry_get_produk = mysqli_query($conn, "select * from barang where id_barang = '" . $_GET['id_barang'] . "'");
    $dt_produk = mysqli_fetch_array($qry_get_produk);
    $qry_check_produk = mysqli_query($conn, "select * from lelang where id_barang = $dt_produk[id_barang] and id_masyarakat = $_SESSION[id_masyarakat]");
    $date_today = date("Y-m-d"); ?>
    <?php if ($check_product = mysqli_fetch_array($qry_check_produk) > 0) { ?>
        <script>
            alert("you have already registered for this product, redirecting to cart")
            window.location.href = "keranjang.php"
        </script>
<?php
    } else {


        $insert = mysqli_query($conn, "insert into lelang values( null, $dt_produk[id_barang], '$date_today', $penawaran_produk, 1, 1 , $_SESSION[id_masyarakat] )");
        if ($insert) {
            echo "<script>
            alert('Success to bid')
            window.location.href = 'keranjang.php'
            </script>";
        }
    }
    // $_SESSION['cart'][] = array(
    //     'id_pelanggan' => $_SESSION["id_pelanggan"],
    //     'id_barang' => $dt_produk['id_barang'],
    //     'foto' => $dt_produk['foto_produk'],
    //     'harga' => $dt_produk['harga_awal'],
    //     'nama_barang' => $dt_produk['nama_barang'],
    // );
}
