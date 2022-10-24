<?php
if ($_POST) {
    $nama = $_POST['nama']; //$_POST['NAMA ATRIBUTNYA']
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    include "koneksi.php";
    $qry_cek_petugas = mysqli_query($conn, " SELECT * FROM `masyarakat` WHERE username like '$username' ");
    $cek_petugas = mysqli_fetch_array($qry_cek_petugas);

    if (empty($nama)) {
        echo "<script>alert('nama tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($telp)) {
        echo "<script>alert('no Hp tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (isset($cek_petugas)) {
        echo "<script>alert('username already used');location.href='../../frontend/php/login.php';</script>";
    } else {
        include "koneksi.php"; //INCLUDE KE KELAS yang ada DATABASE 
        $insert = mysqli_query($conn, "insert into masyarakat (nama, username,password,tlp) value ('" . $nama . "','" . $username . "','" . $password . "','" . $telp . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='../../frontend/php/login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='../../admin/tambah_pelanggan.php';</script>";
        }
    }
}
