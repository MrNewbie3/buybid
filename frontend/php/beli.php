<?php
include "header.php";
include "../../backend/php/koneksi.php";
$qry_detail_produk = mysqli_query($conn, "select * from barang where id_barang = '" . $_GET['id_produk'] . "'");
$dt_produk = mysqli_fetch_array($qry_detail_produk);
?>
<h2 class="text-center text-5xl my-16 font-nav font-semibold tracking-widest">Discover Your Product</h2>
<div class="row px-10">
    <form action="masukkankeranjang.php?id_barang=<?= $dt_produk['id_barang'] ?>" method="POST">
        <div class="wrapper-highlight-content w-full flex flex-row">
            <div class="left-content w-full flex flex-col justify-evenly">
                <div class="img-parent flex justify-center">
                    <img src="../<?= $dt_produk['foto_produk'] ?>" class="w-96">
                </div>
            </div>
            <div class="right-content w-full flex flex-col gap-y-8">
                <div class="details-button flex flex-row gap-x-5">
                    <p class="p-3 px-6 border-2 max-w-fit tracking-widest font-semibold rounded-md">Details</p>
                </div>
                <div class="text-description flex flex-col gap-y-4">
                    <p class="text-2xl font-semibold"><?= $dt_produk['nama_barang'] ?></p>
                    <p class="text-gray-500 font-medium"><?= $dt_produk['deskripsi'] ?></p>
                </div>
                <div class="price-col-sum-check uppercase flex flex-col gap-y-12">
                    <div class="product-option w-full flex flex-row gap-x-20">
                        <div class="price w-full flex flex-row justify-between items-center">
                            <p class="font-medium">Price Now</p>
                            <hr class="bg-zinc-300 w-1/4 mx-3 h-0.5">
                            <input type="number" name="harga_bid_awal" disabled value="<?= number_format($dt_produk['harga_awal'], 0, ",", ".") ?>">
                            <p class="font-semibold font-nav tracking-wide text-xl"></p>
                        </div>

                    </div>
                </div>
                <div class="button-option w-fit flex flex-row items-center p-3 px-6 box-border font-medium bg-semiblack cursor-pointer text-white rounded-full">
                    <p class="text-mata-uang">Bid Rp.</p>
                    <input class="" name="harga_penawaran" type="submit" value="<?= number_format($dt_produk['harga_awal'] + 100, 0, ",", ".") ?>">
                </div>
            </div>
        </div>
</div>
</form>
</div>
<?php
include "footer.php";
?>