<?php
include "../frontend/php/header.php";
?>
<div class="wrapper px-10">
    <div class="top-bar w-fit flex flex-col my-16 gap-y-8">
        <h2 class=" text-5xl  font-nav font-semibold tracking-widest">Transaction History</h2>
        <hr class="bg-yellow-300 w-1/2 h-2">
    </div>
    <div class="main-wrapper flex flex-col divide-y-2 divide-zinc-300 w-full ">
        <table class="table-auto border border-slate-500 border-collapse p-4 text-center">
            <tr class="border border-slate-600 rounded-md">
                <th class="border border-slate-700">#</th>
                <th class="border border-slate-700">Photo</th>
                <th class="border border-slate-700">Name</th>
                <th class="border border-slate-700">Price</th>
                <th class="border border-slate-700">Action</th>
            </tr>
            <?php
            include "../backend/php/koneksi.php";
            $qry_produk = mysqli_query($conn, "select * from barang ");
            $no = 1;
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk =  $dt_produk['nama_barang'];
                $harga =  $dt_produk['harga_awal'];
                $foto = $dt_produk['foto_produk'];
            ?>
                <tr>
                    <td class="border border-slate-700"><?= $no ?></td>
                    <td class="border border-slate-700">
                        <img src="<?= $foto ?>" alt="Photo car">
                    </td>
                    <td class="border border-slate-700"><?= $produk ?></td>
                    <td class="border border-slate-700"><?= $harga ?></td>

                    <td class="border border-slate-700">
                        <a href="edit_histori.php?id_barang=<?= $dt_produk['id_barang'] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>

<?php
include "../frontend/php/footer.php";
?>