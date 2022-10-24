<?php
include "../backend/php/koneksi.php";
$id = $_GET['id_barang'];
$qry_produk = mysqli_query($conn, "select * from lelang where id_barang = $id");
$dt_produk = mysqli_fetch_array($qry_produk);
$update_status = mysqli_query($conn, "UPDATE `lelang` SET status = 'tutup' WHERE id_barang = $id");
if ($update_status) { ?>
    <script>
        alert('Sukses tutup lelang');
    </script>
<?php
} else { ?>
    <script>
        alert("gagal tutup lelang")
    </script>
<?php
}
$qry_insert = mysqli_query($conn, "select * from lelang where status like 'tutup' and id_barang like $id and harga_akhir IN ( SELECT MAX(harga_akhir) FROM lelang WHERE id_barang LIKE 6 AND STATUS LIKE 'tutup')");
$dt_insert = mysqli_fetch_array($qry_insert);
$insert_result = mysqli_query($conn, "insert into history_lelang values(null, '$dt_insert[id_lelang]','$dt_insert[id_barang]','$dt_insert[id_masyarakat]', '$dt_insert[harga_akhir]')");
if ($insert_result) { ?>
    <script>
        alert('Sukses tutup lelang');
        location.href = 'on_auction_layout.php'
    </script>
<?php
} else { ?>
    <script>
        alert("gagal tutup lelang")
        location.href = "on_auction_layout.php"
    </script>
<?php
}

?>
<?php
include "../frontend/php/footer.php";
?>