<?php
//$conn=variabel
$conn = mysqli_connect('localhost', 'root', '', 'lelang');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
