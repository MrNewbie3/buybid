<?php
session_start();

if (isset($_SESSION['status_login'])) {
  header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title></title>
  <link rel="stylesheet">
</head>

<body class="">
  <div class="row px-3" style="margin-top:50px;">
    <div class="col-md"></div>
    <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px;padding:20px">
      <form action="../../backend/php/proses_login.php" method="post">
        <h3 align="center">Wellcome Back!</h3>
        Username:
        <input type="text" name="username" value="" class="form-control">
        password:
        <input type="password" name="password" class="form-control">
        role:
        <select name="role" id="" class="form-control">
          <option value="" disabled selected>pilih role</option>
          <option value="Masyarakat">Masyarakat</option>
          <option value="petugas">Petugas</option>
        </select>

        <center><input type="submit" name="login" class="btn btn-dark mt-3" value="LOGIN"></center>
      </form>
    </div>
    <div class="col-md"></div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>