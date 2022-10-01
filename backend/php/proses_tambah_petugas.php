<?php
if ($_POST) {
    $nama = $_POST['nama_petugas']; //$_POST['NAMA ATRIBUTNYA']
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $level = $_POST['level'];
    include "koneksi.php";
    $qry_cek_petugas = mysqli_query($conn, " SELECT * FROM `petugas` WHERE nama like '$username' ");
    $cek_petugas = mysqli_fetch_array($qry_cek_petugas);
    if (empty($nama)) {
        echo "<script>alert('nama tidak boleh kosong');location.href='../../admin/tambah_petugas.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='../../admin/tambah_petugas.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('passwoard tidak boleh kosong');location.href='../../admin/tambah_petugas.php';</script>";
    } elseif (empty($level)) {
        echo "<script>alert('level tidak boleh kosong');location.href='../../admin/tambah_petugas.php';</script>";
    } elseif (isset($cek_petugas)) {
        echo "<script>alert('nama petugas sudah dipakai');location.href='../../admin/tambah_petugas.php';</script>";
    } else {
        include "koneksi.php"; //INCLUDE KE KELAS yang ada DATABASE 
        $insert = mysqli_query($conn, "insert into petugas (nama, username, password,level) value ('" . $nama . "','" . $username . "','" . $password . "','" . $level . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan petugas');location.href='../../admin/tambah_produk.php';</script>";
            // fungsi (location.href='tambah_kelas.php') untuk kembali ke halaman tambah_kelas
        } else {
            echo "<script>alert('Gagal menambahkan petugas');location.href='../../admin/tambah_produk.php';</script>";
        }
    }
}
