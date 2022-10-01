<?php
include "header.php";
?>
<div class="main-wrapper px-8">
    <div class="top-bar w-fit flex flex-col my-16 gap-y-8 ">
        <h2 class=" text-5xl  font-nav font-semibold tracking-widest">Your Bid</h2>
        <hr class="bg-yellow-300 w-1/2 h-2">
    </div>
    <?php
    include "../../backend/php/koneksi.php";
    $qry_produk = mysqli_query($conn, "SELECT * FROM `lelang` inner JOIN barang USING (id_barang) WHERE id_masyarakat = $_SESSION[id_masyarakat]  ");
    $qry_highest_bid = mysqli_query($conn, "SELECT id_masyarakat FROM `lelang` WHERE harga_akhir in (SELECT MAX(harga_akhir) FROM lelang) ");
    while ($lelang = mysqli_fetch_array($qry_produk)) : ?>
        <tr>
            <?php if (isset($lelang)) : ?>
                <div class="content-wrapper w-full flex flex-row justify-between items-center">
                    <div class="wrapper-detail w-full">
                        <div class="left-content flex flex-row items-center gap-x-8 w-full">
                            <div class="img">
                                <img src="../<?= $lelang['foto_produk'] ?>" alt="" class="max-h-64">
                            </div>
                            <div class="text font-bold flex w-full items-center">
                                <div class="title text-sm text-zinc-600">
                                    <p>Highest bid user id: <?= $lelang['id_barang'] ?></p>
                                    <p>Auction ID: <?= $lelang['id_lelang'] ?></p>
                                    <p>Your ID: <?= $lelang["id_masyarakat"] ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-action w-full flex flex-row justify-between">
                        <div class="price">
                            <p class="font-semibold text-sm">item price: Rp. <?= number_format($lelang['harga_akhir'], 0, ",", '.') ?></p>
                        </div>
                        <div class="right-content  flex flex-row justify-evenly w-auto gap-x-8 font-semibold text-md items-center">
                            <form action="hapus_cart.php" method="POST">
                                <button type="submit" name="reset" value="<?= $lelang["id_barang"] ?>" class="bg-black px-8 rounded-md py-1 text-white tracking-widest font-nav">Cancel</button>
                            </form>
                            <form action="bid_process.php" method="POST">
                                <button name="get_id" value="<?= $lelang["id_barang"] ?>" class="bg-yellow-300 px-2 rounded-md py-1 tracking-widest">Bid Rp.100</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php elseif (!isset($lelang)) : ?>
                <div class="flex flex-row w-full justify-center items-center h-96">
                    <span class="material-symbols-rounded text-yellow-300 text-8xl">
                        report_problem
                    </span>
                    <span class="text-2xl">
                        Your auction is empty!
                    </span>
                </div>
            <?php endif ?>
        </tr>
    <?php endwhile ?>

</div>
<?php
include "footer.php";
?>