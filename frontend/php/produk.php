<?php
include "header.php";
?>
<div class="top-bar w-full flex flex-col my-16 gap-y-8 " data-aos="zoom-in-up">
    <h2 class=" text-5xl text-center font-nav font-semibold tracking-widest">Find Your Dream Luxury Cars</h2>
    <hr class="bg-yellow-300 self-center w-1/4 h-2">
</div>
<div class="row font-content flex flex-row">
    <?php
    include "sidebar.php";
    ?>
    <div class="image-content-wrapper flex flex-row gap-4 flex-wrap justify-center w-full">
        <?php
        include "../../backend/php/koneksi.php";
        $kategori = "";
        isset($_POST['kategori']) ? $kategori = $_POST['kategori'] : ' ';
        $qry_produk = mysqli_query($conn, "select * from barang $kategori");
        $qry_harga = mysqli_query($conn, "select harga_akhir from lelang");
        $qry_jumlah = mysqli_query($conn, "select count(*) from barang $kategori");
        $harga = mysqli_fetch_array($qry_harga);
        $jumlah = mysqli_fetch_array($qry_jumlah);
        if ($jumlah[0] == 0) { ?>

            <div class="flex flex-row items-center h-96">
                <span class="material-symbols-rounded text-yellow-300 text-8xl">
                    report_problem
                </span>
                <span>
                    Warning! No result for <?= $kategori ?>
                </span>
            </div>
        <?php
        }
        while ($dt_barang = mysqli_fetch_array($qry_produk)) {
        ?>
            <a href="./beli.php?id_produk=<?= $dt_barang['id_barang'] ?>">
                <div class="wrapper-card hover:shadow-stone-500 pb-4 hover:shadow-2xl rounded-lg transition-shadow duration-300">
                    <div class="card-img text-center font-semibold flex flex-col gap-y-5">
                        <img src="../<?= $dt_barang['foto_produk'] ?>" class="w-96">
                        <p class="font-nav text-zinc-400 text-lg">Rp. <?= number_format($dt_barang['harga_awal'], 0, ",", ".") ?></p>
                        <p class=""><?= $dt_barang['nama_barang'] ?></p>
                        <div class="flex flex-row justify-around gap-x-8 px-4">
                            <button class="bg-yellow-300 w-full py-2 rounded-md" type="submit">Buyout Rp.225</button>
                            <button class="bg-yellow-300 w-full py-2 rounded-md" type="submit">Bid Rp.<?= isset($harga["harga_akhir"]) ? $harga['harga_akhir'] : $dt_barang['harga_awal'] ?></button>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>

</div>

<?php
include "footer.php";
?>