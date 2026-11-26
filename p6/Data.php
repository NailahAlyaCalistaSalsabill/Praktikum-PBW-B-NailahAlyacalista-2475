<?php
include "Koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

while ($data = mysqli_fetch_assoc($query)) {
    echo $data ['nim'];
    echo " - ";
    echo $data ['nama'];
    echo "br>";
}
?>