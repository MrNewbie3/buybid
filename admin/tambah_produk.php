<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<?php
include "../frontend/php/header.php";
?>

<body>
    <div class="flex w-full justify-center items-center">
        <div class="flex-none">
            <?php
            include "./layouts/sidebar.php";
            ?>
        </div>
        <div class="flex-1">
            <div class="w-10/12">
                <h3 class="text-center pt-4 pb-2 font-bold text-2xl">TAMBAH Barang</h3>
                <form action="../backend/php/proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="nama_produk" class="font-medium">Nama Barang : </label>
                        <input type="text" name="nama_produk" value="" placeholder="masukkan nama barang" class="w-full rounded-md py-2 px-3 bg-white my-2" required>
                    </div>
                    <div>
                        <label for="deskripsi" class="font-medium">Deskripsi : </label>
                        <input type="text" name="deskripsi" value="" placeholder="masukkan deskripsi barang" class="w-full rounded-md py-2 px-3 bg-white my-2" required>
                    </div>
                    <div>
                        <label for="harga" class="font-medium">Harga awal: </label>
                        <input type="number" min="1" name="harga" value="" placeholder="masukkan harga barang" class="w-full rounded-md py-2 px-3 bg-white my-2" required>
                    </div>
                    <div>
                        <label for="harga" class="font-medium">Kelipatan penawaran: </label>
                        <input type="number" min="1" name="kelipatan" value="" placeholder="masukkan harga barang" class="w-full rounded-md py-2 px-3 bg-white my-2" required>
                    </div>
                    <div>
                        <label for="harga" class="font-medium">Harga buyout: </label>
                        <input type="number" min="1" name="buyout" value="" placeholder="masukkan harga barang" class="w-full rounded-md py-2 px-3 bg-white my-2" required>
                    </div>

                    <div>
                        <label for="fileToUpload" class="font-medium">Foto produk : </label>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" value="" placeholder="masukkan foto produk" class="w-full rounded-md py-1 px-3 bg-white my-2" required>
                    </div>
                    <input type="submit" name="simpan" value="Tambah Barang" class="w-full rounded-md mt-4 py-2 px-3 bg-slate-800 font-bold text-white">
                </form>
            </div>
        </div>
    </div>


    <?php
    include '../frontend/php/footer.php';
    ?>
</body>

</html>