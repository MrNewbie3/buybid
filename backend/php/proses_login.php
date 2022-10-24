<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='../../frontend/php/login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='../../frontend/php/login.php';</script>";
    } elseif (empty($role)) {
        echo "<script>alert('Role tidak boleh kosong');location.href='../../frontend/php/login.php';</script>";
    } else {
        include "koneksi.php";
        $qry_login = mysqli_query($conn, "select * from  $role  where nama = '$username' and password = '$password'");
        $qry_role = mysqli_query($conn, "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE '$role'");
        if (mysqli_num_rows($qry_login) > 0) {
            session_start();
            $dt_login = mysqli_fetch_array($qry_login);
            $dt_role = mysqli_fetch_array($qry_role);
            $_SESSION['role'] = $dt_role['TABLE_NAME'];
            $_SESSION['id_masyarakat'] = $dt_login['id_masyarakat'];
            $_SESSION['nama'] = $dt_login['nama'];
            $_SESSION['status_login'] = true;
            if ($role == "masyarakat") {
                header("location: ../../frontend/php/home.php");
            } else if ($role == "petugas") {
                $_SESSION['level'] = $dt_login['level'];
                $_SESSION['id_petugas'] = $dt_login['id_masyarakat'];
                header("location: ../../admin/tambah_petugas.php");
            }
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='../../frontend/php/login.php';</script>";
        }
    }
}
