<?php
include "../frontend/php/header.php";
if ($_SESSION['level'] == "petugas") {
    echo $_SESSION['level'];
    header("location: update_histori_pembelian.php");
}
?>


<div class="flex w-full justify-center items-center my-5">
    <div class="flex-none">
        <?php
        include "./layouts/sidebar.php";
        ?>
    </div>
    <div class="flex-1">
        <div class="w-10/12">
            <h3 class="text-center pt-4 pb-2 font-bold text-2xl">TAMBAH PETUGAS</h3>
            <form action="../backend/php/proses_tambah_petugas.php" method="post">
                <div>
                    <label for="nama_petugas" class="font-medium">Nama petugas :</label>
                    <input type="text" name="nama_petugas" value="" placeholder="masukkan nama" class="w-full rounded-md py-2 px-3 bg-white my-2">
                </div>
                <div>
                    <label for="username" class="font-medium">Username : </label>
                    <input type="text" name="username" value="" placeholder="masukkan username" class="w-full rounded-md py-2 px-3 bg-white my-2">
                </div>
                <div>
                    <label for="password" class="font-medium">Password : </label>
                    <input type="password" name="pass" value="" placeholder="masukkan password" class="w-full rounded-md py-2 px-3 bg-white my-2">
                </div>
                <select name="level" id="level">
                    <option value="" selected disabled>Select Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
                <input type="submit" name="simpan" value="Tambah Petugas" class="w-full rounded-md mt-4 py-2 px-3 bg-slate-800 font-bold text-white">
            </form>
        </div>
    </div>
</div>

<?php
include "../frontend/php/footer.php";
?>