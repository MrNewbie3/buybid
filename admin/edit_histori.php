<?php
include "../frontend/php/header.php";
include "../backend/php/koneksi.php";

if (isset($_POST["simpan"])) {
    $harga = $_POST['harga'];
    $bid = $_POST['harga_bid'];
    $buyout = $_POST['harga_buyout'];
    $id_barang = $_GET['id_barang'];
    $update = mysqli_query($conn, "UPDATE barang SET harga_awal ='$harga', kelipatan_bid = '$bid', harga_buyout='$buyout' WHERE id_barang = '$id_barang'");
    if ($update) {
        echo "<script>alert('Sukses update transaksi');location.href='update_histori_pembelian.php';</script>";
        // fungsi (location.href='tambah_kelas.php') untuk kembali ke halaman tambah_kelas
    } else {
        echo "<script>alert('Gagal update transaksi');location.href='edit_histori.php';</script>";
    }
}
?>


<div class="flex items-center justify-center">
    <?php
    $id = $_GET['id_barang'];
    $qry_produk = mysqli_query($conn, "select * from  barang");
    $dt_produk = mysqli_fetch_array($qry_produk);
    $name = $dt_produk['nama_barang'];
    $harga = $dt_produk['harga_awal'];
    $harga_bid = $dt_produk['kelipatan_bid'];
    $harga_buyout = $dt_produk['harga_buyout'];
    $date = $dt_produk['tgl_daftar'];
    ?>
    <div class="w-10/12">
        <h3 class="text-center pt-4 pb-2 font-bold text-2xl">UPDATE TRANSAKSI</h3>
        <form action="" method="post">
            <div>
                <label for="name" class="font-medium">Nama barang : </label>
                <input type="text" name="name" value="<?= $name ?>" class="w-full rounded-md py-2 px-3 bg-slate-100 my-2 text-gray-400" disabled>
            </div>
            <div>
                <label for="harga" class="font-medium">Harga awal: </label>
                <input type="number" name="harga" value="<?= $harga ?>" class="w-full rounded-md py-2 px-3 bg-slate-100 my-2">
            </div>
            <div>
                <label for="harga" class="font-medium">kelipatan Bid: </label>
                <input type="number" name="harga_bid" value="<?= $harga_bid ?>" class="w-full rounded-md py-2 px-3 bg-slate-100 my-2">
            </div>
            <div>
                <label for="harga" class="font-medium">Harga Buyout: </label>
                <input type="number" name="harga_buyout" value="<?= $harga_buyout ?>" class="w-full rounded-md py-2 px-3 bg-slate-100 my-2">
            </div>
            <div>
                <label for="tanggal" class="font-medium">Tanggal daftar : </label>
                <input type="date" name="tanggal" value="<?= $date ?>" class="w-full rounded-md py-2 px-3 bg-slate-100 my-2 text-gray-400" disabled>
            </div>

            <input type="submit" name="simpan" value="Update Transaksi" class="w-full rounded-md mt-4 py-2 px-3 bg-slate-800 font-bold text-white">
        </form>
    </div>
</div>



<?php
include "../frontend/php/footer.php";
?>