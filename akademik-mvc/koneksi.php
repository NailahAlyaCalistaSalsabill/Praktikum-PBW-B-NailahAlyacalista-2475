<?php 
mysqli_report(MYSQLI_REPORT_EROR | MYSQLI_REPORT_STRICT);
$koneksi = new mysqli(
  'localhost', 'root', '', 'akademik'
);
$koneksi->set_charset('utf8mb4');

function e($nilai) {
  return htmlspecialchars((string)$nilai,
    ENT_QUOTES, 'UTF-8');
}