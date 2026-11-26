<?php
class MahasiswaModel {
  private $koneksi;

  public function __construct($koneksi) {
    $this->koneksi = $koneksi;
  }

  public function getAllMahasiswa() {
    return $this->koneksi->query(
      'SELECT * FROM mahasiswa'
    );
  }
}