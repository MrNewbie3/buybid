<?php
if ($_POST) {
    $nama = $_POST['nama']; //$_POST['NAMA ATRIBUTNYA']
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($nama)) {
        echo "<script>alert('nama tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($telp)) {
        echo "<script>alert('no Hp tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='../../admin/tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php"; //INCLUDE KE KELAS yang ada DATABASE 
        $insert = mysqli_query($conn, "insert into masyarakat (nama, username,password,tlp) value ('" . $nama . "','" . $username . "','" . $password . "','" . $telp . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='../../admin/tambah_pelanggan.php';</script>";
            // fungsi (location.href='tambah_kelas.php') untuk kembali ke halaman tambah_kelas
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='../../admin/tambah_pelanggan.php';</script>";
        }
    }
}
