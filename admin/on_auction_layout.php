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
                <th class="border border-slate-700">No</th>
                <th class="border border-slate-700">Photo</th>
                <th class="border border-slate-700">ID product</th>
                <th class="border border-slate-700">Current Price</th>
                <th class="border border-slate-700">Bidder ID</th>
                <th class="border border-slate-700">Bid Price </th>
                <th class="border border-slate-700">Buyout Price </th>
                <th class="border border-slate-700">Status </th>
                <th class="border border-slate-700">Action</th>
            </tr>
            <?php
            include "../backend/php/koneksi.php";
            $qry_produk = mysqli_query($conn, "select * from lelang join barang using(id_barang) group by id_barang");
            $no = 1;
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk =  $dt_produk['id_barang'];
                $harga =  $dt_produk['harga_awal'];
                $kelipatan_bid =  $dt_produk['kelipatan_bid'];
                $buyout =  $dt_produk['harga_buyout'];
                $status =  $dt_produk['status'];
                $foto = $dt_produk['foto_produk'];
                $qry_current_price = mysqli_query($conn, "select harga_akhir as harga, id_masyarakat from lelang where id_barang = $produk and harga_akhir in (select MAX(harga_akhir) from lelang where id_barang = $produk)");
                $dt_max_price = mysqli_fetch_array($qry_current_price);
            ?>
                <tr>
                    <td class="border border-slate-700"><?= $no ?></td>
                    <td class="border border-slate-700">
                        <img src="<?= $foto ?>" alt="Photo car" class="h-64 w-96 object-contain">
                    </td>
                    <td class="border border-slate-700"><?= $produk ?></td>
                    <td class="border border-slate-700"><?= $dt_max_price['harga'] ?></td>
                    <td class="border border-slate-700"><?= $dt_max_price['id_masyarakat'] ?></td>
                    <td class="border border-slate-700"><?= $kelipatan_bid ?></td>
                    <td class="border border-slate-700"><?= $buyout ?></td>
                    <td class="border border-slate-700"><?= $status ?></td>

                    <td class="border border-slate-700">
                        <?php
                        if ($status === "buka") { ?>
                            <a href="on_auction.php?id_barang=<?= $dt_produk['id_barang'] ?>">
                                <button type="button" class="bg-red-600 px-4 py-2 font-semibold text-white rounded-md">Close Auction</button>
                            </a>
                        <?php
                        } else { ?>
                            <p class="font-semibold uppercase">Already Closed!</p>
                        <?php
                        }
                        ?>
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